(function ($) {
    $(document).ready(function () {
        //MaskedInput
            $("input[type='tel']").mask('+7(999) 999-99-99');
		//Only digits
			$(document).on("change keyup input click", 'input[name="your-name"], input[name="your-dol"]', function() {
				if (this.value.match(/[^-\.,;":'a-zA-Zа-яА-Я ]/g)) {
					this.value = this.value.replace(/[^-\.,;":'a-zA-Zа-яА-Я ]/g, '');
				}
			});
			$('.wpcf7-response-output').ajaxComplete(function(){$(this).delay(2000).fadeOut('slow');});
		//Show call order menu
			$(document).on("click", ".call_order_form_opener > span", function(e){
                $('.call_order_form_holder').stop(true,false).fadeToggle(300);
            });
		//Close call order 
			$(document).on("click", ".close_call_order", function(e){
                $('.call_order_form_holder').stop(true,false).fadeOut(300);
            });
		//Personal agree 
			$(document).on("click", ".agree", function(){
				$(this).toggleClass('checked');
				if(!$(this).hasClass('checked')) {
					$('.call_order_form_holder input[type="submit"]').attr('disabled',true);
					alert("Для отправки запроса необходимо согласиться с правилами обработки персональных данных");
				} else {
					$('.call_order_form_holder input[type="submit"]').removeAttr('disabled');
				}
			});
			$(document).on("mouseover", '.call_order_form_holder input[type="submit"]', function(){
				if($(this).attr('disabled')) {
					alert("Для отправки запроса необходимо согласиться с правилами обработки персональных данных");
				}
			});
		//Mobile menu
            $(document).on("click", ".mobile_menu_opener", function(e){
                $('.mobile_menu').stop(true,false).slideToggle(300);
            });
            $('.mobile_menu li').has('ul').append('<span class="opener"></span>');
            $(document).on("click", '.mobile_menu li .opener', function(){
                $(this).toggleClass('opened');
                $(this).siblings('ul').stop(true,false).slideToggle(300);
            });
		//Smooth scroll
			$(document).on("click", ".header_link a[href^='#']", function(e){
                e.preventDefault();
				var target = $(this).attr('href');
				var top = $(target).offset().top;
				$('body,html').stop(false, false).animate({
                    scrollTop: top
                }, 800);
            });
        //Top search form open
            $(document).on("click", ".inner_search_opener", function(e){
                $('.inner_search_wrap form').fadeIn(300);
            });
            $(document).on("click", "body", function(e){
                $('.inner_search_wrap form').fadeOut(300);
            });
            $(document).on("click", ".inner_search_wrap form, .inner_search_opener ", function(e){
                e.stopPropagation();
            });
        //Set header height
            var window_height = $(window).height();
            var window_width = $(window).width();
            if((window_height > 479) && (window_width > 767)) {
                $('body.home .header_content').height(window_height - 150);
            }
        //Open submenu
            $(document).on("click", ".submenu_opener", function(e){
                e.stopPropagation();
				$(this).toggleClass('opened');
				$('.main_menu').toggleClass('can_open');
				$('#header').toggleClass('z1');
                $('.submenu_columns').stop(true,false).slideToggle(500, function(){
					if(!$(this).is(':visible')) {
						$('.submenu_columns').css('display','');
						$('.submenu_columns').removeClass('opened');
					} else {
						$('.submenu_columns').addClass('opened');
					}
					/*
					if($(".submenu_opener").hasClass('opened')) {
						if($('body').hasClass('home')) {
							var top = $('#main_nav').offset().top;
							$('body,html').stop(false, false).animate({
								scrollTop: top
							}, 300);
						}
					}
					*/
				});
            });
			/*
			$('.main_menu > li').on('mouseenter', function(){
				$('.submenu_columns').addClass('opened');
				$(".submenu_opener").addClass('opened');
			}); 
			$(document).on("hover", ".inner_page .main_menu > li", function(e){
                $(this).toggleClass('opened');
				
                $('.submenu_columns').slideDown(500, function(){
					$(".submenu_opener").addClass('opened');
				});
            });
			*/
		//hide submenu by click by body 
			$(document).on("click", "body", function(){
				$('.submenu_columns.opened').removeClass('opened').css('display','');
				$(".submenu_opener").removeClass('opened');
				$('#header').toggleClass('z1');
				$('.main_menu').toggleClass('can_open');
			});
			$(document).on("click", ".submenu_columns", function(e){
				e.stopPropagation();
			});
        //Submenu column podsvetka
            $('.main_menu > li').hover(function(){
                var ind = $(this).index();
                $('.submenu_column').eq(ind).addClass('hovered');
            }, function(){
                var ind = $(this).index();
                $('.submenu_column').eq(ind).removeClass('hovered');
            });
            $('.submenu_column').hover(function(){
                var ind = $(this).index();
                $('.main_menu > li').eq(ind).addClass('hovered');
            }, function(){
                var ind = $(this).index();
                $('.main_menu > li').eq(ind).removeClass('hovered');
            });
        //To top
			$(window).scroll(function () {
				if ($(this).scrollTop() > 200) {
					$('.to_top').fadeIn();
				} else {
					$('.to_top').fadeOut();
				}
			});
			$('.to_top').click(function () {
				$('body,html').stop(false, false).animate({
					scrollTop: 0
				}, 800);
				return false;
			});	
		/*
            $(window).scroll(function () {
                var win = $(this);
                $('.to_top').fadeOut();
                clearTimeout($.data(this, 'scrollTimer'));
                $.data(this, 'scrollTimer', setTimeout(function() {
                    if (win.scrollTop() > 200) {
                        $('.to_top').fadeIn();
                    }
                }, 250));
            });
            $('.to_top').click(function () {
                $('body,html').stop(false, false).animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
            
			
			if( Modernizr.touch ){
				$(window).scroll(function () {
					if ($(this).scrollTop() > 200) {
						$('.to_top').addClass('visible');
					} else {
						$('.to_top').removeClass('visible');
					}
				});
				
			} else {
				$(document).on('mousemove', 'body', function(e){
					if($(window).scrollTop() > 200) {
						if(e.pageX < 100) {
							if(!$('.to_top').hasClass('visible')) {
								$('.to_top').addClass('visible');
							}
							if(!$('body').hasClass('scrolled')) {
								$('body').addClass('scrolled');
							}
						} else {
							$('.to_top').removeClass('visible');
							$('body').removeClass('scrolled');
						}
					}
				});
			}
            
            $('.to_top').click(function () {
                $('body,html').stop(false, false).animate({
                    scrollTop: 0
                }, 800, function(){
					$('.to_top').removeClass('visible');
					$('body').removeClass('scrolled');
				});
                return false;
            });
			*/
		//Scroll down
			$(document).on("click", ".scroll_down", function(){
				var top = $('#benefits').offset().top;
				$('body,html').stop(false, false).animate({
                    scrollTop: top
                }, 300);
                return false;
			});
        //link scroll
            $('.page_content a[href^="#"]').click(function (e) {
                e.preventDefault();
                var target = $(this).attr('href');
                var top = $(target).offset().top;
                $('body,html').stop(false, false).animate({
                    scrollTop: top
                }, 800);
                return false;
            });
        //Table_wrap
            $('table').each(function(){
                $(this).wrap('<div class="table_wrapper"></div>');
            });
        //Interactive document search
            $(document).on('keyup', '.interactive_search input', function(){
                var inputed_text = $(this).val();
                inputed_text = inputed_text.toLowerCase();
                if(inputed_text != '') {
                    $('.interactive_search_results .document_block').each(function(){
                        var text = $(this).find('p:first-child').text();
                        text = text.toLowerCase();
                        if(text.indexOf(inputed_text) != -1) {
                            $(this).removeClass('hidden');
                        } else {
                            $(this).addClass('hidden');
                        }
                    });
                } else {
                    $('.interactive_search_results .document_block.hidden').removeClass('hidden');
                }

            });
        //Interactive otchetnost filter
            $(document).on("change", "#buh", function(){
                if($('#buh').prop("checked")) {
                    $('p.buh.hidden').removeClass('hidden');
                } else {
                    $('p.buh').addClass('hidden');
                }
            });
            $(document).on("change", "#fz", function(){
                if($('#fz').prop("checked")) {
                    $('p.fz.hidden').removeClass('hidden');
                } else {
                    $('p.fz').addClass('hidden');
                }
            });
			  $(document).on("change", "#soyt", function(){
                if($('#soyt').prop("checked")) {
                    $('p.soyt.hidden').removeClass('hidden');
                } else {
                    $('p.soyt').addClass('hidden');
                }
            });
            $(document).on("change", ".search_by_year input", function(){
                var val = $(this).val();
                var block_class = '.year_' + val;
                console.log(block_class);
                if($(this).prop("checked")) {
                    $(block_class).removeClass('hidden');
                } else {
                    $(block_class).addClass('hidden');
                }
            });
		//Change news num per page
			$(document).on("click", ".per_page_holder li", function(e){
                var num = $(this).text();
				$.post('/wp-content/themes/shablon/change_news_num.php', {news_num:num}, function(){
					document.location.href = '/category/novosti/';
				});
            });	
		//Cats accordeon
			$(document).on("click", '.cat_block_link', function(e){
				e.preventDefault();
				$(this).toggleClass('opened');
				var parent_block = $(this).parent('.cat_block');
				$('.cat_block_content', parent_block).stop(true,false).slideToggle(500);
			});
		//Side Razdel links smoth scroll
			$('.side_menu li a[href^="#razdel"]').click(function (e) {
                e.preventDefault();
                var target = $(this).attr('href');
                var top = $(target).offset().top;
                $('body,html').stop(false, false).animate({
                    scrollTop: top
                }, 300);
                return false;
            });
		//Personal data popup window
			var cook = $.cookie('pdataread');
		    if (cook !== '1'){
				if (window_width > 767){
					setTimeout(function(){
					$('#person_data').css('display','block').animate(
						{top:'52px'}, 1100);
					}, 2000);
				};
					$('.close_person_data').on('click', function(e){
						e.preventDefault();
						$('#person_data').fadeOut(300);
						$.cookie('pdataread', '1', {expires : 30});
					});
			};
		//Reestr corrections
		$('.member-row').on('click', function(){
			if($(window).innerWidth() < 1024){
				$(window).scrollTop(395);
			}else{
				$(window).scrollTop(360);
			}
			setTimeout(correct, 500);
			setTimeout(function(){
				while($('.memberdetails tbody tr td').eq(4).css('background-color') != 'rgb(131, 226, 194)'){
					setTimeout(correct, 500);
				}	
			}, 800);
		});
 			
		function correct(){
			var tab_head = $('.memberdetails tbody tr td b');
			var ch;
			for(let i=0; i<tab_head.length; i++){
				if(tab_head.eq(i).text() == "Факты применения мер дисциплинарного воздействия"){
					ch = 1;
				}else{
					ch = 0;
				}
			}
			if(ch == 0){
				var tabrow = $('.memberdetails tbody');
				var ins_el = '<tr><td colspan="2" align="center"><b>Факты применения мер дисциплинарного воздействия</b></td></tr>';
				$(ins_el).appendTo(tabrow);
				tabrow = $('.memberdetails tbody');
				ins_el = '<tr><td>-</td><td>-</td></tr>';
				$(ins_el).appendTo(tabrow);
			}
			let tab_row = $('.memberdetails tbody tr td');
				for(let i=0; i<tab_row.length; i++){	
					if(tab_row.eq(i).text() == "Наименование страховой компании"){
						var str_row = tab_row.eq(i).next().text().replace('-Не определено-', '');
						tab_row.eq(i).next().html(str_row);
					}
				}					
			tab_head = $('.memberdetails tbody tr td b');
				tab_head.parent().css('background-color', '#83e2c2');
		};
	});	
})(jQuery)
