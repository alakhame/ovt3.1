$('.forgot_password').click(function() {
	$('.remail').toggleClass('show');
	$('.password').toggleClass('hide');

	$('.title_connexion div').fadeToggle(200);
	$('.title_connexion span').fadeToggle(200);

	$('.text_no_password').fadeToggle(400);
	$('.creat_compte').fadeToggle(400);

	$('.log').toggleClass('value');

	if ($('.log').hasClass('value')) {
			$('.log').val('Renvoyer le mot de passe');
			$('.log').prop('disabled',true);
		}
		else{
			$('.log').val('Connexion');
			$('.log').prop('disabled',false);
		}

})

