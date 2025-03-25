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
        Schema::create('appointment_client', function (Blueprint $table) {
            $table->integer("appointment_id");
            $table->foreign("appointment_id")->references("id")->on("appointments")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->integer("client_id");
            $table->foreign("client_id")->references("id")->on("clients")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_client');
    }
};
