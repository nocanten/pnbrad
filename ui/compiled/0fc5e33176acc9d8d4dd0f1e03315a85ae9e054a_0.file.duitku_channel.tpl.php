<?php
/* Smarty version 4.5.3, created on 2026-07-01 20:49:57
  from '/data/html/system/paymentgateway/ui/duitku_channel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a451b055174e0_71921439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fc5e33176acc9d8d4dd0f1e03315a85ae9e054a' => 
    array (
      0 => '/data/html/system/paymentgateway/ui/duitku_channel.tpl',
      1 => 1755878236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user-ui/header.tpl' => 1,
    'file:user-ui/footer.tpl' => 1,
  ),
),false)) {
function content_6a451b055174e0_71921439 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:user-ui/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="row">
    <div class="col-sm-12">
            <div class="panel panel-info panel-hovered">
            <div class="panel-heading">Duitku <?php echo Lang::T('Payment Channel');?>
</div>
            <div class="panel-body row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['channels']->value, 'channel');
$_smarty_tpl->tpl_vars['channel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['channel']->value) {
$_smarty_tpl->tpl_vars['channel']->do_else = false;
?>
                    <?php if (in_array($_smarty_tpl->tpl_vars['channel']->value['id'],$_smarty_tpl->tpl_vars['duitku_channels']->value)) {?>
                        <div class="col-sm-4 mb20">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
order/buy/<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['channel']->value['id'];?>
"
                            onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['channel']->value['name'];?>
')"
                            class="btn btn-block btn-default"><?php echo $_smarty_tpl->tpl_vars['channel']->value['name'];?>
</a>
                        </div>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:user-ui/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
