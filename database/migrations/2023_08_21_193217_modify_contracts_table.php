<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            // Make the currency column nullable
            $table->string('currency', 3)->nullable()->change();
            
            // Make the contracted_date column nullable
            $table->date('contracted_date')->nullable()->change();
            
            // You can make other changes here
        });
    }

    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            // If you need to revert the changes, you can define them in the down method
            // For example, reverting the currency column to be non-nullable
            $table->string('currency', 3)->change();
            
            // Revert the contracted_date column to be non-nullable if needed
            $table->date('contracted_date')->change();
            
            // You can revert other changes here
        });
    }
}
