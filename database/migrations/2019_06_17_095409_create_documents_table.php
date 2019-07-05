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

            $table->bigInteger('diary_no');
            $table->timestamp('date_in');
            $table->timestamp('file_date');
            $table->string('file_no');
            $table->string('received_from');
            $table->string('sender_diary_no')->nullable();
            $table->text('subject');

            $table->string('marked_to')->nullable();
            $table->string('copy_to')->nullable();
            $table->timestamp('date_out')->nullable();
            $table->string('marked_by')->nullable();
            $table->text('remarks')->nullable();
            $table->string('file_url')->nullable();

            $table->boolean('is_reference')->default(false);

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
