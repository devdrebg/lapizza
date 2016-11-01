const BASEURL = 'http://localhost/lapizza/site/';

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

    jQuery('.link-updatecategorie').click(function() {
    	var idCategorie = jQuery(this).attr('data-categorie-id');

    	alert(idCategorie);

    	jQuery.ajax({
    		url: BASEURL + '/categories/select/' + idCategorie,
    		type: 'GET',
    		success: function(data) {
    			var categorie = JSON.parse(data);
    			jQuery('span#categorianame').text(categorie.name);
    			jQuery('input[name="categoriesupdate[name]"]').val(categorie.name);
    			jQuery('input[name="categoriesupdate[id]"]').val(categorie.id);
    		}
    	});
	});
});
