<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = date('Y-m-d H:i:s');

        DB::table('roles')->insert([
            ['name' => 'CTO', 'guard_name' => "web", 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Android Developer', 'guard_name' => "web", 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Web Developer', 'guard_name' => "web", 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'System Engineer', 'guard_name' => "web", 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Business Development', 'guard_name' => "web", 'created_at' => $date, 'updated_at' => $date],
        ]);

        ## assign permissions to roles
        $permissions = DB::table('permissions')->get();

        ## assign permissions to roles
        foreach ($permissions as $permission) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission->id,
                'role_id' => 1,
            ]);
        }

        ## assign roles to users
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 1,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 2,
            ],
        ]);
    }
}
