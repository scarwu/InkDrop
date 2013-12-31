#!/usr/bin/env node

/**
 * Module dependencies.
 */

var express = require('express'),
	http = require('http'),
	path = require('path');

var routes = require('./routes'),
	post = require('./routes/post');

var app = express();

// all environments
app.set('port', process.env.PORT || 3000);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');
app.use(express.favicon());
app.use(express.logger('dev'));
app.use(express.json());
app.use(express.urlencoded());
app.use(express.methodOverride());
app.use(app.router);
app.use(require('less-middleware')({ 
	src: path.join(__dirname, 'public'),
	compress: true
}));
app.use(express.static(path.join(__dirname, 'public')));

// development only
if ('development' == app.get('env')) {
	app.use(express.errorHandler());
}

app.get('/', routes.index);

app.all('/ajax/posts(/*)?', post.list);

http.createServer(app).listen(app.get('port'), function() {
	console.log('InkDrop listening on port ' + app.get('port'));
});
