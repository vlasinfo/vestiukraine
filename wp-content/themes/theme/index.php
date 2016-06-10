<?php get_header(); ?>    <div id="wrapper" class="wrapper">        <?php get_sidebar(); ?>        <div class="top-nav">            <div class="navbar-header vlas-hamburger second-nav">                <button type="button" class="navbar-toggle vlas-hamburger-icon" data-toggle="collapse" data-target=".navbar-collapse">                    <span class="vlas-hamburger-layer"></span>                </button>            </div>            <div class="collapse navbar-collapse">                <?php                if (in_category( '38' )):                    wp_nav_menu( array('theme_location' => 'about-holding', 'container' => false, 'menu_class' => 'nav top-nav-inner' ,'fallback_cb'   => 'vlasinfo'));                elseif (in_category( '37' )):                    wp_nav_menu( array('theme_location' => 'assets', 'container' => false, 'menu_class' => 'nav top-nav-inner' ,'fallback_cb'   => 'vlasinfo'));                elseif (in_category(array('44', '46', '47', '48'))):                    wp_nav_menu( array('theme_location' => 'press-center', 'container' => false, 'menu_class' => 'nav top-nav-inner' ,'fallback_cb'   => 'vlasinfo'));                elseif (in_category(array('35', '452', '50'))):                    wp_nav_menu( array('theme_location' => 'cooperation', 'container' => false, 'menu_class' => 'nav top-nav-inner' ,'fallback_cb'   => 'vlasinfo'));                endif;                ?>            </div>        </div>        <!-- Page Content -->        <main class="main<?php if (in_category(array('37', '38'))): ?> is-page<?php endif; ?><?php if (in_category(array('38', '37', '42', '43', '44', '46', '47', '48', '35', '452', '50'))): ?> ptpb<?php endif; ?>">        <?php            if ( !is_paged() && in_category(44)):            $catquery = new WP_Query( 'cat=46&posts_per_page=10' );            while($catquery->have_posts()) : $catquery->the_post();        ?>            <div class="row post-holder">                    <div class="col-lg-12 post-content main-article">                     <a href="<?php the_permalink(); ?>" class="post-link">                        <div class="animated fadeInLeft go post-img-full">                            <?php if ( has_post_thumbnail()):                                the_post_thumbnail();                            else: /*?>                                <img src="<?php echo get_template_directory_uri(); ?>/img/thumb.png" alt="thumb">                            <?php */ endif; ?>                        </div>                        <div class="post-body">                            <h3 class="post-title animated fadeInDown go"><?php the_title(); ?></h3>                            <div class="animated fadeInRight go">                                <?php the_excerpt(); ?>                            </div>                        </div>                        </a>                    </div>        <?php endwhile; endif; ?>            <div  id="columns" class="row post-holder" data-columns>                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>                    <div class="animated fadeInUp go post-content">                        <a href="<?php the_permalink(); ?>" class="post-link">                            <div class="post-img">                                <?php if ( has_post_thumbnail()):                                    the_post_thumbnail();                                else: /* ?>                                    <img src="<?php echo get_template_directory_uri(); ?>/img/thumb.png" alt="thumb">                                <?php */ endif; ?>                            </div>                            <div class="post-body">                                <div class="post-date"><?php echo get_the_date( 'Y-m-d' ); ?></div>                                <h3 class="post-title"><?php the_title(); ?></h3>                                <div class="post-desc">                                    <?php the_excerpt(); ?>                                </div>                            </div>                        </a>                    </div>                <?php endwhile; else: ?>                <p><?php _e('Нет информации.'); ?></p>            </div>            <?php endif; ?>        </main>        <?php if (function_exists('vlas_pagenavi')) vlas_pagenavi(); ?>    </div><!-- wrapper -->    </div>    </div>    </div></div><?php get_footer(); ?>