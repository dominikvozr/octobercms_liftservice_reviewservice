<?php namespace Dondo\ReviewService\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoReviewserviceReview extends Migration
{
    public function up()
    {
        Schema::create('dondo_reviewservice_review', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('product_id', 36);
            $table->date('date');
            $table->time('time');
            $table->text('message');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dondo_reviewservice_review');
    }
}
