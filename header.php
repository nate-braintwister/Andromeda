<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-101988314-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-101988314-1');
    </script>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wptime-plugin-preloader"></div>
<script type="application/ld+json">{"@context":"http://schema.org","@type":"Blog","url":"https://endeese.com/blog"}</script><script type="application/ld+json">{"@context":"http://schema.org","@type":"Organization","name":"Endeese Creative","url":"https://endeese.com","sameAs":["https://www.facebook.com/EndeeseCreative","https://plus.google.com/108700798934163875541","https://twitter.com/endeesecreative/","https://www.yelp.com/biz/endeese-creative-woburn"]}</script>
<div id="page" class="site">
	<header id="main-header" class="site-header">
        <div class="site-branding">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'andromeda' ); ?></a>
            <?php the_custom_logo(); ?>
            <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('title'); ?></a></div>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </nav><!-- #site-navigation -->

        <button id="mobBtn">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

	</header><!-- #main-header -->
    <div class="secondary-submenu">
        <?php
        global $post;
        $post_data = get_post($post->post_parent);
        if ($post_data->post_name == 'web-marketing-services'){ ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'marketing-services',
                'menu_id'        => 'secondary-marketing',
            ) );
            ?>
        <?php }

        elseif ($post_data->post_name == 'responsive-website-design-services') { ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'website-services',
                'menu_id'        => 'secondary-website',
            ) );
            ?>
        <?php } ?>

    </div>
    <nav id="mobnav" class="mobile-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'mobile',
            'menu_id'        => 'mobile-menu',
        ) );
        ?>
    </nav><!-- #site-navigation -->
    <?php
    if(is_front_page() ) : ?>
    <div class="header-media">
        <div id="home-img">
           <?php the_header_image_tag(); ?>
        </div>
        <div class="site-description">
            <p class="media-header" data-aos="zoom-in"><?php bloginfo('description'); ?></p>
        </div>
    </div>

    <?php elseif( is_single() ) : ?>
    <div class="header-media">
        <div id="single-header-media">
            <?php the_post_thumbnail(); ?>
        </div>
            <div class="media-title">
                <div data-aos="flip-down"><small>
                        <?php
                        global $post;
                        $post_data = get_post($post->post_parent);

                        if ($post_data->post_name == 'web-marketing-services'){
                            $subheader = 'Our Web Marketing Services';
                        } elseif ($post_data->post_name == 'responsive-website-design-services') {
                            $subheader = 'Our Responsive WordPress Web Design Services';

                        }
                        else {
                            $subheader = '';
                        }

                        echo $subheader;
                        ?>
                    </small></div>

                <p class="media-header" data-aos="flip-up"><?php the_title(); ?></p>
            </div>
    </div>
    <?php endif; ?>
    <div id="content" class="site-content">
