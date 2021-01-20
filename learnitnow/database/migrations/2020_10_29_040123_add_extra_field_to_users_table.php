<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lname');
			$table->bigInteger('phone');
			$table->string('role');
			$table->string('companyname');
			$table->string('dob');
			$table->string('address');
			$table->string('state');
			$table->string('city');
			$table->string('zip');
			$table->string('gender');
			$table->string('subscription_status');
			$table->string('stripe_customer_id');
			$table->string('stripe_card_id');
			$table->string('card_last4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            /* $table->dropColumn('lname');
			$table->bigInteger('phone');
			$table->dropColumn('companyname');
			$table->dropColumn('dob');
			$table->dropColumn('address');
			$table->dropColumn('state');
			$table->dropColumn('city');
			$table->dropColumn('zip');
			$table->dropColumn('gender');
			$table->dropColumn('subscription_status');
			$table->dropColumn('stripe_customer_id');
			$table->dropColumn('stripe_card_id');
			$table->dropColumn('card_last4'); */
        });
    }
}
