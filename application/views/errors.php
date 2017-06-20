<div class="container">
    <?php if($salary_sheet){ ?>
    <div>
        <div>
            <h1 class="text-danger text-center">Sorry! didn't confirmed the payment for the month of
                <?php echo DateTime::createFromFormat('!m', $month)->format('F') ; ?>- <?php echo $year ?></h1>
            <br><h3 class="text-danger text-center">To print salary sheet please click below button to confirm payment for the month.</h3><br><hr>
            <a href="<?php echo base_url('account/'); ?>"> <button class="btn btn-danger btn-sm center-block">Payment</button></a>
        </div>
    </div>
    <?php } ?>
</div>