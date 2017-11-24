<?php
get_header(); ?>
<div class="pt-page">
    <section class="container-fluid">
        <div class="row">
            <section class="col-md-6 ml-auto">
                <main id="main-content" class="page-layout mar-ri">
                    <?php

                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'single' );

                        the_post_navigation();

                    endwhile; // End of the loop.
                    ?>
                </main>
            </section>
            <div class="col-md-2 mr-auto">
                <div id="author-details">
                    <main class="author-desc text-center">
                        <div class="avatar">
                            <?php
                            echo get_avatar( get_the_author_meta('ID'), 135);
                            ?>
                        </div>

                        <span class="author-name">Written by<span>
                                <br><?php the_author_link(); ?></span></span>

                        <p class="justify"><small><?php the_author_meta('description'); ?></small></p>
                    </main><!-- .author-desc -->
                </div><!-- #author-details -->
                <aside id="single-sidebar" class="widget-area">
                    <?php dynamic_sidebar( 'blog-right' ); ?>

                </aside><!-- #secondary -->
            </div>
        </div>
    </section>

</div>
<?php get_footer(); ?>