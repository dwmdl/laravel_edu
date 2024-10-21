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
        Schema::create('project_worker', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->index()->constrained('projects');
            $table->foreignId('worker_id')->index()->constrained('workers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_workers');
    }
};
