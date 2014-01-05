module.exports = {
	init: function (req, res) {
		var method = req.method.toLowerCase();

		if (method in methods) {
			methods[method](req, res);
		}
		else {
			res.send(404);
		}
	}
};

var methods = {
	get: function (req, res) {
		res.send('a');
	}
};