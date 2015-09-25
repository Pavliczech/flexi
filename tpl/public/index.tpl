<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
	<meta name="robots" content="noindex,nofollow" />
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300,300italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	
	
	
	{if isset($less)}
		<link rel="stylesheet/less" href="/theme/public/less/{$less}" />
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
		<link href="/data/cache/css/{$css}" rel="stylesheet" />
	{/if}
	

	<link href="/layout/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

	<title>FLEXI CMS</title>
</head>
<body>


<h1>Hello world!</h1>
<a href="/admin/">admin panel</a>

</body>
</html>
