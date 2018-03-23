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
echo form_open('treatment/addItem', $attributes);
?>

<fieldset>

	<!-- Form Name -->
	<legend>Add New Treatment Item</legend>

	<div class="form-group">
		<label class="col-md-4 control-label" for="treat_name">Treatment Name</label>
		<div class="col-md-4">
			<input name="treat_name" type="text" placeholder=""
				class="form-control input-md"
				value="<?php echo set_value('treat_name'); ?>">
            <?php echo form_error('treat_name'); ?>
        </div>
	</div>
	
	<div class="form-group">
		<label class="col-md-4 control-label" for="treat_cost">Cost Per Unit</label>
		<div class="col-md-4">
			<input name="treat_cost" type="text" placeholder=""
				class="form-control input-md"
				value="<?php echo set_value('treat_cost'); ?>">
            <?php echo form_error('treat_cost'); ?>
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
            <tr><th>Treatment</th><th>Cost</th><th>For Children?</th><th></th></tr>
            <?php foreach ($treat_names as $tn):?>
            <tr>
                <td><?php echo $tn->treat_name; ?></td>
                <td><?php echo $tn->treat_cost; ?></td>
                <td><span class="label label-info"><?php echo ($tn->for_children == "TRUE") ? 'Yes':''; ?></span></td>
                <td><a href="<?php echo site_url('treatment/deleteTreatment/'.$tn->id);?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


<?php
$this->load->view('templates/footer');
?>
