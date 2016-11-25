const BASEURL = 'http://localhost/lapizza/site/';

jQuery(document).ready(function(){
	jQuery('#messages').modal('show');

	jQuery('.number').keyup(function(e) {
		if (/\D/g.test(this.value)) {
			// Filter non-digits from input value.
			this.value = this.value.replace(/\D/g, '');
		}
	});

	jQuery('input[name="addproductcart[quantity]"]').on('change keyup', function() {
		var quantity = jQuery(this).val();

		if(quantity < 1) {
			jQuery(this).val('1');
		}
	});

	jQuery('.minus').click(function() {
		var target = jQuery(this).attr('data-target');
		var quantity = jQuery('#' + target).val();

		if(quantity > 1) {
			quantity--;
			jQuery("#" + target).val(quantity);	
		}

		return false;
	});

	jQuery('.plus').click(function() {		
		var target = jQuery(this).attr('data-target');
		var quantity = jQuery('#' + target).val();

		quantity++;		
		jQuery("#" + target).val(quantity);

		return false;
	});

	jQuery('.frmqtdcart form .minus, .frmqtdcart form .plus').click(function() {
		var formtarget = jQuery(this).attr('data-form');

		jQuery('#form-' + formtarget).submit();
	});

	jQuery('.frmqtdcart form input').on('change', function() {
		var formtarget = jQuery(this).attr('data-form');

		jQuery('#form-' + formtarget).submit();
	});

	jQuery('input[name="addressinsert[postalcode]"]').on('change', function() {
        var cep = jQuery(this).val();

        jQuery.ajax({
            url: 'http://api.postmon.com.br/v1/cep/' + cep,
            type: 'GET',
            success: function(data) {
                var cep = JSON.parse(JSON.stringify(data));

                jQuery('input[name="addressinsert[address]').val(cep.logradouro);
                jQuery('input[name="addressinsert[district]').val(cep.bairro);
                jQuery('input[name="addressinsert[city]').val(cep.cidade);
                jQuery('input[name="addressinsert[state]').val(cep.estado);
            }
        });
    });

    jQuery('input[name="addressupdate[postalcode]"]').on('change', function() {
        var cep = jQuery(this).val();

        jQuery.ajax({
            url: 'http://api.postmon.com.br/v1/cep/' + cep,
            type: 'GET',
            success: function(data) {
                var cep = JSON.parse(JSON.stringify(data));

                jQuery('input[name="addressupdate[address]').val(cep.logradouro);
                jQuery('input[name="addressupdate[district]').val(cep.bairro);
                jQuery('input[name="addressupdate[city]').val(cep.cidade);
                jQuery('input[name="addressupdate[state]').val(cep.estado);
            }
        });
    });

    jQuery('.link-updateaddress').click(function() {
        var idAddress = jQuery(this).attr('data-address-id');

        jQuery.ajax({
            url: BASEURL + '/address/select/' + idAddress,
            type: 'GET',
            success: function(data) {
                var address = JSON.parse(data);

                jQuery('input[name="addressupdate[id_user]').val(address.id_user);
                jQuery('input[name="addressupdate[address]').val(address.address);
                jQuery('input[name="addressupdate[number]').val(address.number);
                jQuery('input[name="addressupdate[adjunct]').val(address.adjunct);
                jQuery('input[name="addressupdate[district]').val(address.district);
                jQuery('input[name="addressupdate[city]').val(address.city);
                jQuery('input[name="addressupdate[state]').val(address.state);
                jQuery('input[name="addressupdate[postalcode]').val(address.postalcode);
                jQuery('input[name="addressupdate[name]').val(address.name);
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
                    jQuery('span#status').removeClass('btn-danger');
                    jQuery('span#status').removeClass('btn-success');
                    jQuery('span#status').removeClass('btn-info');
                    jQuery('span#status').addClass('btn-warning');
                } else if(status == 'Enviado') {
                    optionsStatus += '<option selected disabled>Atualizar</option>';
                    optionsStatus += '<option value="Cancelado">Cancelado</option>';
                    optionsStatus += '<option value="Faturado">Faturado</option>';
                    jQuery('span#status').removeClass('btn-success');
                    jQuery('span#status').removeClass('btn-info');
                    jQuery('span#status').removeClass('btn-warning');
                    jQuery('span#status').addClass('btn-success');
                } else if(status == 'Cancelado') {
                    jQuery('span#status').removeClass('btn-warning');
                    jQuery('span#status').removeClass('btn-success');
                    jQuery('span#status').removeClass('btn-info');
                    jQuery('span#status').addClass('btn-danger');
                } else {
                    jQuery('span#status').removeClass('btn-warning');
                    jQuery('span#status').removeClass('btn-success');
                    jQuery('span#status').removeClass('btn-danger');
                    jQuery('span#status').addClass('btn-info');
                }

                jQuery('span#orderid').text(order.id);
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
                    listItens += '<tr><td style="padding: 0 10px"><img src=' + data.image + ' class="img-resume-order" /></td><td><p>' + data.name + '</p><p>' + data.description + '</p><div class="col-md-3 no-padding"><strong>Preço:</strong><br>' + data.price + '<br></div><div class="col-md-4 no-padding"><strong>Quantidade:</strong><br>' + data.quantity + '<br></div><div class="col-md-4 no-padding"><strong>Subtotal:</strong><br>' + data.subtotal + '</div></td></tr>';
                });

                jQuery('#itens table tbody').html(listItens);
            }
        });
    });


	jQuery('.postalcode').mask('99999999');

	setTimeout(function () {
        $("#messages").modal("hide");
    }, 10000);
});
