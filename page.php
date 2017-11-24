<?php

get_header(); ?>

<div class="pt-page">
    <section class="container">
        <?php
            if( !is_page(['privacy-policy', 'contact', 'about']) ) : ?>
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('
                <p id="breadcrumbs">','</p>
                ');
                    }
                    ?>

            <?php endif; ?>
        <div class="row">
            <section class="col-md-7 mr-auto">
                <main id="main-content" class="page-layout mar-ri">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'page' );

                    endwhile; // End of the loop.
                    ?>

                </main>
            </section>
            <?php if( is_page( 'contact' )) : ?>
            <div class="col-md-4">
                <?php get_sidebar('contact'); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
</div>


<?php get_footer(); ?>