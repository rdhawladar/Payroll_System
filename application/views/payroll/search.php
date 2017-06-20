<div class="container">
	<div class="well">
		<div class="row">
		<?php echo form_open('payroll/search', array('method' => 'GET', 'role' => 'Search')); ?>
			<div class="col-md-4">
					<p>Please input ID of the Employee</p>
			   </div>
			
				<div class="col-md-8">
			   		<?php echo form_input('keyword', $this->input->get('keyword'), 'class="form-control" placeholder="Search (ID/Designation)"'); ?>
			   	</div>
		<?php echo form_close(); ?>

		<?php if($accounts):?>
			<table class="table table-hover text-center">
					<tr>
						<td>Employee ID</td>
						<td>Name</td>
						<td>Designation</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
				<?php foreach($accounts as $emp):?>
					<tr>
						<td><?php echo $emp->id?></td>
						<td><?php echo $emp->F_name." ".$emp->M_name." ".$emp->L_name?></td>
						<td><?php echo $emp->grade?></td>
						<td>
							<?php if($emp->status == 'Active'){?>
								<span class="label label-success"><?php echo $emp->status;?></span>
							<?php }else{ ?>
								<span class="label label-danger"><?php echo $emp->status;?></span>
							<?php } ?>

						</td>
						<td><a href="<?php echo base_url('payroll/view/'.$emp->id)?>">View</a></td>

					</tr>

				<?php endforeach;?>
			</table>
				<?php echo $links;?>
		<?php else:?>
					<?php if ($this->input->get('keyword')): ?>
						Your search - <b><?php echo $this->input->get('keyword')?></b> - did not match.
					<?php else: ?>
						Use the search box above to display a listing of employees.
					<?php endif; ?>
		<?php endif;?>

		<div>
	</div>
</div>