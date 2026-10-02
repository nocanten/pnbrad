<?php
/* Smarty version 4.5.3, created on 2026-07-01 20:48:14
  from '/data/html/ui/ui/widget/customers/recharge_a_friend.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a451a9e66ba78_94490352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e755893ee8f0ff3b032a44da346b4007cf2af3d' => 
    array (
      0 => '/data/html/ui/ui/widget/customers/recharge_a_friend.tpl',
      1 => 1781467124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a451a9e66ba78_94490352 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-primary box-solid mb30">
    <div class="box-header">
        <h4 class="box-title"><?php echo Lang::T("Recharge a friend");?>
</h4>
    </div>
    <div class="box-body p-0">
        <form method="post" role="form" action="<?php echo Text::url('home');?>
">
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" id="username" name="username" class="form-control" required
                        placeholder="<?php echo Lang::T('Friend username');?>
">
                </div>
                <div class="form-group col-sm-2" align="center">
                    <button class="btn btn-success btn-block" id="sendBtn" type="submit" name="send"
                        onclick="return ask(this, '<?php echo Lang::T(" Are You Sure?");?>
')" value="plan"><i
                            class="glyphicon glyphicon-send"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
