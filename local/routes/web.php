<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/payment'], function(){
	Route::post('vib', function(Request $request){

		$spID = $request->spID;
		$cardID = $request->cardID;
		$accountHolder = $request->accountHolder;
		$billID = $request->billID;
		$charges = $request->charges;
		$token = $request->token;

		$res = DB::SELECT('SELECT spID FROM payment_service.service_provider WHERE spID = "'.$spID.'" AND token = "'.$token.'"');
		if(count($res) == 0) return '{"code": "4", "message": "Token nhà cung cấp không đúng!", "data": {}}';

		if(empty($spID) || empty($cardID) || empty($accountHolder) || empty($billID) || empty($charges)){
			return '{"code": "1", "message": "Tham số lỗi!", "data": {}}';
		}

		$res = DB::SELECT('SELECT balance FROM payment_service.card WHERE bankID = "vib" AND cardID = "'.$cardID.'" AND accountHolder = "'.$accountHolder.'"');
		if(count($res) == 0) return '{"code": "2", "message": "Thông tin thẻ không chính xác!", "data": {}}';
		if($res[0]->balance < $charges) return '{"code": "3", "message": "Số dư không đủ để thanh toán!", "data": {}}';

		$transactionID = $billID.time();
		DB::table('payment_service.transaction')->insert([
			'tranID' => $transactionID,
			'cardID' => $cardID,
			'spID' => $spID,
			'billID' => $billID,
			'charges' => $charges
		]);
		$newBalance = $res[0]->balance - $charges;
		DB::SELECT('UPDATE payment_service.card SET balance = '.$newBalance.' WHERE cardID = "'.$cardID.'"');

		return '{"code": "0", "message": "success", "data": {"transactionID": "'.$transactionID.'"}}';
	});

	Route::post('vcb', function(Request $request){

		$spID = $request->spID;
		$cardID = $request->cardID;
		$accountHolder = $request->accountHolder;
		$billID = $request->billID;
		$charges = $request->charges;
		$token = $request->token;

		$res = DB::SELECT('SELECT spID FROM payment_service.service_provider WHERE spID = "'.$spID.'" AND token = "'.$token.'"');
		if(count($res) == 0) return '{"code": "4", "message": "Token nhà cung cấp không đúng!", "data": {}}';

		if(empty($spID) || empty($cardID) || empty($accountHolder) || empty($billID) || empty($charges)){
			return '{"code": "1", "message": "Tham số lỗi!", "data": {}}';
		}

		$res = DB::SELECT('SELECT balance FROM payment_service.card WHERE bankID = "vcb" AND cardID = "'.$cardID.'" AND accountHolder = "'.$accountHolder.'"');
		if(count($res) == 0) return '{"code": "2", "message": "Thông tin thẻ không chính xác!", "data": {}}';
		if($res[0]->balance < $charges) return '{"code": "3", "message": "Số dư không đủ để thanh toán!", "data": {}}';

		$transactionID = $billID.time();
		DB::table('transaction')->insert([
			'tranID' => $transactionID,
			'cardID' => $cardID,
			'spID' => $spID,
			'billID' => $billID,
			'charges' => $charges
		]);
		$newBalance = $res[0]->balance - $charges;
		DB::SELECT('UPDATE payment_service.card SET balance = '.$newBalance.' WHERE cardID = "'.$cardID.'"');

		return '{"code": "0", "message": "success", "data": {"transactionID": "'.$transactionID.'"}}';
	});

	Route::post('acb', function(Request $request){

		$spID = $request->spID;
		$cardID = $request->cardID;
		$accountHolder = $request->accountHolder;
		$billID = $request->billID;
		$charges = $request->charges;
		$token = $request->token;

		$res = DB::SELECT('SELECT spID FROM payment_service.service_provider WHERE spID = "'.$spID.'" AND token = "'.$token.'"');
		if(count($res) == 0) return '{"code": "4", "message": "Token nhà cung cấp không đúng!", "data": {}}';

		if(empty($spID) || empty($cardID) || empty($accountHolder) || empty($billID) || empty($charges)){
			return '{"code": "1", "message": "Tham số lỗi!", "data": {}}';
		}

		$res = DB::SELECT('SELECT balance FROM payment_service.card WHERE bankID = "acb" AND cardID = "'.$cardID.'" AND accountHolder = "'.$accountHolder.'"');
		if(count($res) == 0) return '{"code": "2", "message": "Thông tin thẻ không chính xác!", "data": {}}';
		if($res[0]->balance < $charges) return '{"code": "3", "message": "Số dư không đủ để thanh toán!", "data": {}}';

		$transactionID = $billID.time();
		DB::table('transaction')->insert([
			'tranID' => $transactionID,
			'cardID' => $cardID,
			'spID' => $spID,
			'billID' => $billID,
			'charges' => $charges
		]);
		$newBalance = $res[0]->balance - $charges;
		DB::SELECT('UPDATE payment_service.card SET balance = '.$newBalance.' WHERE cardID = "'.$cardID.'"');

		return '{"code": "0", "message": "success", "data": {"transactionID": "'.$transactionID.'"}}';
	});

	Route::post('agb', function(Request $request){

		$spID = $request->spID;
		$cardID = $request->cardID;
		$accountHolder = $request->accountHolder;
		$billID = $request->billID;
		$charges = $request->charges;
		$token = $request->token;

		$res = DB::SELECT('SELECT spID FROM payment_service.service_provider WHERE spID = "'.$spID.'" AND token = "'.$token.'"');
		if(count($res) == 0) return '{"code": "4", "message": "Token nhà cung cấp không đúng!", "data": {}}';

		if(empty($spID) || empty($cardID) || empty($accountHolder) || empty($billID) || empty($charges)){
			return '{"code": "1", "message": "Tham số lỗi!", "data": {}}';
		}

		$res = DB::SELECT('SELECT balance FROM payment_service.card WHERE bankID = "agb" AND cardID = "'.$cardID.'" AND accountHolder = "'.$accountHolder.'"');
		if(count($res) == 0) return '{"code": "2", "message": "Thông tin thẻ không chính xác!", "data": {}}';
		if($res[0]->balance < $charges) return '{"code": "3", "message": "Số dư không đủ để thanh toán!", "data": {}}';

		$transactionID = $billID.time();
		DB::table('transaction')->insert([
			'tranID' => $transactionID,
			'cardID' => $cardID,
			'spID' => $spID,
			'billID' => $billID,
			'charges' => $charges
		]);
		$newBalance = $res[0]->balance - $charges;
		DB::SELECT('UPDATE payment_service.card SET balance = '.$newBalance.' WHERE cardID = "'.$cardID.'"');

		return '{"code": "0", "message": "success", "data": {"transactionID": "'.$transactionID.'"}}';
	});

	Route::post('refund', function(Request $request){
		$spID = $request->spID;
		$token = $request->token;
		$transactionID = $request->tranID;
		$billID = $request->billID;

		$res = DB::SELECT('SELECT spID FROM payment_service.service_provider WHERE spID = "'.$spID.'" AND token = "'.$token.'"');
		if(count($res) == 0) return '{"code": "4", "message": "Token nhà cung cấp không đúng!", "data": {}}';

		if(empty($spID) || empty($transactionID) || empty($billID)){
			return '{"code": "1", "message": "Tham số lỗi!", "data": {}}';
		}

		$res = DB::SELECT('SELECT cardID, charges FROM payment_service.transaction WHERE tranID ="'.$transactionID.'" AND billID = "'.$billID.'"');
		if(count($res) == 0) return '{"code": "5", "message": "Transaction ID hoặc bill ID không chính xác!", "data": {}}';

		$states = DB::SELECT('SELECT state FROM payment_service.transaction WHERE tranID ="'.$transactionID.'" AND billID = "'.$billID.'"');
		if($states[0]->state == 'R') return '{"code": "6", "message": "You refunded before", "data": {}}';

		$cardID = $res[0]->cardID;
		$charges = $res[0]->charges;

		$res = DB::SELECT('SELECT balance FROM payment_service.card WHERE cardID = "'.$cardID.'"');
		$newBalance = $charges + $res[0]->balance;

		DB::SELECT('UPDATE payment_service.card SET balance = '.$newBalance.' WHERE cardID = "'.$cardID.'"');
		DB::SELECT('UPDATE payment_service.transaction SET state = "R" WHERE tranID = "'.$transactionID.'"');

		return '{"code": "0", "message": "success", "data": ""}';
	});
});