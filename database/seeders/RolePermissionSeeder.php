<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-post']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'hapus-post']);
        Permission::create(['name' => 'lihat-post']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-post');
        $roleAdmin->givePermissionTo('edit-post');
        $roleAdmin->givePermissionTo('hapus-post');
        $roleAdmin->givePermissionTo('lihat-post');

        $roleUser = Role::findByName('user');
        $roleUser->givePermissionTo('tambah-post');
        $roleUser->givePermissionTo('lihat-post');
    }
}
