<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
        <script src="<?= Yii::$app->homeUrl; ?>js/jquery-1.11.1.min.js"></script>
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

//            echo Nav::widget([
//                'options' => ['class' => 'navbar-nav navbar-right'],
//                'items' => $menuItems,
//            ]);

            NavBar::end();
//            
            ?>

            <div class="container">
                <section class="top-section"><!--top-section-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control SearchBar search-keyword" placeholder="Search Product" name="keyword" autocomplete="off" required="" value="">
                                    <div class="search-keyword-dropdown">

                                    </div>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-defaul SearchButton" name="search_keyword-send"><span class="SearchIcon"><i class="fa fa-search" aria-hidden="true"></i></span></button>
                                    </span>
                                </div>
                            </div>



                        </div>
                    </div>
                </section>
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
<script>
    var path_ = window.location.href;
    var min_range = getUrlParameter('minrange');
    var max_range = getUrlParameter('maxrange');
    var brand_check = getUrlParameter('brand');
    var processor_check = getUrlParameter('processor');
    var touch_check = getUrlParameter('touch');
    var availability_check = getUrlParameter('availability');
    var screen_check = getUrlParameter('screen');
//    console.log(min_range);
    checkparams(brand_check);
    checkparams(processor_check);
    checkparams(touch_check);
    checkparams(availability_check);
    checkparams(screen_check);
    if (min_range != "") {
        $("#min_price").val(min_range);
    }
    if (max_range != "") {
        $("#max_price").val(max_range);
    }
    /***************************filter starts****************************/

    var brand = [];
    var min = [];
    var max = [];
    var processor = [];
    var touch = [];
    var availability = [];
    var screen = [];
    $(document).on("change", ".price-filter", function (e) {
        var min = $('.min_price').val();
        var max = $('.max_price').val();
        var min_value = paramss('minrange');
        var max_value = paramss('maxrange');

        var new_path = getpriceurl(path_, min, max, min_value, max_value);
        window.location.href = new_path;
    });
    $(document).on("change", "input.brand-checkbox", function (e) {
        var brand = [];
        $('#brand_checkboxes input:checked').each(function () {
            brand.push(this.value);
        });
        var new_path = geturl('brand', path_, brand);
        window.location.href = new_path;
    });
    $(document).on("change", "input.processor-checkbox", function (e) {
        var processor = [];
        $('#processor_checkboxes input:checked').each(function () {
            processor.push(this.value);
        });
        var new_path = geturl('processor', path_, processor);
        window.location.href = new_path;
    });
    $(document).on("change", "input.touch-checkbox", function (e) {
        var touch = [];
        $('#touch_checkboxes input:checked').each(function () {
            touch.push(this.value);
        });
        var new_path = geturl('touch', path_, touch);
        window.location.href = new_path;
    });
    $(document).on("change", "input.availability-checkbox", function (e) {
        var availability = [];
        $('#availability_checkboxes input:checked').each(function () {
            availability.push(this.value);
        });
        var new_path = geturl('availability', path_, availability);
        window.location.href = new_path;
    });
    $(document).on("change", "input.screen-checkbox", function (e) {
        var screen = [];
        $('#screen_checkboxes input:checked').each(function () {
            screen.push(this.value);
        });
        var new_path = geturl('screen', path_, screen);
        window.location.href = new_path;
    });
    /*********************search********************************/
    $('.search-keyword').on('keyup', function () {
        var val = $(this).val();
        if (val != '') {
            $.ajax({
                type: 'POST',
                data: {val: val},
                url: '<?= Yii::$app->homeUrl; ?>site/search-product',
                success: function (data) {
                    var $data = JSON.parse(data);
                    if ($data.msg === 'success') {
                        $('.search-keyword-dropdown').html('').html($data.val);
                    }
                }
            });
        } else {
            $('.search-keyword-dropdown').html('');
        }
    });
    $(document).on("click", ".search-dropdown li", function (e) {
        var id = $(this).attr('id');
        var new_path = geturl('keyword', path_, id);
        window.location.href = new_path;
    });
    /*********************searchends********************************/

    function getUrlParameter(sParam) {
        var datas = [];
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                if (sParameterName[1] !== undefined) {
                    datas.push(sParameterName[1]);
                }
            }
        }
        return datas;
    }

    function checkparams(val_) {
        if (val_ && val_ != '') {
            var paramtersplit = val_.toString().split(',');
            $.each(paramtersplit, function (index, value) {
                var newvalue = value.replace(/\s/g, '').replace(/\./g, "");
//                console.log(newvalue);
                if (document.getElementById(newvalue)) {
                    $('#' + newvalue).prop('checked', true);
                } else {
                }
            });
        }

    }

    function geturl(param, path, value) {

        if (window.location.href.indexOf("?") === -1) {
            var link = path + '?' + param + '=' + value;
        } else {
            if (window.location.href.indexOf(param) === -1) {
                var link = window.location.href + '&&' + param + '=' + value;
            } else {
                var pattern = new RegExp('\\b(' + param + '=).*?(&|#|$)');
                var link = window.location.href.replace(pattern, '$1' + value + '$2');
            }

        }
        return link;
    }
    function searchurl(param, path, value) {

        if (window.location.href.indexOf("?") === -1) {
            var link = path + '?' + param + '=' + value;
        } else {
            if (window.location.href.indexOf(param) === -1) {
                var link = window.location.href + '&&' + param + '=' + value;
            } else {
//                var pattern = new RegExp('\\b(' + param + '=).*?(&|#|$)');
//                var link = window.location.href.replace(pattern, '$1' + value + '$2');
            }

        }
        return link;
    }
    function getpriceurl(path, min, max, min_value, max_value) {

        if (window.location.href.indexOf("?") === -1) {
            var link = path + '?minrange=' + min + '&&maxrange=' + max;
        } else {
            if (window.location.href.indexOf("minrange") !== -1) {
//                                var re = new RegExp('minrange=' + min_value + '&&maxrange=' + max_value);
                var re = new RegExp('minrange=' + min_value + '&&maxrange=' + max_value);
                var location = path.replace(re, '');
//                console.log(re);
//                console.log(location);
                var link = location + 'minrange' + '=' + min + '&&maxrange=' + max;
            } else {
                var link = path + '&&minrange' + '=' + min + '&&maxrange=' + max;
            }

        }
//        console.log(link);
        return link;
    }
    function paramss(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results == null) {
            return null;
        } else {
            return decodeURI(results[1]) || 0;
        }
    }

</script>
