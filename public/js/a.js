<script type="text/javascript">
	$("#modal").DataTable({
		processing: true,
		serverSide: true,
		type : "get",
		ajax: '{{ url("get_address")}}',
		columns: [
			{ data:'address', name: 'address'},	
			{ data:'action', name:'action', orderable: false, searchable: false} 
		]
	});
</script>