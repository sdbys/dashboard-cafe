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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("cus_kd");
            $table->string("cus_nm",50);
            $table->string("cus_alamat",100);
            $table->string("cus_kota",50);
            $table->enum("cus_jk",['L','p']);
            $table->string("cus_telp");
            $table->enum("cus_status",['A','NA']);
            $table->integer("cus_poin");
            $table->integer("cus_user_id");
            $table->timestamps();
            $table->index("cus_user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
