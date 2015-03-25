

<!-- =Theme option -->

<?php

class Option{

    public function __construct(){
        // require 'custom-post.php';

        add_action('admin_menu', [$this, 'template_options']);
        add_action( 'admin_init', [$this, 'register_mysettings'] );

    }

    function template_options() {
   	 $key = 'edit.php?post_type=custompost';

     add_submenu_page($key, 'Template Layout', 'Template Layout', 'manage_options', 'custompost-template', [$this, 'templateLayout']);
     add_submenu_page($key, 'Custompost Settings', 'Custompost Settings', 'manage_options', 'custompost-settings', [$this, 'templateSettings']);

    }


    function register_mysettings() {
        //register our settings
        register_setting( 'baw-settings-group', 'thumbnail_border_radius' );
        register_setting( 'baw-settings-group', 'thumbnail_width' );
        register_setting( 'baw-settings-group', 'thumbnail_height' );
        register_setting( 'baw-settings-group', 'content_header_title_color' );
        register_setting( 'baw-settings-group', 'content_header_title_background_color' );
        register_setting( 'baw-settings-group', 'content_header_font_size' );
        register_setting( 'baw-settings-group', 'content_background_color' );
        register_setting( 'baw-settings-group', 'content_color' );
        register_setting( 'baw-settings-group', 'content_font_size' );
        register_setting( 'baw-settings-group', 'tags_color' );
        register_setting( 'baw-settings-group', 'custompost_menu_name' );
        register_setting( 'baw-settings-group', 'hide_thumbnail' );
        register_setting( 'baw-settings-group', 'hide_social_link' );
        register_setting( 'baw-settings-group', 'facebook_url' );
        register_setting( 'baw-settings-group', 'twitter_url' );
        register_setting( 'baw-settings-group', 'linkedin_url' );
        register_setting( 'baw-settings-group', 'wordpress_url' );
        register_setting( 'baw-settings-group', 'pinterest_url' );
        register_setting( 'baw-settings-group', 'vimeo_url' );
        register_setting( 'baw-settings-group', 'youtube_url' );

    }

    function templateLayout() {
    ?>
    <div class="wrap" >
        <?php screen_icon('themes'); ?> <h2 class="icon-32" style="color:#1E8CBE;"><img style="width:30px;height:30px;border-radius:23px;" src="<?php echo plugins_url('images/settings.jpg', __FILE__); ?>" alt=""> Custom Post Template Layout</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'baw-settings-group' ); ?>
            <?php do_settings_sections( 'baw-settings-group' ); ?>
            <table class="form-table">

                <?php 
                    $thumbnail_border_radius = get_option('thumbnail_border_radius');
                ?>
         
                <tr valign="top">
                <th scope="row">Thumbnail Border Radius</th>
                <td><input type="number" name="thumbnail_border_radius" placeholder="Enter Thumbnail  Radius" value="<?php echo esc_attr( get_option('thumbnail_border_radius') ); ?>" />
                	<span><b>Default is 20px</b></span>
                </td>
                </tr>

                <tr valign="top">
                <th scope="row">Thumbnail Width X Height</th>
                <td>
                	<input type="number" name="thumbnail_width" placeholder="Enter Thumbnail Width" value="<?php echo esc_attr( get_option('thumbnail_width') ); ?>" />
                	<span>X</span>
                	<input type="number" name="thumbnail_height" placeholder="Enter Thumbnail Height" value="<?php echo esc_attr( get_option('thumbnail_height') ); ?>" />
                	<span><b>Default is W:200px, H:200px</b></span>

                	
                </td>
                </tr>        
                 
                <tr valign="top">
                <th scope="row">Content Header Title Color</th>
                <td><input type="text" placeholder="Enter hexa color code" name="content_header_title_color" value="<?php echo esc_attr( get_option('content_header_title_color') ); ?>" />
                	<span><b>Default is #444444</b></span>
                	</td>
                </tr>

                <tr valign="top">
                <th scope="row">Content Header Title BackgroundColor</th>
                <td><input type="text" placeholder="Enter hexa color code" name="content_header_title_background_color" value="<?php echo esc_attr( get_option('content_header_title_background_color') ); ?>" />
                	<span><b>Default is #ffffff</b></span>
                	</td>
                </tr>

                <tr valign="top">
                <th scope="row">Content Header Title FontSize</th>
                <td><input type="text" placeholder="Enter font size" name="content_header_font_size" value="<?php echo esc_attr( get_option('content_header_font_size') ); ?>" />
                	<span><b>Default is 20px</b></span>
                	</td>
                </tr>

                <tr valign="top">
                <th scope="row">Content Background Color</th>
                <td><input type="text" placeholder="Enter hexa color code" name="content_background_color" value="<?php echo esc_attr( get_option('content_background_color') ); ?>" />
                    <span><b>Default is #ffffff</b></span>
                    </td>
                </tr>


                <tr valign="top">
                <th scope="row">Content Color</th>
                <td><input type="text" placeholder="Enter hexa color code" name="content_color" value="<?php echo esc_attr( get_option('content_color') ); ?>" />
                    <span><b>Default is #555555</b></span>
                    </td>
                </tr>


                <tr valign="top">
                <th scope="row">Content Font Size</th>
                <td><input type="text" placeholder="Enter font size" name="content_font_size" value="<?php echo esc_attr( get_option('content_font_size') ); ?>" />
                    <span><b>Default is 18px</b></span>
                    </td>
                </tr>

                <tr valign="top">
                <th scope="row">Tags Color</th>
                <td><input type="text" placeholder="Enter hexa color code" name="tags_color" value="<?php echo esc_attr( get_option('tags_color') ); ?>" />
                    <span><b>Default is #2CB8E5</b></span>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>

        </form>
    </div>
    <?php 

    } 

    // End templateLayout


    function templateSettings(){
      ?>
            <div class="wrap" >
        <?php screen_icon('themes'); ?> <h2 class="icon-32" style="color:#1E8CBE;"><img style="width:30px;height:30px;border-radius:23px;" src="<?php echo plugins_url('images/www.png', __FILE__); ?>" alt=""> Custom Post Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'baw-settings-group' ); ?>
            <?php do_settings_sections( 'baw-settings-group' ); ?>
            <table class="form-table">

                <tr valign="top">
                  <th scope="row">Custom Post Menu Name</th>
                    <?php $custompost_menu_name = get_option('custompost_menu_name');?>

                    <td><input type="text" name="custompost_menu_name" placeholder="Enter your menu name" value="<?php echo esc_attr( get_option('custompost_menu_name') ); ?>" />
                        <span><i>Enter your custom menu name, default is "WPCustomPost"</i></span>
                    </td>
                </tr>

                <tr valign="top">
                  <th scope="row">Hide Thumbnail</th>
                    <?php $hide_thumbnail = get_option('hide_thumbnail');?>

                    <td><input type="checkbox" name="hide_thumbnail" <?php if($hide_thumbnail) echo 'checked'; else echo ''; ?>/>
                        <span><i>If you checked, your post content thumbnail will be hide</i></span>
                    </td>
                </tr>

                <tr valign="top">
                  <th scope="row">Hide Social Link</th>
                    <?php $hide_social_link = get_option('hide_social_link');?>

                    <td><input type="checkbox" name="hide_social_link" <?php if($hide_social_link) echo 'checked'; else echo ''; ?>/>
                        <span><i>If you checked, your post content social box link will be hide</i></span>
                    </td>
                </tr>                
         
                <tr valign="top">
                <th scope="row">Facebook URL</th>
                <td>
                    <input type="text" class="widefat" name="facebook_url" placeholder="Enter your facebook url link" value="<?php echo esc_attr( get_option('facebook_url') ); ?>" />
                </td>
                </tr>

                <tr valign="top">
                <th scope="row">Twitter URL</th>
                <td>
                    <input type="text" class="widefat" name="twitter_url" placeholder="Enter your twitter url link" value="<?php echo esc_attr( get_option('twitter_url') ); ?>" />
                </td>
                </tr>

                <tr valign="top">
                <th scope="row">Linkedin URL</th>
                <td>
                    <input type="text" class="widefat" name="linkedin_url" placeholder="Enter your linkedin url link" value="<?php echo esc_attr( get_option('linkedin_url') ); ?>" />
                </td>
                </tr>
                <tr valign="top">
                <th scope="row">WordPress URL</th>
                <td>
                    <input type="text" class="widefat" name="wordpress_url" placeholder="Enter your wordpress url link" value="<?php echo esc_attr( get_option('wordpress_url') ); ?>" />
                </td>
                </tr>
                <tr valign="top">
                <th scope="row">Pinterest URL</th>
                <td>
                    <input type="text" class="widefat" name="pinterest_url" placeholder="Enter your pinterest url link" value="<?php echo esc_attr( get_option('pinterest_url') ); ?>" />
                </td>
                </tr>
                <tr valign="top">
                <th scope="row">Vimeo URL</th>
                <td>
                    <input type="text" class="widefat" name="vimeo_url" placeholder="Enter your vimeo url link" value="<?php echo esc_attr( get_option('vimeo_url') ); ?>" />
                </td>
                </tr>   

                <tr valign="top">
                <th scope="row">Youtube URL</th>
                <td>
                    <input type="text" class="widefat" name="youtube_url" placeholder="Enter your youtube url link" value="<?php echo esc_attr( get_option('youtube_url') ); ?>" />
                </td>
                </tr>                                                                                               

            </table>

            
            <?php submit_button(); ?>

        </form>
    </div>

      <?php
    }
    // End settings page


}
// End class

$the = new Option();
?>
