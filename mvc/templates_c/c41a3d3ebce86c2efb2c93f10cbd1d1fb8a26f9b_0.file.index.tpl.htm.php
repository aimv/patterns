<?php
/* Smarty version 3.1.30, created on 2016-10-14 18:45:25
  from "/var/www/html/patterns/mvc/templates/index.tpl.htm" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5800ef850a9e29_97002350',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c41a3d3ebce86c2efb2c93f10cbd1d1fb8a26f9b' => 
    array (
      0 => '/var/www/html/patterns/mvc/templates/index.tpl.htm',
      1 => 1476456310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5800ef850a9e29_97002350 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test Project</title>
    </head>
    <body>
        <h2>Current User</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>Birthdate</th>
                <th>Code</th>
            </tr>
            
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['birthdate']->value;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
            </tr>

        </table>
        <br>
        
        <form action="index.php" method="post">
            <h2>Change user</h2>
            <p>Name: <input type="text" name="name" /></p>
            <p>Last Name: <input type="text" name="lastname" /></p>
            <p>Birth Date: <input type="text" name="birthdate" /></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>





<?php }
}
