<?php /* Smarty version 3.1.28-dev/61, created on 2015-09-27 20:28:57
         compiled from "C:\Webserver\htdocs\flexi\tpl\public\index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/61',
  'unifunc' => 'content_56083569d4e874_60782024',
  'file_dependency' => 
  array (
    '07ba4eed325305eb0554e353cb663db8272d5c7d' => 
    array (
      0 => 'C:\\Webserver\\htdocs\\flexi\\tpl\\public\\index.tpl',
      1 => 1443378416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_56083569d4e874_60782024')) {
function content_56083569d4e874_60782024 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
	<meta name="robots" content="noindex,nofollow" />
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300,300italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	
	
	
	<?php if (isset($_smarty_tpl->tpl_vars['less']->value)) {?>
		<link rel="stylesheet/less" href="<?php echo $_smarty_tpl->tpl_vars['less']->value;?>
" />
		<?php echo '<script'; ?>
>
			less = {
				env: "development",
				async: false,
				fileAsync: false,
				poll: 1000,
				functions: {},
				dumpLineNumbers: "comments",
				relativeUrls: false
			};
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="/libs/less-js/less.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php } else { ?>
		<link href="/data/cache/css/<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" rel="stylesheet" />
	<?php }?>
	

	<link href="/layout/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

	<title>FLEXI CMS</title>
</head>
<body>


<h1>Hello world!</h1>
<a href="/admin/">admin panel</a>

</body>
</html>
<?php }
}
