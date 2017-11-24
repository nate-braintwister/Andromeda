<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header block-wrapper">
        <?php if( is_page('about') || is_page('contact') ) : ?>
        <h1 class="entry-title display-4"><?php the_title(); ?><br><?php bloginfo('title'); ?></h1>
        <?php else : ?>
        <h1 class="entry-title display-4"><?php the_title(); ?></h1>
        <h2><?php the_field('subtitle'); ?></h2>
        <?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php
        
            the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'andromeda' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    <?php if(!is_page('contact', 'about', 'privacy-policy') ) : ?>
    <div class="quote-req text-center"  data-aos="zoom-out">
        <button id="reqBtn" class="quote-req-btn hvr-buzz">Request a Quote</button>
    </div>
    <?php endif; ?>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php

				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'andromeda' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
