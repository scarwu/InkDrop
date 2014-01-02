'use strict';

inkdropView = Backbone.View.extend({
	initialize: () ->

	render: (target, params = {}) ->
		$('#container').html($('#' + target + '_template').html())

})

inkdropModel = Backbone.Model.extend({
	initialize: () ->

})

inkdropRouter = Backbone.Router.extend({
	routes:
		'dashboard': 'dashboard'
		'editor': 'editor'
		'settings': 'settings'
		'logout': 'logout'
		'*actions': 'dashboard'

	dashboard: () ->
		inkdropView.render('dashboard')

	editor: () ->
		inkdropView.render('editor')

	settings: () ->
		inkdropView.render('settings')
		
	logout: () ->
		
})

$(document).ready( () -> 
	window.inkdropView = new inkdropView
	window.inkdropModel = new inkdropModel
	window.inkdropRouter = new inkdropRouter

	Backbone.history.start()

	$('.editor .input').on('input', () -> 
		output = markdown.toHTML($(this).val())
		$('.editor .output').html(output)
		console.log(output)
	)
)