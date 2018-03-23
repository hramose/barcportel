<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Admin';
        $role->slug = 'admin';
        $role->description = 'admin has full control';
        $role->save();

        $role = new Role();
        $role->name = 'Student';
        $role->slug = 'student';
        $role->description = 'student';
        $role->save();
    }
}
