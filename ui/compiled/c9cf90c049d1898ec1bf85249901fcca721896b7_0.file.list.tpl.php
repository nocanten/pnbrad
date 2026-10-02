<?php
/* Smarty version 4.5.3, created on 2026-07-01 18:58:15
  from '/data/html/ui/ui_custom/admin/customers/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4500d705bc56_89177967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9cf90c049d1898ec1bf85249901fcca721896b7' => 
    array (
      0 => '/data/html/ui/ui_custom/admin/customers/list.tpl',
      1 => 1778796844,
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
function content_6a4500d705bc56_89177967 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <i class="ion ion-android-people"></i> <?php echo Lang::T('Manage Contact');?>

                <div class="pull-right">
                    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                        <a class="btn btn-primary btn-xs" title="save"
                            href="<?php echo Text::url('customers/csv&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                            onclick="return ask(this, '<?php echo Lang::T("
                                                                                                                            This will export to CSV");?>
?')">
                            <i class="glyphicon glyphicon-download"></i> <span class="hidden-xs">CSV</span>
                        </a>
                    <?php }?>
                    <span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['total_customer']->value;?>
 customers</span>
                </div>
            </div>
            <div class="panel-body">
                <form id="site-search" method="post" action="<?php echo Text::url('customers');?>
">
                    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">

                    <!-- Desktop Search Form -->
                    <div class="hidden-xs">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo Lang::T('Sort By');?>
</label>
                                    <div class="row">
                                        <div class="col-xs-7">
                                            <select class="form-control" id="order" name="order">
                                                <option value="username" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'username') {?>selected<?php }?>>
                                                    <?php echo Lang::T('Username');?>
</option>
                                                <option value="fullname" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'fullname') {?>selected<?php }?>>
                                                    <?php echo Lang::T('First Name');?>
</option>
                                                <option value="lastname" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'lastname') {?>selected<?php }?>>
                                                    <?php echo Lang::T('Last Name');?>
</option>
                                                <option value="created_at" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'created_at') {?>selected<?php }?>>
                                                    <?php echo Lang::T('Created Date');?>
</option>
                                                <option value="balance" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'balance') {?>selected<?php }?>>
                                                    <?php echo Lang::T('Balance');?>
</option>
                                                <option value="status" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'status') {?>selected<?php }?>>
                                                    <?php echo Lang::T('Status');?>
</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <select class="form-control" id="orderby" name="orderby">
                                                <option value="asc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'asc') {?>selected<?php }?>>ASC</option>
                                                <option value="desc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'desc') {?>selected<?php }?>>DESC</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label><?php echo Lang::T('Search');?>
</label>
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="<?php echo Lang::T('Search username, name, email, phone');?>
..."
                                            value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-search"></i> <?php echo Lang::T('Search');?>

                                            </button>
                                            <button class="btn btn-info" type="submit" name="export" value="csv">
                                                <i class="glyphicon glyphicon-download"></i> CSV
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <a href="<?php echo Text::url('customers/add');?>
" class="btn btn-success btn-block">
                                        <i class="ion ion-android-add"></i> <?php echo Lang::T('Add Customer');?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Search Form -->
                    <div class="visible-xs">
                        <div class="panel panel-default" style="margin-bottom: 15px;">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#searchFilters">
                                        <i class="fa fa-filter"></i> <?php echo Lang::T('Search & Filter');?>

                                        <i class="fa fa-chevron-down pull-right"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="searchFilters" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <!-- Search Input -->
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control input-lg"
                                            placeholder="<?php echo Lang::T('Search');?>
..." value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label class="small"><?php echo Lang::T('Status');?>
</label>
                                                <select class="form-control" name="filter">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statuses']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value == $_smarty_tpl->tpl_vars['status']->value) {?>selected<?php }?>>
                                                            <?php echo Lang::T($_smarty_tpl->tpl_vars['status']->value);?>

                                                        </option>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="small"><?php echo Lang::T('Order');?>
</label>
                                            <select class="form-control" name="orderby">
                                                <option value="asc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'asc') {?>selected<?php }?>>
                                                    <?php echo Lang::T('Ascending');?>
</option>
                                                <option value="desc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'desc') {?>selected<?php }?>>
                                                    <?php echo Lang::T('Descending');?>
</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-block" type="submit">
                                            <i class="fa fa-search"></i> <?php echo Lang::T('Search');?>

                                        </button>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-xs-6">
                                        <a href="<?php echo Text::url('customers/add');?>
" class="btn btn-success btn-block">
                                            <i class="ion ion-android-add"></i> <?php echo Lang::T('Add');?>

                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <button class="btn btn-info btn-block" type="submit" name="export" value="csv">
                                            <i class="glyphicon glyphicon-download"></i> Export CSV
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>

            <div class="form-group">
                <span>Show</span>
                <select class="page-item" id="per_page" name="per_page" onchange="changePerPage(this)">
                    <option value="10" <?php if ($_smarty_tpl->tpl_vars['cookie']->value == 10) {?>selected<?php }?>>10</option>
                    <option value="25" <?php if ($_smarty_tpl->tpl_vars['cookie']->value == 25) {?>selected<?php }?>>25</option>
                    <option value="50" <?php if ($_smarty_tpl->tpl_vars['cookie']->value == 50) {?>selected<?php }?>>50</option>
                    <option value="100" <?php if ($_smarty_tpl->tpl_vars['cookie']->value == 100) {?>selected<?php }?>>100</option>
                    <option value="200" <?php if ($_smarty_tpl->tpl_vars['cookie']->value == 200) {?>selected<?php }?>>200</option>
                    <option value="500" <?php if ($_smarty_tpl->tpl_vars['cookie']->value == 500) {?>selected<?php }?>>500</option>
                    <option value="1000" <?php if ($_smarty_tpl->tpl_vars['cookie']->value == 1000) {?>selected<?php }?>>1000</option>
                </select>
                <span>entries</span>
            </div>

            <!-- Mobile View -->
            <div class="visible-xs">
                <?php if ($_smarty_tpl->tpl_vars['d']->value) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                        <div class="panel panel-default mb-2">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <strong>Status:</strong>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Active') {?>
                                            <span class="label label-success"><?php echo Lang::T($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                        <?php } else { ?>
                                            <span class="label label-danger"><?php echo Lang::T($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                        <?php }?>
                                    </div>
                                    <div class="col-xs-6">
                                        <strong>Balance:</strong>
                                        <span class="text-primary"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['balance']);?>
</span>
                                    </div>
                                </div>
                                <hr class="mb-2 mt-2">
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <strong>Username:</strong> <?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
<br>
                                        <small class="text-muted">ID: <?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</small>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <strong>Full Name:</strong> <?php echo $_smarty_tpl->tpl_vars['ds']->value['fullname'];?>

                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xs-6">
                                        <strong>Type:</strong> <?php echo $_smarty_tpl->tpl_vars['ds']->value['account_type'];?>

                                    </div>
                                    <div class="col-xs-6">
                                        <strong>Service:</strong> <?php echo $_smarty_tpl->tpl_vars['ds']->value['service_type'];?>

                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <strong>Package:</strong>
                                        <span api-get-text="<?php echo Text::url('autoload/plan_is_active/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                                            <span class="label label-default">&bull;</span>
                                        </span>
                                    </div>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['phonenumber'] || $_smarty_tpl->tpl_vars['ds']->value['email'] || $_smarty_tpl->tpl_vars['ds']->value['coordinates']) {?>
                                    <div class="row mb-1">
                                        <div class="col-xs-12">
                                            <strong>Contact:</strong>
                                            <div class="btn-group btn-group-sm">
                                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['phonenumber']) {?>
                                                    <a href="tel:<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
" class="btn btn-default btn-xs"
                                                        title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
"><i class="glyphicon glyphicon-earphone"></i></a>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['email']) {?>
                                                    <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
" class="btn btn-default btn-xs"
                                                        title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
"><i class="glyphicon glyphicon-envelope"></i></a>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['coordinates']) {?>
                                                    <a href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
/" target="_blank"
                                                        class="btn btn-default btn-xs" title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
"><i
                                                            class="glyphicon glyphicon-map-marker"></i></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <small><strong>Created:</strong> <?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['created_at']);?>
</small>
                                    </div>
                                </div>
                                <hr class="mb-2 mt-2">
                                <div class="row mb-1">
                                    <div class="col-xs-12">
                                        <input type="checkbox" name="customer_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                                        <strong>Select for bulk action</strong>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <a href="<?php echo Text::url('customers/view/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-sm">
                                            <i class="fa fa-eye"></i> <?php echo Lang::T('View');?>

                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="<?php echo Text::url('customers/edit/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> <?php echo Lang::T('Edit');?>

                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-justified" style="margin-top: 5px;">
                                    <?php if (file_exists('system/plugin/genieacs_manager.php')) {?>
                                    <div class="btn-group">
                                        <button onclick="findONTDevice('<?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
')" class="btn btn-warning btn-sm">
                                            <i class="fa fa-wifi"></i> ONT
                                        </button>
                                    </div>
                                    <?php }?>
                                    <div class="btn-group">
                                        <a href="<?php echo Text::url('customers/sync/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-refresh"></i> <?php echo Lang::T('Sync');?>

                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-justified" style="margin-top: 5px;">
                                    <div class="btn-group">
                                        <a href="<?php echo Text::url('plan/recharge/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-bolt"></i> <?php echo Lang::T('Recharge');?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </div>

            <!-- Desktop View -->
            <div class="table-responsive table_mobile hidden-xs">
                <table id="customerTable" class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th><?php echo Lang::T('Username');?>
</th>
                            <th>Photo</th>
                            <th><?php echo Lang::T('Account Type');?>
</th>
                            <th><?php echo Lang::T('Full Name');?>
</th>
                            <th><?php echo Lang::T('District');?>
</th>
                            <th><?php echo Lang::T('Balance');?>
</th>
                            <th><?php echo Lang::T('Contact');?>
</th>
                            <th><?php echo Lang::T('Package');?>
</th>
                            <th><?php echo Lang::T('Service Type');?>
</th>
                            <th>PPPOE</th>
                            <th><?php echo Lang::T('Status');?>
</th>
                            <th><?php echo Lang::T('Created On');?>
</th>
                            <th><?php echo Lang::T('Manage');?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 'Active') {?>class="danger" <?php }?>>
                                    <td><input type="checkbox" name="customer_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"></td>
                                    <td onclick="window.location.href = '<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
'"
                                        style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['ds']->value['photo'];?>
" target="photo">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['ds']->value['photo'];?>
.thumb.jpg" width="32" alt="">
                                        </a>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account_type'];?>
</td>
                                    <td onclick="window.location.href = '<?php echo Text::url('customers/view/',$_smarty_tpl->tpl_vars['ds']->value['id']);?>
'"
                                        style="cursor: pointer;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['fullname'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['district'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['balance']);?>
</td>
                                    <td align="center">
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['phonenumber']) {?>
                                            <a href="tel:<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
" class="btn btn-default btn-xs"
                                                title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
"><i class="glyphicon glyphicon-earphone"></i></a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['email']) {?>
                                            <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
" class="btn btn-default btn-xs" title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
"><i
                                                    class="glyphicon glyphicon-envelope"></i></a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['coordinates']) {?>
                                            <a href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
/" target="_blank"
                                                class="btn btn-default btn-xs" title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
"><i
                                                    class="glyphicon glyphicon-map-marker"></i></a>
                                        <?php }?>
                                    </td>
                                    <td align="center" api-get-text="<?php echo Text::url('autoload/plan_is_active/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                                        <span class="label label-default">&bull;</span>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['service_type'];?>
</td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['ds']->value['pppoe_username'];?>

                                        <?php if (!empty($_smarty_tpl->tpl_vars['ds']->value['pppoe_username']) && !empty($_smarty_tpl->tpl_vars['ds']->value['pppoe_ip'])) {?>:<?php }?>
                                        <?php echo $_smarty_tpl->tpl_vars['ds']->value['pppoe_ip'];?>

                                    </td>
                                    <td><?php echo Lang::T($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</td>
                                    <td><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['created_at']);?>
</td>
                                    <td align="center" style="min-width: 80px; padding: 3px;">
                                        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2px;">
                                            <a href="<?php echo Text::url('customers/view/');
echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-success btn-xs"
                                                title="<?php echo Lang::T('View');?>
" style="padding: 2px 6px;">
                                                <i class="fa fa-eye"></i></a>
                                            <a href="<?php echo Text::url('customers/edit/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                                class="btn btn-info btn-xs" title="<?php echo Lang::T('Edit');?>
" style="padding: 2px 6px;">
                                                <i class="fa fa-edit"></i></a>
                                            <?php if (file_exists('system/plugin/genieacs_manager.php')) {?>
                                            <a href="javascript:void(0)" onclick="findONTDevice('<?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
')"
                                                class="btn btn-warning btn-xs" title="ONT Device" style="padding: 2px 6px;">
                                                <i class="fa fa-wifi"></i></a>
                                            <?php }?>
                                            <a href="<?php echo Text::url('customers/sync/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                                class="btn btn-success btn-xs" title="<?php echo Lang::T('Sync');?>
"
                                                style="padding: 2px 6px;">
                                                <i class="fa fa-refresh"></i></a>
                                            <a href="<?php echo Text::url('plan/recharge/',$_smarty_tpl->tpl_vars['ds']->value['id'],'&token=',$_smarty_tpl->tpl_vars['csrf_token']->value);?>
"
                                                class="btn btn-primary btn-xs" title="<?php echo Lang::T('Recharge');?>
"
                                                style="padding: 2px 6px;">
                                                <i class="fa fa-bolt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </tbody>
                </table>
            </div>

            <div class="row" style="padding: 5px">
                <div class="col-lg-3 col-lg-offset-9">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <button id="sendMessageToSelected" class="btn btn-success btn-block"><?php echo Lang::T('Send
                                    Message');?>
</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (empty($_smarty_tpl->tpl_vars['d']->value)) {?>
                <div class="alert alert-info text-center">
                    <i class="fa fa-info-circle"></i> <?php echo Lang::T('No customers found');?>

                </div>
            <?php }?>

            <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
</div>
</div>

<!-- Modal for Sending Messages -->
<div id="sendMessageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMessageModalLabel"><?php echo Lang::T('Send Message');?>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select style="margin-bottom: 10px;" id="messageType" class="form-control">
                    <option value="all"><?php echo Lang::T('All');?>
</option>
                    <option value="email"><?php echo Lang::T('Email');?>
</option>
                    <option value="inbox"><?php echo Lang::T('Inbox');?>
</option>
                    <option value="sms"><?php echo Lang::T('SMS');?>
</option>
                    <option value="wa"><?php echo Lang::T('WhatsApp');?>
</option>
                </select>
                <input type="text" style="margin-bottom: 10px;" class="form-control" id="subject-content" value=""
                    placeholder="<?php echo Lang::T('Enter message subject here');?>
">
                <textarea id="messageContent" class="form-control" rows="4"
                    placeholder="<?php echo Lang::T('Enter your message here...');?>
"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo Lang::T('Close');?>
</button>
                <button type="button" id="sendMessageButton" class="btn btn-primary"><?php echo Lang::T('Send Message');?>
</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Mobile optimization */
    @media (max-width: 767px) {
        .panel-body {
            padding: 10px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .form-group select {
            margin-left: 10px;
            margin-right: 10px;
        }

        .page-item {
            width: 100px;
            display: block;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Search form mobile adjustments */
        #site-search .col-lg-4,
        #site-search .col-lg-3,
        #site-search .col-lg-1 {
            margin-bottom: 10px;
        }

        .md-whiteframe-z1 {
            padding: 10px !important;
        }

        /* Row adjustments for mobile */
        .row-no-gutters {
            margin-left: 0;
            margin-right: 0;
        }

        .row-no-gutters>[class*="col-"] {
            padding-left: 5px;
            padding-right: 5px;
        }
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
        color: #333;
        cursor: pointer;
    }

    /* Clean form styling */
    .form-group label {
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
    }

    .form-group label.small {
        font-size: 12px;
        font-weight: 600;
    }

    /* Search panel mobile - no background color to follow theme */
    #searchFilters .input-lg {
        font-size: 16px;
        height: 45px;
    }

    /* Collapsible panel styling */
    .panel-title a {
        text-decoration: none;
        display: block;
    }

    .panel-title a:hover {
        text-decoration: none;
    }

    .panel-title a[data-toggle="collapse"] .fa-chevron-down {
        transition: transform 0.3s ease;
    }

    .panel-title a[data-toggle="collapse"].collapsed .fa-chevron-down {
        transform: rotate(-90deg);
    }

    /* Desktop search form styling */
    @media (min-width: 768px) {
        .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            font-size: 13px;
        }
    }
</style>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    // Select or deselect all checkboxes
    document.getElementById('select-all').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('input[name="customer_ids[]"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });

    $(document).ready(function() {
        let selectedCustomerIds = [];

        // Collect selected customer IDs when the button is clicked
        $('#sendMessageToSelected').on('click', function() {
            selectedCustomerIds = $('input[name="customer_ids[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedCustomerIds.length === 0) {
                Swal.fire({
                    title: 'Error!',
                    text: "<?php echo Lang::T('Please select at least one customer to send a message.');?>
",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Open the modal
            $('#sendMessageModal').modal('show');
        });

        // Handle sending the message
        $('#sendMessageButton').on('click', function() {
            const message = $('#messageContent').val().trim();
            const messageType = $('#messageType').val();
            const subject = $('#subject-content').val().trim();


            if (!message) {
                Swal.fire({
                    title: 'Error!',
                    text: "<?php echo Lang::T('Please enter a message to send.');?>
",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            if (messageType == 'all' || messageType == 'inbox' || messageType == 'email' && !subject) {
                Swal.fire({
                    title: 'Error!',
                    text: "<?php echo Lang::T('Please enter a subject for the message.');?>
",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Disable the button and show loading text
            $(this).prop('disabled', true).text('<?php echo Lang::T('Sending...');?>
');

            $.ajax({
                url: '?_route=message/send_bulk_selected',
                method: 'POST',
                data: {
                    customer_ids: selectedCustomerIds,
                    message_type: messageType,
                    message: message
                },
                dataType: 'json',
                success: function(response) {
                    // Handle success response
                    if (response.status === 'success') {
                        Swal.fire({
                            title: 'Success!',
                            text: "<?php echo Lang::T('Message sent successfully.');?>
",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: "<?php echo Lang::T('Error sending message: ');?>
" + response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    $('#sendMessageModal').modal('hide');
                    $('#messageContent').val(''); // Clear the message content
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: "<?php echo Lang::T('Failed to send the message. Please try again.');?>
",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    // Re-enable the button and reset text
                    $('#sendMessageButton').prop('disabled', false).text('<?php echo Lang::T('Send Message');?>
');
                }
            });
        });
    });

    $(document).ready(function() {
        $('#sendMessageModal').on('show.bs.modal', function() {
            $(this).attr('inert', 'true');
        });
        $('#sendMessageModal').on('shown.bs.modal', function() {
            $('#messageContent').focus();
            $(this).removeAttr('inert');
        });
        $('#sendMessageModal').on('hidden.bs.modal', function() {
            // $('#button').focus();
        });
    });

    // Toggle collapse icon
    $('#searchFilters').on('show.bs.collapse', function() {
        $(this).parent().find('.fa-chevron-down').removeClass('collapsed');
    });
    $('#searchFilters').on('hide.bs.collapse', function() {
        $(this).parent().find('.fa-chevron-down').addClass('collapsed');
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    document.getElementById('messageType').addEventListener('change', function() {
        const messageType = this.value;
        const subjectField = document.getElementById('subject-content');

        subjectField.style.display = (messageType === 'all' || messageType === 'email' || messageType ===
            'inbox') ? 'block' : 'none';

        switch (messageType) {
            case 'all':
                subjectField.placeholder = 'Enter a subject for all channels';
                subjectField.required = true;
                break;
            case 'email':
                subjectField.placeholder = 'Enter a subject for email';
                subjectField.required = true;
                break;
            case 'inbox':
                subjectField.placeholder = 'Enter a subject for inbox';
                subjectField.required = true;
                break;
            default:
                subjectField.placeholder = 'Enter message subject here';
                subjectField.required = false;
                break;
        }
    });

    function changePerPage(select) {
        setCookie('customer_per_page', select.value, 365);
        setTimeout(() => {
            location.reload();
        }, 1000);
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    // Disable duplicate fields based on screen size
    $(document).ready(function() {
        function toggleFormFields() {
            if ($(window).width() >= 768) {
                // Desktop view - disable mobile fields
                $('.visible-xs input, .visible-xs select').prop('disabled', true);
                $('.hidden-xs input, .hidden-xs select').prop('disabled', false);
            } else {
                // Mobile view - disable desktop fields
                $('.hidden-xs input, .hidden-xs select').prop('disabled', true);
                $('.visible-xs input, .visible-xs select').prop('disabled', false);
            }
        }

        // Run on load
        toggleFormFields();

        // Run on resize
        $(window).resize(toggleFormFields);
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function findONTDevice(username) {
        // Show loading
        Swal.fire({
            title: 'Searching ONT Device...',
            text: 'Looking for device with tag: ' + username,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Ajax call to find device
        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/genieacs_devices/find-by-tag',
            type: 'GET',
            data: { tag: username },
            dataType: 'json',
            success: function(response) {
                if (response.success && response.device_id) {
                    // Redirect to device detail
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
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
