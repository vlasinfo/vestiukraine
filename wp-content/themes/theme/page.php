<?php get_header(); ?>    <div id="wrapper" class="wrapper">        <?php get_sidebar(); ?>        <?php        if (in_category( '38' )):            wp_nav_menu( array('theme_location' => 'about-holding', 'container' => false, 'menu_class' => 'top-nav' ,'fallback_cb'   => 'vlasinfo'));        elseif (in_category( '37' )):            wp_nav_menu( array('theme_location' => 'assets', 'container' => false, 'menu_class' => 'top-nav' ,'fallback_cb'   => 'vlasinfo'));        elseif (in_category( '44' )):            wp_nav_menu( array('theme_location' => 'press-center', 'container' => false, 'menu_class' => 'top-nav' ,'fallback_cb'   => 'vlasinfo'));        elseif (in_category(array('35', '452', '50'))):            wp_nav_menu( array('theme_location' => 'cooperation', 'container' => false, 'menu_class' => 'nav top-nav-inner' ,'fallback_cb'   => 'vlasinfo'));        endif;        ?>        <!-- Page Content -->        <div class="main" <?php if (in_category(array('38', '37', '44', '35', '452', '50'))): ?>style="padding-top: 125px;padding-bottom: 70px;"<?php endif; ?>>            <div class="row post-holder">                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>                    <div class="col-lg-12 post-content page">                        <div class="animated fadeInLeft go post-img">                            <?php if ( has_post_thumbnail()):                                the_post_thumbnail();                            else: /* ?>                                <img src="<?php echo get_template_directory_uri(); ?>/img/thumb.png" alt="thumb">                            <?php */ endif; ?>                        </div>                        <h3 class="animated fadeInDown go"><?php the_title(); ?></h3>                        <div class="animated fadeInUp go">                            <?php the_content(); ?>                        </div>                    </div>                <?php endwhile; else: ?>                <p><?php _e('Нет информации.'); ?></p>            </div>            <?php endif; ?>            <?php the_posts_pagination( array(                'mid_size' => 2,                'prev_text' => __( 'Back', 'textdomain' ),                'next_text' => __( 'Onward', 'textdomain' ),            ) ); ?>        </div>    </div><!-- wrapper -->    </div>    </div>    </div></div><?php get_footer(); ?>