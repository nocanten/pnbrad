<?php
/* Smarty version 4.5.3, created on 2026-07-01 20:48:14
  from '/data/html/ui/ui/customer/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a451a9e681992_90285291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4fd3725acf70e14dc297dda70d37ccdf3f9f329' => 
    array (
      0 => '/data/html/ui/ui/customer/dashboard.tpl',
      1 => 1781869303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/header.tpl' => 1,
    'file:customer/footer.tpl' => 1,
  ),
),false)) {
function content_6a451a9e681992_90285291 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'showWidget' => 
  array (
    'compiled_filepath' => '/data/html/ui/compiled/d4fd3725acf70e14dc297dda70d37ccdf3f9f329_0.file.dashboard.tpl.php',
    'uid' => 'd4fd3725acf70e14dc297dda70d37ccdf3f9f329',
    'call_name' => 'smarty_template_function_showWidget_18254526126a451a9e66d847_60924771',
  ),
));
$_smarty_tpl->_subTemplateRender("file:customer/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">


<!-- Welcome -->
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-body">

            <h2>
                <i class="fa fa-wifi"></i>
                Selamat Datang, <?php echo $_smarty_tpl->tpl_vars['_user']->value['fullname'];?>

            </h2>

            <p>
                <strong>ID Pelanggan :</strong>
                <?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>

            </p>

            <p>
                <strong>Email :</strong>
                <?php echo $_smarty_tpl->tpl_vars['_user']->value['email'];?>

            </p>

        </div>
    </div>
</div>

<!-- Announcement -->
<div class="col-md-6">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['widgets']->value, 'w');
$_smarty_tpl->tpl_vars['w']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['w']->value['widget'] == 'announcement') {?>
            <?php echo $_smarty_tpl->tpl_vars['w']->value['content'];?>

        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>


</div>

<div class="row">


<div class="col-md-3">
    <a href="<?php echo Text::url('accounts/profile');?>
" class="btn btn-primary btn-block btn-lg">
        <i class="fa fa-user"></i><br><br>
        Profil
    </a>
</div>

<div class="col-md-3">
    <a href="<?php echo Text::url('accounts/change-password');?>
" class="btn btn-success btn-block btn-lg">
        <i class="fa fa-lock"></i><br><br>
        Password
    </a>
</div>

<div class="col-md-3">
    <a href="<?php echo Text::url('mail');?>
" class="btn btn-warning btn-block btn-lg">
        <i class="fa fa-envelope"></i><br><br>
        Inbox
    </a>
</div>

<div class="col-md-3">
    <a href="<?php echo Text::url('order/history');?>
" class="btn btn-danger btn-block btn-lg">
        <i class="fa fa-file-text"></i><br><br>
        Riwayat Pembayaran
    </a>
</div>


</div>

<br>



<?php $_smarty_tpl->_assignInScope('rows', explode(".",$_smarty_tpl->tpl_vars['_c']->value['dashboard_Customer']));
$_smarty_tpl->_assignInScope('pos', 1);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'cols');
$_smarty_tpl->tpl_vars['cols']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cols']->value) {
$_smarty_tpl->tpl_vars['cols']->do_else = false;
?>


<?php if ($_smarty_tpl->tpl_vars['cols']->value == 12) {?>

    <div class="row">
        <div class="col-md-12">
            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'showWidget', array('widgets'=>$_smarty_tpl->tpl_vars['widgets']->value,'pos'=>$_smarty_tpl->tpl_vars['pos']->value), true);?>

        </div>
    </div>

    <?php $_smarty_tpl->_assignInScope('pos', $_smarty_tpl->tpl_vars['pos']->value+1);?>

<?php } else { ?>

    <?php $_smarty_tpl->_assignInScope('colss', explode(",",$_smarty_tpl->tpl_vars['cols']->value));?>

    <div class="row">

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['colss']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>

            <div class="col-md-<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
">
                <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'showWidget', array('widgets'=>$_smarty_tpl->tpl_vars['widgets']->value,'pos'=>$_smarty_tpl->tpl_vars['pos']->value), true);?>

            </div>

            <?php $_smarty_tpl->_assignInScope('pos', $_smarty_tpl->tpl_vars['pos']->value+1);?>

        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </div>

<?php }?>


<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php $_smarty_tpl->_subTemplateRender("file:customer/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* smarty_template_function_showWidget_18254526126a451a9e66d847_60924771 */
if (!function_exists('smarty_template_function_showWidget_18254526126a451a9e66d847_60924771')) {
function smarty_template_function_showWidget_18254526126a451a9e66d847_60924771(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('pos'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>



<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['widgets']->value, 'w');
$_smarty_tpl->tpl_vars['w']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->do_else = false;
?>

    <?php if ($_smarty_tpl->tpl_vars['w']->value['position'] == $_smarty_tpl->tpl_vars['pos']->value) {?>

        <?php if ($_smarty_tpl->tpl_vars['w']->value['widget'] != 'announcement' && $_smarty_tpl->tpl_vars['w']->value['widget'] != 'recharge_a_friend' && $_smarty_tpl->tpl_vars['w']->value['widget'] != 'voucher_activation') {?>

            <?php echo $_smarty_tpl->tpl_vars['w']->value['content'];?>


        <?php }?>

    <?php }?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php
}}
/*/ smarty_template_function_showWidget_18254526126a451a9e66d847_60924771 */
}
