<section class="about-us" id="aboutus">	<div class="container">			<!-- SECTION HEADER -->		<div class="section-header">			<!-- SECTION TITLE -->			<?php 			$zerif_aboutus_title = get_theme_mod('zerif_aboutus_title','About');            $zerif_aboutus_title_lang = get_theme_mod('zerif_aboutus_title','Про нас');			if( !empty($zerif_aboutus_title) ):                if (ICL_LANGUAGE_CODE == 'en'):                    echo '<h2 class="white-text">'.$zerif_aboutus_title.'</h2>';                elseif (ICL_LANGUAGE_CODE == 'ua'):                    echo '<h2 class="white-text">'.$zerif_aboutus_title_lang.'</h2>';                endif;			endif;			?>			<!-- SHORT DESCRIPTION ABOUT THE SECTION -->			<?php				$zerif_aboutus_subtitle = get_theme_mod('zerif_aboutus_subtitle','We aim to grow our customer’s businesses by growing Developex.');                $zerif_aboutus_subtitle_lang = get_theme_mod('zerif_aboutus_subtitle_lang','Ми прагнемо розвивати бізнес наших клієнтів шляхом зростання Developex.');				if( !empty($zerif_aboutus_subtitle) ):					echo '<h6 class="white-text">';                    if (ICL_LANGUAGE_CODE == 'en'):                        echo $zerif_aboutus_subtitle;                    elseif (ICL_LANGUAGE_CODE == 'ua'):                        echo $zerif_aboutus_subtitle_lang;                    endif;					echo '</h6>';				endif;			?>		</div><!-- / END SECTION HEADER -->		<!-- 3 COLUMNS OF ABOUT US-->		<div class="row">			<!-- COLUMN 1 - BIG MESSAGE ABOUT THE COMPANY-->			<?php				$zerif_aboutus_biglefttitle = get_theme_mod('zerif_aboutus_biglefttitle','Developex strives to multiply business possibilities for our customers by implementing their most challenging and innovative ideas. We do that by  nurturing an atmosphere of constant professional and personal growth within our company. That makes us great team and partner.');                $zerif_aboutus_biglefttitle_lang = get_theme_mod('zerif_aboutus_biglefttitle_lang','Developex прагне помножити можливості бізнесу для наших клієнтів шляхом впровадження найбільш складних та інноваційних ідей. Ми робимо це для  атмосфери постійного професійного та особистого зростання в нашій компанії. Це робить нас відмінною командою для наших партнерів.');				if( !empty($zerif_aboutus_biglefttitle) ):					echo '<div class="col-lg-4 col-md-4 column">';						echo '<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">';                        if (ICL_LANGUAGE_CODE == 'en'):                            echo $zerif_aboutus_biglefttitle;                        elseif (ICL_LANGUAGE_CODE == 'ua'):                            echo $zerif_aboutus_biglefttitle_lang;                        endif;						echo '</div>';					echo '</div>';				endif;				$zerif_aboutus_text = get_theme_mod('zerif_aboutus_text','<p>We believe that only high standards of corporate culture, maintaining positive attitude and accepting new challenges will lead us to professional and personal growth.We follow our mission and strive to cherish and value every team member and customer.</p><p>We maintain high motivation to education and self-development, gaining great professional reputation and respect of everybody who interact with Developex.</p><p>We do our best to maintain Developex spirit, which gives everyone opportunity to develop himself in positive and respectful atmosphere.</p>');                $zerif_aboutus_text_lang = get_theme_mod('zerif_aboutus_text_lang','<p>Ми вважаємо, що тільки високі стандарти корпоративної культури, підтримки позитивного ставлення і прийняття нових викликів приведе нас до професійного та особистого росту.</p><p>Ми слідуємо нашій місії і прагнемо плекати значення кожного члена команди і клієнта.</p><p>Ми зберігаємо високу мотивацію до освіти і саморозвитку, набираючи професійну репутацію і повагу для тих, хто взаємодіяє з Developex.</p><p>Ми робимо все можливе, щоб зберегти в Developex атмосферу, яка дає кожному можливість розвивати себе в позитивному напрямку.</p>');            if( !empty($zerif_aboutus_text) ):					echo '<div class="col-lg-4 col-md-4 column custom-text" data-scrollreveal="enter bottom after 0s over 1s">';						echo '<p>';                            if (ICL_LANGUAGE_CODE == 'en'):                                echo $zerif_aboutus_text;                            elseif (ICL_LANGUAGE_CODE == 'ua'):                                echo $zerif_aboutus_text_lang;                            endif;						echo '</p>';					echo '</div>';				endif;			?>		<!-- COLUMN 1 - SKILSS-->		<div class="col-lg-4 col-md-4 column third">        <?php            if (ICL_LANGUAGE_CODE == 'en'):         ?>            <h4>Here can be fact-sheet with facts like:                <br>125+ people team</h4>        <?php            elseif (ICL_LANGUAGE_CODE == 'ua'):        ?>            <h4>Фактично про команду в %                <br>Кількість спеціалістів: 125+</h4>        <?php            endif;        ?>			<ul class="skills" data-scrollreveal="enter right after 0s over 1s">								<!-- SKILL ONE -->				<li class="skill">					<?php						$zerif_aboutus_feature1_nr = get_theme_mod('zerif_aboutus_feature1_nr','20');						if( !empty($zerif_aboutus_feature1_nr) ):							echo '<div class="skill-count">';								echo '<input type="text" value="'.$zerif_aboutus_feature1_nr.'" data-thickness=".2" class="skill1">';							echo '</div>';						endif;												$zerif_aboutus_feature1_title = get_theme_mod('zerif_aboutus_feature1_title','Senior Developers');						$zerif_aboutus_feature1_text = get_theme_mod('zerif_aboutus_feature1_text');												if( !empty($zerif_aboutus_feature1_title) ):							echo '<h6>'.$zerif_aboutus_feature1_title.'</h6>';						endif;												if( !empty($zerif_aboutus_feature1_text) ):							echo '<p>'.$zerif_aboutus_feature1_text.'</p>';						endif;					?>				</li>				<!-- SKILL TWO -->				<li class="skill">					<?php						$zerif_aboutus_feature2_nr = get_theme_mod('zerif_aboutus_feature2_nr','15');						if( !empty($zerif_aboutus_feature2_nr) ):							echo '<div class="skill-count">';								echo '<input type="text" value="'.$zerif_aboutus_feature2_nr.'" data-thickness=".2" class="skill2">';							echo '</div>';						endif;												$zerif_aboutus_feature2_title = get_theme_mod('zerif_aboutus_feature2_title','QA engineers');						$zerif_aboutus_feature2_text = get_theme_mod('zerif_aboutus_feature2_text');												if( !empty($zerif_aboutus_feature2_title) ):							echo '<h6>'.$zerif_aboutus_feature2_title.'</h6>';						endif;												if( !empty($zerif_aboutus_feature2_text) ):							echo '<p>'.$zerif_aboutus_feature2_text.'</p>';						endif;					?>				</li>				<!-- SKILL THREE -->				<li class="skill">					<?php						$zerif_aboutus_feature3_nr = get_theme_mod('zerif_aboutus_feature3_nr','15');						if( !empty($zerif_aboutus_feature3_nr) ):							echo '<div class="skill-count">';								echo '<input type="text" value="'.$zerif_aboutus_feature3_nr.'" data-thickness=".2" class="skill3">';							echo '</div>';						endif;												$zerif_aboutus_feature3_title = get_theme_mod('zerif_aboutus_feature3_title','of PMs');						$zerif_aboutus_feature3_text = get_theme_mod('zerif_aboutus_feature3_text');												if( !empty($zerif_aboutus_feature3_title) ):							echo '<h6>'.$zerif_aboutus_feature3_title.'</h6>';						endif;												if( !empty($zerif_aboutus_feature3_text) ):							echo '<p>'.$zerif_aboutus_feature3_text.'</p>';						endif;					?>				</li>				<!-- SKILL FOUR -->				<li class="skill">					<?php						$zerif_aboutus_feature4_nr = get_theme_mod('zerif_aboutus_feature4_nr','20');						if( !empty($zerif_aboutus_feature4_nr) ):							echo '<div class="skill-count">';								echo '<input type="text" value="'.$zerif_aboutus_feature4_nr.'" data-thickness=".2" class="skill4">';							echo '</div>';						endif;												$zerif_aboutus_feature4_title = get_theme_mod('zerif_aboutus_feature4_title','C++ developers');						$zerif_aboutus_feature4_text = get_theme_mod('zerif_aboutus_feature4_text');												if( !empty($zerif_aboutus_feature4_title) ):							echo '<h6>'.$zerif_aboutus_feature4_title.'</h6>';						endif;												if( !empty($zerif_aboutus_feature4_text) ):							echo '<p>'.$zerif_aboutus_feature4_text.'</p>';						endif;					?>				</li>                <!-- SKILL FIVE -->                <li class="skill">                    <?php                    $zerif_aboutus_feature5_nr = get_theme_mod('zerif_aboutus_feature5_nr','15');                    if( !empty($zerif_aboutus_feature5_nr) ):                        echo '<div class="skill-count">';                        echo '<input type="text" value="'.$zerif_aboutus_feature5_nr.'" data-thickness=".2" class="skill1">';                        echo '</div>';                    endif;                    $zerif_aboutus_feature5_title = get_theme_mod('zerif_aboutus_feature5_title','PHP developers');                    $zerif_aboutus_feature5_text = get_theme_mod('zerif_aboutus_feature5_text');                    if( !empty($zerif_aboutus_feature5_title) ):                        echo '<h6>'.$zerif_aboutus_feature5_title.'</h6>';                    endif;                    if( !empty($zerif_aboutus_feature5_text) ):                        echo '<p>'.$zerif_aboutus_feature5_text.'</p>';                    endif;                    ?>                </li>                <!-- SKILL SIXTH -->                <li class="skill">                    <?php                    $zerif_aboutus_feature6_nr = get_theme_mod('zerif_aboutus_feature6_nr','15');                    if( !empty($zerif_aboutus_feature6_nr) ):                        echo '<div class="skill-count">';                        echo '<input type="text" value="'.$zerif_aboutus_feature6_nr.'" data-thickness=".2" class="skill2">';                        echo '</div>';                    endif;                    $zerif_aboutus_feature6_title = get_theme_mod('zerif_aboutus_feature6_title','.NET developers');                    $zerif_aboutus_feature6_text = get_theme_mod('zerif_aboutus_feature6_text');                    if( !empty($zerif_aboutus_feature6_title) ):                        echo '<h6>'.$zerif_aboutus_feature6_title.'</h6>';                    endif;                    if( !empty($zerif_aboutus_feature6_text) ):                        echo '<p>'.$zerif_aboutus_feature6_text.'</p>';                    endif;                    ?>                </li>			</ul> 		</div> <!-- / END SKILLS COLUMN-->	</div> <!-- / END 3 COLUMNS OF ABOUT US-->	<!-- CLIENTS -->	<?php 		if(is_active_sidebar( 'sidebar-aboutus' )):					$zerif_aboutus_clients_title_text = get_theme_mod('zerif_aboutus_clients_title_text','OUR HAPPY CLIENTS');					echo '<div class="our-clients">';							if( !empty($zerif_aboutus_clients_title_text) ):								echo '<h5><span class="section-footer-title">'.$zerif_aboutus_clients_title_text.'</span></h5>';									else:									echo '<h5><span class="section-footer-title">'.__('OUR HAPPY CLIENTS','zerif').'</span></h5>';				endif;							echo '</div>';						echo '<div class="client-list">';				echo '<div data-scrollreveal="enter right move 60px after 0.00s over 2.5s">';				dynamic_sidebar( 'sidebar-aboutus' );				echo '</div>';			echo '</div> ';		endif; 	?>        <div class="our-clients">            <h5>                <span class="section-footer-title">                <?php                    if (ICL_LANGUAGE_CODE == 'en'):                        echo "Customers we work with";                    elseif (ICL_LANGUAGE_CODE == 'ua'):                        echo "Клієнти з якими ми працюємо";                    endif;                ?>                </span>            </h5>        </div>        <div class="client-list">            <div data-scrollreveal="enter right move 60px after 0.00s over 2.5s" data-sr-init="true" data-sr-complete="true">                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/corsair.png" alt="Corsair">                </a>                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/logitech.png" alt="Logitech">                </a>                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/skull-candy.png" alt="Scull Candy">                </a>                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/astro-gaming.png" alt="Astro Gaming">                </a>                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/metricinsights.png" alt="Metricinsights">                </a>                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/trend-micro.png" alt="Trend Micro">                </a>                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/nilex.png" alt="Nilex">                </a>                <a href="javascript:void(0)">                    <img src="<?php echo get_template_directory_uri(); ?>/images/clients/zigma.png" alt="Autocalc">                </a>            </div>        </div></div> <!-- / END CONTAINER --></section> <!-- END ABOUT US SECTION -->