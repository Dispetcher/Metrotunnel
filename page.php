<?php get_header();?>
<div class="content_bg">
    <?php echo get_template_part('includes/breadcrumbs')?>
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
						<?php
							if( have_rows('razdels') ):
								$count = 1;
								while ( have_rows('razdels') ) : the_row();?>
								<div id="razdel_<?php echo $count;?>" class="page_razdel">
									<?php the_sub_field('razdel_content')?>
								</div>
								<div class="bold_hr"></div>								
						<?php	$count++; endwhile;
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