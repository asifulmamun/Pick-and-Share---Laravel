<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractedIdToBookRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('book_requests', function (Blueprint $table) {
            $table->integer('contracted_id')->nullable()->default(0)->before('pickup');
            // $table->foreign('contracted_id')->references('id')->on('contracts')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('book_requests', function (Blueprint $table) {
            $table->dropColumn('contracted_id');
            // $table->dropForeign(['contracted_id']);
        });
    }
}
