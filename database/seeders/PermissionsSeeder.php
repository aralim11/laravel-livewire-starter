<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ## get permissions from config file
        $permissions = config('static_data.permissions');

        ## loop through the permissions
        foreach ($permissions as $key => $modules) {
            $moduleId = Module::create([
                'name' => $key,
                'label' => $modules['label']
            ]);

            if ($moduleId) {
                foreach ($modules['list'] as $permission) {
                    Permission::Create([
                        'name' => $permission['name'],
                        'module_id' => $moduleId->id,
                    ]);
                }
            }
        }
    }
}
