<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="featured-image">
        <?php the_post_thumbnail('full-size'); ?>
    </div>

    <div class="">
        <header class="entry-header block-wrapper text-center">
            <?php the_title( '<h1 class="entry-title display-2">', '</h1>' ); ?>
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
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
