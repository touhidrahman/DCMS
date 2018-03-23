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
echo form_open('addDisease', $attributes);
?>

<fieldset>

	<!-- Form Name -->
	<legend>Add Disease & Description</legend>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="disease">Disease Name</label>
		<div class="col-md-5">
			<input id="disease" name="disease" type="text" placeholder=""
				class="form-control input-md"
				value="<?php echo set_value('disease'); ?>">
            <?php echo form_error('disease'); ?></div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="description">Description</label>
		<div class="col-md-4">
			<textarea class="form-control" id="description" name="description"
				value="<?php echo set_value('description'); ?>"></textarea>
            <?php echo form_error('description'); ?></div>
	</div>

	<!-- Button -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="submit"></label>
		<div class="col-md-4">
        <?php echo form_submit( 'submit', 'Submit', 'class="btn btn-primary"'); ?> </div>
	</div>

</fieldset>
<?php echo form_close(); ?>

<h4 class="text-info">Existing History Criteria</h4><hr>
<?php foreach ($result as $row):?>
<div class="row">
	<div class="col-md-3">
		<p class="text-right">
			<strong><?php echo $row->disease_name; ?></strong>
		</p>
	</div>

	<div class="col-md-1">
		<a class="btn btn-default btn-xs"
			href="<?php echo site_url('addDisease/delete/'.$row->id);?>"> <span
			class="glyphicon glyphicon-trash"></span></a>
	</div>
	<div class="col-md-8"><p class="text-muted"><?php echo $row->description; ?></p></div>
</div>
<?php endforeach;?>


<?php
$this->load->view('templates/footer');
?>
