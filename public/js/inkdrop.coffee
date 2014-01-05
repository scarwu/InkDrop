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

htmlEntities = (str) ->
	return String(str)
		.replace(/&/g, '&amp;')
		.replace(/</g, '&lt;')
		.replace(/>/g, '&gt;')
		.replace(/"/g, '&quot;')

$(document).ready( () ->
	window.inkdropView = new inkdropView
	window.inkdropModel = new inkdropModel
	window.inkdropRouter = new inkdropRouter

	Backbone.history.start()

	$('#container').delegate('#editor .text', 'input', () -> 
		text = $(this).val()
		html = markdown.toHTML(text)

		$('#editor .text_mirror').html(htmlEntities(text + '\n '))
		$('#editor .html').html(html)
	).delegate('#editor .text', 'keydown', (e) ->
		keyCode = e.keyCode || e.which

		if keyCode == 9
			e.preventDefault()

			start = $(this).get(0).selectionStart
			end = $(this).get(0).selectionEnd
			text = $(this).val()

			# if text.substring(start, end).split('\n').length > 1
			# 	statment = text.split('\n')

			# 	$(this).val('\t' + statment.join('\n\t'))
			# 	$(this).get(0).selectionEnd = start + statment.length
			# else
			$(this).val(text.substring(0, start) + '\t' + text.substring(end))
			$(this).get(0).selectionEnd = start + 1

			$(this).trigger('input')
	)
)