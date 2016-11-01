jQuery(document).ready(function(){
	jQuery('#messages').modal('show');

	setTimeout(function () {
        $("#messages").modal("hide");
    }, 5000);

    jQuery('.table').DataTable({
    	"language": {
	        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
	    }
    });
});
