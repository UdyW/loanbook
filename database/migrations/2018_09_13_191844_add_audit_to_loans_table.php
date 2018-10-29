<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuditToLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->integer('audit_created_user');
            $table->date('audit_created_datetime');
            $table->integer('audit_updated_user');
            $table->date('audit_updated_datetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('audit_created_user');
            $table->dropColumn('audit_created_datetime');
            $table->dropColumn('audit_updated_user');
            $table->dropColumn('audit_updated_datetime');
        });
    }
}
