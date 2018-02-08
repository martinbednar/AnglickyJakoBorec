	<div class="container">
		<div class="container" style="margin:auto">
			<br><br>
			<center><h2>Popis, nějaký text.</h2></center>
		</div>
		<form class="login-form" method="post">
			<div class="form-group">
				<label for="email" class="text-uppercase">Email</label>
				<input id="email" name="email" type="email" class="form-control" value="<?php if(isset($_POST['email'])) { echo htmlentities($_POST['email']); } ?>">

			</div>
			<div class="form-group">
				<label for="agreement" class="text-uppercase">Souhlas se zpracováním osobních údajů</label>
				<input id="agreement" name="agreement" type="checkbox" class="form-control" style="float:left;width:5%">
			</div>

			<?php if(isset($login_error)) { ?>
				<div>
					<div class="alert alert-danger">
						<?= $login_error ?>
					</div>
				</div>
			<?php } ?>

			<div class="form-check">
				<button type="submit" class="btn btn-login">Zaslat Ebook zdarma</button>
			</div>
		</form>
		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
	</div>
</body>
</html>