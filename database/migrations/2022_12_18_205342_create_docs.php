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
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->integer('ind_id');
            $table->integer('str_id');
            $table->timestamps();
        });
        Schema::table('docs', static function (Blueprint $table): void {
            $table->foreign('ind_id')->references('id')->on('industria')->onDelete('cascade');
            $table->foreign('str_id')->references('id')->on('structures')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docs');
    }
};
