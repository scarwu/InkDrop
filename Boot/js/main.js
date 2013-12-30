'use strict';

$(document).ready(function () {
	$('#content > div').hide().eq(0).show();
});

$('#nav > a').on('click', function () {
	var target = $(this).attr('href').slice(1);
	$('#content > #' + target).show().siblings().hide();
});