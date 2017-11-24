<?php
get_header(); ?>

<div class="pt-page">
    <main id="main-content" class="page-layout">
        <div class="container">
            <?php
            if ( have_posts() ) : ?>

                <header class="page-header text-center">
                    <?php
                    the_archive_title( '<h1 class="entry-title display-3">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->

            <?php endif; ?>
            <div class="row">
                <?php

                $args = array(
                    'post_type'         => 'projects',
                    'posts_per_page'    => '12',
                );

                // Custom query.
                $query = new WP_Query( $args );

                // Check that we have query results.
                if ( $query->have_posts() ) {

                    // Start looping over the query results.
                    while ( $query->have_posts() ) {

                        $query->the_post(); ?>


                            <?php
                            if(has_post_thumbnail() ) : ?>
                                <div class="col-md-4">
                                <div class="block">
                                    <a href="<?php the_permalink();?>">
                                        <span class="block-img">
                                            <?php the_post_thumbnail( 'medium' );  ?>
                                        </span>
                                        <?php the_title('<p>', '</p>'); ?>
                                    </a>
                                </div>
                                </div>
                            <?php endif; ?>

                    <?php  }

                }

                // Restore original post data.
                wp_reset_postdata();

                ?>
            </div><!-- row -->
        </div><!-- container -->


    </main><!-- #main-content -->
</div>

<?php get_footer(); ?>
