<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\RoleUser;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = ['masteradmin', 'shop-manager', 'inventory', 'sales', 'cashier', 'accounting'];
      foreach($roles as $role) {
        $r = Role::create([
          'role_name' => $role,
          'role_level' => 0,
        ]);
        $r->getUsers()->attach(1);
      }
    }
}
