<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('group_id');
            $table->integer('loan_amount');
            $table->date('loan_start_date');
            $table->integer('loan_term');
            $table->integer('loan_type');
            $table->integer('security_value');
            $table->integer('security_type');
            $table->integer('ltv_ratio');
            $table->integer('intrest_rate');
            $table->integer('intrest_per_month');
            $table->integer('default_intrest');
            $table->integer('payment_due_date');
            $table->integer('total_intrest');
            $table->string('document_loan');
            $table->string('document_sec');
            $table->string('document_kyc');
            $table->string('document_deben');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
