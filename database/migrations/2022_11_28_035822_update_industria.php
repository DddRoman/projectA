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
        Schema::table('industria', function (Blueprint $table) {
            $table->string('type')->after('name');
            $table->string('discription')->after('name');
            $table->integer('auth_id')->after('id');
            $table->integer('dependence')->after('id');
        });
        Schema::table('industria', static function (Blueprint $table): void {
            $table->foreign('auth_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('industria', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('discription');
            $table->dropColumn('auth_id');
            $table->dropColumn('dependence');
        });
    }
};
