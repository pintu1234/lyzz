<?php

use App\Post;

function check_user_permissions($request , $actionName = NULL, $id = NULL)
{
    //get current user
    $currentUser = $request->user();

    //get current action name
    if($actionName)
    {
        $currentActionName = $actionName;
    }
    else
    {
        $currentActionName = $request->route()->getActionName();
    }

    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionMap = [
        /*'create'=> ['store', 'create'],
        'update'=> ['edit', 'update'],
        'delete'=> ['destroy', 'restore', 'forceDelete'],
        'index'=> ['read', 'view']*/

        'crud' => ['store','create', 'edit', 'update', 'destroy','restore','forceDelete','index']

    ];

    $classMap = [
        'AdminBlog' => 'post',
        'AdminCategory'=> 'category',
        'AdminUser'=> 'user'
    ];

    foreach ($crudPermissionMap as $permission => $methods)
    {
        /*- if the current method exists in method list,
            we'll check the permission -*/
        if(in_array($method, $methods) && isset($classMap[$controller]))
        {
            $className = $classMap[$controller];

            if($className == 'post' && in_array($method, ['edit', 'update', 'restore', 'destroy', 'forceDelete']))
            {
                $id = !is_null($id)? $id : $request->route("blog");
                /*- if current user has not the permission to update and delete other posts,
                he only can modify and delete his own posts -*/
                if($id && (!$currentUser->can('update-others-post') || !$currentUser->can('delete-others-post')))
                {
                    $post = Post::withTrashed()->findOrFail($id);
                    if ($post->author_id !== $currentUser->id)
                    {
                        return false;
                    }
                }

            }
            /* If the user has not permission don't allow him to next request */
            elseif (! $currentUser->can("{$permission}-{$className}"))
            {
                return false;
            }
            break;
            /*dd("{$permission}-{$className}");*/
        }
    }

    return true;
}
