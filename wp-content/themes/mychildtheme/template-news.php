
<?php

global $current_user;
get_currentuserinfo();
$table_name="wp_news";
$author_temp= $current_user->user_firstname ." ". $current_user->user_lastname ;
$a=preg_replace("/[\s]/", "", $author_temp);
if($a){
	$author= $author_temp;
}
else{
$author="Guest";
}
if(isset($_POST['submit'])){
	$title = $_POST['title'];
$description = $_POST['description'];

$date = date('y-m-d');

global $wpdb;
$ins = $wpdb->insert($table_name, array(
"Title" => $title,
"Description" => $description,
"Author" => $author,
"Date" =>$date
));
if($ins){

	header("Location: ".$_SERVER['PHP_SELF']);

}
}

?>


<?php
/**
 * Template Name: Front Page
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


<div class="mainContent">
<div class="container">
<div class="row">
<div class="se2">

	

<?php
 	
global $wpdb;
$sql = "SELECT * FROM wp_news ORDER BY Id DESC";
$result = $wpdb->get_results($sql);

if($result){
	?>
<ul>

    <?php foreach( $result as $results ) { ?>

<li>
		<div class="d2">
			<h5><?php echo $results->Title; ?></h5>
			<p><?php echo $results->Description; ?></p>
			<span><?php if($results->Author=="Guest"){
			echo"Posted By: Guest";
		}
		else{
			echo "Posted By: " .$results->Author. "(Logged in user)";
			} ?></span>
		</div>
	</li>

<?php }
?>
</ul>

<?php
 } else
{

?>
<div class="sorry">
<p>Sorry, No feeds Available !!</p>
</div>
<?php
}
?>
	</div>
	</div>
	</div>
	</div>




<div class="container">
<div class="row">
<div class="se2">

<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
<label style="font-family:Raleway;">News Title (min. 5 char) : </label>
<input type="text" pattern=".{5,}"  class="form-control" name="title" id="title" placeholder="Enter Title" required="required" value=""/>
</div>
<div class="form-group">
<label style="font-family:Raleway;margin-top:5px;">News Description (min. 8 char) : </label>
<input class="form-control" pattern=".{8,}"  style="margin-bottom:10px;" type="textarea" name="description" id="descripton" placeholder="Enter Description" required="required" value=""/> 
</div>
<input class="btn btn-info btn-md pull-right" style="margin:20px 20px; padding:5px;font-family:Oswald;" type="submit" name="submit" id="submit" value="Submit to NewsFeed"/>

</form>
</div>
</div>
</div>

		<?php
		// Start the loop.
		//while ( have_posts() ) : the_post();

			// Include the page content template.
			//get_template_part( 'content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			//	comments_template();
			//endif;

		// End the loop.
		//endwhile;
		?>


<?php get_footer(); ?>