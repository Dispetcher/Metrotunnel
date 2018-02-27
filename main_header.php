<div id="person_data">
	<div class="center_wrap">
		<div class="dt">
			<span>Данный сайт <a href="http://www.metrotunnel.ru/obrabotka-personalnyh-dannyh/">использует файлы «cookie»</a> с целью персонализации сервисов и повышения удобства пользования веб-сайтом.<br>«Cookie» представляют собой небольшие файлы, содержащие информацию о предыдущих посещениях веб-сайта.<br>Если вы не хотите использовать файлы «cookie», измените настройки браузера.
			</span>
			<a class="close_person_data">
			</a>
		</div>
	</div>	
</div>
<header id="header">
	<div class="header_content">
		<div class="center_wrap">
			<div class="header_content__old_link">
			<a href="http://old.metrotunnel.ru/">Перейти на старую версию сайта</a>
			</div>
		</div>
		<div class="center_wrap">
		<div id="top">
			<div class="dt">
				<div class="dtc vat logo">
					<div class="dt">
						<div class="dtc vat logo_img">
							<a href="/"><img src="<?php bloginfo('template_url')?>/img/logo.png" alt=""/></a>
						</div>
						<div class="dtc vat logo_description">
							<p class="logo_title"><a href="/"><?php the_field('logo_title', 'options')?></a></p>
							<p class="logo_undertitle"><a href="/"><?php the_field('logo_undertitle', 'options')?></a></p>
						</div>
					</div>
				</div><!--/.dtc.logo-->
				<div class="dtc vat top_content">
					<ul class="top_menu">
						<?php wp_nav_menu(array('menu' => 'Верхнее меню', 'container' => '','items_wrap' => '%3$s')); ?>
					</ul>
					<div class="languages">
						<ul>
							<li><a href="/">Ru</a></li>
							<li><a href="<?php echo get_permalink(407)?>">Eng</a></li>
						</ul>
					</div><!--/.languages-->
					<div class="top_search_wrap">
						<form method="get" name="searchform" id="searchform"  action="<?php bloginfo('siteurl')?>">
							<input type="text" name="s" id="s" value="" placeholder="Поиск по сайту"/>
							<input id="btnSearch" type="submit" name="submit" value="Поиск" />
						</form>
					</div><!--/.top_search_wrap-->
				</div><!--/.top_content-->
			</div><!--/.dt-->
		</div><!--/#top-->
		<div class="header_links">
			<?php
				if( have_rows('main_links') ):
					while ( have_rows('main_links') ) : the_row();?>
						<div class="dt header_link">
							<div class="dtc header_link_icon">
								<a href="<?php the_sub_field('link')?>"><img src="<?php the_sub_field('icon')?>" alt=""/></a>
							</div>
							<div class="dtc header_link_text">
								<a href="<?php the_sub_field('link')?>"><?php the_sub_field('text')?></a>
							</div>
						</div><!--/.header_link-->
			<?php	endwhile;
				endif;
			?>
		</div><!--/.header_links-->
		<div class="dt header_content_bottom">
			<div class="dtc vab">
				<a class="button" href="<?php echo get_permalink(174)?>">Вступить в СРО</a>
			</div>
			<div class="dtc vab visit_site_wrap">
				<div class="visit_site">
					<div class="dt">
						<div class="dtc vat visit_site_logo">
							<a href="<?php the_field('friend_site_link')?>" target="_blank"><img src="<?php the_field('friend_site_logo')?>" alt=""/></a>
						</div>
						<div class="dtc vat visit_site_info">
							<p><?php the_field('friend_site_text')?></p>
							<a href="<?php the_field('friend_site_link')?>" target="_blank"><?php the_field('friend_site_link_text')?></a>
						</div>
					</div>
				</div><!--/.visit_site-->
			</div><!--/.dtc-->
		</div><!--/.header_content_bottom-->
		</div><!--/.center_wrap-->
	</div><!--/.header_content-->
	<?php get_template_part('includes/main_nav')?>
</header><!--/#header-->