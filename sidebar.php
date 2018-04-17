<div id="sidebar" class="dtc vat">
	
	<?php
		function get_first_level_parent_page_id ($post_id) { //рекурсия, лезет вверх, пока не найдёт родительскую страницу первого уровня
			$current_page = get_post($post_id); //получили объект записи по id
			if($current_page->post_parent == 0) {
				return $current_page->ID;
			} else {
				return get_first_level_parent_page_id($current_page->post_parent);
			}
		}

$id = $post->ID;

		$first_level_parent_page_id = get_first_level_parent_page_id($id); 
	?>
	<p class="side_title"><?php echo get_the_title($first_level_parent_page_id)?></p>
	<ul class="side_menu">		
		<?php
			$excluded_parent_pages = array(54, 60, 62, 48, 2605); //id страниц, дочерние страницы которых надо исключить из меню
			$args = array(
				'posts_per_page'   => -1,
				'orderby'          => 'id',
				'order'            => 'ASC',
				'exclude'		   => array(2605),
				'post_type'        => 'page',
				'post_parent'      => $first_level_parent_page_id,
				'post_status'      => 'publish',
				'suppress_filters' => true
			);
			$child_pages = get_posts($args); //Отобрали дочерние страницы от страницы первого уровня
			
			$grand_child_pages = array();
			
			foreach($child_pages as $child_page):
			
				if(!in_array($child_page->ID, $excluded_parent_pages)): //Если id страницы не находится в массиве исключенных, то выводим её дочерние
					$grand_child_pages_ids = array();
					$args2 = array(
						'posts_per_page'   => -1,
						'orderby'          => 'id',
						'order'            => 'ASC',
						'post_type'        => 'page',
						'post_parent'      => $child_page->ID,
						'post_status'      => 'publish',
						'suppress_filters' => true
					);
					$grand_child_pages = get_posts($args2); //Для каждой подстраницы отобрали дочерние страницы
					
					foreach($grand_child_pages as $grand_child_page):
							if(!in_array($grand_child_page->ID, $grand_child_pages_ids)) {
								$grand_child_pages_ids[] = $grand_child_page->ID;
							}
					endforeach;
				endif;
				
				$razdel_links = array(); //ссылки на разделы внутри страницы
				if( have_rows('razdels', $child_page->ID) ):
					while ( have_rows('razdels', $child_page->ID) ) : the_row();
						$razdel_links[] = get_sub_field('link');
					endwhile;
				endif;
				
		?>
			<li class="<?php if($post->ID == $child_page->ID) echo 'current_page_item'; if(in_array($post->ID,$grand_child_pages_ids)) echo 'current_page_ancestor';?>">
				<a href="<?php echo get_permalink($child_page->ID)?>"><?php echo $child_page->post_title;?></a>
				<?php if(!empty($grand_child_pages) || !empty($razdel_links)):?>
					<ul>
						<?php 
							if(!empty($grand_child_pages)):
								foreach($grand_child_pages as $grand_child_page):?>
									<li class="<?php if($post->ID == $grand_child_page->ID) echo 'current_page_item';?>"><a href="<?php echo get_permalink($grand_child_page->ID)?>"><?php echo $grand_child_page->post_title?></a></li>
						<?php 	endforeach;
							endif;
						?>
						<?php 
							if(!empty($razdel_links)):
								$count = 1;
								foreach($razdel_links as $razdel_link):?>
									<li><a href="#razdel_<?php echo $count;?>"><?php echo $razdel_link;?></a></li>
						<?php 	
								$count++;
								endforeach;
							endif;
						?>
					</ul>
				<?php endif;?>
			</li>
		<?php endforeach;?>
	<?php //} ?>
	</ul>
	
	<!--<ul class="side_menu">
		<?php	
			$args = array(
				'posts_per_page'   => -1,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => 'page',
				'post_parent'      => 54, //54 - Привлечение к ответственности
				'post_status'      => 'publish',
				'suppress_filters' => true 
			);
			$child_pages = get_posts( $args ); 
			$excluded_pages = array();
			foreach($child_pages as $child_page):
				$excluded_pages[] = $child_page->ID;
			endforeach;
			
			
			$excluded_pages = implode(',', $excluded_pages);
			
			$args2 = array(
				'child_of' => $first_level_parent_page_id,
				'depth' => 2,
				'sort_column' => 'ID',
				'title_li' => '',
				'exclude' => $excluded_pages
			);
			wp_list_pages($args2);
		?>
	</ul>-->

    <div class="side_visit_block">
		<div class="visit_site">
			<div class="dt">
				<div class="dtc vat visit_site_logo">
					<a href="<?php the_field('friend_site_link', 6)?>"><img src="<?php bloginfo('template_url')?>/img/visit_site_logo.png" alt=""/></a>
				</div>
				<div class="dtc vat visit_site_info">
					<p><?php the_field('friend_site_text', 6)?></p>
					<a href="<?php the_field('friend_site_link', 6)?>"><?php the_field('friend_site_link_text', 6)?></a>
				</div>
			</div>
		</div><!--/.visit_site-->
	</div>
</div><!--/#sidebar-->