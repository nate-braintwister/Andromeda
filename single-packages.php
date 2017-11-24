<?php
get_header(); ?>

<div id="package-page">
    <div class="header-bg">
        <header id="package-header">
            <section class="container">

                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('
            <p id="breadcrumbs">','</p>
            ');
                }
                ?>

                <main id="main-content" class="page-layout">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'project' );

                    endwhile; // End of the loop.
                    ?>

                </main>

            </section><!-- .container-fluid -->
        </header>
    </div>
</div>
<div id="three-cols">
    <section class="container-fluid">
        <div class="row">
            <?php
            $services_length = 4;

            for( $i = 1; $i < $services_length; $i++) : ?>

                <div class="col-md-4">
                    <div class="text-center package-wrapper package-<?php echo $i; ?>">
                        <?php the_field('service_package_' . $i ); ?>
                        <div class="package-price">
                            <p>$<span>899.99</span></p>
                        </div>
                        <button>
                            Learn More
                        </button>
                    </div>
                </div>

            <?php endfor; ?>
        </div>
    </section>
</div>


<?php get_footer(); ?>