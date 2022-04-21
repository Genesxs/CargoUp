<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
       $admin = Role::create([
            'id' => 1,
            'type' => User::TYPE_ADMIN,
            'name' => 'Administrator',
        ]);


        // Non Grouped Permissions
        Permission::create(['name' => 'backend.banks.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.banks.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.banks.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.banks.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.banks.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.banks.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.banks.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.documentTypes.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.documentTypes.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.documentTypes.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.documentTypes.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.documentTypes.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.documentTypes.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.documentTypes.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.genders.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.genders.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.genders.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.genders.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.genders.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.genders.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.genders.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.departments.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.departments.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.departments.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.departments.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.departments.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.departments.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.departments.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.municipalities.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.municipalities.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.municipalities.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.municipalities.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.municipalities.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.municipalities.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.municipalities.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.discounts.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.discounts.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.discounts.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.discounts.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.discounts.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.discounts.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.discounts.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.ivas.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.ivas.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.ivas.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.ivas.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.ivas.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.ivas.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.ivas.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.typeVehicles.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeVehicles.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeVehicles.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeVehicles.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeVehicles.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeVehicles.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeVehicles.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.quotas.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.quotas.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.quotas.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.quotas.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.quotas.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.quotas.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.quotas.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.vehicles.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.vehicles.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.vehicles.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.vehicles.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.vehicles.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.vehicles.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.vehicles.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.typeAccounts.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeAccounts.create'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeAccounts.store'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeAccounts.show'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeAccounts.edit'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeAccounts.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.typeAccounts.destroy'])->assignRole($admin);

        Permission::create(['name' => 'backend.guides.index'])->assignRole($admin);
        Permission::create(['name' => 'backend.guides.download'])->assignRole($admin);
        Permission::create(['name' => 'backend.guides.update'])->assignRole($admin);
        Permission::create(['name' => 'backend.guides.assing'])->assignRole($admin);
        Permission::create(['name' => 'backend.guides.search'])->assignRole($admin);
        
        //

        // Grouped permissions
        // Users category
        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.user',
            'description' => 'All User Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
                'sort' => 6,
            ])
        ]);

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
