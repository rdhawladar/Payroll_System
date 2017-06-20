<div class="container">
<div class="panel panel-success panel-heading">Regular Payment for ICT Department</div>
<div class="table-responsive">
    <div class="heading text-center">
        <h2>TMSS</h2>
        <h3>Salary for the month of <?php echo DateTime::createFromFormat('!m', $month)->format('F');?>- <?php echo $year ?></h3><br><br>
    </div>
    <?php
    if($results){ ?>
        <table class="table_payscale table table-hover text-center" border="2">
				<tr style="border:1px solid white;">
                    <th><pre class="bg-success"><input type="checkbox" id='selecctall' /></pre></th>
                    <th><pre class="bg-success">ID No</pre></th>
                    <th><pre class="bg-success">Designation</pre></th>
                    <th><pre class="bg-success">Days worked</pre></th>
                    <th><pre class="bg-success">Basic</pre></th>
                    <th><pre class="bg-success">House Rent</pre></th>
                    <th><pre class="bg-success">Medical(20%)</pre></th>
                    <th><pre class="bg-success">Conveyance(10%)</pre></th>
                    <th><pre class="bg-success">CPF(10%)</pre></th>
                    <th><pre class="bg-success">GIA(1%)</pre></th>
                    <th><pre class="bg-success">BF(1%)</pre></th>
                    <th><pre class="bg-success">Gross Total</pre></th>
                    <th><pre class="bg-success">Deduction CPF TMSS(10%)</pre></th>
                    <th><pre class="bg-success">Deduction CPF Own(5%)</pre></th>
                    <th><pre class="bg-success">Deduction CPF Total</pre></th>
                    <th><pre class="bg-success">Deduction GIA TMSS(1%)</pre></th>
                    <th><pre class="bg-success">Deduction GIA Own(1%)</pre></th>
                    <th><pre class="bg-success">Deduction GIA Total</pre></th>
                    <th><pre class="bg-success">Deduction BF TMSS(1%)</pre></th>
                    <th><pre class="bg-success">Deduction BF Own(1%)</pre></th>
                    <th><pre class="bg-success">Deduction BF Total</pre></th>
                    <th><pre class="bg-success">Late/Absent/Fine</pre></th>
                    <th><pre class="bg-success">Deduction Total</pre></th>
                    <th><pre class="bg-success">Net Pay</pre></th>
              </tr>
            <?php
            echo form_open('payroll/payment_confirm');

            foreach ($results as $data) {
                ?>
    			<tr>
                    <td><pre><input type="checkbox"  style="text-align:center;width: 100%;" class="checkbox1" name="check_id[]" style="text-align:center;width: 100%;" value="<?php echo $data->account_id;?>"/></pre></td>
                    <td><pre><input name="id[]"  style="text-align:center;width: 100%;" type="text" value="<?php echo $data->account_id;?>" disabled/></pre></td>
                    <td><pre><input name="designation[]" style="text-align:center;width: 100%;" value="<?php echo $data->designation;?>" disabled/></pre></td>
                    <td><pre><input name="pay_scale[]" type="text" style="text-align:center;width: 100%;" value="<?php echo cal_days_in_month(CAL_GREGORIAN, $month,$year)-$data->day;?>" disabled/></pre></td>
                    <td><pre><input name="basic" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->basic;?>" disabled/></pre></td>
                    <td><pre><input name="hr" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->hr;?>" disabled/></pre></td>
                    <td><pre><input name="medical[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->medical;?>" disabled/></pre></td>
                    <td><pre><input name="conveyance" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->conveyance;?>" disabled/></pre></td>
                    <td><pre><input name="cpf" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->cpf;?>" disabled/></pre></td>
                    <td><pre><input name="gia" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->gia;?>" disabled/></pre></td>
                    <td><pre><input name="bf" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->bf;?>" disabled/></pre></td>
                    <td><pre><input name="gross_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->gross_total;?>" disabled/></pre></td>
                    <td><pre><input name="ded_cpf_tmss" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_cpf_tmss;?>" disabled/></pre></td>
                    <td><pre><input name="ded_cpf_self" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_cpf_self;?>" disabled/></pre></td>
                    <td><pre><input name="ded_cpf_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_cpf_total;?>" disabled/></pre></td>
                    <td><pre><input name="ded_gia_tmss" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_gia_tmss;?>" disabled/></pre></td>
                    <td><pre><input name="ded_gia_self" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_gia_self;?>" disabled/></pre></td>
                    <td><pre><input name="ded_gia_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_gia_total;?>" disabled/></pre></td>
                    <td><pre><input name="ded_bf_tmss" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_bf_tmss;?>" disabled/></pre></td>
                    <td><pre><input name="ded_bf_self" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_bf_self;?>" disabled/></pre></td>
                    <td><pre><input name="ded_bf_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_bf_total;?>" disabled/></pre></td>
                    <td><pre><input name="ded_day" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_amount;?>" disabled/></pre></td>
                    <td><pre><input name="ded_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_total;?>" disabled/></pre></td>
                    <td><pre><input name="net_pay" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->net_pay-$data->ded_amount;?>" disabled/></pre></td>
                </tr>
    			<?php
            } ?>

			</table>
        </div><br><br>
        <button class="btn btn-lg btn-success center-block" value="CONFIRM PAYMENT" type="submit" name="paid">CONFIRM PAYMENT</button>
        <?php
    }
    else { ?>
        <div>
            <h1 class="text-danger text-center">Sorry! Incomplete absent table for the month of
                <?php echo DateTime::createFromFormat('!m', $month)->format('F') ; ?>-  <?php echo $year ?></h1>
            <br><h3 class="text-danger text-center">Please, click below to complete the absent table for the month.</h3><br><hr>
            <a href="<?php echo base_url('payroll/leave_count/'.$ab=1); ?>"> <button class="btn btn-danger btn-sm center-block">Absent Count</button></a>
        </div>
        <?php
    } ?>

<!--<hr><hr><hr>
<div class="container"><h2>Example tab 2 (using standard nav-tabs)</h2></div>

<div id="exTab2" class="container">
    <ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2" data-toggle="tab">Without clearfix</a>
			</li>
			<li><a href="#3" data-toggle="tab">Solution</a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
				</div>
				<div class="tab-pane" id="2">
          <h3>Notice the gap between the content and tab after applying a background color</h3>
				</div>
            <div class="tab-pane" id="3">
            <h3>add clearfix to tab-content (see the css)</h3>
				</div>
			</div>
  </div>
  </div>-->


