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
        Schema::create('missatges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_remitent_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('user_destinatari_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('assumpte');
            $table->text('cos');
            $table->date('data_enviament');
            $table->time('hora_enviament');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missatge');
    }
};
