
<div id="container">
  <div class="left_section">
    <div class="info-panel">
      <div class="img-panel">
        <h1><?php echo $user->firstname.','. $user->lastname ?></h1>
        <h2><?php echo $location->location.','.$location->state ?> </h2>
        <div class="display_pic"><img src="images/display-pic.jpg" alt=""></div>
        <div class="message">Message</div>
      </div>
     <ul class="btn-wrapper">
        <li><a href="profile-info.html">Info</a></li>
       <li><a href="professional-profile-info.html">Professional Profile</a></li>
        <li><a href="">Posts</a></li>
        <li><a href="">Photos</a></li>
        <li><a href="">Friends</a></li>
        <li><a href="">Favorites</a></li>
      </ul>
    </div>
    <div class="info">
      <h1>Contact Info:</h1>
      <div class="contact-info">
        <h1>Email</h1>
        <ul class="mails">
          <li><?php echo  $contact['email']; ?></li>
          <li><?php echo  $contact['alt_email']; ?></li>
        </ul>
        <?php foreach($contact['im'] as $key=>$value){
            ?>
        <h1><?php echo $key ?></h1>
        <ul class="mails">
          <li><?php echo $value ?></li>
        </ul>
        
       <?php } 
       ?>
        
        <h1>Mobile</h1>
        <ul class="mails">
          <li><?php echo $contact['mobile'] ?></li>
        </ul>
      </div>
      <h1>Family:</h1>
      <div class="contact-info">
 <ul class="family-info">
              
  <?php  foreach ($family as $value) {
         ?>            
    <li><img src="<?php echo $value['pic_url'] ?>"><p><span><a href=""><?php echo $value['name'] ?></a></span><br><?php echo $value['rel_type'] ?></p></li>

     <?php    

         }  
         ?>
         </ul>
      </div>
    </div>
  </div>
  <div class="right_section">
    <div class="info">
      <h1>Basic Info:</h1>
      <div class="contact-info">
        <ul class="mails">
          <li>Born <?php  echo $basic_info['dob'] ?></li>
          <li>Graduated from <?php  echo $basic_info['university'] ?> </li>
          <li>Studied <?php  echo $basic_info['degree'] ?></li>
          <li>Lives in <?php  echo $basic_info['dob'] ?> </li>
          <li>In a Relationship with <a href=""><?php  echo $basic_info['relationship'] ?></a></li>
        </ul>
        
      </div>
      <h1>Mission Statement:</h1>
      <div class="contact-info">
        <p>"I will inspire those around me. I will influence the world with the most postive impact."</p>
      </div>
      <h1>Relationship Status:</h1>
      <div class="rel-status">
        <h1>Courtney Johnson</h1>
        <h2>Wichita, Kansas</h2>
        <div class="rel-pic"><img alt="" src="images/rel-status.jpg"></div>
        <ul class="rel-info">
          <li>Anniversary Date: August 17th, 2012 </li>
          <li>See <a href="">photos</a> of Courtney and Kaleb </li>
        </ul>
      </div>
    </div>
  </div>
</div>
