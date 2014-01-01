'use strict';

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