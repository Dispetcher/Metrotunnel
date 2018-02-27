<?php 
/*
Template Name: Нормативно-техническая документация
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
                        <div class="big_search interactive_search">
                            <form action="#">
                                <input type="text" placeholder="Начните вводить название документа"/>
                            </form>
                        </div>
                        <div class="interactive_search_results links_with_icons">
                            <?php
								if( have_rows('doc_razdels') ):
									while ( have_rows('doc_razdels') ) : the_row();?>
										<h3><?php the_sub_field('title')?></h3>
										<?php 
										$docs = get_sub_field('docs');
										foreach($docs as $doc):
										?>
											<div class="dt document_block">
												<div class="dtc vat document_block_icon">
													<a href="<?php echo $doc['file']?>" target="_blank">
														<img src="<?php echo $doc['icon']?>" alt="">
													</a>
												</div>
												<div class="dtc vat document_block_info">
													<p><a href="<?php echo $doc['file']?>" target="_blank"><?php echo $doc['link_text']?></a></p>
												</div>
											</div>
										<?php endforeach?>
							<?php	endwhile;
								endif;
							?>
						</div><!--/.interactive_search_results-->
						<div class="page_content">
							<?php the_field('bottom_content')?>
						</div>
						<?php get_template_part('includes/page_date')?>
                    </div><!--/.page_content-->
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>