<?php 

add_shortcode( 'khan', 'khanFu' );

function khanFu() {
?>

<?php 
      $thumbnail_border_radius = get_option('thumbnail_border_radius');
      $thumbnail_width = get_option('thumbnail_width');
      $thumbnail_height = get_option('thumbnail_height');
      $content_header_font_size = get_option('content_header_font_size');
      $content_header_title_color = get_option('content_header_title_color');
      $content_header_title_background_color = get_option('content_header_title_background_color');
      $content_background_color = get_option('content_background_color');
      $content_color = get_option('content_color');
      $content_font_size = get_option('content_font_size');
      $tags_color = get_option('tags_color');
      // end template layout

       $custompost_menu_name = get_option('custompost_menu_name');
      $hide_thumbnail = get_option('hide_thumbnail');
      $hide_social_link = get_option('hide_social_link');
      $facebook_url = get_option('facebook_url');
      $twitter_url = get_option('twitter_url');
      $linkedin_url = get_option('linkedin_url');
      $wordpress_url = get_option('wordpress_url');
      $pinterest_url = get_option('pinterest_url');
      $vimeo_url = get_option('vimeo_url');
      $youtube_url = get_option('youtube_url');

 ?>
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Custom Post Template</title>

    <link href="<?php echo plugin_dir_url( __FILE__);?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo plugin_dir_url( __FILE__);?>css/style.css" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    .my-social ul{
        padding: 2px;
    }
    .my-social ul li a{
        margin-right:4px; 
    }
    .my-social ul li a img{
        width: 30px;

    }

    .my-social ul li{
        list-style: none;
        float: left;
    }
    .my-thumbnail .img img {
        float: left;
        width: <?= (isset($thumbnail_width)?$thumbnail_width.'px':'200px');?>;
        height: <?= (isset($thumbnail_height)?$thumbnail_height.'px':'200px');?>;
        overflow: hidden;
        border-radius: <?= (isset($thumbnail_border_radius)?$thumbnail_border_radius.'px':'20px');?>;
        margin-bottom: 10px;
    }

    .my-thumbnail .col-md-5{
      margin-bottom:30px; 
    }
    /*title*/
    .col-md-5 h3{
        background: <?= (isset($content_header_title_background_color)?$content_header_title_background_color:'#ffffff');?>;
        font-size: <?= (isset($content_header_font_size)?$content_header_font_size.'px':'20px');?>;
        width: 50%;
        color: <?= (isset($content_header_title_color)?$content_header_title_color:'#ffffff');?>;
    }
    .col-md-5 .my-content{
        background: <?= (isset($content_background_color)?$content_background_color:'#ffffff');?>;
        color: <?= (isset($content_color)?$content_color:'#555555');?>;
        font-size: <?= (isset($content_font_size)?$content_font_size.'px':'18px');?>;
    }
    .my-tag a{
        color: <?= (isset($tags_color)?$tags_color:'#2CB8E5');?>;
    }
    .my-social ul{
      /*margin-top:34px; */
    }
    </style>

</head>

<body>

 <div class="container">
    <div class="row">

                <?php
            // Start the loop.
            // query_posts('post_type=custompost&posts_per_page=3' );

                ?>
        


<?php 

  $args = array(    
    'post_type' => array(
      'custompost'
      )

 
    
  );

$query = new WP_Query( $args );

 ?>
        <div class="thumbnail col-md-8 my-thumbnail">
            <?php if($query->have_posts()):?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
            <div class="col-md-4 img">
              <?php if($hide_thumbnail == 'on'): ?>
                <?php echo ' '; ?>
              <?php else: ?>
                <?php if(has_post_thumbnail()): ?>
                   <?php the_post_thumbnail(); ?>
                <?php endif; ?>
              <?php endif; ?>

            </div>
           <div class="col-md-5"> 
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
                <div class="my-content">
                    <?php 
                      the_content();
                     ?>
                </div>
                <p class="my-tag"><?php the_tags(); ?></p>

                <div class="my-social">
                  <?php if($hide_social_link == 'on'): ?>
                    <?php echo ''; ?>
                  <?php else: ?>
                    <ul>
                        <li><a href="<?= (isset($facebook_url)?$facebook_url:'#');?>"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/fb.jpg" alt="facebook"></a></li>
                        <li><a href="<?= (isset($twitter_url)?$twitter_url:'#');?>"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/twitter.png" alt="twitter"></a></li>
                        <li><a href="<?= (isset($linkedin_url)?$linkedin_url:'#');?>"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/linkedin.png" alt="wordpress"></a></li>
                        <li><a href="<?= (isset($wordpress_url)?$wordpress_url:'#');?>"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/w.jpg" alt="linkedin"></a></li>
                        <li><a href="<?= (isset($pinterest_url)?$pinterest_url:'#');?>"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/p.png" alt="pinterest"></a></li>
                        <li><a href="<?= (isset($vimeo_url)?$vimeo_url:'#');?>"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/vimeo-icon.png" alt="fluck"></a></li>                </li>
                        <li><a href="<?= (isset($youtube_url)?$youtube_url:'#');?>"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/youtube.png" alt="fluck"></a></li>                </li>
                    </ul>
                  <?php endif; ?>

                </div>
            </div>
            <?php endwhile; ?>
             <div class="navigation">
             <!-- Previous/next page navigation. -->

               <?php 
                    the_posts_pagination( array(
                        'prev_text'          => __( 'Previous page', 'custompost' ),
                        'next_text'          => __( 'Next page', 'custompost' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'custompost' ) . ' </span>',
                    ) );
                ?>
            </div>
        <?php else: ?>
        <p><b>Sorry you've no post found, Create at first</b></p>
              <!-- End content -->
        <?php endif; ?>
        </div>

    </div>
</div>

    <!-- jQuery -->
    <script src="<?php echo plugin_dir_url( __FILE__);?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo plugin_dir_url( __FILE__);?>js/bootstrap.min.js"></script>


</body>

</html>


<?php
}

// End func()