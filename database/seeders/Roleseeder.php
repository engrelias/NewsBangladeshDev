<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [

               [ 
                    'role_title' => 'Admin',
                    'role_description' => 'all access',
                    'role_order' => 1,
                    'role_status' => 1, 
                    'role_permissions' => json_encode(['create', 'read', 'update', 'delete']),
                    'role_created_by' => 1,
                    'role_updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'role_title' => 'Editor',
                    'role_description' => 'edit access',
                    'role_order' => 2,
                    'role_status' => 1,
                    'role_permissions' => json_encode(['create', 'read', 'update']),
                    'role_created_by' => 1,
                    'role_updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
                [ 
                    'role_title' => 'Reporter',
                    'role_description' => 'report access',
                    'role_order' => 3,
                    'role_status' => 1,
                    'role_permissions' => json_encode(['read','create']),
                    'role_created_by' => 1,
                    'role_updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]

            ] ;

                foreach ($role as $data) {
                    \App\Models\Role::create($data);
                }
            

            }

    }

