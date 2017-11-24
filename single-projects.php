<?php
get_header(); ?>

<div class="pt-page">
    <section class="container">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('
            <p id="breadcrumbs">','</p>
            ');
            }
        ?>
        <div class="row">
            <section class="col-md-9">
                <main id="main-content" class="page-layout">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'project' );

                    endwhile; // End of the loop.
                    ?>
                    <div class="quote-req text-center">
                        <a href="<?php the_field('live_link');?>" target="_blank" id="viewLiveSite" class="live-link">View Live Site</a>
                    </div>
                </main>
            </section>
            <div class="col-md-3">
                <div class="what-we-did" data-aos="slide-left">
                    <h4>Here's What We Did</h4>
                    <?php the_field('what_we_did'); ?>
                </div>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>