
			
			
			<!-- Deposit Modal -->
			<div id="depositModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
  
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header bg-<?php echo e($bg); ?>">
					  <h4 class="modal-title text-<?php echo e($text); ?>">Make new deposit</h4>
					  <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body bg-<?php echo e($bg); ?>">
						  <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@deposit')); ?>" autocomplete="off">
								 <input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter amount here" type="text" name="amount" required><br/>
								 
								 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								 <input type="submit" class="btn btn-<?php echo e($text); ?>" value="Continue">
						 </form>
					</div>
				  </div>
				</div>
			  </div>
			  <!-- /deposit Modal -->
			
			
			<!-- Delete Subscription Modal -->
			<div id="delsubmodal" class="modal fade" role="dialog">
				<div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header bg-<?php echo e($bg); ?>">
					  <h4 class="modal-title text-<?php echo e($text); ?>">Delete MT4 Details</h4>
					  <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body bg-<?php echo e($bg); ?> p-3">
						<h5 class="text-<?php echo e($text); ?>">Your subscription has already started, send an Email to <?php echo e($settings->contact_email); ?> to have your MT4 Details Deleted.</h5>
					</div>
				  </div>
				</div>
			  </div>
			  <!-- /deposit Modal -->
			
		


					  <!-- Withdrawal Modal -->
		  <div id="withdrawalModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header bg-<?php echo e($bg); ?>">
				  <h4 class="modal-title text-<?php echo e($text); ?>">Payment will be sent to your recieving address.</h4>
				  <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body bg-dark">
					  <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@withdrawal')); ?>">
							 <input style="padding:5px;" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" placeholder="Enter amount here" type="text" name="amount" required><br/>
							 
							 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							 <input type="submit" class="btn btn-<?php echo e($text); ?>" value="Submit">
					 </form>
				</div>
			  </div>
			</div>
		  </div>
		  <!-- /Withdrawals Modal -->

		

			

		<!-- Subscription Payment modal -->
			<div class="modal fade" id="SubpayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-<?php echo e($bg); ?>">
					
						<h4 class="modal-title text-<?php echo e($text); ?>">Subscription Payment</h4>
						<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
			      </div>

				<form role="form" method="post" action="<?php echo e(action('SomeController@deposit')); ?>" id="priceform">
				<div class="modal-body bg-<?php echo e($bg); ?>">
					
					<h5 class="text-<?php echo e($text); ?>">Duration</h5>
						<select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" onchange="calcAmount(this)" name="duration" class="duration" id="duratn">
							<option value="default">Select duration</option>
							<option>Monthly</option>
							<option>Quaterly</option>
							<option>Yearly</option>
						</select><br>
						<h5 class="text-<?php echo e($text); ?>">Amount to Pay</h5>
						<input class="form-control subamount bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" type="text" id="amount" disabled><br/>
						<input id="amountpay" type="hidden" name="amount">
						<input type="hidden" value="Subscription Trading" name="pay_type">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				</div>
				<div class="modal-footer bg-<?php echo e($bg); ?>">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Pay Now</button>
				</div>
				</div>
				</form>

				<script type="text/javascript">
				function calcAmount(sub) {
					if(sub.value=="Quaterly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '<?php echo $settings->currency.$settings->quaterlyfee; ?>';
						amountpay.value = '<?php echo $settings->quaterlyfee; ?>';
					}if(sub.value=="Yearly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '<?php echo $settings->currency.$settings->yearlyfee; ?>';
						amountpay.value = '<?php echo $settings->yearlyfee; ?>';
					}if(sub.value=="Monthly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '<?php echo $settings->currency.$settings->monthlyfee; ?>';
						amountpay.value = '<?php echo $settings->monthlyfee; ?>';
					}
				}
				</script>
			</div>
			</div>
			<!-- Subscription Payment modal -->
			
			
		<!-- Submit MT4 MODAL modal -->
			<div id="submitmt4modal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <!-- Modal content-->
			    <div class="modal-content">
					<div class="modal-header bg-<?php echo e($bg); ?>">
						<h4 class="modal-title text-<?php echo e($text); ?>">Submit your MT4 Login Details</h4>
						<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
			      </div>
			     	<div class="modal-body bg-<?php echo e($bg); ?>">
              			<form role="form" method="post" action="<?php echo e(action('Controller@savemt4details')); ?>">
							  
							  <h5 class="text-<?php echo e($text); ?> ">MT4 ID*:</h5>
							<input class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  type="text" name="userid" required><br/>
							<h5 class="text-<?php echo e($text); ?> ">MT4 Password*:</h5>
							<input style="padding:5px;" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"  type="text" name="pswrd" required><br/>
							<h5 class="text-<?php echo e($text); ?> ">Account Type:</h5>
							<input  class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" Placeholder="E.g. Standard" type="text" name="acntype" required><br/>	
							<h5 class="text-<?php echo e($text); ?> ">Currency*:</h5>
							<input  class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" Placeholder="E.g. USD" type="text" name="currency" required><br/>
							<h5 class="text-<?php echo e($text); ?> ">Leverage*:</h5>
							<input  class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" Placeholder="E.g. 1:500"  type="text" name="leverage" required><br/>
							<h5 class="text-<?php echo e($text); ?> ">Server*:</h5>
							<input  class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" Placeholder="E.g. HantecGlobal-live"  type="text" name="server" required><br/>
							<h5 class="text-<?php echo e($text); ?> ">Subscription Duration:</h5>
							<select class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="duration" class="duration">
								<option value="default">Select duration</option>
								<option>Monthly</option>
								<option>Quaterly</option>
								<option>Yearly</option>
							</select><br>

					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="submit" class="btn btn-primary" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /plans Modal -->
