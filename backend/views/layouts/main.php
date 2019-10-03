<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->

        <script src="<?= Yii::$app->homeUrl; ?>/js/jquery-1.11.1.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
        <script>
            var homeUrl = '<?= yii::$app->homeUrl; ?>';
        </script>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <div class="main">

                    <!--                    Breadcrumbs::widget([
                                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                        ])
                    -->
                    <div class="sidenav">
                        <?php  if (Yii::$app->session['post']['id'] == 1){?>
                        <button class="dropdown-btn">Admin 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Access Powers', ['/admin/admin-posts/index']) ?>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Admin Users', ['/admin/users/index']) ?>
                        </div>
                        <?php }?>
                        <?= Html::a('Products', ['/products/products']) ?>
                        <button class="dropdown-btn">Master 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Price Range', ['/master/price-range']) ?>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Brands', ['/master/brands']) ?>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Processor Type', ['/master/processor-type']) ?>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Screen Size', ['/master/screen-size']) ?>

                        </div>
                    </div>
                    <?= Alert::widget() ?>

                    <?= $content ?>
                </div>

            </div>

            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
<script>

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
