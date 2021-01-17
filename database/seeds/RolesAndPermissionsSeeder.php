<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'Super Admin']);
        $superAdmin = User::find(1);
        $superAdmin->assignRole('Super Admin');

        Role::create(['name' => 'President']);
        Role::create(['name' => 'Vice President']);
        Role::create(['name' => 'General Secretary']);
        Role::create(['name' => 'Assistant General Secretary']);
        Role::create(['name' => 'Treasurer']);

        Permission::create(['name' => 'create committee', 'group' => 'committee']);
        Permission::create(['name' => 'view committee', 'group' => 'committee']);
        Permission::create(['name' => 'update committee', 'group' => 'committee']);
        Permission::create(['name' => 'delete committee', 'group' => 'committee']);

        Permission::create(['name' => 'create flat', 'group' => 'flat']);
        Permission::create(['name' => 'view flat', 'group' => 'flat']);
        Permission::create(['name' => 'update flat', 'group' => 'flat']);
        Permission::create(['name' => 'delete flat', 'group' => 'flat']);

        Permission::create(['name' => 'create resident', 'group' => 'resident']);
        Permission::create(['name' => 'view resident', 'group' => 'resident']);
        Permission::create(['name' => 'update resident', 'group' => 'resident']);
        Permission::create(['name' => 'delete resident', 'group' => 'resident']);

        Permission::create(['name' => 'create transaction', 'group' => 'transaction']);
        Permission::create(['name' => 'view transaction', 'group' => 'transaction']);
        Permission::create(['name' => 'update transaction', 'group' => 'transaction']);
        Permission::create(['name' => 'delete transaction', 'group' => 'transaction']);

        Permission::create(['name' => 'create asset', 'group' => 'asset']);
        Permission::create(['name' => 'view asset', 'group' => 'asset']);
        Permission::create(['name' => 'update asset', 'group' => 'asset']);
        Permission::create(['name' => 'delete asset', 'group' => 'asset']);
    }
}
