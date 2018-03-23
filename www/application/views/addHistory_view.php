<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>

			     
<div class="btn-group">
  <a class="btn btn-default" href="<?php echo site_url('addDisease');?>"><span class="glyphicon glyphicon-eye-open"></span> Add / View Medical History Items</a>
</div>
<hr>
<?php
// Change the css classes to suit your needs
$attributes = array(
        'class' => 'form-horizontal',
        'id' => ''
);
echo form_open('history', $attributes);
?>

<fieldset>

	<!-- Form Name -->
	<legend>Add Patient's Medical History</legend>

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

	<div class="form-group">
		<label class="col-md-4 control-label" for="disease">Medical History</label>

		<div class="col-md-8">
			<div class="checkbox">
				<label><input type="checkbox" name="disease[]"
					value="0" />&nbsp;Previous patient / No medical history</label><br>
			</div>
			<div class="checkbox">
      <?php foreach ($disease->result() as $d) :?>
      <label><input type="checkbox" name="disease[]"
					value="<?php echo $d->id; ?>" />&nbsp;<?php echo $d->disease_name; ?></label><br>
      <?php endforeach; ?>
        </div>
		</div>
	</div>

	<!-- Button -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="save"></label>
		<div class="col-md-4">
			<?php echo form_submit( 'submit', 'Save Medical History', 'class="btn btn-primary"'); ?>
		</div>
	</div>

</fieldset>


<?php echo form_close(); ?>
<?php
$this->load->view('templates/footer');
?>
