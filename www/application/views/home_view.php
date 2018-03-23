<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>

<div class="row">
    <h4>Recent Patients</h4><hr>
    <div class="col-md-2"><b>Date</b></div><div class="col-md-2"><b>Patient ID</b></div><div class="col-md-7"><b>Patient Name</b></div>
<?php foreach ($patients as $p) :?>
    <div class="col-md-2"><?php echo $p->entry_dt; ?></div>
    <div class="col-md-2"><?php echo $p->id; ?></div>
    <div class="col-md-5"><a href="<?php echo site_url('view/patient/'.$p->id);?>" ><?php echo $p->name; ?></a></div>
    <div class="col-md-1"><a class="btn btn-xs btn-default" href="<?php echo site_url('addPatient/del/'.$p->id);?>" ><span class="glyphicon glyphicon-trash"></span></a></div>
<?php endforeach; ?>
</div>

<?php 
$this->load->view('templates/footer');
?>