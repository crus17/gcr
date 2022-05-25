<?php
/*
	CoinPayments.net API Example
	Copyright 2016 CoinPayments.net. All rights reserved.	
	License: GPLv2 - http://www.gnu.org/licenses/gpl-2.0.txt
*/
	require('./coinpayments.inc.php');
	$cps = new CoinPaymentsAPI();
	$cps->Setup('d57F069303fFDa7a88A6Ba121E7bFd19C4026Fcb789c874D04190773873E80Df', 'aa3f6948307c4fc318be48571d0f33603f9479d9e084ab9eee0601eeb25b09ad');


	$req = array(
		'amount' => 10.00,
		'currency1' => 'USD',
		'currency2' => 'BTC',
		'address' => '', // leave blank send to follow your settings on the Coin Settings page
		'item_name' => 'Test Item/Order Description',
		'ipn_url' => 'https://yourserver.com/ipn_handler.php',
	);
	// See https://www.coinpayments.net/apidoc-create-transaction for all of the available fields
			
	$result = $cps->CreateTransaction($req);
	if ($result['error'] == 'ok') {
		$le = php_sapi_name() == 'cli' ? "\n" : '<br />';
		print 'Transaction created with ID: '.$result['result']['txn_id'].$le;
		print 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).' BTC'.$le;
		print 'Status URL: '.$result['result']['status_url'].$le;
	} else {
		print 'Error: '.$result['error']."\n";
	}
