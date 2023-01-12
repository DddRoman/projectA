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
        Schema::create('industria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auth_id');  
            $table->integer('dependence')->nullable();    
            $table->string('name');
            $table->foreignId('type');
            $table->string('discription');
            $table->timestamps();
        });
        Schema::table('industria', static function (Blueprint $table): void {
            $table->foreign('auth_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industria');
    }
};
