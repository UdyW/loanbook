<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = ['name','group_id','loan_amount','loan_start_date','loan_term','loan_type','security_value','security_type','ltv_ratio','intrest_rate'
    						,'intrest_per_month','default_intrest','payment_due_date','total_intrest','document_loan','document_sec','document_kyc','document_deben','currency_id'];
}
