<?php 
/*
	Template Name: Внутренние документы
*/
get_header();?>
<div class="content_bg">
    <?php get_template_part('includes/breadcrumbs')?>
    <div id="content_section">
        <div class="center_wrap">
            <div class="dt content_dt">
                <?php get_sidebar();?>
                <div class="dtc vat" id="page_content">
                    <div class="page_content">
                        <h1><?php if(get_field('seo_h1')): echo the_field('seo_h1'); else: the_title(''); endif;?></h1>
                        <div class="tab_selector">
                            <ul>
                                <?php $args = array(
										'posts_per_page'   => -1,
										'orderby'          => 'date',
										'order'            => 'ASC',
										'post_type'        => 'page',
										'post_parent'      => 56,
										'post_status'      => 'publish',
										'suppress_filters' => true 
									);
									$child_pages = get_posts( $args ); 
									$count = 1;
									foreach($child_pages as $child_page):
								?>
									<li class="<?php if(($child_page->ID == $post->ID) || ($post->ID == 56 && $count == 1)):?>active<?php endif;?>"><a href="<?php echo get_permalink($child_page->ID)?>"><?php echo $child_page->post_title?></a></li>
								<?php $count++; endforeach?>
                            </ul>
                        </div>
                        <?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php the_content(''); ?>
							<?php endwhile; ?>
						<?php endif; ?>
                        <div class="big_search interactive_search">
                            <form action="#">
                                <input type="text" placeholder="Начните вводить название документа"/>
                            </form>
                        </div>
                        <div class="interactive_search_results">
                            <?php
								if(56==$post->ID):
									$pid = $child_pages[0]->ID;
								else:
									$pid = $post->ID;
								endif;
								if( have_rows('docs', $pid) ):
									while ( have_rows('docs', $pid) ) : the_row();?>
										<div class="document_block">
											<p><a href="<?php the_sub_field('file')?>" target="_blank"><?php the_sub_field('title')?></a></p>
											<?php if(get_sub_field('date')):?><span class="document_date">Дата размещения: <?php the_sub_field('date');?></span><?php endif; ?> 
											<?php if(get_sub_field('date_modified')):?><span class="document_date">Дата изменения: <?php the_sub_field('date_modified');?></span><?php endif;?>
										</div>	
							<?php	endwhile;
								endif;
							?>
						</div><!--/.interactive_search_results-->
						<?php get_template_part('includes/page_date')?>
                    </div><!--/.page_content-->
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>