<?php

namespace Database\Seeders;
use App\Models\admin;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory(10)->create();
        $admin=[
            'name'=>'Admin',
            'email'=>'Admin@gmail.com',
            'password'=>bcrypt('admin@123'),
            'phonenumber'=>9814228660,
            'location'=>'hetauda',
          ];
          admin::create($admin);
    }
}
