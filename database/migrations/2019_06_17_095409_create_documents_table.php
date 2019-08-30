<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('category');
            $table->string('subcategory')->nullable();

            $table->string('source')->default('portal'); // portal / archive / disha

            $table->bigInteger('diary_no')->nullable();
            $table->timestamp('date_in')->nullable();
            $table->timestamp('file_date')->nullable();
            $table->string('file_no')->nullable();
            $table->string('received_from')->nullable();
            $table->string('sender_diary_no')->nullable();
            $table->text('subject')->nullable();
            
            $table->bigInteger('dealing_officer')->nullable();

            $table->string('marked_to')->nullable();
            $table->string('copy_to')->nullable();
            $table->timestamp('date_out')->nullable();
            $table->string('marked_by')->nullable();
            $table->text('remarks')->nullable();
            $table->string('file_url')->nullable();

            $table->bigInteger('reference_of')->default(-1);

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
        Schema::dropIfExists('documents');
    }
}
