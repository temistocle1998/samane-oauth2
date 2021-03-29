<?php
/* Smarty version 3.1.30, created on 2021-03-14 15:52:02
  from "/home/lamine/FreeDev/samane-oauth2/src/view/login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_604e31226eb347_18814630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f308c09be78f6a69fc7e5e520aaf06f1f54ca74d' => 
    array (
      0 => '/home/lamine/FreeDev/samane-oauth2/src/view/login.html',
      1 => 1615737119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_604e31226eb347_18814630 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/samane.css"/>
		<style>
			h1{ 
				color: #40007d;
			}
		</style>
</head>
<body>
    <!-- <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&response_type=code&redirect_uri=http://localhost:8000/Ressource/test&client_id=866384018060-vafdthvvjrhkhktevqeff0m3ma4etkka.apps.googleusercontent.com">Se connecter</a> -->
    <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
/Login/logon">Se connecter</a>
</body>
</html><?php }
}
