

</div><div class="container">
		<div class="">
			<div class="panel panel-success panel-heading">Basic information</div>
				<table id="collapseExample" class="table_payscale table" id="demo" border="2" align="center">
				<?php foreach($records as $data):?>
						<tr>
							<th><h4>ID: <?php echo $data->id?></h4></th>
							<th></th>
						</tr>
                    	<tr>
							<td><h4>Name: <?php echo $name = $data->F_name." ".$data->M_name." ".$data->L_name ?></h4></td>
							<td><h4>Date Employeed: <?php echo $data->date_applied?></h4></td>
						</tr>

						<tr>
							<td><h4>Grade: <?php echo $data->grade;?></h4></td>
                            <td><h4>Mobile: <?php echo $data->Contacts?></h4></td>
						</tr>
				<?php endforeach;?>
				</table>
		</div>
    <div class="panel panel-success panel-heading">Regular Payment</div>
    <div class="table-responsive">
        <table class="table_payscale table table-hover text-center" border="2" align="center">
             <?php  if($results){ ?>
				<tr style="border:1px solid white;">
                <th><pre>Designation</pre></th>
                <th><pre>Pay Scale</pre></th>
                <th><pre>Basic</pre></th>
                <th><pre>House Rent</pre></th>
                <th><pre>Medical(20%)</pre></th>
                <th><pre>Conveyance(10%)</pre></th>
                <th><pre>CPF(10%)</pre></th>
                <th><pre>GIA(1%)</pre></th>
                <th><pre>BF(1%)</pre></th>
                <th><pre>Gross Total</pre></th>
                <th><pre>Deduction CPF TMSS(10%)</pre></th>
                <th><pre>Deduction CPF Own(5%)</pre></th>
                <th><pre>Deduction CPF Total</pre></th>
                <th><pre>Deduction GIA TMSS(1%)</pre></th>
                <th><pre>Deduction GIA Own(1%)</pre></th>
				<th><pre>Deduction GIA Total</pre></th>
                <th><pre>Deduction BF TMSS(1%)</pre></th>
                <th><pre>Deduction BF Own(1%)</pre></th>
				<th><pre>Deduction BF Total</pre></th>
				<th><pre>Deduction Total</pre></th>
				<th><pre>Net Pay</pre></th>
              </tr>
            <?php
            foreach ($results as $data)
                {
                ?>
    			<tr>
    				<td><?php echo $data->designation;?></td>
    				<td><?php echo $data->pay_scale;?></td>
    				<td><?php echo $data->basic;?></td>
    				<td><?php echo $data->hr;?></td>
    				<td><?php echo $data->medical?></td>
    				<td><?php echo $data->conveyance;?></td>
    				<td><?php echo $data->cpf;?></td>
    				<td><?php echo $data->gia;?></td>
    				<td><?php echo $data->bf;?></td>
    				<td><?php echo $data->gross_total;?></td>
    				<td><?php echo $data->ded_cpf_tmss;?></td>
    				<td><?php echo $data->ded_cpf_self;?></td>
    				<td><?php echo $data->ded_cpf_total;?></td>
    				<td><?php echo $data->ded_gia_tmss;?></td>
    				<td><?php echo $data->ded_gia_self;?></td>
    				<td><?php echo $data->ded_gia_total;?></td>
    				<td><?php echo $data->ded_bf_tmss;?></td>
    				<td><?php echo $data->ded_bf_self;?></td>
    				<td><?php echo $data->ded_bf_total;?></td>
    				<td><?php echo $data->ded_total;?></td>
    				<td><?php echo $data->net_pay;?></td>
                    <td><a href="<?php ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-2x"></i></a></td>
                </tr>
    			<?php
                }
            }
            else { ?>
            <div class="alert alert-danger"> Plsease first insert the grade of <?php echo $name ?> in Payscale to know his regular payscale.</div>
             <?php
            }
            ?>

			</table>
	</div>
<!-- Monthly pay history -->
<br><br>
<div class="panel panel-success panel-heading" border="2">Payroll History</div>
        <div class="table-responsive">
        <?php if ($payrolls == null) {
				echo "<center><h3>No payment record found.</h3></center>";
				echo "<hr><hr>";
			} else {?>
            <div class="form-group form-inline">
                <?php $this->load->helper('dob');?>
                <div style="float:left;padding: 6px 12px 2px 16px;">
                    <select name="year"  id="selectUser" style="width:auto;" class="form-control">
                        <option value="0">Year</option><?php echo generate_options(2015,2050)?>
                    </select>
                    <select name="month"  id="selectUser" style="width:auto;" class="form-control">
                        <option value="0">Month</option><?php echo generate_options(1,12,'callback_month')?>
                    </select>
                    <button value="" style="width:auto;" class="form-control">Search</button>
                </div>
            </div>
            <table class="table_payscale table table-hover text-center" border="2" align="center">
    				<tr style="border:1px solid white;">
                        <th><pre>Date(Y-m-d)</pre></th>
                        <!--<th><pre>Days Worked</pre></th>-->
                        <th><pre>Basic Pay</pre></th>
                        <th><pre>House Rent</pre></th>
                        <th><pre>Medical</pre></th>
                        <th><pre>Conveyance</pre></th>
                        <th><pre>CPF</pre></th>
                        <th><pre>GIA</pre></th>
                        <th><pre>BF</pre></th>
                        <th><pre>Gross Total</pre></th>
                        <th><pre>Deduction CPF TMSS</pre></th>
                        <th><pre>Deduction CPF Own</pre></th>
                        <th><pre>Deduction CPF Total</pre></th>
                        <th><pre>Deduction GIA TMSS</pre></th>
                        <th><pre>Deduction GIA Own</pre></th>
        				<th><pre>Deduction GIA Total</pre></th>
                        <th><pre>Deduction BF TMSS</pre></th>
                        <th><pre>Deduction BF Own</pre></th>
        				<th><pre>Deduction BF Total</pre></th>
        				<th><pre>Late/Absent/Fine</pre></th>
        				<th><pre>Deduction Total</pre></th>
        				<th><pre>Net Pay</pre></th>
                  </tr>
				<?php
					foreach($payrolls  as $pay):

					/*  $gross= ($pay->Pay * $pay->dayswork) + ($pay->otrate * $pay->othrs) + $pay->allow;
					  $totdeduct = $tax + $pay->advance + $pay->insurance;
					  $netpay = $gross - $totdeduct;*/
					  ?>

					  <tr>
					  	<td><?php echo $pay->date?></td>
					  <!--	<td><?php /*echo $pay->month;*/?></td>-->
					  	<td><?php echo number_format($pay->basic,2)?></td>
					  	<td><?php echo $pay->hr?></td>
					  	<td><?php echo number_format($pay->medical,2)?></td>
					  	<td><?php echo number_format($pay->conveyance,2)?></td>
					  	<td><?php echo number_format($pay->cpf,2)?></td>
					  	<td><?php echo number_format($pay->gia,2)?></td>
					  	<td><?php echo number_format($pay->bf,2)?></td>
					  	<td><?php echo number_format($pay->ded_cpf_tmss,2)?></td>
					  	<td><?php echo number_format($pay->ded_cpf_self,2)?></td>
					  	<td><?php echo number_format($pay->ded_gia_tmss,2)?></td>
					  	<td><?php echo number_format($pay->ded_gia_self,2)?></td>
					  	<td><?php echo number_format($pay->ded_bf_tmss,2)?></td>
					  	<td><?php echo number_format($pay->ded_bf_self,2)?></td>
					  	<td><?php echo number_format($pay->gross_total,2)?></td>
					  	<td><?php echo number_format($pay->ded_cpf_total,2)?></td>
					  	<td><?php echo number_format($pay->ded_gia_total,2)?></td>
					  	<td><?php echo number_format($pay->ded_bf_total,2)?></td>
					  	<td><?php echo number_format($pay->ded_total,2)?></td>
					  	<td><?php echo number_format($pay->net_pay,2)?></td>
					  </tr>
				<?php endforeach;?>

				</table>
                <p style="float:right;"> Print: <a href="<?php echo base_url('print_pdf/payroll_pdf/'.$pay->account_id)?>">
					  <i class="fa fa-print fa-2x"></i></a></p>
		<?php }?>
    	</div>