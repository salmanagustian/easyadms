<?php



use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('menu_permissions')->delete();
        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'menus-index',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 2,
                'name' => 'menus-create',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 3,
                'name' => 'menus-update',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 4,
                'name' => 'menus-delete',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 5,
                'name' => 'users-index',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 6,
                'name' => 'users-create',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 7,
                'name' => 'users-update',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 8,
                'name' => 'users-delete',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 9,
                'name' => 'roles-index',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 10,
                'name' => 'roles-create',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 11,
                'name' => 'roles-update',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 12,
                'name' => 'roles-delete',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 13,
                'name' => 'permissions-index',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 14,
                'name' => 'permissions-create',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 15,
                'name' => 'permissions-update',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'created_at' => NULL,
                'guard_name' => 'web',
                'id' => 16,
                'name' => 'permissions-delete',
                'updated_at' => NULL,
            )
        ));
        
        
    }
}