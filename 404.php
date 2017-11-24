<?php
$services = [
    'Marketing Services'    => 'marketing-services',
    'Website Services'      => 'website-services'
];
get_header(); ?>

    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12 offset-md-1 col-md-11">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('
				<p id="breadcrumbs">','</p>
				');
				}
			?>
            </div><!-- . col-sm-12 -->
            <section class="col-sm-12 offset-md-1 col-md-6">
                <main id="main-content" class="page-layout">

                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'andromeda' ); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'andromeda' ); ?></p>

                            <?php
                            get_search_form();

                            the_widget( 'WP_Widget_Recent_Posts' );
                            ?>

                            <div class="widget widget_categories">
                                <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'andromeda' ); ?></h2>
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
                            </div><!-- .widget -->

                            <?php

                            /* translators: %1$s: smiley */
                            $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'andromeda' ), convert_smilies( ':)' ) ) . '</p>';
                            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

                            the_widget( 'WP_Widget_Tag_Cloud' );
                            ?>

                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                </main>
            </section>
            <div class="col-sm-12 offset-md-1 col-md-3">
                <aside id="service-sidebar">
                    <?php foreach ($services as $service => $id) : ?>
                        <div class="service-menu">
                            <header>
                                <h4><?= $service ?></h4>
                                <hr>
                                <small>We can help you with your <?= $service ?> needs!</small>
                            </header>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => $id,
                                'menu_id'        => $id,
                                'menu_class'    => 'service-widget'
                            ) );
                            ?>
                        </div><!-- service-menu -->
                    <?php endforeach; ?>
                </aside><!-- #service-sidebar -->
            </div>
        </div>
    </section>
<?php get_footer(); ?>