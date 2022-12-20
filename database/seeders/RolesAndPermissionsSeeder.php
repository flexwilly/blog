<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          // Reset cached roles and permissions
          app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          // create permissions
          Permission::create(['name' => 'edit articles']);
          Permission::create(['name' => 'delete articles']);
          Permission::create(['name' => 'publish articles']);
          Permission::create(['name' => 'unpublish articles']);
          Permission::create(['name' => 'view articles']);
          Permission::create(['name' => 'publish comments']);
          Permission::create(['name' => 'unpublish comments']);
          Permission::create(['name' => 'view comments']);


          // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'subscriber']);
        $role->givePermissionTo(['publish comments','unpublish comments','view articles','view comments']);
        
      

        // or may be done by chaining
        $role = Role::create(['name' => 'author'])
            ->givePermissionTo(['publish articles', 'unpublish articles','edit articles','view articles','view comments']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('subscriber');
        User::find(3)->assignRole('author');


    }
}
