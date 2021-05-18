<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class CreateForeignKeys extends Migration {

	public function up()
	{;
		Schema::table('districts', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('restaurant_id')->references('id')->on('restaurants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('restaurant_id')->references('id')->on('restaurants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('payment_type_id')->references('id')->on('payment_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('restaurant_id')->references('id')->on('restaurants')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('districts', function(Blueprint $table) {
			$table->dropForeign('districts_city_id_foreign');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->dropForeign('categories_parent_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_restaurant_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_restaurant_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->dropForeign('order_product_product_id_foreign');
		});
		Schema::table('order_product', function(Blueprint $table) {
			$table->dropForeign('order_product_order_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_order_id_foreign');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_restaurant_id_foreign');
		});
	}
}
