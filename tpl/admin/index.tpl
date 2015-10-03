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
					<span>Notifications</span>
				</a>
				<a class="settings">
					<span>Settings</span>
				</a>
				<a href="/admin/admin_logout=1" class="logout">
					<span>Logout</span>
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
			
			{if core::get("login_complete")}
				<div class="ui_message confirm">
					<a class="close"></a>
					<div class="title">Login complete</div>
					<p>You have been logged in</p>
				</div>
			{/if}
			
			
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

			<div class="ui_box">
				<div class="header">
					<div class="title">
						UI Box header
					</div>
					<div class="actions">
						<a class="close"></a>
					</div>
				</div>
				<div class="content">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam efficitur posuere velit, quis dapibus risus tempor in. Ut auctor ullamcorper quam sit amet imperdiet. Sed a mollis lectus, a luctus mi. Proin ac dui ante. Sed dignissim augue a semper auctor. Nulla et feugiat sapien. In molestie laoreet quam, in vestibulum nibh facilisis vitae. Integer rhoncus arcu augue, quis dignissim augue lacinia sed. Sed eget viverra neque, in hendrerit odio. Nulla neque mauris, ultrices id eros at, suscipit gravida lorem. Sed viverra ac ipsum non cursus. Curabitur lobortis ornare leo.
				</div>
			</div>
			
			
			<div class="ui_message info">
				<a class="close"></a>
				<div class="title">Informations</div>
				<p>lorem ipsum dolor info box text</p>
			</div>
			
			<div class="ui_message confirm">
				<a class="close"></a>
				<div class="title">Confirm</div>
				<p>lorem ipsum dolor info box text</p>
			</div>
			
			<div class="ui_message warning">
				<a class="close"></a>
				<div class="title">Warning</div>
				<p>lorem ipsum dolor info box text</p>
			</div>
			
			<div class="ui_message error">
				<a class="close"></a>
				<div class="title">Error</div>
				<p>lorem ipsum dolor info box text</p>
			</div>
			
			
			
			<div class="ui_text info">
				<div class="title">Informations</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis condimentum egestas orci, quis sagittis justo pharetra maximus. 
				Phasellus felis dui, fringilla sed semper at, tempus vel elit. Fusce tellus metus, suscipit quis ex quis, tincidunt consequat risus. 
				Etiam in efficitur elit. Aenean malesuada sollicitudin neque vitae auctor. Nam ac tellus semper, pellentesque elit et, congue felis. 
				Sed maximus erat odio, vel bibendum lectus ornare id. Sed imperdiet risus nisl, nec tristique enim laoreet vitae.</p>
			</div>
			<div class="ui_text warning">
				<div class="title">Warning</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis condimentum egestas orci, quis sagittis justo pharetra maximus. 
				Phasellus felis dui, fringilla sed semper at, tempus vel elit. Fusce tellus metus, suscipit quis ex quis, tincidunt consequat risus. 
				Etiam in efficitur elit. Aenean malesuada sollicitudin neque vitae auctor. Nam ac tellus semper, pellentesque elit et, congue felis. 
				Sed maximus erat odio, vel bibendum lectus ornare id. Sed imperdiet risus nisl, nec tristique enim laoreet vitae.</p>
			</div>
			<div class="ui_text error">
				<div class="title">Error</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis condimentum egestas orci, quis sagittis justo pharetra maximus. 
				Phasellus felis dui, fringilla sed semper at, tempus vel elit. Fusce tellus metus, suscipit quis ex quis, tincidunt consequat risus. 
				Etiam in efficitur elit. Aenean malesuada sollicitudin neque vitae auctor. Nam ac tellus semper, pellentesque elit et, congue felis. 
				Sed maximus erat odio, vel bibendum lectus ornare id. Sed imperdiet risus nisl, nec tristique enim laoreet vitae.</p>
			</div>
			<div class="ui_text confirm">
				<div class="title">Confirm</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis condimentum egestas orci, quis sagittis justo pharetra maximus. 
				Phasellus felis dui, fringilla sed semper at, tempus vel elit. Fusce tellus metus, suscipit quis ex quis, tincidunt consequat risus. 
				Etiam in efficitur elit. Aenean malesuada sollicitudin neque vitae auctor. Nam ac tellus semper, pellentesque elit et, congue felis. 
				Sed maximus erat odio, vel bibendum lectus ornare id. Sed imperdiet risus nisl, nec tristique enim laoreet vitae.</p> 
			</div>
			
			
			
		</div>
	</section>
</body>
</html>
