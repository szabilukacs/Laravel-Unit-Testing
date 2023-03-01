<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_space_id');
            $table->string('name');
            $table->text('description');
            $table->string('logo_path')->nullable();
            $table->boolean('is_visible')->default(0);

            $table->foreign('work_space_id')
                ->references('id')
                ->on('work_spaces')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_statuses');
    }
};
