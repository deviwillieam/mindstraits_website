<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocIdAndDocNameToDocumentUpload extends Migration
{
    public function up()
    {
        Schema::table('document_upload', function (Blueprint $table) {
            $table->string('doc_id');
            $table->string('doc_name');
        });
    }

    public function down()
    {
        Schema::table('document_upload', function (Blueprint $table) {
            $table->dropColumn(['doc_id', 'doc_name']);
        });
    }
}

