<?php

namespace App\Http\Controllers;

use id;
use Carbon\Carbon;
use App\Models\Hasil;
use App\Models\Atribut;
use App\Models\DataLatih;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index()
    {
        $data_latih = DataLatih::all();
        $atributNames = Atribut::pluck('nama_atribut')->toArray();

        $selectClause = "SELECT s.nama_lengkap AS nama";
        $formattedAtributNames = [];
        foreach ($atributNames as $atributName) {
            $formattedAtributNames[] = strtolower(str_replace(' ', '_', $atributName));
        }

        $selectClause = "SELECT s.nama_lengkap AS nama";
        $i = 0;
        foreach ($formattedAtributNames as $formated_atributName) {
            $selectClause .= ", MAX(CASE WHEN a.nama_atribut = '$atributNames[$i]' THEN n.nama_nilai END) AS $formated_atributName";
            $i++;
        }

        $data_uji_query = "$selectClause FROM siswas s LEFT JOIN penilaians p ON s.id = p.siswa_id LEFT JOIN atributs a ON p.atribut_id = a.id LEFT JOIN nilais n ON p.nilai_id = n.id WHERE n.nama_nilai IS NOT NULL 
        GROUP BY s.id, s.nama_lengkap;";

        $data_uji = DB::select(DB::raw($data_uji_query));

        $classifier = $this->trainNaiveBayes($data_latih);
        $predictions = $this->testNaiveBayes($classifier, $data_uji, $formattedAtributNames);

        dd($predictions);

        $this->simpanHasil($predictions);
        $this->simpanRiwayat($predictions);

        return view('perhitungan.index', compact('data_latih', 'data_uji', 'classifier', 'predictions'), [
            "title" => "Perhitungan"
        ]);
    }

    public function trainNaiveBayes($data_latih)
    {
        $totalInstances = count($data_latih);
        $classCounts = [];
        $likelihoodCounts = [];
        $classProbabilities = [];
        $likelihoodProbabilities = [];

        foreach ($data_latih as $data) {
            $classLabel = $data->kesiapan;

            if (!isset($classCounts[$classLabel])) {
                $classCounts[$classLabel] = 0;
            }

            $classCounts[$classLabel]++;
        }

        foreach ($classCounts as $classLabel => $count) {
            $classProbabilities[$classLabel] = $count / $totalInstances;
        }


        $attributes = $this->getAttributes($data_latih);

        foreach ($attributes as $attribute) {
            $likelihoodCounts[$attribute] = [];

            foreach ($data_latih as $data) {
                $classLabel = $data->kesiapan;
                $attributeValue = $data->$attribute;

                if (!isset($likelihoodCounts[$attribute][$classLabel][$attributeValue])) {
                    $likelihoodCounts[$attribute][$classLabel][$attributeValue] = 0;
                }

                $likelihoodCounts[$attribute][$classLabel][$attributeValue]++;
            }
        }

        foreach ($attributes as $attribute) {
            $likelihoodProbabilities[$attribute] = [];

            foreach ($likelihoodCounts[$attribute] as $classLabel => $counts) {
                $totalClassInstances = $classCounts[$classLabel];
                foreach ($counts as $attributeValue => $count) {
                    $likelihoodProbabilities[$attribute][$classLabel][$attributeValue] = ($count) / ($totalClassInstances);
                }
            }
        }

        return [
            'classProbabilities' => $classProbabilities,
            'likelihoodProbabilities' => $likelihoodProbabilities,
        ];
    }

    public function testNaiveBayes($probabilities, $data_uji, $formattedAtributNames)
    {
        $predictions = [];

        foreach ($data_uji as $data) {
            $attributes = [];
            $attributesValues = [];
            $classProbabilities = [];

            foreach ($formattedAtributNames as $formated_atributName) {
                $attributes[] = $formated_atributName;
                $attributesValues[] = $data->$formated_atributName;
            }

            foreach ($probabilities['classProbabilities'] as $classLabel => $classProbability) {
                $posterior = $classProbability;
                $probabilityDetails = [];

                foreach (array_keys($attributes) as $idx) {
                    $attribute = $attributes[$idx];
                    $attributeValue = $attributesValues[$idx];
                    if (isset($probabilities['likelihoodProbabilities'][$attribute][$classLabel][$attributeValue])) {
                        $likelihood = $probabilities['likelihoodProbabilities'][$attribute][$classLabel][$attributeValue];
                        $posterior *= $likelihood;

                        $probabilityDetails[$attribute] = [
                            'value' => $likelihood,
                            'result' => $posterior,
                        ];
                    } else {
                        $posterior *= 0;

                        $probabilityDetails[$attribute] = [
                            'value' => 0,
                            'result' => 0,
                        ];
                    }
                }

                $classProbabilities[$classLabel] = [
                    'posterior' => $posterior,
                    'attribute_probabilities' => $probabilityDetails,
                ];
            }

            $predictedClass = null;
            $maxPosterior = -1;
            foreach ($classProbabilities as $classLabel => $classInfo) {
                if ($classInfo['posterior'] > $maxPosterior) {
                    $predictedClass = $classLabel;
                    $maxPosterior = $classInfo['posterior'];
                }
            }

            $predictions[] = [
                'nama' => $data->nama,
                'hasil' => $predictedClass,
                'class_probabilities' => $classProbabilities,
            ];
        }

        return $predictions;
    }




    public function getAttributes($data)
    {
        $excludedColumns = ['id', 'nama_lengkap', 'created_at', 'updated_at', 'kesiapan'];
        $attributes = [];
        foreach ($data as $instance) {
            foreach ($instance->toArray() as $attribute => $value) {

                if (!in_array($attribute, $excludedColumns)) {
                    $attributes[] = $attribute;
                }
            }
        }

        return array_values(array_unique($attributes));
    }

    private function simpanHasil(array $predictions)
    {
        foreach ($predictions as $prediction) {
            $nama_lengkap = $prediction['nama'];
            $hasil = $prediction['hasil'];
            $prob_siap = $prediction['class_probabilities']['Siap']['posterior'];
            $prob_belum_siap = $prediction['class_probabilities']['Belum Siap']['posterior'];


            $existingRecord = Hasil::where('nama_lengkap', $nama_lengkap)->first();

            if ($existingRecord) {

                $existingRecord->delete();
            }


            Hasil::create([
                'nama_lengkap' => $nama_lengkap,
                'hasil' => $hasil,
                'prob_siap' => $prob_siap,
                'prob_belum_siap' => $prob_belum_siap,
            ]);
        }
    }

    private function simpanRiwayat(array $predictions)
    {
        foreach ($predictions as $prediction) {
            $nama_lengkap = $prediction['nama'];
            $hasil = $prediction['hasil'];
            $prob_siap = $prediction['class_probabilities']['Siap']['posterior'];
            $prob_belum_siap = $prediction['class_probabilities']['Belum Siap']['posterior'];
            $tahun = Carbon::now()->year;

            $existingRecord = Riwayat::where('nama_lengkap', $nama_lengkap)->first();

            if ($existingRecord) {
                $existingRecord->delete();
            }

            Riwayat::create([
                'nama_lengkap' => $nama_lengkap,
                'hasil' => $hasil,
                'prob_siap' => $prob_siap,
                'prob_belum_siap' => $prob_belum_siap,
                'tahun' => $tahun,
            ]);
        }
    }
}
