$(document).ready(function() {
    $('#promotoresList').DataTable( {
		"columnDefs": [ {
			"targets": [0],
			"orderable": false
			} ],
		"order": [[ 1, "desc" ]]
    } );
} );