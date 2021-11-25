<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\AppTables;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class ]->forgetCachedPermissions();

        // create permissions
        $data = [
            // Managers
            ['name' => 'Managers create', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers update', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers list', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers show', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers delete', 'type' => 'Managers',  'guard_name' => 'web'],

            // roles
            ['name' => 'Roles create', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles update', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles list', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles show', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles delete', 'type' => 'Roles', 'guard_name' => 'web'],

            // Admin
            ['name' => 'Admins create', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins update', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins list', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins show', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins delete', 'type' => 'Admins', 'guard_name' => 'web'],

            // Customers
            ['name' => 'Customers create', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers update', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers list', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers show', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers delete', 'type' => 'Customers', 'guard_name' => 'web'],

            // Supervisors
            ['name' => 'Supervisors create', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors update', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors list', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors show', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors delete', 'type' => 'Supervisors', 'guard_name' => 'web'],

            // Feedbacks
            ['name' => 'Feedbacks list', 'type' => 'Feedbacks', 'guard_name' => 'web'],
            ['name' => 'Feedbacks show', 'type' => 'Feedbacks', 'guard_name' => 'web'],
            ['name' => 'Feedbacks delete', 'type' => 'Feedbacks', 'guard_name' => 'web'],

            // Pages
            ['name' => 'Pages create', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages update', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages list', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages show', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages delete', 'type' => 'Pages', 'guard_name' => 'web'],

            // Categories
            ['name' => 'Categories create', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories update', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories list', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories show', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories delete', 'type' => 'Categories', 'guard_name' => 'web'],


        ];
        foreach ($data as $datum) {
            Permission::firstOrCreate($datum);
        }

        $this->createAppTables();
    }

    protected function createAppTables()
    {
        AppTables::firstOrCreate(['title' => 'Admins', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Customers', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Managers', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Supervisors', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Roles', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Assistants', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Feedbacks', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Pages', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Categories', 'is_active' => 1]);
    }
}
