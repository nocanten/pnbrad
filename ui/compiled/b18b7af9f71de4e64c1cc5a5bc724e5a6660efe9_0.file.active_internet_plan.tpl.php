<?php
/* Smarty version 4.5.3, created on 2026-07-01 20:48:14
  from '/data/html/ui/ui/widget/customers/active_internet_plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a451a9e65e763_87717749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b18b7af9f71de4e64c1cc5a5bc724e5a6660efe9' => 
    array (
      0 => '/data/html/ui/ui/widget/customers/active_internet_plan.tpl',
      1 => 1781883661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a451a9e65e763_87717749 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_bills']->value) {?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_bills']->value, '_bill');
$_smarty_tpl->tpl_vars['_bill']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_bill']->value) {
$_smarty_tpl->tpl_vars['_bill']->do_else = false;
?>

<div class="box box-success">

<div class="box-header with-border">
    <h3 class="box-title">
        <i class="fa fa-wifi"></i>
        Paket Internet Aktif
    </h3>
</div>

<div class="box-body">


<?php $_smarty_tpl->_assignInScope('expiredTime', strtotime((($_smarty_tpl->tpl_vars['_bill']->value['expiration']).(" ")).($_smarty_tpl->tpl_vars['_bill']->value['time'])));
$_smarty_tpl->_assignInScope('currentTime', time());?>

<div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-aqua">
            <div class="inner" style="height:95px">
                <h3 style="font-size:28px;margin:0">
                    <?php echo $_smarty_tpl->tpl_vars['_bill']->value['name_bw'];?>

                </h3>
                <p style="font-size:16px;margin-top:10px">
                    Bandwidth
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-tachometer"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">

        <?php if ($_smarty_tpl->tpl_vars['expiredTime']->value > $_smarty_tpl->tpl_vars['currentTime']->value) {?>

            <div class="small-box bg-green">
                <div class="inner" style="height:95px">
                    <h3 style="font-size:28px;margin:0">
                        Aktif
                    </h3>
                    <p style="font-size:16px;margin-top:10px">
                        Status
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-circle"></i>
                </div>
            </div>

        <?php } else { ?>

            <div class="small-box bg-red">
                <div class="inner" style="height:95px">
                    <h3 style="font-size:28px;margin:0">
                        Expired
                    </h3>
                    <p style="font-size:16px;margin-top:10px">
                        Status
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-times-circle"></i>
                </div>
            </div>

        <?php }?>

    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-yellow">
            <div class="inner" style="height:95px">
                <h3 style="font-size:24px;margin:0">
                    <?php echo $_smarty_tpl->tpl_vars['_bill']->value['plan_type'];?>

                </h3>
                <p style="font-size:16px;margin-top:10px">
                    Tipe Paket
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-cube"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-red">
            <div class="inner" style="height:95px">
                <h3 style="font-size:24px;margin:0">
                    <?php echo $_smarty_tpl->tpl_vars['_bill']->value['type'];?>

                </h3>
                <p style="font-size:16px;margin-top:10px">
                    Layanan
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-signal"></i>
            </div>
        </div>
    </div>

</div>

<div class="table-responsive">

    <table class="table table-hover table-striped">

        <tr>
            <td width="35%">
                <i class="fa fa-tag text-primary"></i>
                Nama Paket
            </td>
            <td>
                <strong><?php echo $_smarty_tpl->tpl_vars['_bill']->value['namebp'];?>
</strong>
            </td>
        </tr>

        <tr>
            <td>
                <i class="fa fa-calendar text-success"></i>
                Aktif Sejak
            </td>
            <td>
                <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['recharged_on'],$_smarty_tpl->tpl_vars['_bill']->value['recharged_time']);?>

            </td>
        </tr>

        <tr>
            <td>
                <i class="fa fa-clock-o text-danger"></i>
                Masa Aktif Sampai
            </td>
            <td>

                <?php if ($_smarty_tpl->tpl_vars['expiredTime']->value > $_smarty_tpl->tpl_vars['currentTime']->value) {?>

                    <span class="label label-success" style="font-size:13px">
                        <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['expiration'],$_smarty_tpl->tpl_vars['_bill']->value['time']);?>

                    </span>

                <?php } else { ?>

                    <span class="label label-danger" style="font-size:13px">
                        <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['_bill']->value['expiration'],$_smarty_tpl->tpl_vars['_bill']->value['time']);?>

                    </span>

                <?php }?>

            </td>
        </tr>

        <?php if ($_smarty_tpl->tpl_vars['nux_ip']->value != '') {?>
        <tr>
            <td>
                <i class="fa fa-globe text-info"></i>
                IP Address
            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['nux_ip']->value;?>

            </td>
        </tr>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['nux_mac']->value != '') {?>
        <tr>
            <td>
                <i class="fa fa-desktop text-warning"></i>
                MAC Address
            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['nux_mac']->value;?>

            </td>
        </tr>
        <?php }?>

    </table>

</div>

<hr>

<div class="text-right">

    <a class="btn btn-warning btn-sm"
       href="<?php echo Text::url('home&sync=',$_smarty_tpl->tpl_vars['_bill']->value['id'],'&stoken=',App::getToken());?>
"
       onclick="return ask(this, 'Sinkronkan akun internet?')">

        <i class="fa fa-refresh"></i>
        Sync

    </a>

    <a class="btn btn-primary btn-sm"
       href="<?php echo Text::url('home&recharge=',$_smarty_tpl->tpl_vars['_bill']->value['id'],'&stoken=',App::getToken());?>
"
       onclick="return ask(this, 'Perpanjang paket internet?')">

        <i class="fa fa-credit-card"></i>
        Perpanjang Paket

    </a>

</div>


</div>

</div>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
}
