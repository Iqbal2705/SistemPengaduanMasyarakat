<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                       // id user
            $table->string('name');             // nama
            $table->string('email')->unique();  // email login
            $table->string('password');         // password login
            $table->enum('role', ['admin', 'staff'])->default('staff');
            $table->timestamps();               // waktu dibuat & diubah
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
