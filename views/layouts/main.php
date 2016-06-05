<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $userRoles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
    $userRole = '';
 
    foreach ($userRoles as $role) { 
        $userRole = $role->name;
    }
    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else if ($userRole == 'author' || $userRole =='editor') {
        $menuItems = [
            ['label' => 'Jamaah', 'url' => ['/jamaah']],
            ['label' => 'Yatim', 'url' => ['#'],
                'items' => [
                    ['label' => 'Lembaga', 'url' => ['/lembaga']],
                    ['label' => 'Anak', 'url' => ['/yatim']],
                ]
            ],	        
            [   'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ];
    } else if ($userRole == 'admin' || $userRole == 'author' || $userRole =='editor') {
        $menuItems = [
            ['label' => 'Jamaah', 'url' => ['/jamaah']],
            ['label' => 'Yatim', 'url' => ['#'],
                'items' => [
                    ['label' => 'Lembaga', 'url' => ['/lembaga']],
                    ['label' => 'Anak', 'url' => ['/yatim']],
                ]
            ],
            ['label' => 'Auth', 'url' => ['#'],
                'items' => [
                    ['label' => 'Assignment', 'url' => ['/auth-assignment']],
                    ['label' => 'Item', 'url' => ['/auth-item']],
                    ['label' => 'Item Child', 'url' => ['/auth-item-child']],
                    ['label' => 'Rule', 'url' => ['/auth-rule']],
                ]
            ],	        
            [   'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ];
    }
    else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            [   'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ];
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
