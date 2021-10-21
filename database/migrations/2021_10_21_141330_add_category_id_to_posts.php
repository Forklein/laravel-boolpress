<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //definizione della colonna
            $table->unsignedBigInteger('category_id')->after('id')->nullable();
            //definizione foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            //# alternativa
            // $table->foreignId('category_id')->after('id')->nullable()->onDelete('set null')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // DOWN
            //eliminiamo vincolo
            $table->dropForeign('posts_category_id_foreign');
            //eliminiamo colonna
            $table->dropColumn('category_id');
        });
    }
}
