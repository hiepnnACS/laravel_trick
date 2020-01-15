<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createTasks = new Permission();
        $createTasks->slug = 'create-tasks';
        $createTasks->name = 'Create Tasks';
        $createTasks->save();


        $createTasks = new Permission();
        $createTasks->slug = 'delete-tasks';
        $createTasks->name = 'Delete Tasks';
        $createTasks->save();

        $createTasks = new Permission();
        $createTasks->slug = 'view-user';
        $createTasks->name = 'View User';
        $createTasks->save();

    }
}
