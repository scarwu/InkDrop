#!/usr/bin/env node

var express = require('express'),
	http = require('http'),
	path = require('path');

var routes = require('./routes'),
	routeDashboard = require('./routes/dashboard'),
	routePost = require('./routes/post'),
	routeSetting = require('./routes/setting');

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

inkdrop.use(require('less-middleware') ({ 
	src: path.join(__dirname, 'public'),
	dest: path.join(__dirname, 'tmp'),
	compress: true
}));

inkdrop.use(require('connect-coffee-script') ({ 
	src: path.join(__dirname, 'public'),
	dest: path.join(__dirname, 'tmp'),
	compress: true,
	bare: true
}));

inkdrop.use(express.static(path.join(__dirname, 'public')));
inkdrop.use(express.static(path.join(__dirname, 'tmp')));

if ('development' == inkdrop.get('env')) {
	inkdrop.use(express.errorHandler());
}

// Route Setting
inkdrop.all('*.(coffee|less)', function (req, res) {
	res.send(404);
});

inkdrop.get('/', routes.index);
inkdrop.all('/ajax/dashboard(?:/*)?', routeDashboard.init);
inkdrop.all('/ajax/post(?:/*)?', routePost.init);
inkdrop.all('/ajax/setting(?:/*)?', routeSetting.init);

http.createServer(inkdrop).listen(inkdrop.get('port'), function () {
	console.log('InkDrop listening on port ' + inkdrop.get('port'));
});

// LiveReload
var livereload = require('livereload').createServer({
	exts: ['jade', 'less', 'coffee']
});

livereload.watch(__dirname + '/public');
livereload.watch(__dirname + '/views');