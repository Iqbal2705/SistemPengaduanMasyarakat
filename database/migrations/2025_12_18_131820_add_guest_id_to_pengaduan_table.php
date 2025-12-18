<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {

            // user_id boleh null (untuk guest)
            $table->foreignId('user_id')
                ->nullable()
                ->change();

            // guest_id
            $table->foreignId('guest_id')
                ->nullable()
                ->after('user_id')
                ->constrained('guests')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropForeign(['guest_id']);
            $table->dropColumn('guest_id');

            $table->foreignId('user_id')
                ->nullable(false)
                ->change();
        });
    }
};
