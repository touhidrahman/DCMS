<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
$this->load->view('templates/notification');
?>

<div class="row">
	<div class="col-md-5">
		<div class="panel panel-primary">
			<div class="panel-heading">Patient ID & Name</div>
			<div class="panel-body">
				<h3 class="text-center text-success"><b><?php echo $result[0]['patient_id']; ?></b></h3>
				<h3 class="text-center"><?php echo $result[0]['name']; ?></h3>
				<h5 class="text-center">Age: <b><?php echo $result[0]['age']; ?></b> Gender: <b><?php echo $result[0]['sex']; ?></b></h5>
			</div>
		</div>
	</div>

	<div class="col-md-7">
		<p><strong>Address: </strong><?php echo $result[0]['address']?></p>
		<p><strong>Phone: </strong><?php echo $result[0]['phone']?></p>
		<p><strong>Email: </strong><?php echo $result[0]['email']?></p>
		<p><strong>Patient Since: </strong><?php echo $result[0]['entry_dt']?></p>
		<p><strong>Contact Person: </strong><?php echo $result[0]['contact_person_info']?></p>
		<div class="btn-group">
  <a class="btn btn-default" href="<?php echo site_url('complain/');?>">Complaints</a>
  <a class="btn btn-default" href="<?php echo site_url('diagnosis/patient/'.$result[0]['patient_id']);?>">Examination / Diagnosis</a>
  <a class="btn btn-default" href="<?php echo site_url('treatment/patient/'.$result[0]['patient_id']);?>">Treatment Plan</a>
  
</div>
		
	</div>
</div>
	<hr>
<?php foreach ($result as $row):?>


        <div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $row['dt']; ?></strong>
			<a class="btn btn-info btn-sm" href="<?php echo site_url('report/create/'.$result[0]['patient_id'].'/'.$row['dt']);?>">Report</a>
			<a class="btn btn-default btn-xs pull-right" href="<?php echo site_url('view/historyDelete/'.$row['id'].'/patient/'.$result[0]['patient_id']);?>"> <span
				class="glyphicon glyphicon-trash"></span></a>
			</div>
			<table class="table">
			 <tr><th>Med History</th><td><?php
			 echo $row['disease_name']; 
			 ?>
			 </td></tr>
			 <tr><th>Complaints</th><td><?php echo $row['complain']; ?></td></tr>
			 <tr><th>Diagnosis</th><td>
			 <?php foreach ($this_patient_diags as $tpn){
			     if ($tpn->diag_dt == $row['dt'])
			     {
			         if ($tpn->diag_text != "") {
			             echo $tpn->diag_name.': '.$tpn->diag_text.'<br>';
			         }
			     }
			 } ?>
			 
			 </td></tr>
			 <tr><th>Treatment</th><td>
			 <?php foreach ($this_patient_treats as $tpt){
			     if ($tpt->treat_dt == $row['dt'])
			     {
			         if ($tpt->unit != "") {
			             echo $tpt->treat_name.': '.$tpt->treat_description.'<br>';
			         }
			     }
			 } ?>
			 </td></tr>
			 <tr><th>Treatment Cost</th><td>
			 <?php 
			 $total = 0;
			 foreach ($this_patient_treats as $tpt){
                /* this patient treats supplied from patient treat model */
			     if ($tpt->treat_dt == $row['dt'])
			     {
			         if ($tpt->unit != "") {
			             echo $tpt->treat_name.': '.$tpt->unit.' x '.$tpt->treat_cost.' = '. $tpt->unit*$tpt->treat_cost.' Taka<br>';
			             $total += $tpt->unit*$tpt->treat_cost;
			         }
			     }
			 }
			 echo "<strong>Total Cost: ".$total."</strong>";
			 ?>
			 </td></tr>
			</table>
		</div>


<?php endforeach;?>
<?php

$this->load->view('templates/footer');
?>