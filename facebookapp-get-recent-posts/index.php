<?php
// Load WordPress Environment
require_once( '/home/users/itcuties/public_html/itcuties/wp-load.php' );

$posts = get_posts('numberposts=15');
// Iterate throught the results
foreach ($posts as $post) {
   // Get post title
   $post_title = $post->post_title;
   // Get post url
   $post_url = get_permalink($post->post_ID);
   
   // Get post content
   $post_data = get_post($post->ID);
   // remove html tags from content
   $post_short_description = strip_tags($post_data->post_content);
   // Get first 150 signs as a description - we assume that post content has more than 150 signs
   $post_short_description = substr($post_short_description,0,150);	// 0 is the string start index and 150 is cut length
   // Add some dots to get some fancy look
   $post_short_description = $post_short_description . '...';
   
   echo '<div>';
   // Construct post URL
   echo '<a target="_blank" href="'.$post_url.'">'.$post_title.'</a>';
   echo '<div>';
   echo $post_short_description;
   echo '</div>';
   echo '<br/>';
   echo '</div>';
}
?>