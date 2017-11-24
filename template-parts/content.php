<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 id="post-title" class="entry-title display-4">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title display-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
            <hr>
		<div class="entry-meta">
			<small>Posted <?php the_date(); ?> by <?php the_author(); ?></small>
		</div><!-- .entry-meta -->
        <div class="featured-img">
            <?php the_post_thumbnail('full-size'); ?>
        </div>

		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
            the_post_thumbnail();
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
</article><!-- #post-<?php the_ID(); ?> -->
