<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('roles');
        $this->truncate('permissions');
        $this->truncate('model_has_permissions');
        $this->truncate('model_has_roles');
        $this->truncate('role_has_permissions');
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $this->enableForeignKeys();
    }
}
