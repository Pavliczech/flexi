<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300,300italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">

	{if isset($less)}
		<link rel="stylesheet/less" href="{$less}" />
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
	
		<link href="/data/cache/css/{$css}" rel="stylesheet"  />
	{/if}
	
	<script src="/libs/jquery/jquery-2.1.4.min.js"></script>
	<script src="/libs/ui/ui.js"></script>

	<link href="/layout/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<title>FLEXI ADMIN</title>
</head>
<body>
	<section class="login_header">
		<h1>
			FLEXI<small>ADMIN</small>
		</h1>
		
	</section>
	<section class="login_form">
		<form action="/admin/" method="post">
			{if core::get("logout_complete")}
				<div class="ui_message confirm">
					<p>You have been logged out</p>
				</div>
			{/if}
			{if core::get("login_failed")}
				<div class="ui_message error">
					<p>Login failed</p>
				</div>
			{/if}
		
			<input type="hidden" name="admin_login" value="1" />
			<input class="email" type="email" name="admin_email" placeholder="E-mail address" required="required" />
			<input class="password" type="password" name="admin_password" placeholder="Password" required="required" />
			<button type="submit">Login</button>
		</form>
		
	</section>
	
</body>
</html>
