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

            // $table->string('category');
            // $table->string('subcategory')->nullable();

            $table->bigInteger('category_id');
            $table->bigInteger('subcategory_id')->nullable();

            // $table->string('source')->default('portal'); // portal / archive / disha

            $table->string('D_LetterNo')->nullable();
            $table->date('D_DATE')->nullable();
            $table->string('D_SendersName')->nullable();
            $table->text('D_Subject')->nullable();
            $table->bigInteger('D_diaryNo')->nullable();
            $table->string('D_LetterFromGovt')->nullable();
            $table->string('D_fileno')->nullable();
            $table->string('D_MarkedTo')->nullable();
            $table->string('D_CopyTO')->nullable();
            $table->date('D_DateIN')->nullable();
            $table->date('D_DateOut')->nullable();
            $table->string('D_MarkedBy')->nullable();
            $table->text('D_Remarks')->nullable();
            $table->string('D_LetteraddressedTo')->nullable();
            $table->string('D_LetterSignedBy')->nullable();
            $table->string('D_SenderDYNo', 1000)->nullable();

            $table->bigInteger('dealing_officer')->nullable();

            // $table->string('file_url')->nullable();

            // $table->bigInteger('reference_of')->default(-1);

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
