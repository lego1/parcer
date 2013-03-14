$(document).ready(function(){
	$('[rel=loading]').click(function(){
		$('body').prepend('<div class="loading"></div>');
		$('body > .loading').css({
			'position' : 'fixed',
			'top' : 0,
			'left' : 0,
			'width' : $(document).width()+'px',
			'height' : $(document).height()+'px',
			'background' : 'url("img/loading.gif") no-repeat center 150px rgba(0, 0, 0, 0.6)'
		});
	});

	$('header .tab').click(function(){
		if ($(this).css('right') == '-140px')
			$(this).animate({'right':'-10px'},1000);
		else
			$(this).animate({'right':'-140px'},1000);
	});
});