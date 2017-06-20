<div class="container">
<?php $message = $this->session->flashdata('message');
	if($message==TRUE){
	?>
<div class="panel panel-info">
	<div class="panel-heading"> Message</div>
	<h1><span class="label labe-info"><?php echo $this->session->flashdata('message');?></span></h1>
	<p>would you like a reciept
	<a href="<?php echo base_url('billing/view')?>">Yes</a>|
	<a href="<?php echo base_url('account');?>">No</a></p>
</div>
	<?php }?>

</div>

<div>
 <h1>this is test</h1>
</div>








