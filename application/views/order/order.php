<div class="container">
<ul class="nav nav-tabs">
 		<li><a href="<?php echo base_url('account/orders')?>"><i class="fa fa-home"></i> Home</a></li>
 		<li><a href="<?php echo base_url('billing')?>"><i class="fa fa-home"></i> Orders</a></li>
 		<li><a href="<?php echo base_url('billing/view')?>"><i class="fa fa-home"></i> Detail orders</a></li>
 		
 		
</ul>
	<div class="well"><!-- container for shopping cart-->
	<h2 align="center">Products on Your Cart</h2>

	<?php $cart_check = $this->cart->contents();

		// If cart is empty, this will show below message.
		if(empty($cart_check)) {
		echo 'To add products to your shopping cart click on "Add to Cart" Button';
		} ?>

	<table class="table table-striped text-center">
	<?php
	// All values of cart store in "$cart".
	if ($cart = $this->cart->contents()): ?>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Price</td>
			<td>Qty</td>
			<td>Amount</td>
			<td>Cancel Product</td>
		</tr>


		<?php
			// Create form and send all values in "shopping/update_cart" function.
			echo form_open('billing/update_cart');
			$grand_total = 0;
			$i = 1;

			foreach ($cart as $item):
			// echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
			// Will produce the following output.
			// <input type="hidden" name="cart[1][id]" value="1" />

			echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
			echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
			echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
			echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
			echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
			?>
			<tr>
			<td>
			<?php echo $i++; ?>
			</td>
			<td>
			<?php echo $item['name']; ?>
			</td>
			<td>
			Php <?php echo number_format($item['price'],2); ?>
			</td>
			<td>
			<?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
			</td>
			<?php $grand_total = $grand_total + $item['subtotal']; ?>
			<td>
			Php <?php echo number_format($item['subtotal'],2) ?>
			</td>
			<td>

			<?php
			// cancel image.
			$path =  "<i class='fa fa-remove'></i>";
			echo anchor('billing/remove/' . $item['rowid'],$path); ?>
			</td>
			<?php endforeach; ?>
			</tr>
			<tr>
			<td><b>Order Total: Php <?php

			//Grand Total.
			echo number_format($grand_total,2); ?></b></td>

			<?php // "clear cart" button call javascript confirmation message ?>
			<td colspan="5" align="right"><input  class ='btn btn-danger' type="button" value="Clear Cart" onclick="clear_cart()">

			<?php //submit button. ?>
			<input class ='btn btn-primary'  type="submit" value="Update Cart">
			<?php echo form_close(); ?>

			<!-- "Place order button" on click send "billing" controller -->
			<input class ='btn btn-success' type="button" value="Place Order" onclick="window.location = 'billing/reciept'"></td>
			</tr>
		<?php endif; ?>
	</table>





	</div>

	<div class="well"> <!--container for products-->
	<h1>Product List</h1>
	<table class="table table-hover text-center">
		<tr>
			<td>In Stock</td>
			<td>Name</td>
			<td>Price</td>
			<td>Action</td>



		</tr>
			<?php foreach ($products as $product) {
				$id = $product['id'];
				$name = $product['product_name'];
				$stock = $product['Quantity'];
				$price = $product['price'];
				?>
				<tr>
					<?php if($stock == 0){?>
						<td><span class="label label-danger">Out of Stock</span></td>
					<?php }else{?>
					<td><?php echo $stock;}?></td>
					<td><?php echo $name;?></td>
					<td>Php  <?php echo $price;?></td>
					<td><?php 
							echo form_open('billing/add');
							echo form_hidden('id', $id);
							echo form_hidden('name', $name);
							echo form_hidden('price', $price);
							if($stock==0){
								$btn = array(
							'class' => 'btn btn-primary form-control',
							'value' => 'Add to Cart',
							'name' => 'action',
							'disabled'=>TRUE
							);
							}else{
								$btn = array(
							'class' => 'btn btn-primary form-control',
							'value' => 'Add to Cart',
							'name' => 'action'
							);
							}
							

							// Submit Button.
							echo form_submit($btn);
							echo form_close();
													?>


				</tr>
				

			<?php }?>
	</table>
		<p><?php echo $links?></p>
	</div>

</div>