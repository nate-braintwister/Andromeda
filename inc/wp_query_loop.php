<?php

$args = [
    'posts_per_page'            => '12',
    'post_type'                 => 'services',
    'tax_query'         => array(
      array(
        'taxonomy'      => 'service_type',
        'field'         => 'slug',
        'terms'         => $terms
      )
    )
];

$loop = new WP_Query( $args );

if( $loop->have_posts() ) :
    while( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="col-sm-4">
            <div class="block">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    the_post_thumbnail('full-size');
                    the_title('<h4 class="block-title">', '</h4>');
                    ?>
                </a>
            </div><!-- .block -->
        </div><!-- .col-md-3 -->

<?php
endwhile;
endif;
wp_reset_postdata();