<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_request_id');
            $table->foreignId('requester_user_id');
            $table->foreignId('driver_user_id');
            $table->decimal('driver_request_amount', 10, 2);
            $table->decimal('contract_amount', 10, 2);
            $table->string('currency', 3)->nullable();
            $table->date('contracted_date');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('contracts');
    }
}
