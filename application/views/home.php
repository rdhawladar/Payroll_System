<!--payroll button to pay today -->
<div class="container">
	<div class="well">
    <div class="center-block">
    <?php // how to get controller function
            $MY =& get_instance();
            $MY->today() ;
             $monthe = date('Y');       
        ?>
        <button style="width:30%" type="button" class="btn btn-lg btn-primary center-block"><a href="<?php echo base_url('payroll/leave_count/'.$ab=1); ?>" style="text-decoration:none;color:#ffffff;">Leave Count </a></button><br><br>
        <button style="width:30%" type="button" data-toggle="modal" data-target="#select_month_payment" class="btn btn-lg btn-primary center-block">Payment :&nbsp;<?php echo date("d-m-Y") ;?></button>     <br><br>
        <button style="width:30%" type="button" data-toggle="modal" data-target="#select_month_salary_sheet" class="btn btn-lg btn-primary center-block">Monthly Salary Sheet</button><br><br>
        <button style="width:30%" type="button" data-toggle="modal" data-target="#select_month_dedcution_sheet" class="btn btn-lg btn-primary center-block">Monthly Deduction Sheet</button><br><br>
        <button style="width:30%" type="button" data-toggle="modal" data-target="#select_month_salary_sheet" class="btn btn-lg btn-primary center-block"> Transfer Sheet </button><br><br>
        <button style="width:30%" type="button" data-toggle="modal" data-target="#select_month_salary_sheet" class="btn btn-lg btn-primary center-block">Bank Letter </button><br><br>


    </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Click to Download</h4>
      </div>
      <div class="modal-body">
        <a href="<?php echo base_url('print_pdf/salary_sheet'); ?>" style="text-decoration:none;color:#ffffff;"><button type="button" class="btn btn-primary">Salary Sheet</button></a>
        <a href="<?php echo base_url('account/generate_pdf'); ?>" style="text-decoration:none;color:#ffffff;"><button type="button" class="btn btn-primary">Test Pdf</button></a>
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal for payment monthly salary-->
<div class="modal fade" id="select_month_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select the Payment Month please</h4>
      </div>
      <div class="modal-body">
          <?php echo form_open('payroll/payment/');?>
          <div class="form-group form-inline">
              <?php $this->load->helper('dob');?>
              <div style="float:left;padding: 6px 12px 2px 16px;">
                  <select name="year"  id="selectUser" style="width:auto;" class="form-control">
                      <option value="0">Year</option><?php echo generate_options(2015,2050)?>
                  </select>
                  <select name="month"  id="selectUser" style="width:auto;" class="form-control">
                      <option value="0">Month</option><?php echo generate_options(1,12,'callback_month')?>
                  </select>
              </div>
          </div>
          <br>
          <br>
          <br>
      </div>
      <div class="modal-footer">

             <button type="submit" class="btn btn-default">Go to payment page</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<!--end model for payement monthly saraly -->


<!-- Modal for salary sheet-->
<div class="modal fade" id="select_month_salary_sheet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select the Month and year for the salary sheet</h4>
      </div>
      <div class="modal-body">
          <?php echo form_open('print_pdf/salary_sheet/');?>
          <div class="form-group form-inline">
              <?php $this->load->helper('dob');?>
              <div style="float:left;padding: 6px 12px 2px 16px;">
                  <select name="year"  id="selectUser" style="width:auto;" class="form-control">
                      <option value="0">Year</option><?php echo generate_options(2015,2050)?>
                  </select>
                  <select name="month"  id="selectUser" style="width:auto;" class="form-control">
                      <option value="0">Month</option><?php echo generate_options(1,12,'callback_month')?>
                  </select>
              </div>
          </div>
          <br>
          <br>
          <br>
      </div>
      <div class="modal-footer">

             <button type="submit" class="btn btn-default">Print salary sheet</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<!--end model for salary sheet-->

<!-- Modal for deduction sheet-->
<div class="modal fade" id="select_month_dedcution_sheet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select the Month and year for the deduction sheet</h4>
      </div>
      <div class="modal-body">
          <?php echo form_open('print_pdf/deduction_sheet/');?>
          <div class="form-group form-inline">
              <?php $this->load->helper('dob');?>
              <div style="float:left;padding: 6px 12px 2px 16px;">
                  <select name="year"  id="selectUser" style="width:auto;" class="form-control">
                      <option value="0">Year</option><?php echo generate_options(2015,2050)?>
                  </select>
                  <select name="month"  id="selectUser" style="width:auto;" class="form-control">
                      <option value="0">Month</option><?php echo generate_options(1,12,'callback_month')?>
                  </select>
              </div>
          </div>
          <br>
          <br>
          <br>
      </div>
      <div class="modal-footer">

             <button type="submit" class="btn btn-default">Go to payment page</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<!--end model for deduction sheet-->



