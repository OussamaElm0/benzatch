<?php

use App\Models\Marque;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('montres', function (Blueprint $table) {
            $table->id();
            $table->string("serial_number")->unique();
            $table->foreignIdFor(Marque::class)->constrained()->cascadeOnDelete();
            $table->string("color");
            $table->unsignedTinyInteger("quantite");
            $table->unsignedSmallInteger("prix");
            $table->text("description");
            $table->unsignedTinyInteger("reduction")->nullable()->default(0);
            $table->timestamps();
        });

        //Add condition for reduction
        DB::statement('ALTER TABLE montres ADD CONSTRAINT chk_reduction CHECK (reduction <= 100)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montres');
    }
};
