<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>
<div class="btn-group">
  <a class="btn btn-default" href="<?php echo site_url('treatment/addItem');?>">
  <span class="glyphicon glyphicon-eye-open"></span> Add/View Treatment Item</a>
</div>
<hr>
<?php
// Change the css classes to suit your needs

$attributes = array(
        'class' => 'form-horizontal',
        'id' => ''
);
echo form_open('treatment/add', $attributes);
?>

<fieldset>

	<!-- Form Name -->
	<legend>Treatment Plan</legend>
	<div class="form-group">
		<label class="col-md-4 control-label" for="patient_id">Patient ID</label>
		<div class="col-md-4">
			<input name="patient_id" type="text" placeholder=""
				class="form-control input-md"
				value="<?php echo (isset($patient_id)) ? $patient_id : set_value('patient_id'); ?>">
            <?php echo form_error('patient_id'); ?>
        </div>
	</div>

	<!-- Make treatment inputs on the fly-->	
<?php foreach ($treat_names as $tn): ?>
<?php if (strtolower($tn->treat_name) == "consultation") :?>
    <div class="form-group">
		<label class="col-md-4 control-label"><?php echo $tn->treat_name;?></label>
		<div class="col-md-3">
		<input type="text" class="form-control" placeholder="Optional Description" name="<?php echo $tn->id.'[]';?>">
		</div>
		<div class="col-md-2">
		<input type="text" class="form-control" name="<?php echo $tn->id.'[]';?>" value="1">
		</div>
		<div class="col-md-3"><p class="text-muted">@ Tk <?php echo $tn->treat_cost;?></p></div>
	</div>
<?php endif;?>
<?php endforeach;?>

<!-- Other options -->
<?php foreach ($treat_names as $tn): ?>
<?php if (($tn->for_children == "FALSE") && (strtolower($tn->treat_name) != "consultation")) :?>
    <div class="form-group">
		<label class="col-md-4 control-label"><?php echo $tn->treat_name;?></label>
		<div class="col-md-3">
		<input type="text" class="form-control" placeholder="Description" name="<?php echo $tn->id.'[]';?>">
		</div>
		<div class="col-md-2">
		<input type="text" class="form-control" name="<?php echo $tn->id.'[]';?>">
		</div>
		<div class="col-md-3"><p class="text-muted">@ Tk <?php echo $tn->treat_cost;?></p></div>
	</div>
<?php endif;?>
<?php endforeach;?>
<h4><b><i>For Children</i></b></h4><hr>
<?php foreach ($treat_names as $tn): ?>
<?php if (($tn->for_children == "TRUE") && (strtolower($tn->treat_name) != "consultation")) :?>
    <div class="form-group">
		<label class="col-md-4 control-label"><?php echo $tn->treat_name;?></label>
		<div class="col-md-3">
		<input type="text" class="form-control" placeholder="Description" name="<?php echo $tn->id.'[]';?>">
		</div>
		<div class="col-md-2">
		<input type="text" class="form-control" name="<?php echo $tn->id.'[]';?>">
		</div>
		<div class="col-md-3"><p class="text-muted">@ Tk <?php echo $tn->treat_cost;?></p></div>
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
