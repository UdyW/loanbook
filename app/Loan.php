<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoanType;

class Loan extends Model
{
    protected $fillable = ['name'];
    
    /**
     * Get the loan type for the task.
     */
    public function loantype()
    {
        return $this->belongsTo(LoanType::class);
    }
}
