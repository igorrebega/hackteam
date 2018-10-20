<?php

namespace App\Services\Dashboard\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class CreateAdmin
 * @package App\Services\Dashboard\database\seeds
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class CreateAdmin extends Seeder
{
    /**
     * Create admin
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->insert([
            'name'       => 'Admin',
            'surname'    => 'Admin',
            'email'      => 'admin@admin.ua',
            'password'   => Hash::make('87654321'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
