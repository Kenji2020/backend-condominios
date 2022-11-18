<?php require'sidebar.view.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <?php require'navbar.view.php'; ?>

        <!--Main Content-->


<div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Settings</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">
      
                            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                <h6 class="block-bw-heading bold-form-heading" style="margin-top: 0; padding-top: 5px">General Options</h6>

                                        <label>Site Name</label>
                                        <input class="form-control" value="<?php echo $settings['site_name']; ?>" name="site_name" type="text">
                                    </div>

                                    <div class="form-group  col-md-12">

                                <h6 class="block-bw-heading bold-form-heading">Paypal Options</h6>

                                        <label>Email</label>
                                        <input class="form-control" value="<?php echo $settings['paypal_email']; ?>" name="paypal_email" type="text">
                                    
                                    </div>
                                    <div class="form-group  col-md-12">

                                        <label>Currency</label>
                                        <input class="form-control" value="<?php echo $settings['paypal_currency']; ?>" name="paypal_currency" type="text">
</div>
                                    <div class="form-group  col-md-12">

                                        <label>Url</label>
                                        <input class="form-control" value="<?php echo $settings['paypal_url']; ?>" name="paypal_url" type="text">
</div>

                                    <div class="form-group  col-md-12">

                                <h6 class="block-bw-heading bold-form-heading">Email Options</h6>

                                        <label>Email</label>
                                        <input class="form-control" value="" placeholder="info@domain.com" name="email_address" type="text">
                                        <p class="help-block">You can specify the email the email address that emails should be sent from</p>

                                    
                                    </div>
                                    <div class="form-group  col-md-12">

                                        <label>Password</label>
                                        <input class="form-control" value="" placeholder="Password" name="email_password" type="text">
</div>
                                    <div class="form-group  col-md-12">

                                        <label>Display Name</label>
                                        <input class="form-control" value="<?php echo $settings['email_name']; ?>" name="email_name" type="text">
</div>

                                    <div class="form-group  col-md-12">

                                        <label>SMTP Host</label>
                                        <input class="form-control" value="" placeholder="Server Host" name="smtp_host" type="text">
</div>

                                    <div class="form-group  col-md-12">

                                        <label>SMTP Port</label>
                                        <input class="form-control" value="<?php echo $settings['smtp_port']; ?>" name="smtp_port" type="text">
</div>


                                    <div class="form-group  col-md-12">

                                        <label>Encryption</label>
                                        
                                        <?php 
$no = '-';

if (strpos($no, $settings['smtp_encrypt']) !== false) {
    echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio1" value="'. $settings['smtp_encrypt'] .'" checked=""> <label for="radio1"> No Encryption </label> </div>';
}else{
  echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio1" value="' . $no .'"> <label for="radio1"> No Encryption </label> </div>';
}
                         ?>

                        <?php 
$ssl = 'ssl';

if (strpos($ssl, $settings['smtp_encrypt']) !== false) {
    echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio2" value="'. $settings['smtp_encrypt'] .'" checked=""> <label for="radio2"> Use SSL Encryption </label> </div>';
}else{
  echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio2" value="' . $ssl .'"> <label for="radio2"> Use SSL Encryption </label> </div>';
}
                         ?>


                        <?php 
$tls = 'tls';

if (strpos($tls, $settings['smtp_encrypt']) !== false) {
    echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio3" value="'. $settings['smtp_encrypt'] .'" checked=""> <label for="radio3"> Use TLS Encryption </label> </div>';
}else{
  echo '<div class="radio"> <input type="radio" name="smtp_encrypt" id="radio3" value="' . $tls .'"> <label for="radio3"> Use TLS Encryption </label> </div>';
}
                         ?>
</div>

                                </div>
                                <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>
</section>
