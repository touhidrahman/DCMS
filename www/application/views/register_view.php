<?php 
$this->load->view('templates/header');
$this->load->view('templates/notification');
?>

<div style="width: 800px; margin: 0 auto; margin-top: 6em; border:1px dotted #999; border-radius:5px; padding: 5px 15px 15px 15px;">
	<div>
		<h3 class="text-center" style="color: #27acdd">DCMS</h3>
	</div>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Register</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Your Name" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Email</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password1">New Password</label>
  <div class="col-md-4">
    <input id="password1" name="password1" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Confirm Password</label>
  <div class="col-md-4">
    <input id="password2" name="password2" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hint">Password Hint</label>  
  <div class="col-md-4">
  <input id="hint" name="hint" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter a phrase to remember password</span>  
  </div>
</div>


</fieldset>
</form>
	
		<hr>

		<input type="submit" class="btn btn-primary" name="submit" value="Register">&nbsp;&nbsp;&nbsp;
		<a href="<?php echo site_url('home'); ?>">Cancel</a>
	</form>
</div>

<?php $this->load->view('templates/footer'); ?>