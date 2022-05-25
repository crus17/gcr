     
    <form method="post" action="<?php echo e(action('Admin\SettingsController@updatebasicsettings')); ?>" enctype="multipart/form-data">
        

    <div class="panel panel-default" style="border:0px solid #fff;">

        <!-- WhatsApp Number -->
        <div class="panel panel-default" style="border:0px solid #fff;">
                        <!-- Panel Heading Starts -->
                <div class="panel-heading">
                    <h4 class="panel-title text-<?php echo e($text); ?>">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#whatsapp">
                        WhatsApp <i class="fa fa-arrow-down"></i>  </a>
                    </h4>
                </div>
                    
                <div id="whatsapp" class="panel-collapse collapse">
                    <div class="sign-u">
                    <div class="sign-up1">
                        <h4 class="text-<?php echo e($text); ?>">WhatsApp Number :</h4>
                    </div>
                    <div class="sign-up2">
                        <input type="text" name="whatsapp" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->whatsapp); ?>">
                    </div>
                </div>
            </div>

            <!-- Payment info and methods -->
            <div class="panel panel-default">
                    <!-- Panel Heading Starts -->
                <div class="panel-heading">
                    <h4 class="panel-title text-<?php echo e($text); ?>">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
                        Bank deposit or transfer <i class="fa fa-arrow-down"></i> </a>
                    </h4>
                </div>
                    
                <div id="bank" class="panel-collapse collapse">
                    <div class="sign-u">
                <div class="sign-up1">
                    <h4 class="text-<?php echo e($text); ?>">Bank name :</h4>
                </div>
                <div class="sign-up2">
                    <input type="text" name="bank_name" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->bank_name); ?>">
                </div>
            </div>

            <div class="sign-u">
                <div class="sign-up1">
                    <h4 class="text-<?php echo e($text); ?>">Account name :</h4>
                </div>
                <div class="sign-up2">
                    <input type="text" name="account_name" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->account_name); ?>">
                </div>
                <div class="clearfix"> </div>
            </div>

            <div class="sign-u">
                <div class="sign-up1">
                    <h4 class="text-<?php echo e($text); ?>">Account number :</h4>
                </div>
                <div class="sign-up2">
                    <input type="text" name="account_number" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->account_number); ?>">
                </div>
            </div>
                </div>
            </div>

            <div class="panel panel-default" style="border:0px solid #fff;">
                        <!-- Panel Heading Starts -->
                <div class="panel-heading">
                    <h4 class="panel-title text-<?php echo e($text); ?>">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#btc">
                        Bitcoin <i class="fa fa-arrow-down"></i>  </a>
                    </h4>
                </div>
                    
                <div id="btc" class="panel-collapse collapse">
                    <div class="sign-u">
                    <div class="sign-up1">
                        <h4 class="text-<?php echo e($text); ?>">BTC address :</h4>
                    </div>
                    <div class="sign-up2">
                        <input type="text" name="btc_address" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->btc_address); ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="sign-u">
            <div class="sign-up1">
                <br><h3>System Payment Mode:</h3>
            </div> 
            <div class="sign-up2">
            <input type="checkbox" id="check1" value="1" name="payment_mode1"> Bank transfer &nbsp; &nbsp;
            <input type="checkbox" id="check2" value="2" name="payment_mode2"> Bitcoin <br>
            &nbsp; &nbsp; <br> <br> <br>
            
            </div>
        </div>
        <?php 
            $pmodes = str_split($settings->payment_mode);
            foreach($pmodes as $pmode){
                if($pmode==1){
                echo'
                <script>document.getElementById("check1").checked= true;</script>
                ';
                }
                if($pmode==2){
                    echo'
                    <script>document.getElementById("check2").checked= true;</script>
                    ';
                }
            }
        ?>

        <input type="submit" class="btn btn-primary px-5 btn-lg" value="Save">
        <input type="hidden" name="id" value="1">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
    </form>

    </div>
        <!-- set up coinpayments Modal -->
    <div id="cpdModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
                <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                    <h4 class="modal-title text-<?php echo e($text); ?>">Coinpayments set up</h4>
                    <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                    <form role="form" method="post" action="<?php echo e(action('Admin\SettingsController@updatecpd')); ?>">

                        <h5 class="text-<?php echo e($text); ?>">Merchant ID</h5>
                        <input  class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" placeholder="Merchant ID" type="text" name="cp_m_id" value="<?php echo e($cpd->cp_m_id); ?>" required><br/>
                        
                        <h5 class="text-<?php echo e($text); ?>">CoinPayment IPN Secret></h5>
                        <input class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" placeholder="CoinPayment IPN Secret" type="text" name="cp_ipn_secret" value="<?php echo e($cpd->cp_ipn_secret); ?>" required><br/>
                        
                        <h5 class="text-<?php echo e($text); ?>">CoinPayments debug email</h5>
                        <input class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" placeholder="CoinPayments debug email" type="text" name="cp_debug_email" value="<?php echo e($cpd->cp_debug_email); ?>" required><br/>

                        <h5 class="text-<?php echo e($text); ?>">Public key</h5>
                        <input class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" placeholder="Public key" type="text" name="cp_p_key" value="<?php echo e($cpd->cp_p_key); ?>" required><br/>
                        
                        <h5 class="text-<?php echo e($text); ?>">Private key</h5>
                        <input class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" placeholder="Private key" type="text" name="cp_pv_key" value="<?php echo e($cpd->cp_pv_key); ?>" required><br/>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="submit" class="btn btn-primary px-5 btn-lg" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /set up coinpayments Modal -->