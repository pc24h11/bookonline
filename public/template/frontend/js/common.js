
$(document).ready(function() {
	
	// SHOW POPUP
	$("a.colorbox").on('click', function(){
		var urlPopup	= $(this).attr('href');
		var bookID		= $(this).data('id');
		$('div.quick-view').load(urlPopup, {id: bookID});
	
		$("a.colorbox").colorbox({
			inline		: true,
			html		: true,
			width		: '58%',
			maxWidth	: '780px',
			height		: '70%',
			open		: false,
			returnFocus	: false,
			fixed		: true,
			title		: false,
			href		: '.quick-view',
		});
	});
	
	$('#camera_wrap_0').camera({
		fx: 'stampede',
		navigation: true,
		playPause: false,
		thumbnails: false,
		navigationHover: false,
		barPosition: 'top',
		loader: false,
		time: 3000,
		transPeriod:800,
		alignment: 'center',
		autoAdvance: true,
		mobileAutoAdvance: true,
		barDirection: 'leftToRight', 
		barPosition: 'bottom',
		easing: 'easeInOutExpo',
		fx: 'simpleFade',
		height: '42.5287%',
		minHeight: '90px',
		hover: true,
		pagination: false,
		loaderColor			: '#1f1f1f', 
		loaderBgColor		: 'transparent',
		loaderOpacity		: 1,
		loaderPadding		: 0,
		loaderStroke		: 3
	});
});


