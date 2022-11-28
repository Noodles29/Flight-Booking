<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="signup-frm">
		<h2 id="welcome">Welcome!</h2>
		<div class="form-group">
			<label id="email" class="control-label">Email:</label>
			<input id="email-input2" class="form-control" , type="email" name="email">
		</div>
		<div id="password2" class="form-group">
			<label class="control-label">Password:</label>
			<input id="password-input2" , class="form-control" , type="password" name="password">
		</div>
		<div id="password" class="form-group">
			<label class="control-label">Confirm Password:</label>
			<input id="password-reinput" , class="form-control" , type="password" name="confirmPassword">
		</div>
		<div class="form-group">
			<label id="email" class="control-label">Name:</label>
			<input id="email-input2" class="form-control" , name="name">
		</div>
		<div class="form-group">
			<label class="control-label">Phone number:</label>
			<input id="phone-input" type="tel" class="form-control" name="contact">
		</div>
		<div id="password2" class="form-group">
			<label class="control-label">Address:</label>
			<input id="password-input2" , class="form-control" , name="address">
		</div>
		<button>SIGNUP</button>
		<div id="login" class="input-form">
			<p>Already have an account? <a id="a-login" href="index.php?page=login">- Log In</a></p>
		</div>
	</form>
</div>

<style>
	#uni_modal .modal-footer {
		display: none;
	}

	body {
		background-image: url(assets/img/downloaded/backgound.jpg);
		background-size: 100%;
		background-repeat: no-repeat;
		min-height: auto;
		max-width: auto;
		font-family: 'Montserrat', sans-serif !important;
	}

	.form-group {
		display: flex;
		margin-bottom: 20px;
		position: relative;
	}

	.container-fluid {
		width: 50%;
		height: 100%;
		display: flex;
		justify-content: center;
		float: right !important;
		text-align: center;
	}

	#welcome {
		text-align: center;
		font-size: 42px;
		font-weight: 700;
		margin-bottom: 50px;
	}

	#signup-frm {
		width: 600px;
		position: relative;
		margin-top: 150px;
	}

	button {
		background: #00ccff;
		width: 440px;
		height: 56px;
		border-radius: 50px;
		color: white;
		border: 0;
		font-size: 24px;
		font-weight: 700;
		margin: 34px 0 50px 0;
	}

	label {
		font-size: 22px;
		letter-spacing: 1px;
		font-weight: 600;

	}

	input.form-control {
		position: absolute;
		right: 0;
		width: 344px;
		height: 40px;
		padding: 12px 20px;
		outline: none;
		border: 1px solid #607d8b;
		font-size: 16px;
		letter-spacing: 1px;
		border-spacing: 5px;
		color: #607d8b;
		float: right;
	}

	#login {
		font-size: 24px;
	}

	#a-login {
		color: #00ccff;
		text-decoration: none;
	}
</style>
<script>
	$('#signup-frm').submit(function(e) {
		e.preventDefault()
		$('#signup-frm button[type="submit"]').attr('disabled', true).html('Saving...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'admin/ajax.php?action=signup',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success: function(resp) {
				if (resp == 1) {
					//window.location.replace("./login.php");
					var url = "index.php?page=login";
					$(location).attr('href', url);
				} else if(resp == 2) {
					$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
				else {
					$('#signup-frm').prepend('<div class="alert alert-danger">Password and Confirm Password are not the same.</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	}
)
</script>