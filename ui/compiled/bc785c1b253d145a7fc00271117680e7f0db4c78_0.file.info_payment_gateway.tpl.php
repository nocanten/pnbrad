<?php
/* Smarty version 4.5.3, created on 2026-07-01 18:57:27
  from '/data/html/ui/ui/widget/info_payment_gateway.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4500a7b90240_47933732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc785c1b253d145a7fc00271117680e7f0db4c78' => 
    array (
      0 => '/data/html/ui/ui/widget/info_payment_gateway.tpl',
      1 => 1781467124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a4500a7b90240_47933732 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel panel-success panel-hovered mb20 activities">
    <div class="panel-heading"><?php echo Lang::T('Payment Gateway');?>
: <?php echo str_replace(',',', ',$_smarty_tpl->tpl_vars['_c']->value['payment_gateway']);?>

    </div>
</div><?php }
}
