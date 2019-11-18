<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        // create admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "admin";
        $admin->save();

        // create editor role
        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "editor";
        $editor->save();

        // create editor role
        $author = new Role();
        $author->name = "author";
        $author->display_name = "author";
        $author->save();

        //attach the role

        //attach admin role
        $user1 = User::find(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        //attach admin role
        $user2 = User::find(2);
        $user2->detachRole($editor);
        $user2->attachRole($editor);

        //attach author role
        $user3 = User::find(3);
        $user3->detachRole($author);
        $user3->attachRole($author);
    }
}
