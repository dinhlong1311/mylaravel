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
        $this->call(AdminsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
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

// Admins Table Seeder
class AdminsTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('admins')->insert([
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

/**
 * Categories Table Seeder
 */
class CategoriesTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('categories')->insert([
      ['name'=>'Phone'],
      ['name'=>'Laptop'],
      ['name'=>'Tablet']
    ]);
  }
}

/**
 * Products Table Seeder
 */
class ProductsTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('products')->insert([
      ['name'=>'iPhone 7 Plus', 'decription'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'id_category'=>1],
      ['name'=>'Dell Vostro', 'decription'=>'Nulla id elit condimentum, eleifend leo vel, interdum nisl', 'id_category'=>2],
      ['name'=>'iPad Mini 2', 'decription'=>'Nullam tempor condimentum lorem vitae ultrices', 'id_category'=>3]
    ]);
  }
}
