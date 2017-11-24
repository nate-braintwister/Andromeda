<?php
get_header(); ?>

<div class="pt-page">
    <main id="main-content" class="site-main">
        <section class="container">
            <header class="page-header text-center">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('
                <p id="breadcrumbs">','</p>
                ');
                }
                ?>
                <?php
                the_archive_title( '<h1 class="entry-title display-3">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

            <div class="service-cols">
                <div class="row">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>

                        <div class="col-sm-12 col-md-6">
                            <aside class="service-column">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    the_title('<h2 class="entry-title display-4">','</h2>');

                                    the_content();
                                    ?>
                                </a>
                            </aside>
                        </div>

                    <?php endwhile;

                    the_posts_navigation(); ?>
                </div><!-- .row -->
            </div>

        </section><!-- .container-fluid -->

    </main>

</div>
<?php
get_footer();
