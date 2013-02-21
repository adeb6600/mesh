<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- blueprint CSS framework -->
        <link rel="stylesheet/less" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/less/bootstrap.less">
        <link rel="stylesheet/less" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jcarousel.css">
        <!-- <link rel="stylesheet/less" type="text/css" href="css/notification_light.css"> -->
        <link rel="stylesheet/less" type="text/css" href="/<?php echo Yii::app()->request->baseUrl; ?>css/main.css">
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/vendor/bootstrap.min.js', CClientScript::POS_HEAD); ?>
 
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/vendor/less-1.3.1.min.js', CClientScript::POS_HEAD); ?>
     <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', CClientScript::POS_HEAD); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/vendor/jquery.autosize.js', CClientScript::POS_END); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/vendor/jquery.jcarousel.min.js', CClientScript::POS_END); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/vendor/jquery.leanModal.min.js', CClientScript::POS_END); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/vendor/ttw-notification-center-min.js', CClientScript::POS_END); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/main.js', CClientScript::POS_HEAD); ?>
 
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
        <header>
            <div class="clearfix">
                <h1 class="pull-left"><a href="#" class="brand">Logo</a></h1>
                <div id="headerLocationInfo" class="pull-right">
                    Corpus Christi, TX<br>
                    UNITED STATES<br>
                    <strong>70&deg;</strong>
                </div>
                <div class="container">
                    <div class="leaderboard">
                        <img src="img/header.jpg" width="830" height="90">
                    </div>
                </div>
            </div>
            <div class="navbar" id="main-navigation">
                <div class="navbar-inner">
                    <h2 class="brand">
<img src='<?php echo Yii::app()->request->baseUrl.'/images/mesh-small.png'?>'/>
                    </h2>
                    <div class="container">
                        <ul class="nav pull-left no-left-divider">
                            <li id="home-notify" class="notification-menu-item"><a href="#home" class="home"><!-- <sup>7</sup> -->Home</a></li>
                            <li id="message-notify" class="notification-menu-item"><a href="#messages" class="message"><!-- <sup>12</sup> -->Messages</a></li>
                        </ul>
                        <div class="pull-right">
                            <form class="search-form pull-left">
                                <input type="text" placeholder="Search People, Images, Places etc">
                            </form>
                            <ul class="nav pull-right">
                                <li class="dropdown" data-toggle="hover-dropdown">
                                    <a href="#location" class="dropdown-toggle location ">Location</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form class="location-search-form">
                                                <input type="text" placeholder="Search Network">
                                            </form>
                                        </li>
                                        <li><h4><a href="#">Corpus Cristi</a></h4></li>
                                        <li><a href="#">Rio Grande Valley</a></li>
                                        <li><a href="#">San Antonio</a></li>
                                        <li><a href="#">San Marcos</a></li>
                                        <li><a href="#">Houston</a></li>
                                        <li><a href="#">Austin</a></li>
                                        <li><a href="#">Dallas</a></li>
                                        <li><a href="#">Lubbock</a></li>
                                        <li><a href="#">Amarillo</a></li>
                                        <li><a href="#">Nacadoches</a></li>
                                        <li><a href="#">El Paso</a></li>
                                        <li><a href="#">College Station</a></li>
                                        <li><h5><a href="#">See more states</a></h5></li>
                                    </ul>
                                </li>
                                <li class="dropdown" data-toggle="hover-dropdown">
                                    <a href="#about" class="dropdown-toggle favorite">Favorites</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Website</a></li>
                                        <li><a href="#">Google</a></li>
                                        <li><a href="#">Technewsworld</a></li>
                                        <li><a href="#">Forbes</a></li>
                                        <li><a href="#">Yahoo</a></li>
                                        <li><a href="#">GoPro</a></li>
                                        <li><a href="#">Blackboard</a></li>
                                        <li><a href="#">Pictures</a></li>
                                        <li><a href="#">Dropbox</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="nav pull-right no-left-divider" id="userMenu">
                        <li class="dropdown username" data-toggle="hover-dropdown">
                            <a href="#" class="dropdown-toggle">
                                <img src="img/avatar-small.jpg" class="menu-avatar">
                                <?php echo Yii::app()->user->name ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">settings</a></li>
                                <li><a href="#">edit profile</a></li>
                                <li><?php echo CHtml::link('Change Password', Yii::app()->createUrl('/profile/changePassword')); ?></li>
                                <li><?php echo CHtml::link('Log Out('.Yii::app()->user->name.')', Yii::app()->createUrl('/site/logout')); ?></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
  <?php echo $content?>
    </body>
    </html>