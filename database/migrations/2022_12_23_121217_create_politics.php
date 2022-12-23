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
        Schema::create('politics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ind_id');
            $table->string('name');
            $table->string('body');
            $table->timestamps();
        });
        Schema::table('politics', static function (Blueprint $table): void {
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
        Schema::dropIfExists('politics');
    }
};
