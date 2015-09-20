<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
	<meta name="robots" content="noindex,nofollow" />
	
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300,300italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	
	
	{if isset($less)}
		<link rel="stylesheet/less" href="/theme/admin/less/{$less}" />
		<script>
			less = {
				env: "development",
				async: false,
				fileAsync: false,
				poll: 1000,
				functions: {},
				dumpLineNumbers: "comments",
				relativeUrls: false
			};
		</script>
		<script src="/libs/less-js/less.min.js" type="text/javascript"></script>
	
	{else}
	
	
	{/if}
	
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	
	<link href="/data/cache/css/{$css}" rel="stylesheet"  />
	<link href="/layout/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

	<title>FLEXI CMS ADMIN</title>
</head>
<body>

<section class="site_header">
	<a class="hotdog">
		
	</a>
	{literal}
	<script>
		$(".hotdog").click(function() {
			$(".site_header").toggleClass("menu_toggled");
			$(".site_content_wrap").toggleClass("menu_toggled");
		});

	</script>
	{/literal}
	
	<div class="inside">
		
	</div>
</section>
<section class="site_content_wrap">
	<aside class="site_sidebar">
		<ul class="menu">
			<li><a href="#" class="dashboard">Dashboard</a></li>
			<li><a href="#" class="settings">Settings</a></li>
			<li><a href="#" class="development">Development</a></li>
			<li><a href="#" class="pages">Pages</a></li>
			<li><a href="#" class="users">Users</a></li>
		</ul>
	</aside>
	<div class="content">
		<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
		<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
		<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
		<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
		
	</div>
	{literal}
	<script>
		$(".site_sidebar").hover(
		function () {
			$(".site_content_wrap").addClass('menu_open');
		}, 
		function () {
			$(".site_content_wrap").removeClass('menu_open');
		}
		);
	</script>
	{/literal}
</section>


</body>
</html>
