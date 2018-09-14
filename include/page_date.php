<?php
$id = get_the_ID();
?>
<p class="page_date">Дата создания страницы: <?php the_time('d.m.Y H:i')?></p>
<?php if ($id == 12):?>
<p class="page_date_modified">Дата изменения страницы: <?php echo date(get_option('date_format'));?> 08:21</p>
<?php ;else: ?>
<p class="page_date_modified">Дата изменения страницы: <?php the_modified_time('d.m.Y H:i')?></p>
<?php ;endif;?>