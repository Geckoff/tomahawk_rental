<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php bloginfo('name'); wp_title(); ?></title>
        <link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.ico" type="image/x-icon" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,300italic' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>
        <script src="icon_customImage.js" type="text/javascript"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <?php $options = get_option('inp_contacts_options'); ?>
    <?php $pictures = get_option('inp_pictures_options'); ?>

    <body>
        <section class="header">
            <nav class="navbar navbar-default top-menu">
                <div class="container top-header">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-sm-2 hidden-xs">
                            <div class="logo">
                                <img src="<?php bloginfo('template_url') ?>/img/logo.png" alt="" />
                            </div>
                            <div class="logo-text">
                                <img src="<?php bloginfo('template_url') ?>/img/logo-text.png" alt="" />
                            </div>
                        </div>
                        <div class="left-pad-res col-lg-7 col-md-8  col-sm-10 col-xs-12">
                            <div class="left-pad-res right-pad-res col-lg-4 col-md-5 col-sm-5  col-xs-12">
                                <div class="address">
                                    <div class="address-block street">
                                        <p><?php echo $options['address'] ?></p>
                                    </div>
                                    <div class="address-block schedule">
                                        <p><span class="nowrap"><?php echo $options['schedule1'] ?></span> <span class="nowrap"><?php echo $options['schedule2'] ?></span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-5  col-xs-12 right-pad-res">
                                <div class="phone">
                                    <p>
                                        <span class="nowrap"><?php echo $options['tel1'] ?></span>
                                        <span class="nowrap"><?php echo $options['tel2'] ?></span>
                                        <!--<span class="nowrap">+375 29 <span class="bold-phone">545 27 86</span></span>
                                        <span class="nowrap">+375 29 <span class="bold-phone">545 27 86</span></span>-->
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-8 col-xs-offset-2 col-sm-offset-0 callback">
                                <button class="btn btn-default prokat-button" data-toggle="modal" data-target="#callback">Request a callback</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-top" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">
                                <img src="<?php bloginfo('template_url') ?>/img/logo.png" alt="Интпрокат" />
                                <img src="<?php bloginfo('template_url') ?>/img/logo-text2.png" alt="" />
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="right-pad-res left-pad-res collapse navbar-collapse" id="menu-top">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'header_menu',
                                'container' => '',
                                'menu_class' => 'nav navbar-nav'
                            )); ?>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </section>

        <section class="popup-callback">
            <div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="close-word">Close</span>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-times fa-stack-1x"></i>
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h2>Request a callback</h2>
                            <form id="myForm1" class="agform cb" action="" method="post">
                                <div class="form-group">
                                    <p>Your Name</p>
                                    <input type="text" name="name" class="form-control"  required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <p>Your Phone Number</p>
                                    <input type="tel" name="phone" class="form-control"  required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <p class="success-sent">Thank you!</p>
                                <button class="btn btn-default prokat-button" type="submit">Request callback</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="popup-order">
            <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="close-word">Close</span>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-times fa-stack-1x"></i>
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h2>Leave a request</h2>
                            <form id="myForm2" class="agform order" action="" method="post">
                                <div class="form-group">
                                    <p>Your Phone Name</p>
                                    <input type="text" name="name" class="form-control"  required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <p>Your Phone Number</p>
                                    <input type="tel" name="phone" class="form-control"  required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <p>Equipment needed</p>
                                    <textarea name="comment"></textarea>
                                </div>
                                <p class="success-sent">Thank you!</p>
                                <button class="btn btn-default prokat-button" type="submit">Leave request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id='discounts' class="special-offers  text-center">
            <div class="container">
                <h2 class="h2-title"><span class="title-highlight">Affordable rental</span> of contractor tools and equipment</h2>
            </div>
            <div class="container content-block">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 so-1">

                                <img src="<?php echo $pictures['file1'] ?>" alt="" />
                            </div>
                            <div class="col-xs-6 so-2">
                                <img src="<?php echo $pictures['file2'] ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 so-3">
                        <img src="<?php echo $pictures['file3'] ?>" alt="" />
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <button class="btn btn-default prokat-button" data-toggle="modal" data-target="#order">Request tools now</button>
            </div>
        </section>

        <section class="sliders">
            <div class="slider-block" id='electric'>
                <div class="container text-center">
                    <h2 class="h2-title">Best <span class="title-highlight">electric tool</span> rental in Nothern Colorado</h2>
                </div>
                <div class="container text-center">
                    <p class="section-desc"><?php echo category_description(3); ?></p>
                </div>
                <div class="container">
                    <div class="row slider-row">
                        <div class="slider-g">
                            <div class="left-crutch">
                                <div class="btn prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                            </div>
                            <div class="frame">
                                <ul class="slidee">
                                    <?php
                                        $posts = new WP_Query(array('cat' => 3, 'order' => 'ASC', 'posts_per_page' => 999));
                                        remove_filter( 'the_content', 'wpautop' );
                                    ?>
                                    <?php if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post();?>
                                    <li>
                                        <?php the_post_thumbnail();?>
                                        <div class="add-desc">
                                            <p><?php the_content(); ?> </p>
                                        </div>
                                        <div class="tog-but">
                                            <i class="fa fa-play fa-rotate-90" aria-hidden="true"></i>
                                            <div class="tool-name">
                                                <p><?php the_title(); ?> </p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <?php endif; ?>


                                </ul>
                            </div>
                            <div class="right-crutch">
                                <div class="btn next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                            </div>

                        </div>
                        <div class="scrollbar-circle left-scrollbar-circle"></div>
                        <div class="scrollbar">
                            <div class="handle">
                                <!--<div class="mousearea"></div>-->
                            </div>
                        </div>
                        <div class="scrollbar-circle right-scrollbar-circle"></div>
                        <div class="control-center">


                        </div>
                    </div>

                </div>
            </div>

            <div class="slider-block"  id='gas'>
                <div class="container text-center">
                    <h2 class="h2-title">Most reliable <span class="title-highlight">gas tools</span> in Nothern Colorado</h2>
                </div>
                <div class="container text-center">
                    <p class="section-desc"><?php echo category_description(4); ?></p>
                </div>
                <div class="container">
                    <div class="row slider-row">
                        <div class="slider-g">
                            <div class="left-crutch">
                                <div class="btn prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                            </div>
                            <div class="frame">
                                <ul class="slidee">
                                    <?php
                                        $posts = new WP_Query(array('cat' => 4, 'order' => 'ASC', 'posts_per_page' => 999));
                                        remove_filter( 'the_content', 'wpautop' );
                                    ?>
                                    <?php if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post();?>
                                    <li>
                                        <?php the_post_thumbnail();?>
                                        <div class="add-desc">
                                            <p><?php the_content(); ?> </p>
                                        </div>
                                        <div class="tog-but">
                                            <i class="fa fa-play fa-rotate-90" aria-hidden="true"></i>
                                            <div class="tool-name">
                                                <p><?php the_title(); ?> </p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="right-crutch">
                                <div class="btn next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                            </div>

                        </div>
                        <div class="scrollbar-circle left-scrollbar-circle"></div>
                        <div class="scrollbar">
                            <div class="handle">
                                <!--<div class="mousearea"></div>-->
                            </div>
                        </div>
                        <div class="scrollbar-circle right-scrollbar-circle"></div>
                        <div class="control-center">


                        </div>
                    </div>

                </div>
            </div>

            <div class="slider-block"  id='constr'>
                <div class="container text-center">
                    <h2 class="h2-title">Highest quality <span class="title-highlight">heavy equipment</span> rental in Nothern Colorado</h2>
                </div>
                <div class="container text-center">
                    <p class="section-desc"><?php echo category_description(5); ?></p>
                </div>
                <div class="container">
                    <div class="row slider-row">
                        <div class="slider-g">
                            <div class="left-crutch">
                                <div class="btn prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                            </div>
                            <div class="frame">
                                <ul class="slidee">
                                    <?php
                                        $posts = new WP_Query(array('cat' => 5, 'order' => 'ASC', 'posts_per_page' => 999));
                                        remove_filter( 'the_content', 'wpautop' );
                                    ?>
                                    <?php if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post();?>
                                    <li>
                                        <?php the_post_thumbnail();?>
                                        <div class="add-desc">
                                            <p><?php the_content(); ?> </p>
                                        </div>
                                        <div class="tog-but">
                                            <i class="fa fa-play fa-rotate-90" aria-hidden="true"></i>
                                            <div class="tool-name">
                                                <p><?php the_title(); ?> </p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="right-crutch">
                                <div class="btn next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                            </div>

                        </div>
                        <div class="scrollbar-circle left-scrollbar-circle"></div>
                        <div class="scrollbar">
                            <div class="handle">
                                <!--<div class="mousearea"></div>-->
                            </div>
                        </div>
                        <div class="scrollbar-circle right-scrollbar-circle"></div>
                        <div class="control-center">


                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="advantages  text-center">
            <div class="container">
                 <h2 class="h2-title">Why <span class="title-highlight">2180 customers</span> chose us?</h2>
            </div>
            <div class="container content-block">
                <div class="row">
                    <div class="adv-block col-md-3 col-xs-6">
                        <img src="<?php bloginfo('template_url') ?>/img/adv1.jpg" alt="" />
                        <p>We only carry the most dependable highest quality tools</p>
                    </div>
                    <div class="adv-block col-md-3 col-xs-6">
                        <img src="<?php bloginfo('template_url') ?>/img/adv3.jpg" alt="" />
                        <p>A wide range of equipment and tools for the lowest rates</p>
                    </div>
                    <div class="adv-block col-md-3 col-xs-6">
                        <img src="<?php bloginfo('template_url') ?>/img/adv4.jpg" alt="" />
                        <p>30% discount for 15 or more hand tools at a time</p>
                    </div>
                    <div class="adv-block col-md-3 col-xs-6">
                        <img src="<?php bloginfo('template_url') ?>/img/adv5.jpg" alt="" />
                        <p>Open 7 days a week for your convenience</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="about"  id='about'>
            <div class="container content-block">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php bloginfo('template_url') ?>/img/kiosk.jpg" alt="" />
                    </div>
                    <div class="col-md-8 about-text">
                        <?php add_filter( 'the_content', 'wpautop' );  ?>
                        <?php $posts = new WP_Query(array('page_id' => 79)); ?>
                        <?php if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post();?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>

                        <?php else: ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="callback-main text-center"  id='contacts'>
            <div class="container content-block">
                <div class="container">
                     <h2 class="h2-title">Questions?</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5"></div>
                        <div class="col-xs-2 white-bg"></div>
                        <div class="col-xs-5"></div>
                    </div>
                    <p>Leave your number for a prompt call back</p>
                    <div class="cb-main-form">
                        <form class='agform cb' action="" method="post">
                            <input type="text" name="phone" id='num-ent' class="prokat-button" placeholder="(___) ___-____"/>
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            <button class="btn btn-default prokat-button" type="submit" >Request a callback</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="map text-center">
            <div class="map-title">
                <h2 class="h2-title">Find Us</h2>
            </div>

            <div id="map">

            </div>
        </section>

        <section class="footer">
            <div class="container">
                <div class="col-md-3 col-xs-6 footer-block">
                    <div class="address-block street">
                        <p><?php echo $options['address'] ?></p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 footer-block">
                    <div class="address-block schedule">
                        <p><span class="nowrap"><?php echo $options['schedule1'] ?></span> <span class="nowrap"><?php echo $options['schedule2'] ?></span> </p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 footer-block">
                    <div class="phone">
                        <p>
                            <span class="nowrap"><?php echo $options['tel1'] ?></span>
                            <span class="nowrap"><?php echo $options['tel2'] ?></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 footer-block">
                    <div class="but-foot">
                    <button class="btn btn-default prokat-button" data-toggle="modal" data-target="#callback">Request a callback</button>
                    </div>
                </div>
            </div>
        </section>
        <?php wp_footer(); ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!--<script src="js/bootstrap.min.js"></script>
        <script src="js/validator.min.js"></script>-->

    </body>
</html>