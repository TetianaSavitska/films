<?php 

?>
<form method="post" class="form-horizontal" > 
	<fieldset>
		<div class="form-group">
			<label class="control-label col-sm-2" for="usernameOrEmail">Username or email</label>
			<div class="col-sm-10">
				<input type="text" name="usernameOrEmail" class="form-control" id="username" value="" placeholder="Username" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="password">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" id="password" value="" placeholder="Password" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-info">Login</button>
			</div>
		</div>
	</fieldset>
</form>