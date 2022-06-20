<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesInOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('address')->after('mobile');
            $table->string('zip')->after('address');
            $table->string('company_name')->after('zip');
            $table->string('order_status')->default('new')->after('company_name');
            $table->string('order_number')->after('order_status');

        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('zip');
            $table->dropColumn('company_name');
            $table->dropColumn('order_status');
            $table->dropColumn('order_status');
        });
    }
}
