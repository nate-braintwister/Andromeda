<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="text-center">
        <div class="entry-content" data-aos="zoom-in">
            <?php
            the_content( sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'andromeda' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'andromeda' ),
                'after'  => '</div>',
            ) );

            ?>

        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <div class="cat-links">
                <?php the_category(' ') ?>
            </div>
        </footer><!-- .entry-footer -->
    </section>
</article><!-- #post-<?php the_ID(); ?> -->
