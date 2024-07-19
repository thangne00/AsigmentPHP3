<?php

// database/migrations/xxxx_xx_xx_xxxxxx_rename_image_column_to_image_url_in_articles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameImageColumnToImageUrlInArticlesTable extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Đổi tên cột từ 'image' thành 'image_url'
            $table->renameColumn('image', 'image_url');
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Hoàn tác việc đổi tên cột trong trường hợp cần thiết
            $table->renameColumn('image_url', 'image');
        });
    }
}
