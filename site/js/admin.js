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

    jQuery('.link-updateproduct').click(function() {
        var idProduct = jQuery(this).attr('data-product-id');

        jQuery.ajax({
            url: BASEURL + '/products/select/' + idProduct,
            type: 'GET',
            success: function(data) {
                var product = JSON.parse(data);
                console.log(product.description);
                
                jQuery('span#produtoname').text(product.name);
                jQuery('input[name="productsupdate[name]"]').val(product.name);
                jQuery('input[name="productsupdate[description]"]').text(product.description);
                jQuery('input[name="productsupdate[id_categorie]"]').val(product.id_categorie);
                jQuery('input[name="productsupdate[price]"]').val(product.price);
                jQuery('input[name="productsupdateimage"]').val(product.image);
                jQuery('input[name="productsupdate[quantity]"]').val(product.quantity);
                jQuery('input[name="productsupdate[id]"]').val(product.id);
            }
        });
    });

    jQuery('.money').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
});
