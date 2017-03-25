<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // factory(App\User::class, 2)->create()->each(function($u) {
      // $u->issues()->save(factory(App\Issues::class)->make());
      // });
      $masterAdmin = User::create([
        'username' => 'masteradmin',
        'firstname' => 'master',
        'lastname' => 'admin',
        'email' => 'masteradmin@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);

      $managerAdmin = User::create([
        'username' => 'manageradmin',
        'firstname' => 'manager',
        'lastname' => 'admin',
        'email' => 'manageradmin@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);

      $inventoryAdmin = User::create([
        'username' => 'inventoryadmin',
        'firstname' => 'inventory',
        'lastname' => 'admin',
        'email' => 'inventoryadmin@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);

      $stock = User::create([
        'username' => 'stock',
        'firstname' => 'stock',
        'lastname' => 'person',
        'email' => 'stock@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);

      $paymentAdmin = User::create([
        'username' => 'paymentadmin',
        'firstname' => 'payment',
        'lastname' => 'admin',
        'email' => 'paymentadmin@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);

      $cashier = User::create([
        'username' => 'cashier',
        'firstname' => 'cashier',
        'lastname' => 'person',
        'email' => 'cashier@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);

      $salesAdmin = User::create([
        'username' => 'salesadmin',
        'firstname' => 'sales',
        'lastname' => 'admin',
        'email' => 'salesadmin@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);

      $sales = User::create([
        'username' => 'sales',
        'firstname' => 'sales',
        'lastname' => 'person',
        'email' => 'sales@gmail.com',
        'password' => bcrypt('123456'),
        'readable_password' => '123456',
        'remember_token' => str_random(10),
      ]);
    }
}
