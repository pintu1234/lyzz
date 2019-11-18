<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        //crud posts
        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        //updateOthersPosts
        $updateOthersPost = new Permission();
        $updateOthersPost->name ='update-others-post';
        $updateOthersPost->save();

        //deleteOthersPosts
        $deleteOthersPost = new Permission();
        $deleteOthersPost->name ='delete-others-post';
        $deleteOthersPost->save();

        //crud category
        $crudCategory = new Permission();
        $crudCategory->name ='crud-category';
        $crudCategory->save();

        //crud users
        $crudUser = new Permission();
        $crudUser->name ='crud-user';
        $crudUser->save();

        //attach role user
        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser ]);
        $admin->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser ]);

        $editor->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
        $editor->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);

        $author->detachPermission($crudPost);
        $author->attachPermission($crudPost);
    }
}
