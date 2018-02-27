<?php get_header();?>
<div class="content_bg">
    <?php get_template_part('includes/breadcrumbs')?>
    <div id="content_section">
        <div class="center_wrap">
            <div class="dt">
                <div class="dtc fullwidth vat" id="page_content">
                    <div class="page_content">
                        <h1><?php if(get_field('seo_h1', 'category_'.$cat)): echo the_field('seo_h1', 'category_'.$cat); else: single_cat_title(''); endif;?></h1>
                        <div class="big_search">
                            <form method="get" name="searchform" id="searchform"  action="<?php bloginfo('siteurl')?>">
                                <div class="dt">
                                    <div class="dtc">
                                        <input type="text" name="s" id="s" value="" placeholder="Поиск по новостям"/>
                                        <input value="3" name="cat" type="hidden">
                                    </div>
                                    <div class="dtc">
                                        <input id="btnSearch" type="submit" name="submit" value="Поиск" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab_selector">
                            <ul>
                                <?php 
									$args = array (
										'child_of' => 3, //3 - новости
										'hide_empty' => false,
										'orderby' => 'date',
										'order' => 'DESC',
										'title_li' => '',
										'current_category' => $cat
									);
									wp_list_categories($args);
								?>
							</ul>
                        </div>
                        <?php 
							$temp = $wp_query; 
							$wp_query = null; 
							$wp_query = new WP_Query(); 
							$wp_query->query('cat='.$cat.'&paged='.$paged); 
							if($wp_query->have_posts()):
								while ($wp_query->have_posts()) : $wp_query->the_post(); 
							?>
								<div class="new_block">
									<p class="new_date"><?php the_date('d.m.Y')?></p>
									<p class="new_title"><a href="<?php the_permalink()?>"><?php the_title();?></a></p>
									<p class="new_text">
										<?php echo the_excerpt();?>
									</p>
									<p class="new_more"><a href="<?php the_permalink()?>">Подробнее</a></p>
								</div>
							<?php 
								endwhile; ?>
						
								<div class="news_navigation">
									<div class="dt">
										<div class="dtc">
											<?php
												wp_pagenavi( array( 'query' => $wp_query ) );
												wp_reset_postdata();
											?>
											<?php 
											  $wp_query = null; 
											  $wp_query = $temp;  // Reset
											?>
										</div>
										<div class="dtc per_page">
											<p>Показать на странице:</p>
											<div class="per_page_holder">
												<span class="per_page_text"><?php echo get_option('posts_per_page');?></span>
												<ul>
													<li>5</li>
													<li>10</li>
													<li>15</li>
													<li>20</li>
													<li>25</li>
													<li>30</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							<?php else:?>
								<h3>В данной категории новостей нет</h3>
							<?php endif;?>
							<?php get_template_part('includes/page_date')?>
                    </div><!--/.page_content-->
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>