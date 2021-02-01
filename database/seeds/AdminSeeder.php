<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 // $role_id = DB::table('roles')->insertGetId([
      //       'role' => 'admin',
      //       'created_at' => date('Y-m-d H:i:s'),
      //       'updated_at' => date('Y-m-d H:i:s'),
      //    ]);

    	  $user_id = DB::table('users')->insertGetId([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'role' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

         //  $role_id = DB::table('user_roles')->insertGetId([
         //    'user_id' => $user_id,
         //    'role_id' => $role_id,
         //    'created_at' => date('Y-m-d H:i:s'),
         //    'updated_at' => date('Y-m-d H:i:s'),
         // ]);


         // $role_id = DB::table('roles')->insertGetId([
         //    'role' => 'user',
         //    'created_at' => date('Y-m-d H:i:s'),
         //    'updated_at' => date('Y-m-d H:i:s'),
         // ]);


    }
}
