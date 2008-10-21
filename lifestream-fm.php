<?php

/*
Plugin Name: Lifestream.fm
Plugin URI: http://robertbuzink/2008/lifestream-fm/
Description: Provides a sidebar widget for your Lifestream.fm lifestream.
Version: 1.0
Author: Robert Buzink
Author URI: http://robertbuzink.com
*/

 function widget_lifestreamfm($args) {
          extract($args);
      ?>
              <?php echo $before_widget; ?>
                  <?php echo $before_title
                      . 'Lifestream'
                      . $after_title; ?>
                 <?php echo get_option('lifestreamfm'); ?>
              <?php echo $after_widget; ?>
      <?php
      }

function lifestreamfm_options_page () {

?>

<div class="wrap">
<h2>Lifestream.fm</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Lifestream.fm code</th>
<td><textarea rows="5" cols="100" name="lifestreamfm" ><?php echo get_option('lifestreamfm'); ?></textarea></td>
</tr>
<tr>
<th scope="row">Howto</th>
<td><ol>
<li>Sign up for <a href="http://lifestream.fm" target="_blank">lifestream.fm</a>. It's free and doesn't take much time.</li>
<li>Go to <a href="http://lifestream.fm/badges" target="_blank">lifestream.fm/badges</a>, log in if you have to.</li>
<li>Change the design of your badge if you want and copy/paste the code to the box above.</li>
<li>Press Save Changes.</li>
<li>Done!</li>
</ol>
NB The last line (the div container) of the lifestream.fm code you just copied, creates a 'powered by' link to lifestream.fm. It is not required for the widget to work.</td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<!-- under value, put a comma seperated list of the options that should be saved: -->
<input type="hidden" name="page_options" value="lifestreamfm" />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>

<?php

 }

 function lifestreamfm_addpages () {
	add_options_page('Lifestream.fm', 'Lifestream.fm', 8, 'lifestreamfm', 'lifestreamfm_options_page');

 }

 function widget_lifestreamfm_init () {
 	register_sidebar_widget('Lifestream.fm',
          'widget_lifestreamfm');
 }

add_action('admin_menu', 'lifestreamfm_addpages');
add_action('widgets_init', 'widget_lifestreamfm_init');

?>