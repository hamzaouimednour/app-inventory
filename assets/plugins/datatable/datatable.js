	var baseUrl = $('meta[name="base-url"]').attr('content');
	var datatable = $('#example').DataTable({
		responsive: true,
		language: {
			"url": baseUrl + "/assets/plugins/datatable/French.json"
		},
		pageLength: 15,
		lengthMenu: [ 10, 15, 25, 50, 100 ]
	});
