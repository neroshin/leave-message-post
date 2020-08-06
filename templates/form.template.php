
<?php 
global $wp , $wpdb;
  //print_r( $post_message );
?>

<?php 
	foreach( $post_message as $data ):
		
		?>
		<div id="post-message-<?=$data['id']?>">
			<div>
				<label>
					Name : 
				<label>
				<?=$data['name']?>
				
			</div>
				
			<div>
			<label>
					Email : 
				<label>
				<?=$data['email']?>
			</div>
			
			<div>
				<label>
					Message : 
				<label>
				<?=$data['message']?>
			</div>
			<div>
				<?php 
					$attachfile = json_decode($data['attachfile']);
					//print_r($attachfile);
				?>
				
				<video width="320" height="240" controls name="media"><source src="<?=$attachfile->attachfile?>" type="video/mp4"></video>

			</div>
		</div>
		
		<?php
		
	
	endforeach;
?>

<div id="content">
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>
        <label for="message">Your Message</label>
        <textarea name="message" id="message"></textarea>
        <input type="hidden" name="action" value="action_leave_message">
		 <input type="hidden" name="user_id" value="">
		  <input type="hidden" name="return_url" value="<?=home_url( $wp->request )?>">
		 <input type="hidden" name="attachfile" value="">
		 <input type="hidden" name="post_type" value="<?=get_post_type()?>">
		 <input type="hidden" name="post_id" value="<?=get_the_ID()?>">
        <button type="button" id="video_message" >Attach Video</button>
        <input type="submit" value="Send My Message">
    </form>
</div>