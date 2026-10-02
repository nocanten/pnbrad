<?php
/* Smarty version 4.5.3, created on 2026-07-01 20:48:14
  from '/data/html/ui/ui/widget/customers/account_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a451a9e624433_46049029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c9561da473725648d980c08f2bbbe36871e10f8' => 
    array (
      0 => '/data/html/ui/ui/widget/customers/account_info.tpl',
      1 => 1781867640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a451a9e624433_46049029 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box box-primary">


<div class="box-header with-border">
    <h3 class="box-title">
        <i class="fa fa-user-circle"></i>
        Informasi Pelanggan
    </h3>
</div>

<div class="box-body text-center">

    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['_user']->value['photo'];?>
.thumb.jpg"
         onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;?>
/user.default.jpg'"
         class="img-circle"
         style="width:90px;height:90px;object-fit:cover;">

    <h3><?php echo $_smarty_tpl->tpl_vars['_user']->value['fullname'];?>
</h3>

    <span class="label label-success">
        <?php echo $_smarty_tpl->tpl_vars['_user']->value['status'];?>

    </span>

    <hr>

</div>

<table class="table table-hover">

    <tr>
        <td width="40%">
            <i class="fa fa-user"></i>
            Username
        </td>
        <td>
            <b><?php echo $_smarty_tpl->tpl_vars['_user']->value['username'];?>
</b>
        </td>
    </tr>

    <tr>
        <td>
            <i class="fa fa-lock"></i>
            Password
        </td>
        <td>
            <input type="password"
                   value="<?php echo $_smarty_tpl->tpl_vars['_user']->value['password'];?>
"
                   style="width:100%;border:0;background:none;"
                   onmouseenter="this.type='text'"
                   onmouseleave="this.type='password'">
        </td>
    </tr>

    <tr>
        <td>
            <i class="fa fa-wifi"></i>
            Service
        </td>
        <td>
            <span class="label label-info">
                <?php echo $_smarty_tpl->tpl_vars['_user']->value['service_type'];?>

            </span>
        </td>
    </tr>

    <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes') {?>
    <tr>
        <td>
            <i class="fa fa-money"></i>
            Saldo
        </td>
        <td>
            <b><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['_user']->value['balance']);?>
</b>
        </td>
    </tr>
    <?php }?>

    <tr>
        <td>
            <i class="fa fa-phone"></i>
            Telepon
        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['_user']->value['phonenumber'];?>

        </td>
    </tr>

    <tr>
        <td>
            <i class="fa fa-envelope"></i>
            Email
        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['_user']->value['email'];?>

        </td>
    </tr>

</table>


</div>
<?php }
}
