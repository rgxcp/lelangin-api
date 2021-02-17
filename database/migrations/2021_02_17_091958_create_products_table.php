<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('account_id')->constrained();
            $table->string('name', 50);
            $table->text('description');
            $table->dateTime('auction_opened_at');
            $table->dateTime('auction_closed_at');
            $table->unsignedInteger('bid_started_at');
            $table->unsignedInteger('bid_multiplied_by');
            $table->boolean('buyout');
            $table->unsignedInteger('buyout_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
