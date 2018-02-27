<?php 
/*
Template Name: Отдел контроля
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
						<div class="organ_kontrol_persons_blocks">
                            <?php
								if( have_rows('persons') ):
									while ( have_rows('persons') ) : the_row();?>
										<div class="organ_kontrol_persons_block">
											<div class="organ_kontrol_persons_block_img">
												<img src="<?php the_sub_field('photo')?>" alt=""/>
											</div>
											<p class="organ_kontrol_persons_block_title"><?php the_sub_field('name')?></p>
											<p class="organ_kontrol_persons_block_dol"><?php the_sub_field('dol')?></p>
											<p class="organ_kontrol_persons_block_email"><a href="mailto:<?php the_sub_field('email')?>"><?php the_sub_field('email')?></a></p>
										</div>	
							<?php	endwhile;
								endif;
							?>
						</div><!--/.organ_kontrol_persons_blocks-->
						<?php get_template_part('includes/page_date')?>
                    </div><!--/.page_content-->
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>