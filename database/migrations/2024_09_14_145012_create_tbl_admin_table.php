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
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->id(); // Tạo cột ID với kiểu dữ liệu tự động tăng
            $table->string('admin_email'); // Tạo cột email với kiểu chuỗi (string)
            $table->string('admin_password'); // Tạo cột password với kiểu chuỗi (string)
            $table->string('admin_name'); // Tạo cột tên admin với kiểu chuỗi (string)
            $table->string('admin_phone'); // Tạo cột điện thoại admin với kiểu chuỗi (string)
            $table->timestamps(); // Tạo cột created_at và updated_at với kiểu timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_admin');
    }
};
