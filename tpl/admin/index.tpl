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


	<title>FLEXI ADMIN</title>
</head>
<body>
	<section class="site_header">
		<div class="logo">
			<a class="hotdog"></a>
			<h1>FLEXI <small>ADMIN</small></h1>
		</div>
		<div class="inside">
			<div class="user">
				<img src="/theme/admin/img/lilbub_demo.jpg" class="avatar" />
				<div class="logged">
					Logged as <a href="#">wUFr</a>
				</div>
			</div>
			<div class="actions">
				<a class="notifications">
					Notifications
				</a>
				<a class="settings">
					Settings
				</a>
				<a class="logout">
					Logout
				</a>
			</div>
		</div>
	</section>
	<section class="site_content">
		<aside class="sidebar">
			<ul class="menu">
				<li class="active">
					<a href="#" class="dashboard">Dashboard</a>
				</li>
				<li>
					<a href="#" class="settings">Settings</a>
					<span class="arrow"></span>
					<ul>
						<li>
							<a href="#" class="database">Database</a>
						</li>
						<li>
							<a href="#" class="performance">Performance</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="layout">Layout</a>
				</li>
				<li>
					<a href="#" class="users">Users</a>
					<span class="arrow"></span>
					<ul>
						<li>
							<a href="#" class="admins">Administrators</a>
						</li>
						<li>
							<a href="#" class="users">Users</a>
						</li>
						<li>
							<a href="#" class="banlist">Banlist</a>
						</li>
						<li>
							<a href="#" class="whitelist">Whitelist</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="pages">Pages</a>
				</li>
				<li>
					<a href="#" class="forum">Forum</a>
					<span class="arrow"></span>
					<ul>
						<li>
							<a href="#" class="topics">Topics</a>
						</li>
						<li>
							<a href="#" class="reports">Reports</a>
						</li>
					</ul>
				</li>
				
			</ul>
			
		</aside>
		<div class="content">
			<header>
				<ul class="ui_pagepath">
					<li><a href="#">Admin</a></li>
					<li><a href="#">some subpage</a></li>
					<li><a href="#">some extra page</a></li>
					<li><a href="#">actual admin page</a></li>
				</ul>
				<h1>Dashboard</h1>
			</header>
			
			<div class="row">
				<div class="col-md-4">
					<div class="ui_widget">
						<header>
							<h2 class="title">Widget box</h2>
							<div class="actions">
								<a href="#" class="add"></a>
								<a href="#" class="edit"></a>
								<a href="#" class="toggle"></a>
							</div>
						</header>
						<div class="content">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							In faucibus, enim sit amet condimentum posuere, neque 
							ante tristique libero, vel viverra diam massa lacinia justo. 
							Class aptent taciti sociosqu ad litora torquent per 
							conubia nostra, per inceptos himenaeos.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					
					<div class="ui_widget dark">
						<header>
							<h2 class="title">Widget box</h2>
							<div class="actions">
								<a href="#" class="add"></a>
								<a href="#" class="edit"></a>
								<a href="#" class="toggle"></a>
							</div>
						</header>
						<div class="content">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							In faucibus, enim sit amet condimentum posuere, neque 
							ante tristique libero, vel viverra diam massa lacinia justo. 
							Class aptent taciti sociosqu ad litora torquent per 
							conubia nostra, per inceptos himenaeos.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					
					<div class="ui_widget blue">
						<header>
							<h2 class="title">Widget box</h2>
							<div class="actions">
								<a href="#" class="add"></a>
								<a href="#" class="edit"></a>
								<a href="#" class="toggle"></a>
							</div>
						</header>
						<div class="content">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							In faucibus, enim sit amet condimentum posuere, neque 
							ante tristique libero, vel viverra diam massa lacinia justo. 
							Class aptent taciti sociosqu ad litora torquent per 
							conubia nostra, per inceptos himenaeos.
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
