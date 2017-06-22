<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" type="text/css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.css" type="text/css" rel="stylesheet">

	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" type="text/css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="main clearfix">


<div class="mainTop">
  
  <div class="Topmenu">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
        <?php if(is_user_logged_in()) { 

 global $current_user;
get_currentuserinfo();
		$username= $current_user->user_firstname ." ". $current_user->user_lastname ;
     ?>  
     <div style="float:right;margin-top:5px;text-transform:capitalize;"><?php echo "logged in as: ".$username; ?></div>
      <div class="headbutton"> <a  style="text-decoration:none;" href="<?php echo wp_logout_url(site_url()); ?>" class="bt btn-danger btn-lg" >Logout</a></div>
        
 		<?php } else { ?>


		 <div class="headbutton"><a href="<?php echo wp_login_url(); ?>" class="btn btn-info btn-md">Login</a> </div>
		 <div class="headbutton"><a href="<?php echo wp_registration_url(); ?>" class="btn btn-success btn-md">Register</a> </div>


 		<?php 	} ?>
</div>
</div>
<div class="row">
	<div class="col-md-12">
	        	<h2  class="text-center" style="font-family:Raleway;">Global News Feed</h2>
	</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
