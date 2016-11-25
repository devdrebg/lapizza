const BASEURL = 'http://localhost/lapizza/site/';

jQuery(document).ready(function(){
	jQuery('#messages').modal('show');

	setTimeout(function () {
        $("#messages").modal("hide");
    }, 10000);

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

    jQuery('.link-updatebilling').click(function() {
        var idBilling = jQuery(this).attr('data-billing-id');

        jQuery.ajax({
            url: BASEURL + '/billings/select/' + idBilling,
            type: 'GET',
            success: function(data) {
                var billing = JSON.parse(data);
                jQuery('span#billingname').text(billing.name);
                jQuery('input[name="billingsupdate[name]"]').val(billing.name);
                jQuery('input[name="billingsupdate[id]"]').val(billing.id);
            }
        });
    });

    jQuery('.link-updateoption').click(function() {
        var idOption = jQuery(this).attr('data-option-id');

        jQuery.ajax({
            url: BASEURL + '/options/select/' + idOption,
            type: 'GET',
            success: function(data) {
                var option = JSON.parse(data);
                console.log(option);

                jQuery('input[name="optionsupdate[tax_vat]"]').val(option.tax_vat);
                jQuery('select[name="optionsupdate[store_status]"]').val(option.store_status);
                jQuery('input[name="optionsupdate[id]"]').val(option.id);
            }
        });
    });

    jQuery('#bannersinsertimage').change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        jQuery("#insertbannerpreview").attr('src',URL.createObjectURL(event.target.files[0]));
    });

    jQuery('#bannersupdateimage').change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        jQuery("#updatebannerpreview").attr('src',URL.createObjectURL(event.target.files[0]));
    });

    jQuery('.link-updatebanner').click(function() {
        var idBanner = jQuery(this).attr('data-banner-id');

        jQuery.ajax({
            url: BASEURL + '/banners/select/' + idBanner,
            type: 'GET',
            success: function(data) {
                var banner = JSON.parse(data);

                console.log(data);
                jQuery('span#bannertitle').text(banner.title);

                jQuery('input[name="bannersupdate[title]"]').val(banner.title);
                jQuery("#updatebannerpreview").attr('src', BASEURL + '/' + banner.url);
								jQuery('input[name="bannersupdate[imagesrc]"]').val(banner.url);
                jQuery('input[name="bannersupdate[link]"]').val(banner.link);

				jQuery('#bannersupdateblank option[value=' + banner.blank + ']').attr('selected','selected');
				jQuery('#bannersupdatestatus option[value=' + banner.status + ']').attr('selected','selected');

                jQuery('input[name="bannersupdate[id]"]').val(banner.id);
            }
        });
    });

    jQuery('#productsinsertimage').change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        jQuery("#insertpreview").attr('src',URL.createObjectURL(event.target.files[0]));
    });

    jQuery('#productsupdate-image').change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        jQuery("#updatepreview").attr('src',URL.createObjectURL(event.target.files[0]));
    });

    jQuery('.link-updateproduct').click(function() {
        var idProduct = jQuery(this).attr('data-product-id');

        jQuery.ajax({
            url: BASEURL + '/products/select/' + idProduct,
            type: 'GET',
            success: function(data) {
                var product = JSON.parse(data);

                jQuery('span#produtoname').text(product.name);
                jQuery('#productsupdate-name').val(product.name);
                jQuery('#productsupdate-description').val(product.description);
                jQuery('#productsupdate-idcategorie').val(product.id_categorie);
                jQuery('#productsupdate-price').val(product.price);
                jQuery("#updatepreview").attr('src', BASEURL + '/' + product.image);
                jQuery('input[name="productsupdate[imagesrc]"]').val(product.image);
                jQuery('#productsupdate-quantity').val(product.quantity);
                jQuery('input[name="productsupdate[id]"]').val(product.id);
            }
        });
    });

    jQuery('.link-detailsorder').click(function() {
        var idOrder = jQuery(this).attr('data-order-id');

        jQuery.ajax({
            url: BASEURL + '/orders/select/' + idOrder,
            type: 'GET',
            success: function(data) {
                var order = JSON.parse(data);

                status = order.status;

                var optionsStatus = '';
                if (status == 'Em Preparo') {
                    optionsStatus += '<option selected disabled>Atualizar</option>';
                    optionsStatus += '<option value="Cancelado">Cancelado</option>';
                    optionsStatus += '<option value="Enviado">Enviado</option>';
                    optionsStatus += '<option value="Faturado">Faturado</option>';
                    jQuery('span#status').addClass('btn-warning');
                    jQuery('#formupdateorderstatus').removeClass('hidden');                    
                } else if(status == 'Enviado') {
                    optionsStatus += '<option selected disabled>Atualizar</option>';
                    optionsStatus += '<option value="Cancelado">Cancelado</option>';
                    optionsStatus += '<option value="Faturado">Faturado</option>';
                    jQuery('span#status').addClass('btn-success');
                    jQuery('#formupdateorderstatus').removeClass('hidden');
                } else if(status == 'Cancelado') {
                    jQuery('span#status').addClass('btn-danger');
                    jQuery('#formupdateorderstatus').addClass('hidden');
                } else {
                    jQuery('span#status').addClass('btn-info');
                    jQuery('#formupdateorderstatus').addClass('hidden');
                }

                if(optionsStatus != '') {
                    alert(optionsStatus);
                    jQuery('select#updateorderstatus').append(optionsStatus);
                }

                jQuery('span#orderid').text(order.id);
                jQuery('#formupdateorderstatus input[name="id"]').val(order.id);
                jQuery('span#data').text(order.date);
                jQuery('span#subtotal').text(order.subtotal_price);
                jQuery('span#tax_vat').text(order.tax_vat);
                jQuery('span#total').text(order.total_price);
                jQuery('span#cep').text(order.postal_code_user);
                jQuery('span#address').text(order.address_user + ' Nº ' + order.number_user);
                jQuery('span#name_billing').text(order.name_billing);
                jQuery('span#status').text(order.status);
                jQuery('span#message').text(order.message);

                var listItens = '';
                $.each(order.itens, function (key, data) {
                    listItens += '<tr><td><div class="col-md-12"><img src=' + data.image + ' class="img-resume-order" /></div></td><td><p>' + data.name + '</p><p>' + data.description + '</p><div class="col-xs-3 no-padding"><strong>Preço:</strong><br>' + data.price + '<br></div><div class="col-xs-4 no-padding"><strong>Quantidade:</strong><br>' + data.quantity + '<br></div><div class="col-xs-4"><strong>Subtotal:</strong><br>' + data.subtotal + '</div></td></tr>';
                });

                jQuery('#itens table tbody').html(listItens);
            }
        });
    });

    jQuery('#updateorderstatus').on('change', function() {
        var status = jQuery(this).val();

        jQuery('#formupdateorderstatus').submit();
    });

    jQuery('input[name="postalcodesinsert[cep]').on('change', function() {
        var cep = jQuery(this).val();

        jQuery.ajax({
            url: 'http://api.postmon.com.br/v1/cep/' + cep,
            type: 'GET',
            success: function(data) {
                var cep = JSON.parse(JSON.stringify(data));

                jQuery('input[name="postalcodesinsert[location]').val(cep.logradouro);
                jQuery('input[name="postalcodesinsert[district]').val(cep.bairro);
                jQuery('input[name="postalcodesinsert[city]').val(cep.cidade);
                jQuery('input[name="postalcodesinsert[state]').val(cep.estado);
            }
        });
    });

    jQuery('.money').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    jQuery('.postalcode').mask('99999999');
});
