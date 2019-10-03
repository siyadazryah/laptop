<?php

use yii\widgets\ListView;
use yii\helpers\Html;
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont banner-title">
            <h2 class="head">Products</h2>
        </div>
    </div>
</section>
<section class="product-section"> <!--product-section-->
    <!--<div class="container">-->
    <div class="row">
        <div class="col-lg-3">
            <div class="side-menu-section">

                <div class="desktop-menu-section">
                    <div class="accordion" id="accordionExample">

                        <div class="card">
                            <div class="price filter" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                <button class="btn btn-link left-title" type="button" >
                                    Price
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse in" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <div class="card-body other-range-box">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <select id="min_price" class="form-control min_price price-filter">
                                                <option selected="selected" value="Min">Min</option>
                                                <?php
                                                if ($pricerange) {
                                                    foreach ($pricerange as $price) {
                                                        ?>
                                                        <option value="<?= $price->price ?>"><?= $price->price ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <select name="max" id="max_price" class="form-control max_price price-filter">
                                                <?php
                                                if ($pricerange) {
                                                    foreach ($pricerange as $price) {
                                                        ?>
                                                        <option value="<?= $price->price ?>"><?= $price->price ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <option selected="selected" value="Max">Max</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="brand filter" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                                <button class="btn btn-link left-title" type="button" >
                                    Brand
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse in" aria-labelledby="headingTwo"
                                 data-parent="#accordionExample">
                                <div class="card-body other-range-box">
                                    <div class="list-type">
                                        <ul>
                                            <?php foreach ($brands as $brand) { ?>
                                                <li id="brand_checkboxes">
                                                    <label class="input-style-box">
                                                        <input name="" type="checkbox" id="<?= preg_replace('/\s+/', '', $brand->name) ?>" class="brand-checkbox" value="<?= $brand->name ?>">
                                                        <span class="checkmark"></span> <?= $brand->name ?></label>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="filter" id="headingThree"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                 aria-controls="collapseThree">
                                <button class="btn btn-link left-title" type="button" >
                                    Processor Type
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse in" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body other-range-box">
                                    <div class="list-type">
                                        <ul>
                                            <?php foreach ($processors as $prcsser) { ?>
                                                <li id="processor_checkboxes">
                                                    <label class="input-style-box">
                                                        <input name="" type="checkbox" id="<?= preg_replace('/\s+/', '', $prcsser->name) ?>" class="processor-checkbox" value="<?= $prcsser->name ?>">
                                                        <span class="checkmark"></span> <?= $prcsser->name ?></label>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="filter" id="headingSix"  data-toggle="collapse" data-target="#collapseSix" aria-expanded="true"
                                 aria-controls="collapseSix">
                                <button class="btn btn-link left-title" type="button" >
                                    Screen Size
                                </button>
                            </div>
                            <div id="collapseSix" class="collapse in" aria-labelledby="headingSix"
                                 data-parent="#accordionExample">
                                <div class="card-body other-range-box">
                                    <div class="list-type">
                                        <ul>
                                            <?php foreach ($screen_size as $size) { ?>
                                                <li id="screen_checkboxes">
                                                    <label class="input-style-box">
                                                        <input name="" type="checkbox" id="<?= str_replace(array('.', ' '), '', $size->name); ?>" class="screen-checkbox" value="<?= $size->name ?>">
                                                        <span class="checkmark"></span> <?= $size->name ?></label>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="filter" id="headingFour"  data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                                 aria-controls="collapseFour">
                                <button class="btn btn-link left-title" type="button" >
                                    Touch Screen
                                </button>
                            </div>
                            <div id="collapseFour" class="collapse in" aria-labelledby="headingFour"
                                 data-parent="#accordionExample">
                                <div class="card-body other-range-box">
                                    <div class="list-type">
                                        <ul>
                                            <li id="touch_checkboxes">
                                                <label class="input-style-box">
                                                    <input name="touch[]" type="checkbox" id="yes" class="touch-checkbox" value="yes">
                                                    <span class="checkmark"></span>Yes</label>
                                            </li>
                                            <li id="touch_checkboxes">
                                                <label class="input-style-box">
                                                    <input name="touch[]" type="checkbox" id="no" class="touch-checkbox" value="no">
                                                    <span class="checkmark"></span>No</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="filter" id="headingFive"  data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
                                 aria-controls="collapseFive">
                                <button class="btn btn-link left-title" type="button" >
                                    Availability
                                </button>
                            </div>
                            <div id="collapseFive" class="collapse in" aria-labelledby="headingFive"
                                 data-parent="#accordionExample">
                                <div class="card-body other-range-box">
                                    <div class="list-type">
                                        <ul>
                                            <li id="availability_checkboxes">
                                                <label class="input-style-box">
                                                    <input name="availability" type="checkbox" id="Includeoutofstock" class="availability-checkbox" value="Include out of stock">
                                                    <span class="checkmark"></span>Include Out of Stock</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="product-list-section">

                <div class="product-list">
<!--                    <script>
                        $(document).ready(function () {
                            $(".foo").click(function () {
                                location.hash = "parameter1=123&parameter2=abc";
                            });
                            $(".foo2").click(function () {
                                location.hash = "parameter1=987&parameter2=zyx";
                            })
                        });
                    </script>
                    <button class="foo">click here</button>
                    <button class="foo2">click here 2</button>-->

                    <?php
                    echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'pager' => [
                            'firstPageLabel' => 'first',
                            'lastPageLabel' => 'last',
                            'prevPageLabel' => 'previous',
                            'nextPageLabel' => 'next',
                            'maxButtonCount' => 3,
                        ],
                        'itemView' => '_item',
                    ]);
                    ?>
                </div>
            </div>

        </div>
    </div>
    <!--</div>-->
</section>
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
//    var ip_check = getUrlParameter('ip');
//    var led_check = getUrlParameter('led');
//    var dimming_check = getUrlParameter('dimming');
//    var min_range_ = getUrlParameter('minrange');
//    var max_range_ = getUrlParameter('maxrange');
//    var min_ = $('#min_price').val();
//    var max_ = $('#max_price').val();
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
//    checkparams(ip_check);
//    checkparams(led_check);
//    checkparams(dimming_check);
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
//    $(document).on("change", "input.ip-checkbox", function (e) {
//        var ip = [];
//        $('#ip_checkboxes input:checked').each(function () {
//            ip.push(this.value);
//        });
//        var new_path = geturl('ip', path_, ip);
//        window.location.href = new_path;
//    });
//    $(document).on("change", "input.led-checkbox", function (e) {
//        var led = [];
//        $('#led_checkboxes input:checked').each(function () {
//            led.push(this.id);
//        });
//        var new_path = geturl('led', path_, led);
//        window.location.href = new_path;
//    });
//    $(document).on("change", "input.dimming-checkbox", function (e) {
//        var dimming = [];
//        $('#dimming_checkboxes input:checked').each(function () {
//            dimming.push(this.id);
//        });
//        var new_path = geturl('dimming', path_, dimming);
//        window.location.href = new_path;
//    });


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
//                if (document.getElementById(value.replace(/\s/g, ''))) {
//                    $('#' + value.replace(/\s/g, '')).prop('checked', true);
//                    console.log(newvalue);
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
