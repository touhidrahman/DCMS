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
echo form_open('complain', $attributes);
?>

<fieldset>

	<!-- Form Name -->
	<legend>Add Patient's Complaints</legend>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="patient_id">Patient ID</label>
		<div class="col-md-4">
			<input id="patient_id" name="patient_id" type="text"
				value="<?php echo ($this->session->flashdata('patient_id') != '') ? $this->session->flashdata('patient_id') : set_value('patient_id'); ?>"
				placeholder="Numeric only" class="form-control input-md" required="">
          <?php echo form_error('patient_id'); ?>
  
  </div>
	</div>
	
	<!-- Date input-->
	<div class="form-group">
		<label class="col-md-4 control-label">Date</label>
		<div class="col-md-4">
			<input name="complain_dt" type="text"
				value="<?php echo date('Y-m-d'); ?>"
				placeholder="YYYY-MM-DD" class="form-control input-md" required="">
          <?php echo form_error('complain_dt'); ?>
  
  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="complain">Chief Complaints</label>
		<div class="col-md-4">
			<textarea class="form-control" name="complain"
				value="<?php echo set_value('complain'); ?>"></textarea>
		</div>
          <?php echo form_error('complain'); ?>
</div>


	<!-- Button -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="save"></label>
		<div class="col-md-4">
			<?php echo form_submit( 'submit', 'Save Complain', 'class="btn btn-primary"'); ?>
		</div>
	</div>

</fieldset>


<?php echo form_close(); ?>
<?php

$this->load->view('templates/footer');
?>
