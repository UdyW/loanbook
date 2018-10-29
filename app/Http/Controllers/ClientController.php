<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Currency;
use App\LoanType;
use App\SecurityType;
use DateTime;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function getClients(){
    	$clients = Client::all();
    	return view('client/getClients',['clients'=>$clients]);
    }

    public function getClient($clientId = null){ 
    	$client = Client::where('id',$clientId)->first();
    	return view('client/addclient',[
    		'client'=>$client,
    		'currency' => Currency::all(),
    		'loan_type' => LoanType::all(),
    		'security_type' => SecurityType::all()
    		]);
    }

    public function storeClient(Request $request){
  	    $v = Validator::make($request->all(), [
        	'name' => 'required|max:255',
        	'loan_amount' => 'required',
        	'document_loan' => 'required',
        	'document_sec' => 'required',
        	'document_kyc' => 'required',
        	'document_deben' => 'required'
    	]);

        if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())->withInput();
	    }
    	$client = new Client();
    	$client->name = $request->name;
    	$client->group_id = $request->group_id;
  		$client->loan_amount = $request->loan_amount;
	  	$client->loan_start_date = DateTime::createFromFormat('d-m-Y',$request->loan_start_date);
	 	$client->loan_term = $request->loan_term;
	  	$client->loan_type = $request->loan_type;
	  	$client->security_value = $request->security_value;
	  	$client->security_type = $request->security_type;
	  	$client->ltv_ratio = $request->ltv_ratio;
	  	$client->intrest_rate = $request->intrest_rate;
	  	$client->intrest_per_month = $request->intrest_per_month;
	  	$client->default_intrest = $request->default_intrest;
	  	$client->payment_due_date = DateTime::createFromFormat('d-m-Y',$request->payment_due_date);
	  	$client->total_intrest = $request->total_intrest;
	  	//$client->document_loan = $request->document_loan;
	  	//$client->document_sec = $request->document_sec;
	  	//$client->document_kyc = $request->document_kyc;
	  	//$client->document_deben = $request->document_deben;
		$client->currency_id = $request->loan_currency;

		if ($request->hasFile('document_loan')) {
			$request->file('document_loan')->store('public');
			$client->document_loan = $request->file('document_loan')->hashName();
		}
		if ($request->hasFile('document_sec')) {
			$request->file('document_sec')->store('public');
			$client->document_sec = $request->file('document_sec')->hashName();
		}
		if ($request->hasFile('document_kyc')) {
			$request->file('document_kyc')->store('public');
			$client->document_kyc = $request->file('document_kyc')->hashName();
		}
		if ($request->hasFile('document_deben')) {
			$request->file('document_deben')->store('public');
			$client->document_deben = $request->file('document_deben')->hashName();
		}				
		$client->save();

		return redirect('client/getClients');
    }
}
