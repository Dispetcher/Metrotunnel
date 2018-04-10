<?php 
/*
Template Name: Юридическая поддержка
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
	
						<div class="jur_questions_block">
							<table>
								<tbody>
		                            <?php
										$m=0; $n=0;
										if( have_rows('questions') ):
											while ( have_rows('questions') ) : the_row();?>
												<tr class="jur_questions">
													<td class="jur_question"><strong><?php the_sub_field('short_question')?></strong></td>
													<td class="see_answer" onclick="hide_answ(<?php echo $m.','.$n ?>);">
														<span class="answer_txt">Посмотреть ответ</span>
														<img src="<?php bloginfo('template_url')?>/img/double_down40_40.png" class="jur_img img_active">
														<img src="<?php bloginfo('template_url')?>/img/double_up40_40.png" class="jur_img">
													</td>
												</tr>
												<tr class="jur_answer_line">
													<td class="jur_question jur_line" colspan="2">
														<div class="dashed_line">														
														</div>
													</td>
												</tr>	
												<tr class="jur_answer">
													<td class="jur_question" colspan="2">
														<p>
															<strong>Вопрос:</strong>
														</p>
														<?php the_sub_field('full_question')?>
													</td>
												</tr>	
												<tr class="jur_answer">
													<td class="jur_question" colspan="2">
														<p>
															<strong>Ответ:</strong>
														</p>
														<?php the_sub_field('answer')?>
													</td>
												</tr>
												<tr class="jur_answer">
													<td class="jur_question jur_line" colspan="2">
														<div class="solid_line">														
														</div>
													</td>
												</tr>	
									<?php $m+=3; $n+=2;
											endwhile;
										endif;
									?>
								</tbody>
							</table>
						</div><!--/.jur_questions_block-->

						<?php get_template_part('includes/page_date')?>
                    </div><!--/.page_content-->
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>