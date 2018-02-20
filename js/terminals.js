$(document).ready(function() {
    $('#terminalList').DataTable( {
		"columnDefs": [ {
			"targets": [0],
			"orderable": false
			} ],
		"order": [[ 1, "desc" ]]
    } );
} );