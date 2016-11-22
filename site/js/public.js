const BASEURL = 'http://localhost/lapizza/site/';

jQuery(document).ready(function(){
	jQuery('#messages').modal('show');

	jQuery('input[name="addproductcart[quantity]"]').keyup(function(e) {
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

	jQuery('.postalcode').mask('99999999');

	setTimeout(function () {
        $("#messages").modal("hide");
    }, 10000);
});
