'use strict';

$(document).ready( () -> 
	window.inkdropView = new inkdropView
	window.inkdropModel = new inkdropModel
	window.inkdropRouter = new inkdropRouter

	Backbone.history.start()
)