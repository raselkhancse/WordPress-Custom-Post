

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portfolio Template</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="<?php echo plugin_dir_url( __FILE__);?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo plugin_dir_url( __FILE__);?>css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    .my-social ul{
        padding: 2px;
        /*background: red;*/
    }
    .my-social ul li a{
        /*list-style: none;*/
        margin-right:4px; 
    }
    .my-social ul li a img{
        width: 30px;


    }

     .my-social ul li{
        list-style: none;
        float: left;
        /*width: 100px;*/
    }
    .my-thumbnail .img > img {
        float: left;
        width: 200px;
        height: 200px;
        overflow: hidden;
    }
    </style>

</head>

<body>
 <div class="container">
<div class="row">

            <?php
        // Start the loop.
        query_posts('post_type=custompost' );

            ?>
    <div class="thumbnail col-md-8 my-thumbnail">
        <div class="col-md-4 img">
            <img src="<?php echo plugin_dir_url(__FILE__); ?>images/port.jpg" alt="">
        </div>
        <?php 
         while ( have_posts() ) : the_post();

         ?>
       <div class="col-md-5"> 
            <h3>Thumbnail label</h3>
            <p>
                <?php the_content(); ?>
            </p>
            <p><?php the_tags(); ?></p>

            <div class="my-social">
                <ul>
                    <li><a href="#"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/fb.jpg" alt="facebook"></a></li>
                    <li><a href="#"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/twitter.png" alt="twitter"></a></li>
                    <li><a href="#"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/linkedin.png" alt="wordpress"></a></li>
                    <li><a href="#"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/w.jpg" alt="linkedin"></a></li>
                    <li><a href="#"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/p.png" alt="pinterest"></a></li>
                    <li><a href="#"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/vimeo-icon.png" alt="fluck"></a></li>                </li>
                    <li><a href="#"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/youtube.png" alt="fluck"></a></li>                </li>
                </ul>

            </div>
        </div>
    <?php endwhile; ?>
          <!-- End content -->
    </div>
</div>
        </div>

    <!-- jQuery -->
    <script src="<?php echo plugin_dir_url( __FILE__);?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo plugin_dir_url( __FILE__);?>js/bootstrap.min.js"></script>


</body>

</html>
