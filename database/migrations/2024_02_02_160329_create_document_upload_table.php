<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentUploadTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('document_upload')) {
            Schema::create('document_upload', function (Blueprint $table) {
                $table->id();
                $table->string('doc_no');
                $table->string('doc_name');
                $table->string('doc_file');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('document_upload');
    }
}

