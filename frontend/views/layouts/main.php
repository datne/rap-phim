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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="wrapper">

        <div class="navbar" role="navigation">
            <div class="heading">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="search">
                                <a href="#">
                                    <i class="material-icons">search</i>
                                </a>
                            </div>
                            <div class="tel">
                                <a href="tel:03301234567">
                                    <i class="material-icons">phone in talk</i> 0330 123 4567
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="navbar-header">
                    <a href="index-2.html" class="logo" title="Craft beer landing page">
                        <img src="images/logo.svg" alt="Craft Beer HTML Template">
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul id="menu-primary" class="nav navbar-nav">
                        <li class="active">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a href="whats-on.html">What's on</a>
                        </li>
                        <li>
                            <a href="shortcodes.html">Shortcodes</a>
                        </li>
                        <li class="dropdown">
                            <a href="news.html">News</a>
                            <ul class="dropdown-menu">
                                <li><a href="news-single.html">News single</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php
    // NavBar::begin([
    //     'brandLabel' => Yii::$app->name,
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-inverse navbar-fixed-top',
    //     ],
    // ]);
    // $menuItems = [
    //     ['label' => 'Home', 'url' => ['/site/index']],
    //     ['label' => 'About', 'url' => ['/site/about']],
    //     ['label' => 'Contact', 'url' => ['/site/contact']],
    // ];
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    // } else {
    //     $menuItems[] = '<li>'
    //         . Html::beginForm(['/site/logout'], 'post')
    //         . Html::submitButton(
    //             'Logout (' . Yii::$app->user->identity->username . ')',
    //             ['class' => 'btn btn-link logout']
    //         )
    //         . Html::endForm()
    //         . '</li>';
    // }
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => $menuItems,
    // ]);
    // NavBar::end();
        ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>Get in touch</h6>
                        <ul>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Give us feedback</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h6>About Movie star</h6>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Find us</a></li>
                            <li><a href="#">Schedule</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h6>Legal stuff</h6>
                        <ul>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Cookie policy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h6>Connect with us</h6>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i> Google +</a></li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <p>2017 &copy; Movie Star / <a href="https://www.klevermedia.co.uk/">Web design by Klever media</a></p>
                </div>
            </div>
        </footer>   
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
