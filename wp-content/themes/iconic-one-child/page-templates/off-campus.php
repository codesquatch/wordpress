<?php
/**
 * Template Name: Off-Campus Housing
 *
 * Display custom posts for Off-Campus Housing.
 */

//Grab the Header
get_header(); ?>

    <div id="container">
        <div id="off-campus" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
			
        <!-- ADD CUSTOM OFF-CAMPUS-POSTS -->
            
            <?php 
       
                $args = array (
                     'category_name' => 'off-campus-housing',
                     'post_status' => 'publish',
                     'paged' => $paged,
                     'posts_per_page' => 5,
                     'ignore_sticky_posts'=> 1
                 );
                 
                $wp_query = null;
                $wp_query = new WP_Query($args); 
                
                if ( $wp_query->have_posts() ) :
                    while ( $wp_query->have_posts() ) : $wp_query->the_post();
                        echo '<h2 class="off-campus-header">'; 
                            the_title();
                            echo '<p class="off-campus-category">';
			    echo the_category(' '); 
			    echo '</p>';
                        echo '</h2>';
                        
                        echo '<div class="off-campus-posts">';
                        the_content();
                        echo '</div>';
                    endwhile;
                else :
                    echo '<h2>Not Found</h2>';
                endif;

                ?>
        </div><!-- END #content -->

  <!-- CREATE #sidebar -->
    <div id="sidebar">
    
     <!-- CREATE Dropdown to access Off-Campus Archives -->
    <div class="off-campus-archive">
        <h2 class="off-campus-header">Archives by Month:</h2>
           
            
            <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
  <?php wp_get_archives( array ('type' => 'monthly', 'parent' => '34', 'format' => 'option') ); ?>
</select>
        </div>
   
     <!-- CREATE Dropdown for Rental Post Search based on Category -->
        <div class="off-campus-rental-search">
            <form action="<?php bloginfo('url'); ?>" method="get">
                <h2 class="off-campus-header"><?php _e('Rental Search'); ?></h2>
            
                <?php wp_dropdown_categories('parent=34'); ?>
                
                <input type="submit" name="submit" class="btn btn-primary" value="view"/>
            
            </form>
        </div>

<?php
/* PHP Code for Off-Campus Contact Form */

		$to	 = "psweeney87@gmail.com";
$subject = "Off-Campus Rental Submission";
		$message = "Inquirer: " . $_POST['firstName'] . " " . $_POST['lastName'] . "\r\n\r\n" . $_POST['comment'];
		$headers = "From: " . $_POST['emailFrom'];

			// Require all information and notify if not entered (on submit) */
			if ($_POST['submit']){
			
				// check first name field
				if (!$_POST['firstName']){
				
					$error = "<br />Please enter your first name";
				
				}
				
				// check last name field
				if (!$_POST['lastName']){
				
					$error .= "<br />Please enter your last name";
				
				}
				
				// check if E-mail field has text and
				if (!$_POST['emailFrom']){
				
					$error .= "<br />Please enter a valid e-mail address";
				
				}
				
				// is it a valid e-mail
				if ($_POST['emailFrom'] != "" AND !filter_var($_POST['emailFrom'], FILTER_VALIDATE_EMAIL )){
				
					$error .= "<br />Please enter a valid e-mail address";
				
				}
				
				// check for contact number
				if (!$_POST['phoneNumber']){
				
					$error .= "<br />Please enter your contact number";
				
				}
				
				// did they leave a comment?
				if (!$_POST['comment']){
				
					$error .= "<br />Please enter your rental information";
				
				}
				
				// if any field does not have required text, display error
				if ($error){
				
					$result = '<div class="alert alert-danger"><strong>The following information is missing: </strong>' . $error . "</div>";
				
				}
				
				// They followed the rules, so let the e-mail go
				else{
				
					if (wp_mail($to, $subject, $message, $headers) == TRUE){
					
					$result = '<div class="alert alert-success">Yippee, you got it!</div>';
					}
				}	
			} // End Submittion Code */
?>

<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
  Submit a Rental
</button>

<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog">
	
		<div class="modal-content">
		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Off-Campus Rental Submission Form</h4>
			</div>
			
			<div class="modal-body">

					<form method="post" class="form-horizontal">
						
						<?php echo $result; ?>	
							
							<div class="form-group">
							<label class="col-sm-3 control-label"  for="firstName" >First Name:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="firstName" required="yes" value=<?php echo $_POST['firstName'] ?> >
							</div>
							</div>		

							<div class="form-group">
							<label class="col-sm-3 control-label"  for="lastName" >Last Name:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="lastName" required="yes" value=<?php echo $_POST['lastName'] ?> >
							</div>
							</div>		

							<div class="form-group">
							<label class="col-sm-3 control-label" for="emailFrom">E-mail Address: </label>
							<div class="col-sm-9">
							<input class="form-control" type="email" name="emailFrom" required="yes" value=<?php echo $_POST['emailFrom'] ?> >
							</div>
							</div>
		
							<div class="form-group">
							<label class="col-sm-3 control-label" for="phoneNumber">Contact Number: </label>
							<div class="col-sm-9">
							<input class="form-control" type="phone" name="phoneNumber" required="yes" value=<?php echo $_POST['phoneNumber'] ?> >
							</div>
							</div>
				
							<div class="form-group">
							<label class="col-sm-3 control-label" for="emailBody">Rental Details: </label>	
							<div class="col-sm-9">
							<textarea class="form-control" rows="3" name="comment" required="yes" ><?php echo $_POST['comment'] ?></textarea>
							</div>	
							</div>
					
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button class="btn btn-success" type="submit" name="submit">Submit</button>
		
		</form>	
			</div> <!-- end .modal-body -->
			
			
    </div> <!-- end .modal-content -->
    </div> <!-- end .modal-dialog -->
</div> <!-- .modal -->

</div><!-- end sidebar -->
    </div><!-- #container -->

<?php get_footer(); ?>