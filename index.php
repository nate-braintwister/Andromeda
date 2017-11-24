<?php get_header(); ?>
<div class="pt-page">
    <div id="blog-index">
        <main id="main-content">
            <section class="container-fluid">
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="latest-feature">
                            <header>
                                <h2 class="display-3">Latest Article</h2>
                            </header>
                            <div class="excerpt-content">
                                <?php

                                $args = array(
                                    'posts_per_page'        => '1',
                                    'post_type'   => 'post'
                                );

                                $the_query = new WP_Query( $args );

                                if ( $the_query->have_posts() ) :
                                    while ( $the_query->have_posts() ) : $the_query->the_post();
                                        the_title('<h2>', '</h2>');
                                        the_excerpt();?>
                                    <a href="<?php the_permalink(); ?>" class="readmore-btn">Read More</a>
                                    <?php
                                    endwhile;
                                endif;
                                // Reset Post Data
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="big-search-form">
                            <header>
                                <h4>Search Entire Site</h4>
                            </header>
                            <?php get_search_form(); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <aside class="recent-posts">
                                    <h4>Recent Posts</h4>
                                    <div class="media">
                                        <ul class="media-body">
                                            <?php

                                            $args = array(
                                                'posts_per_page'        => '1',
                                                'post_type'   => 'post'
                                            );

                                            $the_query = new WP_Query( $args );

                                            if ( $the_query->have_posts() ) :
                                                while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                                <h5 class="mt-0">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>


                                                <?php endwhile;
                                            endif;
                                            // Reset Post Data
                                            wp_reset_postdata();
                                            ?>
                                        </ul>
                                    </div>

                                </aside>
                            </div>
                            <div class="col-md-6">
                                <aside class="popular-posts">
                                    <h4>Popular Posts</h4>
                                    <div class="media">
                                        <ul class="media-body">
                                            <?php

                                            $args = array(
                                                'posts_per_page'        => '1',
                                                'post_type'   => 'post'
                                            );

                                            $the_query = new WP_Query( $args );

                                            if ( $the_query->have_posts() ) :
                                                while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                                <h5 class="mt-0">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>


                                                <?php endwhile;
                                            endif;
                                            // Reset Post Data
                                            wp_reset_postdata();
                                            ?>
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <header>
                                    <h4>
                                        <?php esc_html_e( 'Topics', 'andromeda' ); ?>
                                    </h4>
                                </header>
                                <ul>
                                    <?php
                                    wp_list_categories( array(
                                        'orderby'    => 'count',
                                        'order'      => 'DESC',
                                        'show_count' => 1,
                                        'title_li'   => '',
                                        'number'     => 10,
                                    ) );
                                    ?>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <header>
                                    <h4>Tags</h4>
                                </header>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>

                </div>
            </section><!-- .container-fluid -->
        </main>
    </div>
</div>
<?php get_footer(); ?>