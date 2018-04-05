<?php $id = get_the_ID(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php
    if(is_category()):
        ?>

        <?php if(get_field('seo_title', 'category_'.$cat)):?>
        <title><?php the_field('seo_title', 'category_'.$cat);?></title>
    <?php elseif(get_field('seo_h1', 'category_'.$cat)):?>
        <title><?php the_field('seo_h1', 'category_'.$cat)?> | СРО А Объединение подземных строителей</title>
    <?php else:?>
        <title><?php single_cat_title();?> | СРО А Объединение подземных строителей</title>
    <?php endif;?>
        <?php if(get_field('seo_description', 'category_'.$cat)):?>
        <meta name="description" content="<?php the_field('seo_description', 'category_'.$cat)?>">
    <?php elseif(get_field('seo_h1', 'category_'.$cat)):?>
        <meta name="description" content="<?php the_field('seo_h1', 'category_'.$cat)?>| Ассоциация «Объединение строителей подземных сооружений, промышленных и гражданских объектов»">
    <?php else:?>
        <meta name="description" content="<?php single_cat_title();?> | Ассоциация «Объединение строителей подземных сооружений, промышленных и гражданских объектов»">
    <?php endif;?>
        <?php if(get_field('seo_keywords', 'category_'.$cat)):?>
        <meta name="keywords" content="<?php the_field('seo_keywords', 'category_'.$cat)?>">
    <?php elseif(get_field('seo_h1')):?>
        <meta name="keywords" content="<?php the_field('seo_h1', 'category_'.$cat)?>">
    <?php else:?>
        <meta name="keywords" content="<?php single_cat_title();?>">
    <?php endif;?>

    <?php else:?>
        <?php if(get_field('seo_title')):?>
            <title><?php the_field('seo_title')?></title>
        <?php elseif(get_field('seo_h1')):?>
            <title><?php the_field('seo_h1')?> | СРО А Объединение подземных строителей</title>
        <?php else:?>
            <title><?php wp_title('');?> | СРО А Объединение подземных строителей</title>
        <?php endif;?>
        <?php if(get_field('seo_description')):?>
            <meta name="description" content="<?php the_field('seo_description')?>">
        <?php elseif(get_field('seo_h1')):?>
            <meta name="description" content="<?php the_field('seo_h1')?>| Ассоциация «Объединение строителей подземных сооружений, промышленных и гражданских объектов»">
        <?php else:?>
            <meta name="description" content="<?php wp_title('');?> | Ассоциация «Объединение строителей подземных сооружений, промышленных и гражданских объектов»">
        <?php endif;?>
        <?php if(get_field('seo_keywords')):?>
            <meta name="keywords" content="<?php the_field('seo_keywords')?>">
        <?php elseif(get_field('seo_h1')):?>
            <meta name="keywords" content="<?php the_field('seo_h1')?>">
        <?php else:?>
            <meta name="keywords" content="<?php wp_title('');?>">
        <?php endif;?>
    <?php endif;?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/main_new.css">
    <?php if($id == 12): /* if($id == 2544):*/?><link rel="stylesheet" href="/wp-content/angapp/css/app.css"><?php endif; ?>
    <!--<script src="<?php bloginfo('template_url')?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>-->
    <?php wp_head();?>
</head>
<?php
$dop_classes = '';
if(!is_front_page()) $dop_classes = 'inner_page';
?>
<body <?php body_class($dop_classes)?>>
<!--[if lt IE 8]>
<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browsehappy.com/">обновите браузер</a> для полноценной работы сайта.</p>
<![endif]-->
<?php if(407 != $post->ID):?>
    <span class="mobile_menu_opener"></span>
    <div class="mobile_menu">
        <ul>
            <?php wp_nav_menu(array('menu' => 'Мобильное меню', 'container' => '','items_wrap' => '%3$s')); ?>
        </ul>
    </div>
<?php endif;?>
<div id="over_top">
    <div class="center_wrap">
        <div class="dt">
            <div class="dtc over_top_phones">+7 (812) 325-05-64, +7 (812) 325-05-65</div>
            <div class="dtc over_top_email"><a href="mailto:info@metrotunnel.ru">info@metrotunnel.ru</a></div>
            <div class="dtc over_top_call_order">
                <div class="call_order_form_opener">
                    <span>Заказать звонок</span>
                    <div class="call_order_form_holder">
                        <p>Заказать обратный звонок</p>
                        <?php echo do_shortcode('[contact-form-7 id="2372" title="Заказать звонок"]')?>
                        <div class="personal_wrap">
                            <div class="dt">
                                <div class="dtc vat">
                                    <span class="agree checked"></span>
                                </div>
                                <div class="dtc vat">
                                    Нажимая кнопку “Отправить”, я <br>подтверждаю свое согласие на <br><a target="_blank" href="/obrabotka-personalnyh-dannyh/">Обработку персональных данных</a>
                                </div>
                            </div>
                        </div>
                        <span class="close_call_order">Закрыть</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(is_front_page()):
    get_template_part('includes/main_header');
else:
    get_template_part('includes/inner_header');
endif;
?>
<?php get_template_part('includes/submenu_block')?>
        