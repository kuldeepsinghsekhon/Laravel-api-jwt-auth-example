<div class="container col-lg-6">
		<?php
			if($fd = $this->session->flashdata('password_updation_failed'))
				echo '<div>'.$fd.'</div>';
		?>
		<h2>Change Password</h2>
	<form method="post">
		<div class="form-group">
			<label>Old Password</label>
			<input type="password" name="old_password" id="old_password" value="<?=set_value('old_password')?>" class="form-control">
			<?php
				$fd = ($fd = form_error('old_password')) ? $fd : $this->session->flashdata('wrong_old_password');
					echo '<div class="text-danger">'.$fd.'</div>';
			?>
		</div>
		<div class="form-group">
			<label for="new_password">New Password</label>
			<input type="password" name="new_password" id="new_password" value="<?=set_value('new_password')?>" class="form-control">
			<div class="text-danger"><?=form_error('new_password')?></div>
		</div>
		<div class="form-group">
			<label for="confirm_password">Confirm Password</label>
			<input type="password" name="confirm_password" id="confirm_password" value="<?=set_value('confirm_password')?>" class="form-control">
			<div class="text-danger"><?=form_error('confirm_password')?></div>
		</div>
		
		<input type="submit" value="Save Password" class="btn btn-success">
	</form>
</div>