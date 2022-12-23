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
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ind_id');
            $table->integer('dependence');
            $table->string('name');
            $table->string('abv');
            $table->timestamps();
        });
        Schema::table('structures', static function (Blueprint $table): void {
            $table->foreign('ind_id')->references('id')->on('industria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structures');
    }
};
