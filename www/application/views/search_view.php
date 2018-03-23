<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>

<!--  style="margin: 0 auto; border:1px dotted #999; border-radius:5px; padding: 5px 15px 15px 15px;" -->

<div>
	<h4>Advanced Search</h4>
	<form action="<?php echo site_url('search/result');?>" method="post"
		role="form">

		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<input class="form-control" type="text" name="term"
						placeholder="Search by patient ID or name" />
				</div>
				<div class="col-md-4">
					<input type="submit" class="btn btn-default" name="submit" value="Search">
				</div>
			</div>
		</div>
	</form>
</div>
<hr>
<?php if ($search) : ?>
<div class="row">
    <div class="col-md-4"><strong>Patient ID</strong></div><div class="col-md-8"><strong>Patient Name</strong></div>
</div>
<?php endif; ?>
<?php foreach ($search as $s): ?>
<div class="row">
    <div class="col-md-4"><?php echo $s->id; ?></div><div class="col-md-8"><a href="<?php echo site_url('view/patient/'.$s->id);?>" ><?php echo $s->name; ?></a></div>
</div>
<?php endforeach;?>
<?php
$this->load->view('templates/footer');
?>