<?php
$id = get_the_ID();

/*** Для печатной версии карточки организации _ убираем футер  ***/

if($id != 2605){ ?>


<footer id="footer">
            <nav id="footer_nav" <?php if($id == 407):?>class="hidden"<?php endif;?>>
                <div class="center_wrap">
                    <ul class="footer_menu">
                        <?php wp_nav_menu(array('menu' => 'Нижнее меню', 'container' => '','items_wrap' => '%3$s')); ?>
                    </ul>
                </div>
            </nav>
            <div class="footer_content">
                <div class="center_wrap">
                    <div class="dt">
                        <div class="dtc vab logo_and_copy">
                            <div class="dt vab footer_logo">
                                <div class="dtc footer_logo_img">
                                    <a href="/"><img src="<?php bloginfo('template_url')?>/img/footer_logo.png" alt=""/></a>
                                </div>
                                <div class="dtc vab footer_logo_text">
                                    <?php if($id == 407):?>
                                        <a href="/">Association of Underground Builders</a>
                                    <?php else:?>
                                        <a href="/">СРО А «ПОДЗЕМДОРСТРОЙ»</a>
                                    <?php endif;?>
                                </div>
                            </div>
                            <p class="copy">© <?php if(407==$post->ID):?>© All rights reserved.<?php else:?>Все права защищены.<?php endif;?> <?php echo date('Y')?>.</p>
                            
<!-------------          IP logger          ------------>
                            <div style="width:80px; height:40px; display:none;">
                                <img src="https://iplogger.com/Zzdz3" alt="iplogger.ru - IP Logging Service" border="0">
                            </div>
                        </div><!--/.footer_logo-->
                        <div class="dtc vab footer_phones">
                            <p class="footer_phone">
                                <span class="label"><?php if($id == 407):?>Tel:<?php else:?>Телефоны:<?php endif;?></span>
                                <a href="tel:<?php echo str_replace(' ','',get_field('phone_1','options'))?>"><?php the_field('phone_1','options')?></a>
                                <?php if($id == 407):?>
                                    <span>(Association of Undergournd Builders)</span>
                                <?php else:?>
                                    <span><?php the_field('phone_1_text','options')?></span>
                                <?php endif;?>
                            </p>
                            <?php if(407!=$post->ID):?>
                                <p class="footer_phone">
                                    <a href="tel:<?php echo str_replace(' ','',get_field('phone_2','options'))?>"><?php the_field('phone_2','options')?></a>
                                    <span><?php the_field('phone_2_text','options')?></span>
                                </p>
                            <?php endif;?>
                        </div>
                        <div class="dtc vab footer_contacts">
                            <p class="footer_email">
                                <span class="label">E-mail:</span>
                                <a href="mailto:info@metrotunnel.ru"><?php the_field('email','options')?></a>
                            </p>
                            <?php if(407==$post->ID):?>
                                <p class="footer_address">
                                    <span class="label">Address:</span>
                                    office 611, 4K, Fuchika st, St Petersburg, Russia, 192102 
                                </p>
                            <?php else:?>
                                <p class="footer_address">
                                    <span class="label">Адрес:</span>
                                    <?php the_field('address','options')?>
                                </p>
                            <?php endif;?>
                        </div>
                        <div class="dtc vab footer_social">
                            <p class="footer_vk">
                                <?php if(407==$post->ID):?>
                                    <span class="label">Connect with us:</span>
                                <?php ;else: ?>
                                    <span class="label">Присоединяйся к нам в соцсетях:</span>
                                <?php ;endif; ?>
                                    <a href="https://vk.com/metroproekttunnel">
                                        <img class="vk_logo" src="<?php echo get_template_directory_uri().'/img/vk-logo-white.png';?>">
                                    </a>
                            </p>                            
                        </div>
                    </div><!--/.dt-->
                </div><!--/.center_wrap-->
            </div><!--/.footer_content-->
        </footer><!--/#footer-->
<?php } ?>        
        <?php if($id != 12):?>
        <div class="to_top">
            <span>наверх</span>
        </div>
        <?php ; endif; ?>





<!-- Ресурсы страницы-->
<?php if ( current_user_can( 'manage_options' ) ) { ?>
<div style="position:fixed;z-index:999;top:50px;left:5px;padding:5px;font-size:7pt;color:#fff;background:#000;">
<?php echo '<h6 style="font-size:7pt; margin:0">Loading time:'; timer_stop(1); echo 's/</h6>' ?>
<?php echo '<h6 style="font-size:7pt; margin:0">Queries: '.get_num_queries().' /</h6>'; ?>
<?php if (function_exists('memory_get_usage')) echo '<h6 style="font-size:7pt; margin:0">Memory used: '.round(memory_get_usage()/1024/1024, 2) . 'MB</h6>'; ?>
</div>
<?php } ?>

        <?php wp_footer();?>
        <script src="<?php bloginfo('template_url')?>/js/mask.js"></script>
        <script src="<?php bloginfo('template_url')?>/js/main_new.js"></script>

        <script>
        function enableSubscrBtn(){
            document.querySelector('#vypiskaReq').disabled = false;
        };          
        </script>

        <!--script src="/wp-content/angapp/js/angular.js"></script>
        <script src="/wp-content/angapp/js/app.js" type="text/javascript"></script> -->

    <?php //if ($id == 12){ ?>
    <!--    <script src="/wp-content/AppReestrOPS/js/main/polyfills.ang4.js"></script>
        <script src="/wp-content/AppReestrOPS/js/main/main.ang4.js"></script>
        <script src="/wp-content/AppReestrOPS/js/main/runtime.ang4.js"></script>
    <?php// }else if ($id == 2605){ ?>
        <script src="/wp-content/AppReestrOPS/js/print/polyfills.ang4.print.js"></script>
        <script src="/wp-content/AppReestrOPS/js/print/main.ang4.print.js"></script>
        <script src="/wp-content/AppReestrOPS/js/print/runtime.ang4.print.js"></script>
    <?php //} ?>
    -->
    <!--    <script src="<?php// bloginfo('template_url')?>/js/reestr.js"></script>  -->

        <!-- Yandex.Metrika counter -->
<noscript><div><img src="https://mc.yandex.ru/watch/47322423" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    </body>
</html>