<?php
/*
 *  These arrays are for the service type loops that render service lists for
 *  Marketing and Web services on the service pages.
 */

$services = [
    'Marketing Services'    => 'marketing-services',
    'Website Services'      => 'website-services'
];
get_header(); ?>

<div class="pt-page">
    <section class="container-fluid">
        <div class="row">
            <div class="offset-md-4 col-md-8">
                <?php
                /*
                 * Renders the Yoast breadcrumb navigation at the top of the page.
                 */
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('
                    <p id="breadcrumbs">','</p>
                    ');
                }
                ?>
            </div>
            <div class="offset-md-1 col-md-3">
              <aside class="service-left">
                  <h4>What to expect from us</h4>
                  <?php the_field('what_we_did'); ?>
              </aside>
            </div>
            <section class="col-sm-12 col-md-6">
                <main id="main-content" class="page-layout">
                    <?php

                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'single' );

                    endwhile; // End of the loop.
                    ?>

                </main>

                <aside id="service-sidebar">
                   <div class="row">
                       <?php
                       /*
                        *  This code loops through each service type at the top of the page
                        *  ("marketing services" and "web services").
                        *  It then renders a "service" list block for each service type.
                        */
                       foreach ($services as $service => $id) : ?>

                           <div class="col-md-6">
                               <div class="service-menu sidebar">
                                   <header>
                                       <h4><?php echo $service; ?></h4>
                                   </header>
                                   <?php
                                   wp_nav_menu( array(
                                       'theme_location' => $id,
                                       'menu_id'        => $id,
                                       'menu_class'    => 'service-widget'
                                   ) );
                                   ?>
                               </div><!-- service-menu -->
                           </div>
                       <?php endforeach;
                       ?>
                   </div>
                </aside><!-- #service-sidebar -->
            </section>

        </div>
    </section>
    <div id="bigForm" class="big-form animated">
        <div class="close-btn">
            <button class="close-icon">
                <i class="fa fa-close"></i>
            </button>
        </div>
        <div id="quoteForm" class="quote-form">
            <?php echo do_shortcode('[ninja_form id=2]'); ?>
        </div>
    </div>
</div>



<?php get_footer(); ?>