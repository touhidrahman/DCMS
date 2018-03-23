<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>
<div class="btn-group">
	<a class="btn btn-default" href="<?php echo site_url('treatment/addItem');?>"> <span class="glyphicon glyphicon-eye-open"></span>
		Add/View Treatment Item
	</a>
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
			<input name="patient_id" type="text" placeholder="" class="form-control input-md"
				value="<?php echo (isset($patient_id)) ? $patient_id : set_value('patient_id'); ?>">
            <?php echo form_error('patient_id'); ?>
        </div>
	</div>



	<!-- Select -->
	<div class="form-group">
		<label class="col-md-4 control-label">For Adults</label>
		<div class="col-md-4">
			<select name="treat_id" class="form-control">
				<!-- Make treatment inputs on the fly-->	
        <?php foreach ($treat_names as $tn): ?>
        <?php if ($tn->for_children == "FALSE") :?>
				<option value="<?php echo $tn->id;?>"><?php echo $tn->treat_name . ' ('.$tn->treat_cost.')'; ?></option>
		<?php endif;?>
		<?php endforeach;?>
		      </select>
		</div>
          <?php echo form_error('treat_id'); ?>
    </div>

	<!-- Select -->
	<div class="form-group">
		<label class="col-md-4 control-label">For Children</label>
		<div class="col-md-4">
			<select name="treat_id" class="form-control">
				<!-- Make treatment inputs on the fly-->	
        <?php foreach ($treat_names as $tn): ?>
        <?php if ($tn->for_children == "TRUE") :?>
				<option value="<?php echo $tn->id;?>"><?php echo $tn->treat_name . ' ('.$tn->treat_cost.')'; ?></option>
		<?php endif;?>
		<?php endforeach;?>
				</select>
		</div>
          <?php echo form_error('treat_id'); ?>
    </div>

	<div class="form-group">
		<label class="col-md-4 control-label">Description</label>
		<div class="col-md-4">
			<input name="treat_description" type="text" placeholder="" class="form-control input-md"
				value="<?php echo set_value('treat_description'); ?>">
            <?php echo form_error('treat_description'); ?>
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
