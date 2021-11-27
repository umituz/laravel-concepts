<?php

use Illuminate\Config\Repository;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCardTable
 */
class CreateCardTable extends Migration
{
	/**
	 * Returns database config details
	 *
	 * @param $key
	 * @return Repository|mixed
	 */
	protected function database($key)
	{
		return config('cart.database.' . $key);
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable($this->database('card.baseTable'))) {

			Schema::create($this->database('card.baseTable'), function (Blueprint $table) {
				$table->bigIncrements($this->database('card.identity'));
				$table->unsignedBigInteger($this->database('user.relatedColumn'));
//				$table->foreign($this->database('user.relatedColumn'))
//					->references($this->database('user.identity'))
//					->on($this->database('user.baseTable'))
//					->onDelete('cascade')
//					->onUpdate('cascade');
				$table->ipAddress('ip_address');
				$table->text('user_agent');
				$table->timestamps();
			});

		}

		if (!Schema::hasTable($this->database('card_details.baseTable'))) {

			Schema::create($this->database('card_details.baseTable'), function (Blueprint $table) {
				$table->bigIncrements($this->database('card_details.identity'));
				$table->unsignedBigInteger($this->database('card.relatedColumn'));
//				$table->foreign($this->database('card.relatedColumn'))
//					->references($this->database('card.identity'))
//					->on($this->database('card.baseTable'))
//					->onDelete('cascade')
//					->onUpdate('cascade');
			   $table->unsignedBigInteger($this->database('product.relatedColumn'));
//               $table->foreign($this->database('product.relatedColumn'))
//                    ->references($this->database('product.identity'))
//                    ->on($this->database('product.baseTable'))
//                    ->onDelete('cascade')
//                    ->onUpdate('cascade');
				$table->unsignedBigInteger($this->database('card_details.numberColumn'));
				$table->decimal($this->database('card_details.priceColumn'), 15, 2);
				$table->string($this->database('card_details.statusColumn'));
				$table->timestamps();
			});

		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::disableForeignKeyConstraints();

		Schema::dropIfExists($this->database('card.baseTable'));
		Schema::dropIfExists($this->database('card_details.baseTable'));

		Schema::enableForeignKeyConstraints();
	}
}
