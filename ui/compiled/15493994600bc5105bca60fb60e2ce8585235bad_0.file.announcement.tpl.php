<?php
/* Smarty version 4.5.3, created on 2026-07-01 20:48:14
  from '/data/html/ui/ui/widget/customers/announcement.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a451a9e63bb90_84679944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15493994600bc5105bca60fb60e2ce8585235bad' => 
    array (
      0 => '/data/html/ui/ui/widget/customers/announcement.tpl',
      1 => 1781467124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a451a9e63bb90_84679944 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"><?php echo Lang::T('Announcement');?>
</h3>
    </div>
    <div class="box-body">
        <?php $_smarty_tpl->_assignInScope('Announcement_Customer', ((string)$_smarty_tpl->tpl_vars['PAGES_PATH']->value)."/Announcement_Customer.html");?>
        <?php if (file_exists($_smarty_tpl->tpl_vars['Announcement_Customer']->value)) {?>
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['Announcement_Customer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>
    </div>
</div><?php }
}
