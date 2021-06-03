<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'create teachers']);


        $role = Role::create([
            'name' => 'student'
        ])->givePermissionTo('');

        $role = Role::create([
            'name' => 'teacher'
        ])->givePermissionTo('');

        $role = Role::create([
            'name' => 'classTeacher'
        ])->givePermissionTo('create students');

        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());


        //create default admin-user
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@mail',
            'password' => bcrypt('admin')
        ]);
        $adminUser->assignRole('admin');
    }
}
