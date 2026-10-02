<?php
/* Smarty version 4.5.3, created on 2026-07-02 14:17:39
  from '/data/html/system/paymentgateway/ui/duitku.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a461093309239_25540486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4a687ccdb2402c50cb6d12bc8fc62667181b3c7' => 
    array (
      0 => '/data/html/system/paymentgateway/ui/duitku.tpl',
      1 => 1755878236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a461093309239_25540486 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/duitku" >
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading">DUITKU</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Kode Merchant');?>
</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="duitku_merchant_id" name="duitku_merchant_id" placeholder="D" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['duitku_merchant_id'];?>
">
                            <a href="https://duitku.com/merchant/Project" target="_blank" class="help-block">https://duitku.com/merchant/Project</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Merchant/API Key</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="duitku_merchant_key" name="duitku_merchant_key" placeholder="xxxxxxxxxxxxxxxxx" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['duitku_merchant_key'];?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Url Callback Proyek');?>
</label>
                        <div class="col-md-6">
                            <input type="text" readonly class="form-control" onclick="this.select()" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
callback/duitku">
                            <a href="https://duitku.com/merchant/Project" target="_blank" class="help-block">https://duitku.com/merchant/Project</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Channels');?>
</label>
                        <div class="col-md-6">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['channels']->value, 'channel');
$_smarty_tpl->tpl_vars['channel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['channel']->value) {
$_smarty_tpl->tpl_vars['channel']->do_else = false;
?>
                                <label class="checkbox-inline"><input type="checkbox" <?php if (strpos($_smarty_tpl->tpl_vars['_c']->value['duitku_channel'],$_smarty_tpl->tpl_vars['channel']->value['id']) !== false) {?>checked="true"<?php }?> id="duitku_channel" name="duitku_channel[]" value="<?php echo $_smarty_tpl->tpl_vars['channel']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['channel']->value['name'];?>
</label>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo Lang::T('Save Change');?>
</button>
                        </div>
                    </div>
                        <pre>/ip hotspot walled-garden
add dst-host=duitku.com
add dst-host=*.duitku.com</pre>
<small id="emailHelp" class="form-text text-muted"><?php echo Lang::T('Set Telegram Bot to get any error and notification');?>
</small>
                </div>
            </div>

        </div>
    </div>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
