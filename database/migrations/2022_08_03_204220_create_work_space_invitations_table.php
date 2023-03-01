<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_space_invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_space_id');
            $table->string('email');
            $table->string('status');
            $table->timestamps();

            $table->foreign('work_space_id')
                ->references('id')
                ->on('work_spaces')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_space_invitations');
    }
};
