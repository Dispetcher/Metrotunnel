<?php 
/*
Template Name: Отчетность
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
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php the_content(''); ?>
							<?php endwhile; ?>
						<?php endif; ?>          
                        <div class="interactive_search">
                            <div class="search_by_type">
                                <span>Показать:</span>
                                <label for="buh"><input checked="checked" type="checkbox" name="buh" id="buh"/><span class="pseudo_checkbox"></span>Бухгалтерская отчетность</label>
                                <label for="fz"><input checked="checked" type="checkbox" name="fz" id="fz"/><span class="pseudo_checkbox"></span>Отчетность по 7-ФЗ</label>
								<label for="soyt"><input checked="checked" type="checkbox" name="soyt" id="soyt"/><span class="pseudo_checkbox"></span>Cпециальная оценка условий труда</label>
                            </div>
                            <div class="search_by_year">
                                <?php
									if( have_rows('years') ):
										$count = 1;
										while ( have_rows('years') ) : the_row();?>
											<label for="year_<?php echo $count?>"><input checked="checked" type="checkbox" name="year_<?php echo $count?>" id="year_<?php echo $count?>" value="<?php the_sub_field('title')?>"/><span class="pseudo_checkbox"></span><?php the_sub_field('title')?></label>	
								<?php	$count++; endwhile;
									endif;
								?>
							</div>
                        </div>
                        <div class="bold_hr"></div>
                        <?php
							if( have_rows('years') ):
								while ( have_rows('years') ) : the_row();?>
									<div class="year_block year_<?php the_sub_field('title')?>">
										<div class="year_block_title"><?php the_sub_field('title')?> г.</div>
										<div class="year_block_content">
											<?php
												$docs = get_sub_field('dosc');
												foreach($docs as $doc):
											?>
												<p class="<?php echo $doc['type']?>"><a href="<?php echo $doc['file']?>" target="_blank"><?php echo $doc['text']?></a></p>
											<?php endforeach;?>
										</div>
									</div>	
						<?php	endwhile;
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