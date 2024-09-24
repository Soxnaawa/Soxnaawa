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
        schema::create('users', function (blueprint $table){
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')>unique();
            $table->timestamp('verificationemail')->nullable();
            $table->string('password');
            $table->timestamp();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropifexist('users');
    }
};
