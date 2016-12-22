<?php 

?>
<form method="post" class="form-horizontal" > 
	<fieldset>
		<div class="form-group">
			<label class="control-label col-sm-2" for="username">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" id="username" value="" placeholder="Username" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">Email</label>
			<div class="col-sm-10">
				<input type="email" name="email" class="form-control" id="email" value="" placeholder="Email" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="password">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" id="password" value="" placeholder="Password" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="password_bis">Confirm password</label>
			<div class="col-sm-10">
				<input type="password" name="password_bis" class="form-control" id="password_bis" value="" placeholder="Password" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-info">Sign up</button>
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-2">
			<p class="error"><?php if ($error != null) echo $error; ?></p>
		</div>
	</fieldset>
</form>