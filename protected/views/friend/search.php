
<div id="container">
  <ul class="top-btns">
    <li><input type="button" value="Info"></li>
    <li><input type="button" value="Professional Profile"></li>
    <li><input type="button" value="Posts"></li>
    <li><input type="button" value="Photos"></li>
    <li><input type="button" value="Friends"></li>
    <li><input type="button" value="Favorites"></li>
  </ul>
  <h1 class="posts">Friends (508)</h1>
  <div class="post-left-part left-friends">
    <div id="dark">
      <form id="search" action="<?php echo $this->createAbsoluteUrl('friend/search') ?>" method="get">
        <input type="text" placeholder="search friends..." size="80" name="">
      </form>
    </div>
    <div class="search-fields">
      <h1>Search by:</h1>
    <form id="search" action="<?php echo $this->createAbsoluteUrl('friend/search') ?>" method="get">
        <label>School:</label>
        <select>
          <option>Texas A&amp;M- Kingsville</option>
          <option>Texas A&amp;M- Kingsville</option>
          <option>Texas A&amp;M- Kingsville</option>
          <option>Texas A&amp;M- Kingsville</option>
        </select>
        <label>Network:</label>
        <div class="date-select">
          <i class="net-sel">
            <select>
              <option>Corpus Christi, TX</option>
              <option>Corpus Christi, TX</option>
              <option>Corpus Christi, TX</option>
              <option>Corpus Christi, TX</option>
            </select>
          </i>
        </div>
        <div class="clr"></div>
        <label>Email:</label>
        <input type="text" name="" value="">
      </form>
    </div>
    <div class="all-frnz">All Friends (508)</div>
    <div id="jp-container" class="jp-container">
        
          <a target="_blank" href="">
            <img src="images/thumbs/1.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Diane Anderson</h3>
              <h4>Salem, Oregon</h4>
            </div>
          </a>
          <a target="_blank" href="">
            <img src="images/family-pic-4.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Jonathan Bain</h3>
              <h4>Houston, Texas</h4>
            </div>
          </a>
          <a target="_blank" href="">
            <img src="images/family-pic-2.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Mack Challis</h3>
              <h4>Palo Alto, California</h4>
            </div>
          </a>
          <a target="_blank" href="">
            <img src="images/family-pic-3.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Christine</h3>
              <h4>Boston, Massachusets</h4>
            </div>
          </a>
          <a target="_blank" href="">
            <img src="images/family-pic-5.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Justin Cash</h3>
              <h4>Salem, Oregon</h4>
            </div>
          </a>
          <a target="_blank" href="">
            <img src="images/family-pic-6.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Sunny Folmar</h3>
              <h4>Salem, Oregon</h4>
            </div>
          </a>
           
          <a target="_blank" href="">
            <img src="images/family-pic-2.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Richard Horn</h3>
              <h4>Salem, Oregon</h4>
            </div>
          </a>  
           <a target="_blank" href="">
            <img src="images/family-pic-3.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header"> 
              <h3>Dan Ingram</h3>
              <h4>Salem, Oregon</h4>
            </div>
          </a> 
           <a target="_blank" href="">
            <img src="images/family-pic-4.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>David Franke</h3>
              <h4>Harlingen, Texas</h4>
            </div>
          </a> 
           <a target="_blank" href="">
            <img src="images/family-pic-5.jpg"/>
            <div class="clear-10"></div>
            <div class="left-header">
              <h3>Kaleb Martinez</h3>
              <h4>Salem, Oregon</h4>
            </div>
          </a>   
    </div>
 </div>
 <div class="right-section">
    <div class="post-right-part-photos">
      <ul class="friends-pics">
          <?php foreach($friends as $friend) {?>
        <li><span><?php echo $friend->firstname.' '.$friend->lastname ?></span><a href="<?php echo $this->createAbsoluteUrl('friend/view',array('id'=>$friend->getId()));?>"><img src="images/thumbnail-gallery/image1.jpg"></a></li>
   <?php }  ?>
        </ul>
    </div>
     <div class="user-short-info">
      <div class="left-short-info">
        <h1>Jonathan Bain</h1>
        <h2>Houston, Texas</h2>
        <img src="images/big-img.jpg">
        <div class="message">Message</div>
      </div>
      <ul class="right-short-info">
        <h1><span class="colored-frnd-ic"></span><i><strong>(5)</strong>Mutual Friends</i></h1>
        <div class="clr"></div>
        <li>IT Director at Mesh Social Media</li>
        <li>Graduated from college of the Bahamas Nassau</li>
        <li>Born on July 15, 1989</li>
        <li>In a Relationship with <a href="">Tanasha Penn</a></li>
      </ul>
      <div class="clr"></div>
      <p>"Achieving greatness is only a couple of thoughts away. Thoughts are pathway to ideas, execution &amp; success."</p>
      <ul class="mail">
        <h1>Email</h1>
        <li>jono_bain@hotmail.com</li>
        <li>jonathanbain1@mesh.com</li>
      </ul>
      <ul class="mail m-left">
        <h1>Skype</h1>
        <li>jonobain0715</li>
      </ul>
      <ul class="mail m-left">
        <h1>Mobile</h1>
        <li>(832)245-0550</li>
      </ul>
    </div>
  </div>
  </div>