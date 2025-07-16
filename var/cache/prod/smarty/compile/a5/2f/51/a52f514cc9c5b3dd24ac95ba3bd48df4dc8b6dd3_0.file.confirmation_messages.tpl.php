<?php
/* Smarty version 3.1.33, created on 2025-07-16 16:37:14
  from 'C:\xampp\htdocs\prestashop\admin771u5sghr\themes\new-theme\template\components\layout\confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6877c72a63f606_68750351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a52f514cc9c5b3dd24ac95ba3bd48df4dc8b6dd3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\admin771u5sghr\\themes\\new-theme\\template\\components\\layout\\confirmation_messages.tpl',
      1 => 1752667231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6877c72a63f606_68750351 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
