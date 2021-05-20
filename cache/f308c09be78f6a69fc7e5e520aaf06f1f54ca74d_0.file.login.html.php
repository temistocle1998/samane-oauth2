<?php
/* Smarty version 3.1.30, created on 2021-05-07 00:16:56
  from "/home/lamine/FreeDev/samane-oauth2/src/view/login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_609486f8a173b9_64179064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f308c09be78f6a69fc7e5e520aaf06f1f54ca74d' => 
    array (
      0 => '/home/lamine/FreeDev/samane-oauth2/src/view/login.html',
      1 => 1620346612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609486f8a173b9_64179064 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/samane.css"/>
    <title>login with oauth2</title>
</head>
<body>
        <div class="container-fluid col-m-d-5">
            <form action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Token/token" method="POST">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="" >
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="" >
                </div>
                <button type="submit" class="btn btn-success">connect</button>
            </form>
        </div>
</body>
</html><?php }
}
