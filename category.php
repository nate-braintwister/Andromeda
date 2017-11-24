<?php get_header(); ?>

<section id="category-archive">
    <main id="main-content" class="page-layout">
        <div class="container-fluid">
            <div class="row">
                <aside class="col-sm-12 col-md-4">
                    <div class="category-post">
                        <?php
                        $args = array();
                        while( have_posts() ) : the_post();

                        the_title('<h3>', '</h3>');
                        the_excerpt();
                        ?>
                        <a href="<?php the_permalink(); ?>">Read More...</a>
                        <?php endwhile; ?>
                    </div>
                </aside>
            </div>
        </div><!-- .container-fluid -->
    </main><!-- #main-content -->
</section><!-- #category-archive -->

<?php get_footer();