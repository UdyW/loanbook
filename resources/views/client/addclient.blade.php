@extends('layouts.app')

@section('content')
<div class="container">

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".datepicker" ).datepicker(
    	{dateFormat: "dd-mm-yy"});
  });
  </script>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-10">
            <a class="button" href="{{ route('client.getClient',['id'=>0])}}">Add Client</a>
            <div class="card">
                <form method="POST" action="@if(!is_null($client)) route('client.getClient'['id'=>$client->id]) @endif" class="bootstrap-iso bg-white rounded pb_form_v1"  enctype="multipart/form-data">
  {{ csrf_field() }}
 @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
    @endif
        <div class="form-group">
          <label for="name">Client Name</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->name}} @else {{ old('name') }} @endif" id="name"  name="name">
        </div>
        <div class="form-group">
          <label for="group_id">Group</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->group_id}} @else {{ old('group_id') }}  @endif" id="group_id"  name="group_id">
        </div>
        <div class="form-group">
          <label for="loan_amount">Loan Amount</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->loan_amount}} @else {{ old('loan_amount') }}  @endif" id="loan_amount"  name="loan_amount">
    	  <select class="u-half-width" id="loan_currency" name="loan_currency">
    	  	@foreach($currency AS $c)
    	  		<option value={{$c->id}}>{{$c->abbv}}</option>
    	  	@endforeach
    	  </select>	
        </div>
        <div class="form-group">
          <label for="loan_start_date">Loan Start Date</label>
          <input class="form-control py-3 reverse datepicker" type="text" value="@if(!is_null($client)) {{date('d-m-Y', strtotime($client->loan_start_date))}}  @else {{ old('loan_start_date') }} @endif" id="loan_start_date"  name="loan_start_date">
        </div>

        <div class="form-group">
          <label for="loan_term">Loan Term</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->loan_term}}  @else {{ old('loan_term') }} @endif" id="loan_term"  name="loan_term">
        </div>
        <div class="form-group">
          <label for="loan_type">Loan Type</label>
          <select class="form-control py-3 reverse" value="@if(!is_null($client)) {{$client->loan_type}} @endif" id="loan_type"  name="loan_type">
    	  	@foreach($loan_type AS $t)
    	  		<option value={{$t->id}} @if((!is_null($client) && $client->loan_type == $t->id) || old('loan_type') == $t->id) {{'selected'}} @endif>{{$t->name}}</option>
    	  	@endforeach
          </select>
        </div>

 
        <div class="form-group">
          <label for="security_value">Value of Security</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->security_value}} @endif" id="security_value"  name="security_value">
        </div>
        <div class="form-group">
          <label for="security_type">Security Type</label>
          <select class="form-control py-3 reverse" name="security_type">
    	  	@foreach($security_type AS $st)
    	  		<option value={{$st->id}} @if((!is_null($client) && $client->security_type == $st->id || old('security_value') == $t->id)) {{'selected'}} @endif>{{$st->name}}</option>
    	  	@endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="ltv_ratio">LTV Ratio</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->ltv_ratio}}  @else {{ old('ltv_ratio') }} @endif" id="ltv_ratio"  name="ltv_ratio">
        </div>
        <div class="form-group">
          <label for="intrest_rate">Intrest Rate</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->intrest_rate}}  @else {{ old('intrest_rate') }} @endif" id="intrest_rate"  name="intrest_rate">
        </div>

        <div class="form-group">
          <label for="intrest_per_month">Intrest per Month</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->intrest_per_month}}  @else {{ old('intrest_per_month') }} @endif" id="intrest_per_month"  name="intrest_per_month">
        </div>
        <div class="form-group">
          <label for="default_intrest">Default Intrest</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->default_intrest}}  @else {{ old('default_intrest') }} @endif" id="default_intrest"  name="default_intrest">
        </div>

        <div class="form-group">
          <label for="payment_due_date">Payment Due Date</label>
          <input class="form-control py-3 reverse datepicker" type="text" value="@if(!is_null($client)) {{date('d-m-Y', strtotime($client->payment_due_date))}}  @else {{ old('payment_due_date') }} @endif" id="payment_due_date"  name="payment_due_date">
        </div>
        <div class="form-group">
          <label for="total_intrest">Total Intrest</label>
          <input class="form-control py-3 reverse" type="text" value="@if(!is_null($client)) {{$client->total_intrest}}  @else {{ old('total_intrest') }} @endif" id="total_intrest"  name="total_intrest">
        </div>

        <div class="form-group">
          <label for="document_loan">All Documents Relating to Loan @if(!is_null($client)) <a href={{Storage::url($client->document_loan)}}  target="_blank">(View file)</a>  @else {{ old('document_loan') }} @endif</label>
          <input class="form-control py-3 reverse" type="file" id="document_loan"  name="document_loan">
        </div>
        <div class="form-group">
          <label for="document_sec">Security Charges @if(!is_null($client)) <a href={{Storage::url($client->document_sec)}}  target="_blank">(View file)</a>  @else {{ old('document_sec') }} @endif</label>
          <input class="form-control py-3 reverse" type="file" name="document_sec">
        </div>

        <div class="form-group">
          <label for="document_kyc">KYC Gurantees @if(!is_null($client)) <a href={{Storage::url($client->document_kyc)}}  target="_blank">(View file)</a>  @else {{ old('document_kyc') }} @endif</label>
          <input class="form-control py-3 reverse" type="file" name="document_kyc">
        </div>
        <div class="form-group">
          <label for="document_deben">Debentures @if(!is_null($client)) <a href={{Storage::url($client->document_deben)}}  target="_blank">(View file)</a>  @else {{ old('document_deben') }} @endif</label>
          <input class="form-control py-3 reverse" type="file" name="document_deben">
        </div>
      <input class="button-primary" type="submit" value="Submit"><a  class="button" href="{{URL::previous()}}">Back</a>
    </form>
</div>
        </div>
        </div>
    </div>

@endsection
