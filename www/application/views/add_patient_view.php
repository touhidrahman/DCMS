<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>
<?php
// Change the css classes to suit your needs

$attributes = array(
        'class' => 'form-horizontal',
        'id' => ''
);
echo form_open('addPatient', $attributes);
?>
<fieldset>

	<!-- Form Name -->
	<legend>Add New Patient Info</legend>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="name">Name</label>
		<div class="col-md-5">

			<input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="<?php echo set_value('name'); ?>">
            <?php echo form_error('name'); ?>
    
  </div>
	</div>

	<!-- Appended Input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="age">Age</label>
		<div class="col-md-3">
			<div class="input-group">
				<input id="age" name="age" class="form-control" placeholder="" type="text" value="<?php echo set_value('age'); ?>"> <span
					class="input-group-addon">Years</span>

			</div>
              <?php echo form_error('age'); ?>
		</div>
	</div>
	<!-- Select -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="sex">Sex</label>
		<div class="col-md-3">

			<select id="sex" name="sex" class="form-control">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>
          <?php echo form_error('sex'); ?>
  
</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="phone">Phone</label>
		<div class="col-md-5">
			<input id="phone" name="phone" type="text" placeholder="" class="form-control input-md" value="<?php echo set_value('phone'); ?>">
        <?php echo form_error('phone'); ?>
			
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="email">Email</label>
		<div class="col-md-5">
			<input id="email" name="email" type="text" placeholder="" class="form-control input-md" value="<?php echo set_value('email'); ?>">
        <?php echo form_error('email'); ?>
			
		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="address">Address</label>
		<div class="col-md-4">
			<textarea class="form-control" id="address" name="address" value="<?php echo set_value('address'); ?>"></textarea>
			        <?php echo form_error('address'); ?>
			
		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="contact_person_info">Contact Person Info</label>
		<div class="col-md-4">
			<textarea class="form-control" id="contact_person_info" name="contact_person_info"
				value="<?php echo set_value('contact_person_info'); ?>"></textarea>
			        <?php echo form_error('contact_person_info'); ?>
			
		</div>
	</div>

	<!-- Button -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="submit"></label>
		<div class="col-md-4">
        <?php echo form_submit( 'submit', 'Save', 'class="btn btn-primary"'); ?>
				</div>
	</div>

</fieldset>
<?php echo form_close(); ?>

<?php
$this->load->view('templates/footer');
?>
