<div class="container">	
	<?php if(Yii::app()->user->hasFlash('success')):?>
	<div class="flashSuccess">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	 </div>
	<?php endif; ?>
	<div class="row">
		<div class="span6 pull-left" id="left-content">
			<div id="userSection">
				<h3><?php echo ucfirst($user->first_name).' '.ucfirst($user->last_name) ?></h3>
				<h4><?php echo $profile->city.', '.$profile->country ?></h4>

<!--The following 4lines can be removed, later to fix the issue with CSS only for Chrome, for clearfix. -->
<?php echo CHtml::link(CHtml::encode('Info'), 
						array('profile/createInfo'),
						array('submit'=>array('profile/createInfo'),'class'=>'btn-link')
);?>

				<div class="clearfix">
					<?php echo CHtml::image($profile->displayPicturePath,
					 $user->username,
					  array('class' => 'my-avatar pull-left'));
					?>
					<div class="user-menu pull-left">
						<?php if (Yii::app()->user->id == $user->id): ?>
						<?php echo CHtml::link(CHtml::encode('Create Info'), 
												array('profile/createInfo'),
												array('submit'=>array('profile/createInfo'),'class'=>'btn')
						);?>
						<?php else: ?>
						<?php echo CHtml::link(CHtml::encode('View Info'), 
												array('profile/viewInfo'),
												array('submit'=>array('profile/viewInfo',array('id'=>$user->id)),'class'=>'btn')
						);?>
						<?php endif; ?>

						<a href="#" class="btn">Professional Profile</a>
						<a href="#" class="btn">Photos</a>
						<a href="#" class="btn">Favorites</a>
						<a href="#" class="btn">Friends</a>
						<a href="#send-message-modal" class="btn leanModal">Send a Message</a>
					</div>
				</div>
				<div class="clearfix" id="user-action">
					<div class="link-action">
						<a href="#" class="tag-friends">tag friends</a>
						<a href="<?php echo $this->createUrl('profile/addDisplayPicture') ?>" class="add-photo">add photo</a>
					</div>

<!--The following 4lines can be removed, later to fix the issue with CSS only for Chrome, for clearfix. -->
<?php echo CHtml::link(CHtml::encode('Add Photo'), 
						array('profile/addDisplayPicture'),
						array('submit'=>array('profile/addDisplayPicture'),'class'=>'add-photo')
);?>

					<textarea rows="1" placeholder="Share your ideas" class="field-share-idea text-autosize"></textarea>
				</div>
			</div>
			<ul id="feed">
				<li>
					<div class="clearfix">
						<span class="name pull-left"><a href="#">Gabriel Alaska</a></span>
						<span class="location pull-right">Houston, Texas</span>
					</div>
					<div class="clearfix">
						<img src="img/avatar-small.jpg" class="avatar-small pull-left">
						<div class="feed-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magnamus</div>
					</div>
					<div class="feed-stats clearfix">
						<div class="pull-right">
							<a href="#" class="feed-comment pull-left">1</a>
							<a href="#" class="feed-fav pull-left">17</a>
							<a href="#" class="feed-add pull-left"></a>
						</div>
					</div>
					<form class="feed-comment-form clearfix">
						<div class="clearfix">
							<textarea placeholder="write a comment..." rows="1" class="comment-field text-autosize pull-right"></textarea>
						</div>
						<div class='form-action clearfix hide'>
							<input type="submit" class="btn pull-right" value="Send" />
						</div>
					</form>
				</li>
				<li>
					<div class="clearfix">
						<span class="name pull-left"><a href="#">Gabriel Alaska</a></span>
						<span class="location pull-right">Houston, Texas</span>
					</div>
					<div class="clearfix">
						<img src="img/avatar-small.jpg" class="avatar-small pull-left">
						<div class="feed-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magnamus</div>
					</div>
					<div class="feed-stats clearfix">
						<div class="pull-right">
							<a href="#" class="feed-comment pull-left">1</a>
							<a href="#" class="feed-fav pull-left">17</a>
							<a href="#" class="feed-add pull-left"></a>
						</div>
					</div>
					<form class="feed-comment-form clearfix">
						<div class="clearfix">
							<textarea placeholder="write a comment..." rows="1" class="comment-field text-autosize pull-right"></textarea>
						</div>
						<div class='form-action clearfix hide'>
							<input type="submit" class="btn pull-right" value="Send" />
						</div>
					</form>
				</li>
				<li>
					<div class="clearfix">
					<span class="name pull-left"><a href="#">Gabriel Alaska</a></span>
					<span class="location pull-right">Houston, Texas</span>
					</div>
					<div class="clearfix">
					<img src="img/avatar-small.jpg" class="avatar-small pull-left">
					<div class="feed-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magnamus</div>
					</div>
					<div class="feed-stats clearfix">
					<div class="pull-right">
					<a href="#" class="feed-comment pull-left">1</a>
					<a href="#" class="feed-fav pull-left">17</a>
					<a href="#" class="feed-add pull-left"></a>
					</div>
					</div>
					<form class="feed-comment-form clearfix">
					<div class="clearfix">
					<textarea placeholder="write a comment..." rows="1" class="comment-field text-autosize pull-right"></textarea>
					</div>
					<div class='form-action clearfix hide'>
					<input type="submit" class="btn pull-right" value="Send" />
					</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>