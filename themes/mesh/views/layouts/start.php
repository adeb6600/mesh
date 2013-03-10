<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mesh</title>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/css/main-style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="getting_started_header">
	<div class="logo">
    	<img src="images/getting-started_logo.png" />
    </div>
    <section id="qcTopbar"> 
    <!-- ## TOP CONTENT ## -->
    <div class="qcPadder" id="qcTopContent" style="display: none;">
      <div class="qcContainer clearfix" id="qcTopContentInset"> 
        <!-- ## MAP ## -->
        <div class="qcContactMap">
          <iframe scrolling="no" frameborder="0" src="http://maps.google.com/?ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=72.343846,114.433594&amp;t=h&amp;z=4&amp;vpsrc=1&amp;output=embed" marginwidth="0" marginheight="0"></iframe>
        </div>
        <!-- ## MAP END ## --> 
      </div>
    </div>
    <!-- ## TOP LINKS ## -->
    <div id="qcTopLinks">
      <div class="qcContainer">
        <nav id="qcTopNav">
          <ul class="clearfix">
            <li id="qcClock"><strong>Monday,</strong> 4 Feb - <span class="time">5 : 22 : 14</span> <span class="format">PM</span></li>
            <li class="qcContactBox"><a href="#">Change Location</a></li>
            <li class="qcContactBox1"><a href="#">Where you want to go</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </section>
<div class="connect_with_people_box">
  <div class="connect_with_people">
  	<h2>Connect with people</h2>
    <p>Connect and share your vision with family friends co-workers classmates and get in touch with people all over the world. </p>
  </div>
  <div class="connect_with_people1">
  	<h2>Capture your life </h2>
    <p>Meshness changes the way you share your life with others. Capturing the best things in life and placing them in categories for the world to see. </p>
  </div>
  <div class="connect_with_people1">
  	<h2>Travel the world   </h2>
    <p>Explore the world through the eye of another from across the globe. Enjoy localized photos and learn more about the people places and hidden treasures within this beautiful earth.  </p>
  </div>
</div>
<div class="nav">
	<ul>
    	<li class="box01"><a href="<?php echo $this->createAbsoluteUrl('start/index') ?>">Getting Started</a></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/getting-startedli_bg.png" /><a href="<?php echo $this->createAbsoluteUrl('start/index') ?>" class="active">1.  Profile Picture</a></li>
        <li><img src="images/getting-startedli_bg.png" /><a href="#">2.  Basic Info</a></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/getting-startedli_bg.png" /><a href="<?php echo $this->createAbsoluteUrl('start/personalprofile') ?>">3.  About Me</a></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/getting-startedli_bg.png" /><a href="<?php echo $this->createAbsoluteUrl('start/professionalprofile') ?>">4.  Professional</a></li>
        <input type="text" placeholder="Enter Email Verification" />
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/right_icon.png" />
    </ul>
</div>
<?php echo $content;?>
<div id="getting_started_wrap">
<p style="margin:0px auto; text-align:center; position:relative; top:1000px;">mesh | privacy | terms and conditions</p>
</div>
</div>
</body>
</html>