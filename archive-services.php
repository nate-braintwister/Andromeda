<?php
get_header(); ?>

<div class="pt-page">
    <main id="main-content" class="page-layout">
        <div class="container">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
                <p id="breadcrumbs">','</p>
                ');
            }
            ?>
            <section class="service-type">
                <header class="service-type-header">
                    <h2 class="entry-title entry-header display-3">Marketing Services</h2>
                </header>
                
                <div class="service-blocks">
                    <div class="row">
                        <?php
                        $terms = 'marketing';
                        require get_template_directory() . '/inc/wp_query_loop.php'; ?>
                    </div><!-- .row -->
                </div><!-- service-blocks -->
            </section><!-- service-type -->

            <section class="service-type">
                <header class="service-type-header">
                    <h2 class="entry-title entry-header display-3">Website Services</h2>
                </header>
                <div class="service-blocks">
                    <div class="row">
                        <?php
                        $terms = 'website';
                        require get_template_directory() . '/inc/wp_query_loop.php'; ?>
                    </div><!-- .row -->
                </div><!-- service-blocks -->
            </section><!-- service-type -->


        </div><!-- container-fluid -->
    </main><!-- #main-content -->
</div>

<?php get_footer(); ?>
