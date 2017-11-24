<?php
// Template Name: Center Aligned Page
get_header(); ?>

    <div class="pt-page">
        <section class="container-fluid">
            <div class="row">
                <section class="col-md-6 mr-auto ml-auto">
                    <main id="main-content" class="page-layout">

                        <?php
                        while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <header class="entry-header block-wrapper text-center">
                                    <?php if( is_page('about') || is_page('contact') ) : ?>
                                        <h1 class="entry-title display-3"><?php the_title(); ?><br><?php bloginfo('title'); ?></h1>
                                    <?php else : ?>
                                        <h1 class="entry-title display-3"><?php the_title(); ?></h1>
                                    <?php endif; ?>
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                    <?php
                                    the_content();

                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'andromeda' ),
                                        'after'  => '</div>',
                                    ) );
                                    ?>
                                </div><!-- .entry-content -->

                                <?php if ( get_edit_post_link() ) : ?>
                                    <footer class="entry-footer">
                                        <?php

                                        edit_post_link(
                                            sprintf(
                                                wp_kses(
                                                /* translators: %s: Name of current post. Only visible to screen readers */
                                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'andromeda' ),
                                                    array(
                                                        'span' => array(
                                                            'class' => array(),
                                                        ),
                                                    )
                                                ),
                                                get_the_title()
                                            ),
                                            '<span class="edit-link">',
                                            '</span>'
                                        );
                                        ?>
                                    </footer><!-- .entry-footer -->
                                <?php endif; ?>
                            </article><!-- #post-<?php the_ID(); ?> -->

                        <?php endwhile; // End of the loop.
                        ?>

                    </main>
                </section>
                <?php if( is_page( 'contact' )) : ?>
                    <div class="col-md-2 mr-auto">
                        <?php get_sidebar('contact'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>


<?php get_footer(); ?>