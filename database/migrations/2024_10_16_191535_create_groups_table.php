<?php

use App\Models\User;
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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255); // to make each group unique
            $table->string('cover_path', 1024)->nullable(); // path to cover image
            $table->string('thumbnail_path', 1024)->nullable();
            $table->boolean('auto_approval')->default(true);
            $table->text('about')->nullable();
            $table->foreignIdFor(User::class);
            $table->timestamp('deleted_at')->nullable();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
