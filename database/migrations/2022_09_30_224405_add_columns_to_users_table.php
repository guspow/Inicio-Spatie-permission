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
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('appaterno')->nullable()->after('name');
            $table->string('apmaterno')->nullable()->after('appaterno');
            $table->string('foto')->nullable()->after('email');
            $table->integer('edad')->nullable()->default('0')->after('foto');
            $table->integer('peso')->nullable()->default('0')->after('edad');
            $table->string('cinta')->nullable()->after('peso');
            $table->string('grado')->nullable()->after('cinta');
            $table->bigInteger('telefono')->nullable()->after('grado');            
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
            $table->dropColumn(['appaterno', 'apmaterno', 'foto', 'edad', 'peso', 'cinta', 'grado', 'telefono']);
        });
    }
};
