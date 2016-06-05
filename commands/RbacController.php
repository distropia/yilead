<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        // add "createJamaah" permission
        $createJamaah = $auth->createPermission('create-jamaah');
        $createJamaah->description = 'Create Jamaah';
        $auth->add($createJamaah);

        // add "updateJamaah" permission
        $updateJamaah = $auth->createPermission('update-jamaah');
        $updateJamaah->description = 'Update Jamaah';
        $auth->add($updateJamaah);

        // add "author" role and give this role the "createJamaah" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createJamaah);
        
        // add "editor" role and give this role the "updateJamaah" permission
        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $updateJamaah);

        // add "admin" role and give this role the "createJamaah" permission
        // as well as the permissions of the "editor" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $editor);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($editor, 2);
        $auth->assign($admin, 1);
    }
}