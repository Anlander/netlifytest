jQuery(function($) {

	$(document).on('ready', function() {});
	$(window).on('resize', function() {});


	/*=================================
	=            Functions            =
	=================================*/

	$('.menu-button-container').click(function() {
		if ($('.menu').hasClass('menu-active')) {
			$('.menu').removeClass('menu-active');
			$('.menu-item').removeClass('li-active');
		} else {
			$('.menu').addClass('menu-active');

			$('.menu-item').each(function(i){
				var menuItem = $(this);
				setTimeout(function() {
					menuItem.addClass('li-active');
				}, 200*i);

			});
		}

	});	

	// CARDS Hover effect

	if (window.matchMedia('(min-width: 991px)').matches) {

		$('.card-container').each(function() {

			var excerptContainer = $(this).find('.excerpt-container');
			var excerptHeight  = excerptContainer.height();

			var cardInfo = $(this).find('.card-info');

			cardInfo.css('bottom', -excerptHeight);

		});

		$('.card-container').hover(function() {
			var cardInner = $(this).find('.card-inner');
			var cardInfo = $(this).find('.card-info');
			cardInfo.css('bottom', '0px');
			cardInfo.find('.excerpt-container').css({
				'opacity': '1'
			});
			cardInner.css('background', 'rgba(0,0,0,0.5)');


		}, function() {
			var cardInner = $(this).find('.card-inner');
			var excerptContainer = $(this).find('.excerpt-container');
			var excerptHeight  = excerptContainer.height();
			var cardInfo = $(this).find('.card-info');

			cardInfo.css('bottom', -excerptHeight);
			excerptContainer.css({
				'opacity': '0'
			});
			cardInner.css('background', 'rgba(0,0,0,0.0)');

		});
	}
	
	// CAROUSEL 
	(function(){
		$('#carousel123').carousel({ interval: 5000 });
		$('#carouselABC').carousel({ interval: 3600 });
	})();

	(function(){
		$('.carousel-showsixmoveone .item').each(function(){
			var itemToClone = $(this);

			for (var i=1;i<3;i++) {
				itemToClone = itemToClone.next();

				if (!itemToClone.length) {
					itemToClone = $(this).siblings(':first');
				}

				itemToClone.children(':first-child').clone()
				.addClass("cloneditem-"+(i))
				.appendTo($(this));
			}
		});
	})();

	$('.carousel-inner').children(':first-child').addClass('active');


	//Hamburger -menu
	(function() {

		"use strict";

		var toggles = document.querySelectorAll(".c-hamburger");

		for (var i = toggles.length - 1; i >= 0; i--) {
			var toggle = toggles[i];
			toggleHandler(toggle);
		}

		function toggleHandler(toggle) {
			toggle.addEventListener( "click", function(e) {
				e.preventDefault();
				(this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
			});
		}

	})();


	//Dropdown-menu
	$('.menu-item-has-children').click(function(){
		
		var subMenu = $(this);
		if (subMenu.hasClass('sub-show')) {
			subMenu.removeClass('sub-show');
		} else {
			subMenu.addClass('sub-show');
		}

		console.log('toggle');
	});

	// (function() {
	// 	// En flag in small menu
	// 	var enFlag = localized.images + 'en_flag.jpg',
	// 		menuSm = $('#menu-small-menu'),
	// 		li, img;

	// 	li = $('<li></li>');
	// 	li.addClass('menu-item menu-item-1337');
	// 	li.attr('id', 'menu-item-1337');

	// 	img = $('<img>');
	// 	img.attr('src', enFlag);

	// 	li.append(img);
	// 	menuSm.append(li);
	// })();


});