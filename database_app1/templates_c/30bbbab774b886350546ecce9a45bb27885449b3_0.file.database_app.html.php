<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-17 09:40:33
  from 'D:\inetpub\www\database_app1\templates\database_app.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f632f111ddd63_65903462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30bbbab774b886350546ecce9a45bb27885449b3' => 
    array (
      0 => 'D:\\inetpub\\www\\database_app1\\templates\\database_app.html',
      1 => 1600335632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f632f111ddd63_65903462 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv=“pragma“ content=“no-cache“>
  <meta http-equiv=“expires“ content=“0″>
  <link rel="stylesheet" href="include/css/style.css" type="text/css" >
  <?php echo '<script'; ?>
 src="include/js/ajax.js"><?php echo '</script'; ?>
>
  <title>Database-App1</title>
</head>
<body>
  <div id="input">
    <br>
    <form method="POST" action="index.php">
      <h2>INSERT NEW DATA</h2>
      <pre>Name:        <input name="name" id="name"></pre><br>
      <pre>Age:         <input name="age" id="age"></pre><br>
      <pre>Hometown:    <input name="hometown" id="hometown"></pre>
      <pre>isMale:      TRUE<input name="isMale" type="radio" value="true"> FALSE<input name="isMale" type="radio" value="false">
      </pre>
      <p><button name="submit_input">Submit</button></p>
    </form>
    <br>
    <form method="post" action="index.php">
      <h2>DELETE</h2>
      <p>Select Row ID: <input name="row_id" id="row_id"></p>
      <pre>
to delete all:
type "all" into input.
press delete
without any input
to delete the last entry
      </pre>
      <p><button name="submit_row_id">Delete</button></p>
    </form>
    <br>
    <form method="POST" action="index.php">
      <h2>DEMO DATA</h2>
      <p>Insert Demo-Data into Database: </p>
      <p><button name="submit_demo" id="submit_demo">Insert</button></p>
    </form>
    <br>
    <form method="POST" action="index.php">
      <h2>CHANGE DATA</h2>

      <p><label>Select Row ID:</label> <?php echo $_smarty_tpl->tpl_vars['dropdown_id']->value;?>
 </p>
      <p><label>Select Attribute:</label>
        <select name="select_attribute">
          <option value="name">name</option>
          <option value="age">age</option>
          <option value="hometown">hometown</option>
          <option value="isMale">isMale</option>
        </select></p>
      <p>Change Value: <input name="change_value">  </p>

      <p><button name="change_button">Change</button></p>
    </form>
  </div>
  <div id="output">
    <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

  </div>
</body>
</html><?php }
}
