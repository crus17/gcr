<?php
/*
	CoinPayments.net API Example
	Copyright 2014 CoinPayments.net. All rights reserved.	
	License: GPLv2 - http://www.gnu.org/licenses/gpl-2.0.txt
*/
	require('./coinpayments.inc.php');
	$cps = new CoinPaymentsAPI();
	$cps->Setup('d57F069303fFDa7a88A6Ba121E7bFd19C4026Fcb789c874D04190773873E80Df', 'aa3f6948307c4fc318be48571d0f33603f9479d9e084ab9eee0601eeb25b09ad');

	$result = $cps->CreateWithdrawal(0.1, 'BTC', '1LC9Tn7ekRXhMTzh7ZJnZ55XUBM4ZGuLhJ');
	if ($result['error'] == 'ok') {
		print 'Withdrawal created with ID: '.$result['result']['id'];
	} else {
		print 'Error: '.$result['error']."\n";
	}
