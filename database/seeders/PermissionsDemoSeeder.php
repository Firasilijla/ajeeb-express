<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Reset cached roles and permissions
      app()[PermissionRegistrar::class]->forgetCachedPermissions();

      // create permissions
      Permission::create(['name' => 'store user']);
      Permission::create(['name' => 'delete user']);
      Permission::create(['name' => 'edit user']);
      Permission::create(['name' => 'filter products']);
      Permission::create(['name' => 'add cart']);

      Permission::create(['name' => 'role-list']);
      Permission::create(['name' => 'role-create']);
      Permission::create(['name' => 'role-edit']);
      Permission::create(['name' => 'role-delete']);
      // create roles and assign existing permissions
      $role1 = Role::create(['name' => 'user']);
      $role1->givePermissionTo('filter products');
      $role1->givePermissionTo('add cart');

      $role2 = Role::create(['name' => 'admin']);
      $role2->givePermissionTo('store user');
      $role2->givePermissionTo('edit user');
      $role2->givePermissionTo('delete user');
      $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete'
    ];
    $role2->givePermissionTo($permissions);

      $role3 = Role::create(['name' => 'Super-Admin']);
      // gets all permissions via Gate::before rule; see AuthServiceProvider

      // create demo users
      $user = \App\Models\User::factory()->create([
          'name' => 'Example User',
          'email' => 'user@example.com',
          'password'=>Hash::make(123456)
      ]);
      $user->assignRole($role1);

      $user = \App\Models\User::factory()->create([
          'name' => 'Example Admin User',
          'email' => 'admin@example.com',
          'password'=>Hash::make(123456)
      ]);
      $user->assignRole($role2);

      $user = \App\Models\User::factory()->create([
          'name' => 'Example Super-Admin User',
          'email' => 'superadmin@example.com',
          'password'=>Hash::make(123456)
      ]);
      $user->assignRole($role3);
    }
}
