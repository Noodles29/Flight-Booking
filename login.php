<?php session_start() ?>
<!-- <div class="container-fluid">
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
			<small><a href="javascript:void(0)" id="new_account">Create New Account</a></small>
		</div>
		<button class="button btn btn-info btn-sm">Login</button>
	</form>
</div> -->


<body>
	<div class="container-fluid">
		<form action="" id="login-frm">
			<h2 id="hi">Hi !</h2>
			<div class="form-group">
				<label for="" class="control-label">Email:</label>
				<input type="email" name="email" required="" class="form-control">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Password:</label>
				<input type="password" name="password" required="" class="form-control">
			</div>
			<button>LOGIN</button>

			<div id="signup" class="input-form">
				<p>Don't have an account yet? - <a id="a-signup" href="index.php?page=signup">Sign up</a></p>
			</div>
		</form>
	</div>
</body>

<style>
	body {
		background-image: url(assets/img/downloaded/backgound.jpg);
		background-size: 100%;
		background-repeat: no-repeat;
		min-height: auto;
		max-width: auto;
		font-family: 'Montserrat', sans-serif !important;

	}

	.container-fluid {
		width: 50%;
		height: 100%;
		display: flex;
		justify-content: center;
		float: right !important;
		text-align: center;
	}

	#login-frm {
		width: 500px;
		position: relative;
		margin-top: 200px;
	}

	#hi {
		text-align: center;
		font-size: 42px;
		font-weight: 700;
		margin-bottom: 50px;
	}

	.form-group {
		display: flex;
		margin-bottom: 20px;
		position: relative;
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

	#signup {
		font-size: 24px;
	}

	#a-signup {
		color: #00ccff;
		text-decoration: none;
	}

	footer {
		display: none;
	}
</style>

<script>
	$('#new_account').click(function() {
		uni_modal("Create an Account", 'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e) {
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled', true).html('Logging in...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'admin/ajax.php?action=login2',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success: function(resp) {
				if (resp == 1) {
					location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				} else {
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>