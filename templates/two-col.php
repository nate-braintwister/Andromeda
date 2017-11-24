<?php
// Template Name: Two Columns
get_header(); ?>

    <section class="container">
        <div class="row">
            <div class="col-sm-8 ml-auto mr-auto">
                <?php
                the_title('<h1>', '</h1>');
                if( have_posts() ) :

                    while( have_posts() ) : the_post();
                        the_content();
                    endwhile;

                endif;
                ?>
            </div>
        </div>
    </section><!-- .container -->

    <section class="container-fluid">
        <div class="row">
            <?php

            $args = array(
                'posts_per_page'            => '2',
                'post_type'                 => 'page',
                'pagename'                  => 'packages'
            );

            $the_query = new WP_Query( $args );
            // The Loop
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-sm-6">
                        <?php the_title(); ?>
                    </div>
                <?php endwhile;
            endif;
            // Reset Post Data
            wp_reset_postdata();
            ?>
        </div>
    </section><!-- .container-fluid -->

<?php get_footer(); ?>