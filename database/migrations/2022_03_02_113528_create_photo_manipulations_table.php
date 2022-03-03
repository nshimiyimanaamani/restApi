<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoManipulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_manipulations', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('path',255);
            $table->string('type',255);
            $table->text('data');
        $table->string('output_path',2000)->nullable();
            $table->timestamp('created_at');
            $table->foreignIdFor(\App\Models\User::class,'user_id')->nullable();
            $table->foreignIdFor(\App\Models\Album::class,'album_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_manipulations');
    }
}
