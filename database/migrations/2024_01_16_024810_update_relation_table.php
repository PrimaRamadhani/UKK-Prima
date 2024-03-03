<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('foto', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('album_id')->references('id')->on('album')->onUpdateCascade()->onDeleteCascade();
        });
        Schema::table('likefoto', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('foto_id')->references('id')->on('foto')->onUpdateCascade()->onDeleteCascade();
        });
        Schema::table('komentar', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('foto_id')->references('id')->on('foto')->onUpdateCascade()->onDeleteCascade();
        });
        Schema::table('album', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
        });
        Schema::table('follow', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('follow_id')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
