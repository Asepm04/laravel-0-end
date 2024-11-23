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
        Schema::create('address_apis', function (Blueprint $table) {
            $table->id();
            $table->string("street")->nullable(false);
            $table->string("city")->nullable(false);
            $table->string("province")->nullable(false);
            $table->string("country")->nullable(false);
            $table->string("postal_code")->nullable(false);
            $table->unsignedBigInteger("contact_id")->ullable(false);
            $table->timestamps();
            $table->foreign("contact_id")->references("id")->on("contact_apis");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_apis');
    }
};
