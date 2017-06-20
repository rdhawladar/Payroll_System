<div class="container">
<?php
$grand_total = 0;
// Calculate grand total.
if ($cart = $this->cart->contents()):
foreach ($cart as $item):
$grand_total = $grand_total + $item['subtotal'];
endforeach;
endif;
?>

<ul class="nav nav-tabs">
 		<li><a href="<?php echo base_url('account/orders')?>"><i class="fa fa-home"></i> Home</a></li>
 		<li><a href="<?php echo base_url('billing')?>"><i class="fa fa-home"></i> Orders</a></li>
 		<li><a href="<?php echo base_url('billing/view')?>"><i class="fa fa-home"></i> Detail orders</a></li>
 		
 		
</ul>

<div class="panel panel-success">
<div class="panel-heading">Billing Info</div>

	<div class="panel-body">
	

<div class="col-lg-8 col-lg-offset-2">
		<table class="table table-bordered">
		<tr><td><h4>Total Amount: </td></h4><td><h4> Php <?php echo number_format($grand_total, 2); ?></h4></td></tr>
		<tr><td><h4>Vat Rate (%):</td></h4><td><h4> Php <?php $vat= .12 * $grand_total;
								echo number_format($vat,2);?></h4></td></tr>

		
		<tr><td><h4>Vatable Amount:</td></h4><td><h4> Php <?php $total= $grand_total-$vat  ;
								echo number_format($total,2);?></h4></td></tr>
		</table>
		</div>
</div>
</div>

<div class="panel panel-success">
<div class="panel-heading">Customer Info</div>

	<div class="panel-body">
	
		
	<?php echo form_open('billing/save_order',array('class' => 'form-horizontal'))?>
		<input type="hidden" name="command" />
		<input type="text" name="did" id='hide'value="<?php echo $eid?>">

			<div class="form-group">
				<label class="control-label col-sm-2">Name</label>
					<div class="col-lg-8">
						<input type="text" name="name" class="form-control">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Address</label>
					<div class="col-lg-8">
						<input type="text" name="address" class="form-control">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Contact</label>
					<div class="col-lg-8">
						<input type="text" name="contact" class="form-control">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Contact</label>
					<div class="col-lg-2">
						<select name="payment" class="form-control">
							<option value="cash">Cash</option>
							<option value="credit">Credit</option>
						</select>
					</div>
			</div>

			<a href="<?php echo base_url('billing');?>" class="btn btn-danger">Back</a>
			<input class ='btn btn-success' type="submit" value="Place Order" />


</form>

</div>
</div>
</div>