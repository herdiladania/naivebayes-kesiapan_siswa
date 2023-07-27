$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "paginate": {
        "previous": "Previous",
        "next": "Next"
      },
      "info": "Showing _START_ to _END_ of _TOTAL_ entries"
    },
    "columnDefs": [
      { "className": "text-center", "targets": [0, 1, 2, 3] }
    ]
  });
});
