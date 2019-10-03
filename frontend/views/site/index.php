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
    

</script>
