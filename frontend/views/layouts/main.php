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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/logo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=vietnamese" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- header -->
<div class="wrapper wrapper-header" id="wrapper-header">
    <div id="topmenu">
        <div class="container">
            <ul>
                <li><a href="#">Đăng ký</a></li>
                <li><a href="#">Đăng nhập</a></li>
            </ul>
        </div>            
    </div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="row">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand page-scroll">
                        <img src="<?php Yii::$app->urlManager->baseUrl ?>/images/logo.png" alt="Curmin Lead">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <a href="tel:0968567988" class="btn-primary-yellow">HOTLINE: 0968567988</a>
                    <ul class="nav navbar-nav navbar-right">
                            <li class=>
                                <a class="page-scroll" href="<?php echo Yii::$app->urlManager->baseUrl ?>/site/thong-tin-san-pham">Curmin Lead</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo Yii::$app->urlManager->baseUrl ?>/site/novasol-curcumin">Novasol Curcumin</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo Yii::$app->urlManager->baseUrl ?>/tin-y-khoa">Tin y khoa</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo Yii::$app->urlManager->baseUrl ?>/hoi-dap">Hỏi đáp</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo Yii::$app->urlManager->baseUrl ?>/site/lien-he">Liên hệ</a>
                            </li>
                        </ul>
                </div>
            </div>
            
        </div>
        <!-- /.container -->
    </nav>
</div>
<!-- /header -->
        <?= $content ?>

<footer id="footer">
    <div class="container">
        <div class="footer_abover">
            <h2>Nhà cung cấp</h2>
            <ul class="diachi">
                <li>
                    <i class="fa fa-home"></i>
                    <div class="content_diachi">
                        <h3>Dược Quốc Gia</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur,Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </li>
                <li>
                    <div class="content_diachi">
                        <h3>Dược Nam Sơn</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur,Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </li>
                <li>
                    <div class="content_diachi">
                        <h3>Dược Nam Sơn</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur,Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="lienhe">
                <li><i class="fa fa-phone" aria-hidden="true"></i><p>Điện thoại: 04-847502048593</p></li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i><p> <a href="mailto:Email: curminlead@gmail.com">Email: curminlead@gmail.com</a></p></li>
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="copyright">
            COPYRIGHT © 2002 - 2017 ECPVIETNAM. ALL RIGHTS RESEVERED. PHONE: 04. 62602736. EMAIL: ECP@ECPVN.COM
        </div>
    </div>
    
</footer>
<a href="tel:0968567988" class="btn-primary-yellow visible-xs">HOTLINE: 0968567988</a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
