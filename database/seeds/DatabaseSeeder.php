<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

// Roles Table Seeder
class RolesTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('roles')->insert([
      ['role'=>'Admin'],
      ['role'=>'Editor'],
      ['role'=>'Writer'],
      ['role'=>'User']
    ]);
  }
}

// Admin Table Seeder
class AdminTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('admin')->insert([
      'name'=>'Admin', 'email'=>'admin@dinhlong.com', 'password'=>bcrypt('123456')
    ]);
  }
}

// Users Table Seeder
class UsersTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->insert([
      ['name'=>'Editor', 'email'=>'dinhlong.hoo@outlook.com', 'password'=>bcrypt('123456')],
      ['name'=>'Writer', 'email'=>'dinhlong.hoo@gmail.com', 'password'=>bcrypt('123456')],
      ['name'=>'User', 'email'=>'anonymous@gmail.com', 'password'=>bcrypt('123456')]
    ]);
  }
}
