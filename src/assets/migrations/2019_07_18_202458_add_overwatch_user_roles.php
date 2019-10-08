<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Foundation\Auth\User;


class AddOverwatchUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            if (!Schema::hasColumn('users', 'roles')) {
                $table->text('roles')->nullable();
            }
        });

        $user = new User();
        $user->password = Hash::make('password');
        $user->email = 'admin@admin.com';
        $user->name = 'admin';
        $user->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'roles')) {
            Schema::table('users', function ($table) {
                $table->dropColumn('roles');
            });
        }
    }
}
