<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('restaurant_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('payment_type_id')->unsigned();
			$table->decimal('cost', 8,2)->default(0)->nullable();
			$table->decimal('net', 8,2)->default(0)->nullable();
			$table->decimal('total', 8,2)->default(0)->nullable();
			$table->decimal('delivery_fees', 8,2)->default(0)->nullable();
			$table->decimal('commission', 8,2)->default(0)->nullable();
			$table->text('notes');
			$table->string('address');
			$table->enum('state', array('pending', 'accepted', 'rejected', 'delivered'));
            $table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
