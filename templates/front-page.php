<?php
// Template Name: Front Page
get_header();

$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
    <section id="front-page" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat fixed">
        <main id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="offset-md-2 col-md-8 front-content">
                        <?php
                        while( have_posts() ) : the_post();

                            get_template_part('template-parts/content', 'front');

                        endwhile;
                        ?>
                    </div><!-- .col-sm-12 -->
                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </main><!-- #main-content -->
    </section><!-- #front-page -->


    <section class="section-row section-services">

            <div class="services-grid">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Recent Projects</h4>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $args = array(
                            'posts_per_page'    => '1',
                            'post_type'         => 'projects'
                        );

                        $recent_project = new WP_Query( $args );

                        while( $recent_project->have_posts ) : $recent_project->the_post(); ?>

                            <div class="recent-project">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                    <?php the_title(); ?>
                                </a>
                            </div>

                        <?php endwhile; ?>
                    </div>

                </div><!-- .row -->

            </div><!-- .services-grid -->
        </div><!-- .container -->
    </section><!-- .section-row -->

    <section class="section-row processes">
        <div class="container-fluid">
            <h4>Our Development Process</h4>
            <div class="row">
                <div class="col-md-2">

                    <div id="process-1" class="process" data-aos="slide-left">
                        <header>
                            <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                            <h6>Plan &amp; Design</h6>
                        </header>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="process-2" class="process" data-aos="zoom-in">
                        <header>
                            <i class="fa fa-terminal" aria-hidden="true"></i>
                            <h6>Develop</h6>
                        </header>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="process-3" class="process" data-aos="zoom-in">
                        <header>
                            <i class="fa fa-bug" aria-hidden="true"></i>
                            <h6>Test &amp; Optimize</h6>
                        </header>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="process-4" class="process" data-aos="zoom-in">
                        <header>
                            <i class="fa fa-space-shuttle" aria-hidden="true"></i>
                            <h6>Launch</h6>
                        </header>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="process-4" class="process" data-aos="zoom-in">
                        <header>
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <h6>Maintain</h6>
                        </header>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="process-4" class="process" data-aos="slide-right">
                        <header>
                            <i class="fa fa-hashtag" aria-hidden="true"></i>
                            <h6>Market</h6>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .section-row -->

    <section class="section-row section-testimonials">
        <div class="container">
            <h4>Testimonials</h4>
            <div class="row">
                <?php
                    $args = array(
                        'posts_per_page'    => '1',
                        'post_type'         => 'testimonials'
                    );
                    $testimonials = new WP_Query( $args );

                    while( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                        <div class="col-md-6 offset-md-3">
                            <div class="testimonial">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto cupiditate, eos id impedit incidunt itaque, maiores nisi nobis numquam odit praesentium quasi quia repellat tenetur, totam unde voluptatibus?</p>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <div class="testimonial-details">
                                        <strong><span>Person Name</span> <span>CEO</span> of <span><a href="#">Company B</a></span></strong>
                                    </div>
                                </blockquote>

                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
            </div>
        </div>
    </section>

    <section class="latest-posts section-row">
        <div class="container">
            <header>
                <h4>Latest Posts</h4>
            </header>
            <div class="row">
                <?php
                $args = array(
                    'posts_per_page'        => '3',
                    'post_type'             => 'post',
                    'orderby'               => 'date',
                    'order'                 => 'DESC'
                );

                $latest_posts = new WP_Query( $args );

                if( $latest_posts->have_posts() ) :

                    while( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>

                        <div class="col-md-4">
                            <div class="blog-excerpt hvr-radial-out">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title('<h5>', '</h5>'); ?>
                                    <?php the_date(); ?>
                                </a>
                            </div><!-- .blog-excerpt -->
                        </div><!-- .col-md-4 -->

                    <?php endwhile;

                endif;

                ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .latest-posts -->

<?php get_footer(); ?>