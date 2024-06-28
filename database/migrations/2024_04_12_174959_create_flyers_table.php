<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maker_id')->constrained('users');
            $table->foreignId('shop_id')->constrained('shops');
            $table->string('image_url', 100)->nullable();;
            $table->date('from_period')->nullable();;
            $table->date('to_period')->nullable();;
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
        Schema::dropIfExists('flyers');
    }
};
