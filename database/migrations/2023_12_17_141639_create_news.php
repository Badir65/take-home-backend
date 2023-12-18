<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('author')->nullable();
            $table->text('content')->nullable();
            $table->text('description')->nullable();
            $table->text('published_at')->nullable();
            $table->string('source_name')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->unique();
            $table->longText('url_to_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
};
