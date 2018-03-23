<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>

<div class="btn-group btn-group-justified">
<?php 
$a2z = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",);
foreach ($a2z as $a): ?>
  <a class="btn btn-default" href="<?php echo site_url('viewDiseases/by/'. $a);?>"><?php echo $a; ?></a>
<?php endforeach; ?>
</div>
<div class="row">
    <div class="col-md-12">
        <?php foreach ($disease_names->result() as $d): ?>
        <p><?php echo $d->disease_name; ?></p>
        <?php endforeach;?>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>