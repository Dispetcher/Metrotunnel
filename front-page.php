<?php get_header();?>
<div id="association">
	<div class="center_wrap">
		<div class="section_content page_content">
			<p class="block_title"><?php the_field('second_block_title')?></p>
			<?php the_field('second_block_content')?>
			<div class="association_about">
				<span class="association_about_line"></span>
				<?php the_field('blue_line_block_content')?>
			</div>
			<div class="scroll_down_wrap">
				<span class="scroll_down"></span>
			</div>
		</div><!--/.section_content-->
	</div><!--/.center_wrap-->
</div><!--/#association-->
<div id="benefits">
	<div class="center_wrap">
		<p class="block_title"><?php the_field('benefits_block_title')?></p>
		<p class="block_undertitle"><?php the_field('benefits_block_undertitle')?></p>
		<div class="benefit_blocks">
			<?php
				if( have_rows('benefit_blocks') ):
					while ( have_rows('benefit_blocks') ) : the_row();?>
						<div class="benefit_block">
							<div class="benefit_block_icon">
								<img src="<?php the_sub_field('icon')?>" alt=""/>
							</div>
							<p class="benefit_block_title"><?php the_sub_field('title')?></p>
							<p class="benefit_block_text"><?php the_sub_field('text')?></p>
						</div><!--/.benefit_block-->	
			<?php	endwhile;
				endif;
			?>
		</div><!--/.benefit_blocks-->
	</div><!--/.center_wrap-->
</div><!--/#benefits-->
<div id="how_in">
	<div class="center_wrap">
		<p class="block_title"><?php the_field('how_in_title')?></p>
		<div class="how_in_blocks">
			<?php
				if( have_rows('how_in_steps') ):
					while ( have_rows('how_in_steps') ) : the_row();?>
						<div class="how_in_block">
							<div class="how_in_block_img">
								<img src="<?php the_sub_field('icon')?>" alt=""/>
							</div>
							<p class="how_in_block_title"><span><?php the_sub_field('title')?></span></p>
							<p class="how_in_block_text"><?php the_sub_field('text')?></p>
						</div><!--/.how_in_block-->	
			<?php	endwhile;
				endif;
			?>
		</div><!--/.how_in_blocks-->
		<div class="benefits_content">
			<?php the_field('how_in_info')?>
			<p class="benefit_rezhim"><?php the_field('how_in_rezhim')?></p>
		</div><!--/.benefits_content-->
	</div><!--/.center_wrap-->
</div><!--/#how_in-->
<div id="partners">
	<div class="center_wrap">
		<p class="block_title"><?php the_field('partners_block_title')?></p>
		<div class="partner_blocks">
			<?php
				if( have_rows('partners') ):
					while ( have_rows('partners') ) : the_row();?>
						<div class="partner_block">
							<a href="<?php the_sub_field('link')?>" target="_blank">
								<img src="<?php the_sub_field('banner')?>" alt=""/>
							</a>
						</div><!--/.partner_block-->
			<?php	endwhile;
				endif;
			?>
		</div><!--/.partner_blocks-->
	</div><!--/.center_wrap-->
</div><!--/#partners-->
<div id="information">
	<div class="center_wrap">
		<div class="block_title"><?php the_field('information_block_title')?></div>
		<div class="page_content">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php the_content(''); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<p class="page_date">Дата создания страницы: <?php the_time('d.m.Y')?></p>
			<p class="page_date_modified">Дата изменения страницы: <?php the_modified_time('d.m.Y')?></p>
		</div><!--/.page_content-->
	</div><!--/.center_wrap-->
</div><!--/#information-->
<?php get_footer();?>