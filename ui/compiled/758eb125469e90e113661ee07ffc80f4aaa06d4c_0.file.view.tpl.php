<?php
/* Smarty version 4.5.3, created on 2026-07-01 18:58:27
  from '/data/html/ui/ui_custom/admin/customers/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4500e3c0e302_76134624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '758eb125469e90e113661ee07ffc80f4aaa06d4c' => 
    array (
      0 => '/data/html/ui/ui_custom/admin/customers/view.tpl',
      1 => 1782892549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a4500e3c0e302_76134624 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <div class="box box-<?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Active') {?>primary<?php } else { ?>danger<?php }?>">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle"
                    onclick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['d']->value['photo'];?>
'"
                    src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['d']->value['photo'];?>
.thumb.jpg"
                    onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;?>
/user.default.jpg'" alt="avatar">
                <h3 class="profile-username text-center"><?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
</h3>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Status');?>
</b> <span
                            class="pull-right <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Active') {?>bg-red<?php }?>">&nbsp;<?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['status']);?>
&nbsp;</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Username');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('fullname');?>
</b>
                        <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b>NIK</b>
                        <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['nik'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Phone Number');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['phonenumber'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Email');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</span>
                    </li>
                    <li class="list-group-item"><?php echo Lang::nl2br($_smarty_tpl->tpl_vars['d']->value['address']);?>
</li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('City');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('District');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['district'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('State');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['state'];?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Zip');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['zip'];?>
</span>
                    </li>
                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Password');?>
</b> <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['password'];?>
"
                                style=" border: 0px; text-align: right;" class="pull-right"
                                onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'"
                                onclick="this.select()">
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_username'] != '') {?>
                        <li class="list-group-item">
                            <b>PPPOE <?php echo Lang::T('Username');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_username'];?>
</span>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_password'] != '' && in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <li class="list-group-item">
                            <b>PPPOE <?php echo Lang::T('Password');?>
</b> <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_password'];?>
"
                                style=" border: 0px; text-align: right;" class="pull-right"
                                onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'"
                                onclick="this.select()">
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_ip'] != '') {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('PPPoE Remote IP');?>
</b> <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_ip'];?>
</span>
                        </li>
                    <?php }?>
                    <?php if (file_exists('system/plugin/network_mapping.php')) {?>
                    <li class="list-group-item">
                        <b>ODP</b> <span class="pull-right" id="odp-name-display">-</span>
                    </li>
                    <li class="list-group-item" id="foto-lokasi-container" style="display: none;">
                        <b>Foto Lokasi</b>
                        <div style="margin-top: 10px;">
                            <img id="foto-lokasi-img" src="" alt="Foto Lokasi" 
                                style="max-width: 100%; max-height: 200px; border-radius: 8px; cursor: pointer;"
                                onclick="window.open(this.src, '_blank')">
                        </div>
                    </li>
                    <input type="hidden" id="view-customer-id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <?php }?>
                    <!--Customers Attributes view start -->
                    <?php if ($_smarty_tpl->tpl_vars['customFields']->value) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customFields']->value, 'customField');
$_smarty_tpl->tpl_vars['customField']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customField']->value) {
$_smarty_tpl->tpl_vars['customField']->do_else = false;
?>
                            <li class="list-group-item">
                                <b><?php echo $_smarty_tpl->tpl_vars['customField']->value['field_name'];?>
</b> <span class="pull-right">
                                    <?php if (strpos($_smarty_tpl->tpl_vars['customField']->value['field_value'],':0') === false) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['customField']->value['field_value'];?>

                                    <?php } else { ?>
                                        <b><?php echo Lang::T('Paid');?>
</b>
                                    <?php }?>
                                </span>
                            </li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                    <!--Customers Attributes view end -->
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Service Type');?>
</b> <span class="pull-right"><?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['service_type']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Account Type');?>
</b> <span class="pull-right"><?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['account_type']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Balance');?>
</b> <span class="pull-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['d']->value['balance']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Auto Renewal');?>
</b> <span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['d']->value['auto_renewal']) {?>yes<?php } else { ?>no
                            <?php }?></span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Created On');?>
</b> <span
                            class="pull-right"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['d']->value['created_at']);?>
</span>
                    </li>
                    <li class="list-group-item">
                        <b><?php echo Lang::T('Last Login');?>
</b> <span
                            class="pull-right"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['d']->value['last_login']);?>
</span>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
                        <li class="list-group-item">
                            <b><?php echo Lang::T('Coordinates');?>
</b> <span class="pull-right">
                                <i class="glyphicon glyphicon-road"></i> <a style="color: black;"
                                    href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
/"
                                    target="_blank"><?php echo Lang::T('Get Directions');?>
</a>
                            </span>
                            <div id="map" style="width: '100%'; height: 100px;"></div>
                        </li>
                    <?php }?>
                </ul>
                <div class="row">
                    <div class="col-xs-4">
                        <a href="<?php echo Text::url('customers/delete/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
" id="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"
                            class="btn btn-danger btn-block btn-sm"
                            onclick="return ask(this, '<?php echo Lang::T('Delete');?>
?')"><span class="fa fa-trash"></span></a>
                    </div>
                    <div class="col-xs-8">
                        <a href="<?php echo Text::url('customers/edit/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                            class="btn btn-warning btn-sm btn-block"><?php echo Lang::T('Edit');?>
</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8 col-md-8">
        <div class="box box-info">
            <ul class="nav nav-tabs">
                <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['v']->value == 'order') {?>class="active" <?php }?>><a
                        href="<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['d']->value['id'],'/order');?>
">30 <?php echo Lang::T('Order History');?>
</a></li>
                <li role="presentation" <?php if ($_smarty_tpl->tpl_vars['v']->value == 'activation') {?>class="active" <?php }?>><a
                        href="<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['d']->value['id'],'/activation');?>
">30
                        <?php echo Lang::T('Activation History');?>
</a></li>
            </ul>
            <div class="table-responsive" style="background-color: white;">
                <table id="datatable" class="table table-bordered table-striped">
                    <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['activation']->value)) {?>
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Invoice');?>
</th>
                                <th><?php echo Lang::T('Username');?>
</th>
                                <th><?php echo Lang::T('Plan Name');?>
</th>
                                <th><?php echo Lang::T('Plan Price');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Expires On');?>
</th>
                                <th><?php echo Lang::T('Method');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['activation']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr onclick="window.location.href = '<?php echo Text::url('plan/view/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
'"
                                    style="cursor:pointer;">
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['invoice'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                                    <td class="text-success">
                                        <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>

                                    </td>
                                    <td class="text-danger"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    <?php }?>
                    <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['order']->value)) {?>
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Plan Name');?>
</th>
                                <th><?php echo Lang::T('Gateway');?>
</th>
                                <th><?php echo Lang::T('Routers');?>
</th>
                                <th><?php echo Lang::T('Type');?>
</th>
                                <th><?php echo Lang::T('Plan Price');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Expires On');?>
</th>
                                <th><?php echo Lang::T('Date Done');?>
</th>
                                <th><?php echo Lang::T('Method');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['gateway'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['payment_channel'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                    <td class="text-primary"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['created_date']);?>
</td>
                                    <td class="text-danger"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expired_date']);?>
</td>
                                    <td class="text-success"><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 1) {
echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['paid_date']);
}?>
                                    </td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 1) {
echo Lang::T('UNPAID');?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 2) {
echo Lang::T('PAID');?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 3) {
echo $_smarty_tpl->tpl_vars['_L']->value['FAILED'];?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 4) {
echo Lang::T('CANCELED');?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 5) {
echo Lang::T('UNKNOWN');?>

                                        <?php }?></td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    <?php }?>
                </table>
            </div>
            <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packages']->value, 'package');
$_smarty_tpl->tpl_vars['package']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package']->value) {
$_smarty_tpl->tpl_vars['package']->do_else = false;
?>
                <div class="col-md-6">
                    <div class="box box-<?php if ($_smarty_tpl->tpl_vars['package']->value['status'] == 'on') {?>success<?php } else { ?>danger<?php }?>">
                        <div class="box-body box-profile">
                            <h4 class="text-center"><?php echo $_smarty_tpl->tpl_vars['package']->value['type'];?>
 - <?php echo $_smarty_tpl->tpl_vars['package']->value['namebp'];?>
 <span
                                    api-get-text="<?php echo Text::url('autoload/customer_is_active/');
echo $_smarty_tpl->tpl_vars['package']->value['username'];?>
/<?php echo $_smarty_tpl->tpl_vars['package']->value['plan_id'];?>
"></span>
                            </h4>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <?php echo Lang::T('Active');?>
 <span class="pull-right"><?php if ($_smarty_tpl->tpl_vars['package']->value['status'] == 'on') {?>yes<?php } else { ?>no
                                    <?php }?></span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Type');?>
 <span class="pull-right">
                                    <?php if ($_smarty_tpl->tpl_vars['package']->value['prepaid'] == 'yes') {?>Prepaid<?php } else { ?><b><?php echo Lang::T('Postpaid');?>
</b><?php }?></span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Bandwidth');?>
 <span class="pull-right">
                                    <?php echo $_smarty_tpl->tpl_vars['package']->value['name_bw'];?>
</span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Created On');?>
 <span
                                    class="pull-right"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['package']->value['recharged_on'],$_smarty_tpl->tpl_vars['package']->value['recharged_time']);?>
</span>
                            </li>
                            <li class="list-group-item">
                                <?php echo Lang::T('Expires On');?>
 <span class="pull-right"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['package']->value['expiration'],$_smarty_tpl->tpl_vars['package']->value['time']);?>
</span>
                            </li>
                            <li class="list-group-item">
                                <?php echo $_smarty_tpl->tpl_vars['package']->value['routers'];?>
 <span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['package']->value['method'];?>
</span>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="<?php echo Text::url('customers/deactivate/',$_smarty_tpl->tpl_vars['d']->value['id'],'/',$_smarty_tpl->tpl_vars['package']->value['plan_id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                    id="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="btn btn-danger btn-block btn-sm"
                                    onclick="return ask(this, '<?php echo Lang::T('This will deactivate Customer Plan, and make it expired');?>
')"><?php echo Lang::T('Deactivate');?>
</a>
                            </div>
                            <div class="col-xs-8">
                                <a href="<?php echo Text::url('customers/recharge/',$_smarty_tpl->tpl_vars['d']->value['id'],'/',$_smarty_tpl->tpl_vars['package']->value['plan_id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                    class="btn btn-success btn-sm btn-block"><?php echo Lang::T('Recharge');?>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            <!-- WiFi Management Container - Hanya muncul jika plugin GenieACS Manager ada dan ada server aktif -->
            <?php if (file_exists('system/plugin/genieacs_manager.php')) {?>
                <?php if (true) {?>
                    <div class="col-md-6" id="wifi-container">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <i class="fa fa-wifi"></i> WiFi Management
                                </h3>
                                <div class="box-tools pull-right">
                                    <span class="badge bg-blue" id="wifi-status-badge">Loading...</span>
                                </div>
                            </div>
                    <div class="box-body">
                        <div id="wifi-loading" style="text-align: center; padding: 20px;">
                            <i class="fa fa-spinner fa-spin"></i> Loading WiFi information...
                        </div>
                        <div id="wifi-content" style="display: none;">

                            <!-- Device Information - Compact -->
                            <!-- Device Information - Responsive Mobile Layout -->
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-md-3 col-xs-6">
                                    <small><strong>Model:</strong></small>
                                    <br><span id="device-model" class="label ont-badge"
                                        style="background-color: #092da1; color: #ffffff;">N/A</span>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <small><strong>PON:</strong></small>
                                    <br><span id="device-pon-type" class="label label-primary ont-badge">N/A</span>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <small><strong>Manufacturer:</strong></small>
                                    <br><span id="device-manufacturer" class="label label-default ont-badge">N/A</span>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <small><strong>RX Power:</strong></small>
                                    <br><span id="device-rx-power" class="rx-power-text">N/A</span>
                                    <i id="rx-power-indicator" class="fa fa-signal"
                                        style="margin-left: 3px; color: #999;"></i>
                                </div>
                            </div>

                            <style>
                                .ont-badge {
                                    font-size: 10px !important;
                                    padding: 3px 6px !important;
                                    border-radius: 3px !important;
                                }

                                /* WiFi Error Smooth Animation */
                                #wifi-error {
                                    animation: fadeInUp 0.5s ease-out;
                                }

                                @keyframes fadeInUp {
                                    from {
                                        opacity: 0;
                                        transform: translateY(20px);
                                    }
                                    to {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                }

                                /* Hover effect untuk refresh button */
                                #wifi-error button:hover {
                                    transform: scale(1.05);
                                    transition: all 0.3s ease;
                                }

                                /* RX Power Text - Default Light Mode (Hitam) */
                                .rx-power-text {
                                    font-size: 11px !important;
                                    font-weight: 500 !important;
                                    color: #333333 !important;
                                    /* Warna hitam untuk light mode */
                                }

                                /* Override any label or other classes that might affect color */
                                span.rx-power-text,
                                .col-md-3 .rx-power-text,
                                .col-xs-6 .rx-power-text {
                                    color: #333333 !important;
                                }

                                /* Dark mode - putih */
                                .dark-mode .rx-power-text,
                                body.dark .rx-power-text,
                                .theme-dark .rx-power-text,
                                [data-theme="dark"] .rx-power-text,
                                .skin-blue-dark .rx-power-text,
                                .skin-black .rx-power-text,
                                .dark .rx-power-text {
                                    color: #e9ecef !important;
                                    /* Dark mode - putih */
                                }

                                /* Mobile responsive untuk ONT info */
                                @media (max-width: 767px) {
                                    .ont-badge {
                                        font-size: 9px !important;
                                        padding: 2px 4px !important;
                                    }

                                    .rx-power-text {
                                        font-size: 10px !important;
                                        color: #333333 !important;
                                        /* Ensure black color on mobile light mode */
                                    }

                                    /* Dark mode on mobile */
                                    .dark-mode .rx-power-text,
                                    body.dark .rx-power-text {
                                        color: #e9ecef !important;
                                    }
                                }

                                /* Auto detect dark mode dari browser */
                                @media (prefers-color-scheme: dark) {
                                    .rx-power-text {
                                        color: #e9ecef !important;
                                    }
                                }

                                /* Extra specificity untuk memastikan warna hitam di light mode */
                                body:not(.dark-mode):not(.dark):not(.theme-dark):not([data-theme="dark"]):not(.skin-blue-dark):not(.skin-black) .rx-power-text {
                                    color: #333333 !important;
                                }
                            </style>

                            <hr style="margin: 10px 0;">

                            <!-- WiFi Information -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>2.4GHz SSID</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="current-ssid-2g" class="form-control" readonly>
                                            <span class="input-group-addon"><i class="fa fa-wifi"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>5GHz SSID</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="current-ssid-5g" class="form-control" readonly>
                                            <span class="input-group-addon"><i class="fa fa-wifi"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin: 10px 0;">

                            <!-- Update Form -->
                            <h5 style="margin-bottom: 10px;"><i class="fa fa-edit"></i> Update WiFi Settings</h5>
                            <form id="wifi-update-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New SSID *</label>
                                            <input type="text" id="new-ssid" class="form-control input-sm"
                                                placeholder="Enter new SSID" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>New Password *</label>
                                            <div class="input-group input-group-sm">
                                                <input type="password" id="new-password" class="form-control"
                                                    placeholder="Min 8 characters" required minlength="8">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-eye" id="toggle-new-password" onclick="toggleNewPasswordView()"
                                                        style="cursor: pointer;"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">
                                        <i class="fa fa-save"></i> Update WiFi Settings
                                    </button>
                                </div>
                            </form>
                            <small class="help-block">
                                <i class="fa fa-info-circle"></i> 5GHz SSID will automatically add "-5G" suffix
                            </small>
                        </div>
                        <div id="wifi-error" style="display: none; text-align: center; padding: 30px 20px;">
                            <!-- Icon with Animation -->
                            <div style="margin-bottom: 20px;">
                                <i class="fa fa-wifi" style="font-size: 48px; color: #ddd; opacity: 0.5;"></i>
                                <div style="margin-top: -15px; margin-left: 30px;">
                                    <i class="fa fa-times-circle" style="font-size: 24px; color: #e74c3c;"></i>
                                </div>
                            </div>
                            
                            <!-- Error Message -->
                            <h4 style="color: #555; font-weight: 600; margin-bottom: 10px;">
                                <span id="wifi-error-message">No ONT Device Found</span>
                            </h4>
                            
                            <!-- Description -->
                            <p style="color: #999; font-size: 14px; margin-bottom: 20px; line-height: 1.6;">
                                We couldn't find any ONT device associated with this customer.<br>
                                Please make sure the device is registered with tag: <strong style="color: #666;"><?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
</strong>
                            </p>
                            
                            <!-- Help Box -->
                            <div style="background: #f8f9fa; border-left: 3px solid #3498db; padding: 12px 15px; border-radius: 4px; margin-top: 20px; text-align: left;">
                                <small style="color: #555;">
                                    <i class="fa fa-lightbulb-o" style="color: #3498db; margin-right: 5px;"></i>
                                    <strong>Quick Fix:</strong>
                                </small>
                                <ul style="margin: 8px 0 0 0; padding-left: 20px; color: #666; font-size: 13px;">
                                    <li>Check if ONT device exists in GenieACS</li>
                                    <li>Verify device tag matches customer username</li>
                                    <li>Ensure GenieACS server is connected</li>
                                </ul>
                            </div>
                            
                            <!-- Optional: Refresh Button -->
                            <button onclick="loadWiFiManagement('<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
')" 
                                    class="btn btn-sm btn-primary" 
                                    style="margin-top: 20px; padding: 6px 20px; border-radius: 20px;">
                                <i class="fa fa-refresh"></i> Try Again
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                <?php }?>
            <?php }?>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('customers/list');?>
" class="btn btn-primary btn-sm btn-block"><?php echo Lang::T('Back');?>
</a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('customers/sync/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
            onclick="return ask(this, '<?php echo Lang::T('This will sync Customer to Mikrotik');?>
?')"
            class="btn btn-info btn-sm btn-block"><?php echo Lang::T('Sync');?>
</a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('message/send/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
            class="btn btn-success btn-sm btn-block">
            <?php echo Lang::T('Send Message');?>

        </a>
    </div>
    <div class="col-xs-6 col-md-3">
        <a href="<?php echo Text::url('customers/login/',$_smarty_tpl->tpl_vars['d']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
" target="_blank"
            class="btn btn-warning btn-sm btn-block">
            <?php echo Lang::T('Login as Customer');?>

        </a>
    </div>
</div>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>

<?php if (file_exists('system/plugin/genieacs_manager.php')) {?>
    <?php if (true) {
echo '<script'; ?>
>
    var currentDeviceId = null;

    // Auto-load WiFi Management saat halaman load
    $(document).ready(function() {
        console.log('Page loaded, starting WiFi load for username: <?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
');
        loadWiFiManagement('<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
');
    });

    // Load WiFi Management
    function loadWiFiManagement(username) {
        console.log('Loading WiFi management for:', username);

        document.getElementById('wifi-status-badge').textContent = 'Searching...';
        document.getElementById('wifi-loading').style.display = 'block';
        document.getElementById('wifi-content').style.display = 'none';
        document.getElementById('wifi-error').style.display = 'none';

        // Find device by tag
        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_devices/find-by-tag',
            type: 'GET',
            data: { tag: username },
            dataType: 'json',
            success: function(response) {
                console.log('Find device response:', response);

                if (response.success && response.device_id) {
                    currentDeviceId = response.device_id;
                    document.getElementById('wifi-status-badge').textContent = 'Loading WiFi...';
                    console.log('Device found, loading WiFi info for device:', response.device_id);
                    loadWiFiInfo(response.device_id);
                } else {
                    console.log('Device not found');
                    document.getElementById('wifi-status-badge').textContent = 'Not Found';
                    showWiFiError('No ONT device found for customer: ' + username);
                }
            },
            error: function(xhr, status, error) {
                console.log('Find device AJAX error:', xhr.responseText);
                document.getElementById('wifi-status-badge').textContent = 'Error';
                showWiFiError('Failed to search for ONT device: ' + error);
            }
        });
    }

    // Load WiFi Info from GenieACS
    function loadWiFiInfo(deviceId) {
        console.log('Loading WiFi info for device ID:', deviceId);

        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_device_detail/' + encodeURIComponent(deviceId) + '/get-device-info',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Device info response:', response);

                if (response.success) {
                    // Device Information - Badge style - Extract brand/series only
                    var modelText = response.device_info.device_model ||
                        response.device_info.vendor ||
                        response.device_info.model ||
                        'N/A';
                    
                    // Extract brand name only (ambil kata pertama atau singkatan)
                    var modelShort = 'N/A';
                    if (modelText !== 'N/A') {
                        // Jika ada "Huawei Technologies Co., Ltd" -> ambil "Huawei"
                        // Jika ada "ZTE Corporation" -> ambil "ZTE"
                        var words = modelText.split(/[\s,]+/); // Split by space or comma
                        modelShort = words[0]; // Ambil kata pertama
                    }
                    document.getElementById('device-model').textContent = modelShort;

                    var manufacturerText = response.device_info.vendor ||
                        response.device_info.manufacturer ||
                        'N/A';
                    
                    // Extract manufacturer name only
                    var manufacturerShort = 'N/A';
                    if (manufacturerText !== 'N/A') {
                        var manuWords = manufacturerText.split(/[\s,]+/);
                        manufacturerShort = manuWords[0];
                    }
                    document.getElementById('device-manufacturer').textContent = manufacturerShort;

                    document.getElementById('device-pon-type').textContent =
                        response.device_info.pon_mode ||
                        response.device_info.pon_type ||
                        'N/A';

                    document.getElementById('device-rx-power').textContent =
                        response.device_info.rx_power ||
                        'N/A';

                    // Set badge colors
                    setBadgeColors(response.device_info);

                    // WiFi Information
                    document.getElementById('current-ssid-2g').value = response.wifi_info.ssid_2g || 'N/A';
                    document.getElementById('current-ssid-5g').value = response.wifi_info.ssid_5g || 'N/A';

                    // Pre-fill form
                    document.getElementById('new-ssid').value = response.wifi_info.ssid_2g || '';
                    document.getElementById('new-password').value = response.wifi_info.password || '';

                    document.getElementById('wifi-loading').style.display = 'none';
                    document.getElementById('wifi-content').style.display = 'block';
                    document.getElementById('wifi-status-badge').textContent = 'Ready';

                    console.log('Device and WiFi info loaded successfully');
                } else {
                    console.log('Device info load failed:', response.error);
                    document.getElementById('wifi-status-badge').textContent = 'Failed';
                    showWiFiError('Failed to load device information: ' + (response.error ||
                        'Unknown error'));
                }
            },
            error: function(xhr, status, error) {
                console.log('Device info AJAX error:', xhr.responseText);
                document.getElementById('wifi-status-badge').textContent = 'Failed';
                showWiFiError('Failed to communicate with GenieACS: ' + error);
            }
        });
    }

    // Set Badge Colors
    function setBadgeColors(deviceInfo) {
        // Model - Biru #092da1
        var modelBadge = document.getElementById('device-model');
        modelBadge.className = 'label ont-badge';
        modelBadge.style.backgroundColor = '#092da1';
        modelBadge.style.color = '#ffffff';

        // PON Type - Berdasarkan type
        var ponBadge = document.getElementById('device-pon-type');
        ponBadge.className = 'label ont-badge';
        if (deviceInfo.pon_type === 'GPON') {
            ponBadge.style.backgroundColor = '#3498db'; // Biru
            ponBadge.style.color = '#ffffff';
        } else if (deviceInfo.pon_type === 'EPON') {
            ponBadge.style.backgroundColor = '#9b59b6'; // Ungu
            ponBadge.style.color = '#ffffff';
        } else {
            ponBadge.className = 'label label-default ont-badge';
        }

        // Manufacturer - Abu-abu
        var manufacturerBadge = document.getElementById('device-manufacturer');
        manufacturerBadge.className = 'label label-default ont-badge';

        // RX Power Signal Indicator (tanpa badge, cuma warna signal)
        var indicator = document.getElementById('rx-power-indicator');

        if (deviceInfo.rx_power && deviceInfo.rx_power !== 'N/A') {
            var rxValue = parseFloat(deviceInfo.rx_power);
            if (!isNaN(rxValue)) {
                if (rxValue > -20) {
                    // Excellent Signal - Hijau
                    indicator.style.color = '#00a65a';
                    indicator.title = 'Excellent Signal';
                } else if (rxValue > -25) {
                    // Good Signal - Kuning
                    indicator.style.color = '#f39c12';
                    indicator.title = 'Good Signal';
                } else {
                    // Poor Signal - Merah
                    indicator.style.color = '#dd4b39';
                    indicator.title = 'Poor Signal';
                }
            }
        } else {
            // Unknown Signal - Abu-abu
            indicator.style.color = '#999';
            indicator.title = 'Unknown Signal';
        }
    }

    // Show WiFi Error
    function showWiFiError(message) {
        document.getElementById('wifi-error-message').textContent = message;
        document.getElementById('wifi-loading').style.display = 'none';
        document.getElementById('wifi-error').style.display = 'block';
    }

    // Toggle New Password Visibility
    function toggleNewPasswordView() {
        var passwordField = document.getElementById('new-password');
        var toggleIcon = document.getElementById('toggle-new-password');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.className = 'fa fa-eye-slash';
        } else {
            passwordField.type = 'password';
            toggleIcon.className = 'fa fa-eye';
        }
    }

    // WiFi Update Form Event Handler
    document.getElementById('wifi-update-form').addEventListener('submit', function(e) {
        e.preventDefault();

        if (!currentDeviceId) {
            Swal.fire('Error!', 'No device selected', 'error');
            return;
        }

        var newSsid = document.getElementById('new-ssid').value.trim();
        var newPassword = document.getElementById('new-password').value.trim();

        if (!newSsid || !newPassword) {
            Swal.fire('Error!', 'Please fill in all fields', 'error');
            return;
        }

        if (newPassword.length < 8) {
            Swal.fire('Error!', 'Password must be at least 8 characters', 'error');
            return;
        }

        Swal.fire({
            title: 'Update WiFi Settings?',
            html: '<strong>New SSID 2.4G:</strong> ' + newSsid + '<br>' +
                '<strong>New SSID 5G:</strong> ' + newSsid + '-5G<br>' +
                '<strong>New Password:</strong> ' + newPassword,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, update!'
        }).then((result) => {
            if (result.isConfirmed) {
                updateWiFiSettings(newSsid, newPassword);
            }
        });
    });

    // ===== MAIN UPDATE FUNCTION WITH AUTO SUMMON/REFRESH =====
    function updateWiFiSettings(ssid, password) {
        console.log('Memulai update WiFi di customer views...');

        Swal.fire({
            title: 'Mengubah Pengaturan WiFi...',
            text: 'Mohon tunggu, sedang memperbarui router melalui customer panel',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_device_detail/' + encodeURIComponent(currentDeviceId) + '/update-wifi',
            type: 'POST',
            data: {
                ssid: ssid,
                password: password
            },
            dataType: 'json',
            timeout: 30000,
            success: function(response) {
                console.log('Customer views update response:', response);

                if (response && response.success) {
                    Swal.fire('Berhasil!',
                        'Pengaturan WiFi berhasil diubah melalui customer panel. Sistem akan memperbarui data terbaru secara otomatis.',
                        'success').then(() => {

                        // ===== MULAI PROSES OTOMATIS CUSTOMER VIEWS =====
                        console.log('Customer Views: Memulai auto summon dalam 5 detik...');

                        Swal.fire({
                            title: 'Memperbarui Data Terbaru...',
                            text: 'Customer panel menghubungi perangkat dalam 5 detik',
                            timer: 10000,
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        }).then(() => {
                            // Execute summon dari customer views
                            console.log('Customer Views: Menjalankan summon...');
                            executeCustomerAutoSummon();
                        });
                    });
                } else {
                    var errorMsg = 'Terjadi error yang tidak diketahui';
                    if (response && response.error) {
                        errorMsg = response.error;
                    }
                    Swal.fire('Error!', errorMsg, 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error('Customer Views Update AJAX Error:', {
                    status: status,
                    error: error,
                    responseText: xhr.responseText,
                    xhr: xhr
                });

                let errorMessage = 'Gagal berkomunikasi dengan server customer panel';
                if (xhr.status === 0) {
                    errorMessage = 'Network error - periksa koneksi internet Anda';
                } else if (xhr.status === 404) {
                    errorMessage = 'Customer update endpoint tidak ditemukan';
                } else if (xhr.status === 500) {
                    errorMessage = 'Terjadi error pada server customer panel';
                } else {
                    try {
                        let response = JSON.parse(xhr.responseText);
                        if (response.error) {
                            errorMessage = response.error;
                        }
                    } catch (e) {
                        errorMessage = 'Server customer panel memberikan response: ' + xhr.responseText;
                    }
                }
                Swal.fire('Error!', errorMessage, 'error');
            }
        });
    }

    // ===== AUTO SUMMON FUNCTIONS =====
    function executeCustomerAutoSummon(retryCount = 0) {
        const maxRetries = 2; // Total 3 attempts (0,1,2)
        const attempt = retryCount + 1;

        let message = 'Customer panel menghubungi perangkat untuk data terkini';
        if (retryCount > 0) {
            message = 'Customer panel mencoba lagi menghubungi perangkat... (' + attempt + '/3)';
        }

        console.log('Customer Views: Menjalankan auto summon... Attempt:', attempt);

        Swal.fire({
            title: 'Memperbarui Data Terbaru...',
            text: message,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_device_detail/' + encodeURIComponent(currentDeviceId) + '/summon',
            type: 'GET',
            dataType: 'json',
            timeout: 15000,
            success: function(response) {
                if (response && response.success) {
                    console.log('Customer Views: Auto summon berhasil pada attempt:', attempt);

                    // SUCCESS - lanjut ke refresh dengan delay
                    Swal.fire({
                        title: 'Sinkron Data Terbaru...',
                        text: 'Customer panel menyinkronkan informasi perangkat dalam 8 detik',
                        timer: 8000,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    }).then(() => {
                        executeCustomerAutoRefresh();
                    });
                } else {
                    console.error('Customer Views: Auto summon failed on attempt:', attempt);
                    handleCustomerSummonFailure(retryCount, maxRetries);
                }
            },
            error: function(xhr) {
                console.error('Customer Views: Auto summon AJAX Error on attempt:', attempt, xhr);
                handleCustomerSummonFailure(retryCount, maxRetries);
            }
        });
    }

    function handleCustomerSummonFailure(retryCount, maxRetries) {
        if (retryCount < maxRetries) {
            // RETRY - tunggu 5 detik lalu coba lagi
            const nextAttempt = retryCount + 2;

            Swal.fire({
                title: 'Customer Panel Mencoba Ulang...',
                text: 'Menunggu 5 detik sebelum percobaan ' + nextAttempt + '/3',
                timer: 5000,
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            }).then(() => {
                executeCustomerAutoSummon(retryCount + 1);
            });
        } else {
            // FALLBACK - skip summon, langsung refresh
            console.log('Customer Views: Max retry reached, fallback to direct refresh');

            Swal.fire({
                title: 'Customer Panel Sinkronisasi Langsung...',
                text: 'Melanjutkan tanpa panggilan perangkat',
                timer: 3000,
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            }).then(() => {
                executeCustomerAutoRefresh();
            });
        }
    }

    function executeCustomerAutoRefresh() {
        console.log('Customer Views: Menjalankan auto refresh...');

        Swal.fire({
            title: 'Customer Panel Sinkron Data Terbaru...',
            text: 'Menyinkronkan informasi perangkat melalui customer panel',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_device_detail/' + encodeURIComponent(currentDeviceId) + '/refresh',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response && response.success) {
                    console.log('Customer Views: Auto refresh berhasil, proses selesai!');

                    Swal.fire('Customer Panel Selesai!',
                        'Update WiFi dan sinkronisasi data customer panel berhasil! Data WiFi akan dimuat ulang.',
                        'success').then(() => {

                        // ===== CUSTOMER VIEWS RELOAD WIFI INFO (TANPA RELOAD PAGE) =====
                        Swal.fire({
                            title: 'Customer Panel Memuat Ulang Data WiFi...',
                            text: 'Mohon tunggu, customer panel sedang memperbarui dengan data terbaru',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // DELAY SEBENTAR UNTUK USER LIHAT LOADING, LALU RELOAD WIFI INFO
                        setTimeout(() => {
                            Swal.close();
                            // Reload WiFi information saja, bukan seluruh halaman
                            loadWiFiInfo(currentDeviceId);
                        }, 1500);
                    });
                } else {
                    // Warning tapi tetap reload wifi info
                    var errorMsg = 'Sinkronisasi gagal';
                    if (response && response.error) {
                        errorMsg = response.error;
                    }
                    console.error('Customer Views: Auto refresh failed:', errorMsg);

                    Swal.fire('Customer Panel Warning!', 'Sinkronisasi gagal: ' + errorMsg +
                            '. Namun update WiFi telah berhasil. Data WiFi akan dimuat ulang.', 'warning')
                        .then(() => {
                            // RELOAD WIFI INFO WALAUPUN REFRESH GAGAL
                            Swal.fire({
                                title: 'Customer Panel Memuat Ulang Data WiFi...',
                                text: 'Mohon tunggu, sedang memperbarui data WiFi terbaru',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false,
                                showConfirmButton: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            setTimeout(() => {
                                Swal.close();
                                loadWiFiInfo(currentDeviceId);
                            }, 1500);
                        });
                }
            },
            error: function(xhr) {
                console.error('Customer Views: Auto refresh AJAX Error:', xhr);

                Swal.fire('Customer Panel Warning!',
                        'Sinkronisasi gagal, namun update WiFi customer panel telah berhasil. Data WiFi akan dimuat ulang.',
                        'warning')
                    .then(() => {
                        // RELOAD WIFI INFO WALAUPUN ERROR
                        Swal.fire({
                            title: 'Customer Panel Memuat Ulang Data WiFi...',
                            text: 'Mohon tunggu, sedang memperbarui data WiFi terbaru',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        setTimeout(() => {
                            Swal.close();
                            loadWiFiInfo(currentDeviceId);
                        }, 1500);
                    });
            }
        });
    }

    // Find ONT Device (redirect to device detail)
    function findONTDevice(username) {
        Swal.fire({
            title: 'Opening ONT Device...',
            text: 'Looking for device with tag: ' + username,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_devices/find-by-tag',
            type: 'GET',
            data: { tag: username },
            dataType: 'json',
            success: function(response) {
                if (response.success && response.device_id) {
                    window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_device_detail/' + encodeURIComponent(response.device_id);
                } else {
                    Swal.fire('ONT Not Found!', 'No ONT device found with tag: ' + username, 'warning');
                }
            },
            error: function() {
                Swal.fire('Error!', 'Failed to search for ONT device', 'error');
            }
        });
    }
<?php echo '</script'; ?>
>
    <?php }
}
if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
    
        <?php echo '<script'; ?>
 src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            function setupMap(lat, lon) {
                var map = L.map('map').setView([lat, lon], 17);
                L.tileLayer('https://{s}.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}&s=Ga', {
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                    maxZoom: 20
            }).addTo(map);
            var marker = L.marker([lat, lon]).addTo(map);
            }
            window.onload = function() {
                setupMap(<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
);
            }
        <?php echo '</script'; ?>
>
    
<?php }?>

<?php if (file_exists('system/plugin/network_mapping.php')) {
echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(document).ready(function() {
    var customerId = $('#view-customer-id').val();
    if (customerId) {
        // Load ODP & Foto Lokasi via AJAX
        $.ajax({
            url: '<?php echo Text::url("plugin/network_mapping/get-customer-odp-foto");?>
',
            type: 'GET',
            data: { customer_id: customerId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success' && response.data) {
                    // Set ODP name
                    if (response.data.odp_name) {
                        $('#odp-name-display').text(response.data.odp_name);
                    } else {
                        $('#odp-name-display').text('-');
                    }
                    
                    // Set Foto Lokasi
                    if (response.data.foto_lokasi_url) {
                        $('#foto-lokasi-img').attr('src', response.data.foto_lokasi_url);
                        $('#foto-lokasi-container').show();
                    }
                }
            }
        });
    }
});
<?php echo '</script'; ?>
>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
