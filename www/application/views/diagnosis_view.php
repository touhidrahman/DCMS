<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>
<div class="btn-group">
  <a class="btn btn-default" href="<?php echo site_url('diagnosis/addItem');?>"><span class="glyphicon glyphicon-plus"></span> Add/View Diagnosis Item</a>
</div>
<hr>
<?php
// Change the css classes to suit your needs

$attributes = array(
        'class' => 'form-horizontal',
        'id' => ''
);
echo form_open('diagnosis/add', $attributes);
?>

<fieldset>

	<!-- Form Name -->
	<legend>On Examination / Diagnosis</legend>
	
	<div class="form-group">
		<label class="col-md-4 control-label" for="patient_id">Patient ID</label>
		<div class="col-md-4">
			<input name="patient_id" type="text" placeholder=""
				class="form-control input-md"
				value="<?php echo (isset($patient_id)) ? $patient_id : set_value('patient_id'); ?>">
            <?php echo form_error('patient_id'); ?>
        </div>
	</div>

	<!-- Make diagnosis inputs on the fly-->	
<?php foreach ($diag_names as $dn): ?>
<?php if ($dn->for_children == "FALSE") :?>
    <div class="form-group">
		<label class="col-md-4 control-label"><?php echo $dn->diag_name;?></label>
		<div class="col-md-8">
		
		<input type="text" class="form-control" name="<?php echo $dn->id;?>">

		</div>
	</div>
<?php endif;?>
<?php endforeach;?>
<h4><b><i>For Children</i></b></h4><hr>
<?php foreach ($diag_names as $dn): ?>
<?php if ($dn->for_children == "TRUE") :?>
    <div class="form-group">
		<label class="col-md-4 control-label"><?php echo $dn->diag_name;?></label>
		<div class="col-md-8">
		
		<input type="text" class="form-control" name="<?php echo $dn->id;?>">

		</div>
	</div>
	
<?php endif;?>	
<?php endforeach;?>	

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
