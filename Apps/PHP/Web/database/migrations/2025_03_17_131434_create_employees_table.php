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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->boolean("is_present")->nullable(true);
            
            $table->integer("user_id");
            $table->foreign("user_id")->references("id")->on("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->integer("employee_type_id");
            $table->foreign("employee_type_id")->references("id")->on("employee_types")
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
        Schema::dropIfExists('employees');
    }
};
