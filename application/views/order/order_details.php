<?php 
	$sum = $sum[0]->price;
	$qty = $qty[0]->qty;
	$total = $sum * $qty;

?>

<div class="container">

	<div class="well">

	<a href="<?php echo base_url('billing/view')?>" class="btn btn-success">Back</a>
	<?php foreach($customer as $data):?>
	<a href="<?php echo base_url('print_pdf/reciept_pdf/'.$data->oid)?>" class="btn btn-info">View in PDF</a>
	<a href="<?php echo base_url('print_pdf/download_pdf/'.$data->oid)?>" class="btn btn-warning">Download PDF</a>

	
		
			<table class="table table-bordered">
			<br>
			<tr>
				<td>Customer Name:</td>
				<td><?php echo $data->customer_name;?></td>
				<td>Date Ordered:</td>
				<td><?php echo $data->date;?></td>
			</tr>
			<tr>
				<td>Payment:</td>
				<td><?php echo $data->payment;?></td>
				<td></td>
				<td></td>
			</tr>
		<?php endforeach;	?>


			<tr>
				<td>Unit</td>
				<td>Item</td>
				<td>Qty.</td>
				<td>Amout</td>
			</tr>
			<?php 
			foreach($results as $data):?>
			<tr>	
				<td></td>
				<td><?php echo $data->product_name;?></td>
				<td>1 x <?php echo $data->qty;?></td>
				<td>Php <?php 
					
				echo number_format($data->qty * $data->price,2);?></td>
			</tr>
			<?php endforeach;	?>

			 <tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td>Total Sale(Vat Inclusive)</td>
				<td>Php <?php echo number_format($total,2) ;?></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td>Less:VAT</td>
				<td>Php <?php echo number_format($vat = 0.12 * $total,2) ;?></td>
			</tr>

			<tr>
				<td>VATable</td>
				<td>Php <?php echo number_format($vatable =$total - $vat,2);?></td>
				<td>Amount Net of VAT</td>
				<td>Php <?php echo number_format($vatable =$total - $vat,2);?></td>
			</tr>
			 <tr>
				<td>VAT-Exempt</td>
				<td></td>
				<td>Less:SC/PWD Discount</td>
				<td></td>
			</tr>

			 <tr>
				<td>VAT Zero Rated</td>
				<td></td>
				<td>Amount Due</td>
				<td></td>
			</tr>

			  <tr>
				<td>VAT - 12%</td>
				<td>Php <?php echo number_format($vat = 0.12 * $total,2) ;?></td>
				<td>Add: VAT</td>
				<td></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td>Total Amout Due</td>
				<td>Php <?php echo number_format($total,2)?></td>
			</tr>

			</table>
			<div class="row">
				<div class="col-md-6">
					<h4>DELIVERED BY: <?php echo $data->L_name.",".$data->F_name." ".$data->M_name?></h4>

				</div>
				
			</div>
	</div>

</div>