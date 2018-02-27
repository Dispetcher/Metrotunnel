<?php 
/*
Template Name: Привлечение к ответственности
*/
get_header();?>
<div class="content_bg">
    <?php get_template_part('includes/breadcrumbs')?>
    <div id="content_section">
        <div class="center_wrap">
            <div class="dt content_dt">
                <?php get_sidebar()?>
                <div class="dtc vat" id="page_content">
                    <div class="page_content">
                        <h1><?php if(get_field('seo_h1', 54)): echo the_field('seo_h1', 54); else: echo get_the_title(54); endif;?></h1>
                        <?php if(get_field('top_content')): the_field('top_content'); else: the_field('top_content', 54); endif;?>
                        <div class="tab_selector">
                            <ul>
                                <?php $args = array(
										'posts_per_page'   => -1,
										'orderby'          => 'date',
										'order'            => 'DESC',
										'post_type'        => 'page',
										'post_parent'      => 54,
										'post_status'      => 'publish',
										'suppress_filters' => true 
									);
									$child_pages = get_posts( $args ); 
									$count = 1;
									foreach($child_pages as $child_page):
								?>
									<li class="<?php if(($child_page->ID == $post->ID) || ($post->ID == 54 && $count == 1)):?>active<?php endif;?>"><a href="<?php echo get_permalink($child_page->ID)?>"><?php echo $child_page->post_title?></a></li>
								<?php $count++; endforeach?>
							</ul>
                        </div>
                        <?php 
						if(54==$post->ID):
							echo apply_filters('the_content', get_post_field('post_content', $child_pages[0]->ID));
						else:
							echo apply_filters('the_content', get_post_field('post_content', $post->ID));
						endif;
						?>
						<?php get_template_part('includes/page_date')?>
                    </div><!--/.page_content-->
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>