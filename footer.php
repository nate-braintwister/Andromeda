<a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
</div><!-- #content -->

	<footer id="main-footer" class="site-footer">
        <div class="container-fluid">
            <div class="section-row">
                <h4>Find Us On Social Media!</h4>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'social',
                    'menu_id'        => 'social-media-nav',
                ) );
                ?>

                <section class="site-info">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu',
                    ) );
                    ?>
                    <small>We handcraft all of our work in California.
                        It's done with an immense amount of profesionalism and also a truck full of <i class="fa fa-heart"></i>
                    </small>
                    <br>
                    <small>&copy; Copyright <?php echo date('Y'); ?> <?php bloginfo('title') ?>. All rights reserved.</small>
                    <div class="security">
                        <a onclick="window.open('https://www.gravityscan.com/verify/43a0f8b87fedb65caf371d65a36abe4e80cd195f8b5d90a720f4dbbb2b4eb3e8','gravityscan-verified-secure-site','width=760,height=470,left=160,top=170');return false;" href="https://www.gravityscan.com/verify/43a0f8b87fedb65caf371d65a36abe4e80cd195f8b5d90a720f4dbbb2b4eb3e8" target="_blank" rel="noopener noreferrer"><img src="https://badges.gravityscan.com/badges/endeese.com-43a0f8b87fedb65caf371d65a36abe4e80cd195f8b5d90a720f4dbbb2b4eb3e8" alt="Website Malware Scan" width="117" height="67"></a>
                    </div>
                </section><!-- .site-info -->
            </div>
        </div><!-- .container-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4008011.js"></script>
<!-- End of HubSpot Embed Code -->
<script>
    (function(){
        'use strict';

        jQuery('#mobBtn').on('click', function(){
            jQuery('#mobnav').toggleClass('show-mob-nav');
        });
    })();


    AOS.init({
        duration: 1200
    })

</script>

</body>
</html>
