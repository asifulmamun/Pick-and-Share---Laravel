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
            $table->foreignId('book_request_id')->constrained('book_requests');
            $table->foreignId('requester_user_id')->constrained('users'); // Constrain to the 'users' table
            $table->foreignId('driver_user_id')->constrained('users'); // Constrain to the 'users' table
            $table->decimal('driver_request_amount', 10, 2);
            $table->decimal('contract_amount', 10, 2)->nullable();
            $table->string('currency', 3)->nullable();
            $table->date('contracted_date')->nullable();
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
