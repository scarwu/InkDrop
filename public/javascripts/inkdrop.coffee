'use strict'

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

	$('#editor .text').on('input', () -> 
		text = $(this).val()
		html = markdown.toHTML(text)

		$('#editor .text_mirror').html(text + '\n ')
		$('#editor .html').html(html)
	).on('keydown', (e) ->
		keyCode = e.keyCode || e.which

		if keyCode == 9
			e.preventDefault()

			start = $(this).get(0).selectionStart
			end = $(this).get(0).selectionEnd
			text = $(this).val()

			$(this).val(text.substring(0, start) + '\t' + text.substring(end))
			$(this).get(0).selectionEnd = start + 1

			$(this).trigger('input')
	)
)