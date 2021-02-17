<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('seller')->constrained('users');
            $table->foreignId('buyer')->constrained('users');
            $table->foreignId('address_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->dateTime('winned_at');
            $table->boolean('winned_as_buyout')->default(false);
            $table->unsignedInteger('winned_at_price');
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
        Schema::dropIfExists('invoices');
    }
}
