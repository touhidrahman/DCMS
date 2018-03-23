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
echo form_open('diagnosis/addItem', $attributes);
?>

<fieldset>

	<!-- Form Name -->
	<legend>Add New Diagnosis Item</legend>

	<div class="form-group">
		<label class="col-md-4 control-label" for="diag_name">Dignosis Name</label>
		<div class="col-md-4">
			<input name="diag_name" type="text" placeholder=""
				class="form-control input-md"
				value="<?php echo set_value('diag_name'); ?>">
            <?php echo form_error('diag_name'); ?>
        </div>
	</div>


	<!-- Select -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="for_children">For Children</label>
		<div class="col-md-3">

			<select name="for_children" class="form-control">
				<option value="FALSE">No</option>
				<option value="TRUE">Yes</option>
			</select>
		</div>
          <?php echo form_error('for_children'); ?>
  
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


<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <tr><th>Diagnosis</th><th>For Children</th><th></th></tr>
            <?php foreach ($diag_names as $dn):?>
            <tr>
                <td><?php echo $dn->diag_name; ?></td>
                <td><span class="label label-info"><?php echo ($dn->for_children == "TRUE") ? 'Yes':''; ?></span></td>
                <td><a href="<?php echo site_url('diagnosis/deleteDiagnosis/'.$dn->id);?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


<?php
$this->load->view('templates/footer');
?>
