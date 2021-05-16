<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRestaurantsTable extends Migration {

	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->string('phone');
			$table->string('password');
			$table->string('image')->nullable();
			$table->string('address');
			$table->string('slug');
			$table->integer('delivery_fees')->nullable();
			$table->decimal('min_order', 8,2)->nullable();
			$table->boolean('is_active')->default(1);
			$table->boolean('is_approved')->default(0);
            $table->integer('pin_code')->unsigned()->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('restaurants');
	}
}
