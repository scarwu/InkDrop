<!doctype html>
<html lang="zh-tw" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>InkDrop</title>

		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
		
		<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	</head>
	<body> 

		<div id="main">
			<header>
				<h1>InkDrop</h1>
			</header>
			<div id="nav">
				<a href="#dashboard">Dashboard</a>
				<a href="#editor">Editor</a>
				<a href="#setting">Setting</a>
			</div>
			<div id="content">
				<div id="dashboard">
					<span class="">Pages</span>
					<span class="">Articles</span>
					<span class=""></span>
					<span class=""></span>
				</div>
				<div id="editor">
					<div class="posts"></div>
					<div class="">
						<div class="source">
							<textarea></textarea>
						</div>
						<div class="preview"></div>
					</div>
				</div>
				<div id="setting">
					<h3>Account</h3>
					<label><span>Username</span><input type="text" /></label><br /><br />
					<label><span>Password</span><input type="password" /></label><br />
					<label><span>Salt</span><input type="text" /></label><br />
					<label><span>Error Retry</span><input type="text" /></label><br />

					<h3>Blog</h3>
					<label><span>Name</span><input type="text" /></label><br />
					<label><span>Slogan</span><input type="text" /></label><br />
					<label><span>Description</span><input type="text" /></label><br />
					<label><span>Keywords</span><input type="text" /></label><br />
					<label><span>Footer</span><input type="text" /></label><br />

					<h3>Author</h3>
					<label><span>Name</span><input type="text" /></label><br />
					<label><span>Email</span><input type="text" /></label><br />

					<h3>Article</h3>
					<label><span>Quantity</span><input type="text" /></label><br />
					<label><span>Path Fromat</span><input type="text" /></label><br />

					<h3>RSS / Atom</h3>
					<label><span>Quantity</span><input type="text" /></label><br />

					<h3>Github</h3>
					<label><span>Account</span><input type="text" /></label><br />
					<label><span>Repository</span><input type="text" /></label><br />

					<h3>Other</h3>
					<label><span>DISQUS Shortname</span><input type="text" /></label><br />
					<label><span>Google Analystic</span><input type="text" /></label><br />
					<label><span>Local Encoding</span><input type="text" /></label><br />
					<label><span>Time Zone</span><input type="text" /></label><br />

				</div>
			</div>
		</div>

		<script src="js/vendor/jquery-1.10.2.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
