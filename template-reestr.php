<?php 
/*
Template Name: Реестр
*/
get_header();?>
<div class="content_bg">
    <?php get_template_part('includes/breadcrumbs');?>
    <div id="content_section">
        <div class="center_wrap">
            <div class="dt content_dt">
                <?php get_sidebar();?>
				<div class="dtc vat page_content_reestr" id="page_content">
                    <div class="page_content">
                        <h1><?php if(get_field('seo_h1')): echo the_field('seo_h1'); else: the_title(''); endif;?></h1>
						<div class="page_content_orgnumbers">
	По состоянию на <?php echo date(get_option('date_format')); ?> года количество действующих членов СРО &mdash; <?php echo get_post_meta($post->ID, 'orgnumber', true); ?>
						</div>
                        <?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php the_content(''); ?>
							<?php endwhile; ?>
						<?php endif; ?>
                    </div><!--/.page_content-->
				<div class="page_content_underreestr">
					<p>
						<strong>СРО А «Объединение подземных строителей»</strong> публикует на своем сайте Реестр членов СРО, специализирующихся на строительстве подземных сооружений, позволяющий потенциальным заказчикам, застройщикам, всем заинтересованным бизнес-субъектам Санкт-Петербурга и других регионов РФ ознакомиться с актуальными данными о  компаниях, имеющих право осуществлять строительные работы.
					</p>
					<p>
						Полный и достоверный Реестр членов СРО строителей дает возможность любому желающему оперативно проверить информацию о любой строительной компании или фирме, с которой планирует сотрудничать. В Реестре членов СРО строителей указываются сведения о размере компенсационных фондов, о наличии права выполнять строительство и о категории объектов, на которых может работать конкретная организация. 
					</p>
					<p>
						В Реестре содержатся сведения относительно имущественной ответственности члена Ассоциации, данные о страховщике, а также ранее выданные свидетельства о допуске СРО. Также указаны данные о проведенных проверках и их результатах. Реестр регулярно обновляется, поэтому содержит актуальные данные. 
					</p>
				</div>
				<p class="page_date date_reestr">Дата создания страницы: <?php the_time('d.m.Y H:i')?></p>
				<p class="page_date_modified">Дата изменения страницы: <?php echo date(get_option('date_format'));?> 08:25<?php// the_modified_time('d.m.Y H:i')?></p>
                </div><!--/#page_content-->
            </div><!--/.dt-->
        </div><!--/.center_wrap-->
    </div><!--/#content_section-->
</div><!--/.content_bg-->
<?php get_footer();?>