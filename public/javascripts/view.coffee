'use strict';

inkdropView = Backbone.View.extend({
	initialize: () ->

	render: (target, params = {}) ->
		$('#container').html($('#' + target + '_template').html())

})