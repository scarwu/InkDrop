#!/usr/bin/env node

var express = require('express'),
	http = require('http'),
	path = require('path');

var routes = require('./routes'),
	post = require('./routes/post');

var inkdrop = express();

// all environments
inkdrop.set('port', process.env.PORT || 3000);
inkdrop.set('views', path.join(__dirname, 'views'));
inkdrop.set('view engine', 'jade');

inkdrop.use(express.favicon());
inkdrop.use(express.logger('dev'));
inkdrop.use(express.json());
inkdrop.use(express.urlencoded());
inkdrop.use(express.methodOverride());

inkdrop.use(inkdrop.router);

inkdrop.use(require('less-middleware')({ 
	src: path.join(__dirname, 'public'),
	compress: true
}));

inkdrop.use(require('connect-coffee-script')({ 
	src: path.join(__dirname, 'public'),
	compress: true
}));

inkdrop.use(express.static(path.join(__dirname, 'public')));

// development only
if ('development' == inkdrop.get('env')) {
	inkdrop.use(express.errorHandler());
}

inkdrop.get('/', routes.index);
inkdrop.all('/ajax/dashboard(/*)?', post.list);
inkdrop.all('/ajax/posts(/*)?', post.list);
inkdrop.all('/ajax/settings(/*)?', post.list);

http.createServer(inkdrop).listen(inkdrop.get('port'), function() {
	console.log('InkDrop listening on port ' + inkdrop.get('port'));
});

// LiveReload
var livereload = require('livereload').createServer({
	exts: ['less', 'jade', 'coffee']
});
livereload.watch(__dirname + '/public');
livereload.watch(__dirname + '/views');