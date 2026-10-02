<?php
/* Smarty version 4.5.3, created on 2026-07-01 18:57:27
  from '/data/html/ui/ui/widget/top_widget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4500a7b4e6f7_53346780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e4105f3e2252c91a69255d2ac05fa354b3a091b' => 
    array (
      0 => '/data/html/ui/ui/widget/top_widget.tpl',
      1 => 1782232295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a4500a7b4e6f7_53346780 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4 class="text-bold" style="font-size: large;"><sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                        <?php echo number_format($_smarty_tpl->tpl_vars['iday']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-clock"></i>
                </div>
                <a href="<?php echo Text::url('reports/by-date');?>
" class="small-box-footer"><?php echo Lang::T('Income Today');?>
</a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h4 class="text-bold" style="font-size: large;"><sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                        <?php echo number_format($_smarty_tpl->tpl_vars['imonth']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-android-calendar"></i>
                </div>
                <a href="<?php echo Text::url('reports/by-period');?>
" class="small-box-footer"><?php echo Lang::T('Income This Month');?>
</a>
            </div>
        </div>
    <?php }?>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['u_all']->value-$_smarty_tpl->tpl_vars['u_act']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo Text::url('plan/list');?>
" class="small-box-footer"><?php echo Lang::T('Active');?>
/<?php echo Lang::T('Expired');?>
</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['c_all']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-android-people"></i>
            </div>
            <a href="<?php echo Text::url('customers/list');?>
" class="small-box-footer"><?php echo Lang::T('Customers');?>
</a>
        </div>
    </div>
</div>
<div class="row" style="margin-top:10px;">

    <!-- PPPoE Online -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['pppoe_online']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-wifi"></i>
            </div>
            <a href="<?php echo Text::url('reports/pppoe-online');?>
" class="small-box-footer">
                PPPoE Online
            </a>
        </div>
    </div>

    <!-- PPPoE Offline -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-maroon">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['pppoe_offline']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-close-circled"></i>
            </div>
            <a href="<?php echo Text::url('reports/pppoe-offline');?>
" class="small-box-footer">
                PPPoE Offline
            </a>
        </div>
    </div>

    <!-- Router Online -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['router_online']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-network"></i>
            </div>
            <a href="<?php echo Text::url('routers/list');?>
&status=Online" class="small-box-footer">
                Router Online
            </a>
        </div>
    </div>

    <!-- Router Offline -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-navy">
            <div class="inner">
                <h4 class="text-bold" style="font-size: large;"><?php echo $_smarty_tpl->tpl_vars['router_offline']->value;?>
</h4>
            </div>
            <div class="icon">
                <i class="ion ion-alert-circled"></i>
            </div>
            <a href="<?php echo Text::url('routers/list');?>
&status=Offline" class="small-box-footer">
                Router Offline
            </a>
        </div>
    </div>

</div>
<style>
.ticket-card{
    border-radius:10px;
    color:#fff;
    padding:10px;
    text-align:center;
    margin-bottom:10px;
    box-shadow:0 1px 2px rgba(0,0,0,.15);
}

.ticket-card h1{
    font-size:20px;
    font-weight:700;
    margin:1px 0;
    color:#fff;
}

.ticket-card h4{
    color:#fff;
    margin:0;
    font-weight:600;
}

.ticket-card small{
    color:rgba(255,255,255,.8);
}

.bg-open{
    background:linear-gradient(135deg,#ff6b6b,#ee5253);
}

.bg-assigned{
    background:linear-gradient(135deg,#feca57,#ff9f43);
}

.bg-progress{
    background:linear-gradient(135deg,#54a0ff,#2e86de);
}

.bg-closed{
    background:linear-gradient(135deg,#1dd1a1,#10ac84);
}

.bg-install{
    background:linear-gradient(135deg,#5f27cd,#341f97);
}

.bg-trouble{
    background:linear-gradient(135deg,#ee5253,#b71540);
}

.bg-today{
    background:linear-gradient(135deg,#00d2d3,#01a3a4);
}

.bg-month{
    background:linear-gradient(135deg,#576574,#222f3e);
}
</style>

<div class="row">

    <div class="col-md-3">
        <div class="ticket-card bg-open">
            <h4>📂 Open</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['open']->value;?>
</h1>
            <a href="<?php echo Text::url('ticketing/list');?>
&status=open"
               class="small-box-footer">
               <small>Ticket Baru</small>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ticket-card bg-assigned">
            <h4>👨‍🔧 Assigned</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['assigned']->value;?>
</h1>
            <a href="<?php echo Text::url('ticketing/list');?>
&status=assigned"
               class="small-box-footer">
               <small>Sudah Ditugaskan</small>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ticket-card bg-progress">
            <h4>⚙️ Progress</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['progress']->value;?>
</h1>
            <a href="<?php echo Text::url('ticketing/list');?>
&status=progress"
               class="small-box-footer">
               <small>Sedang Dikerjakan</small>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ticket-card bg-closed">
            <h4>✅ Closed</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['closed']->value;?>
</h1>
            <a href="<?php echo Text::url('ticketing/list');?>
&status=closed"
               class="small-box-footer">
               <small>Ticket Selesai</small>
            </a>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="ticket-card bg-install">
            <h4>📡 Ticket Pemasangan</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['installation']->value;?>
</h1>
            <a href="<?php echo Text::url('ticketing/list');?>
&type=installation"
               class="small-box-footer">
               <small>Total Ticket Pemasangan</small>
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="ticket-card bg-trouble">
            <h4>🚨 Ticket Gangguan</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['trouble']->value;?>
</h1>
            <a href="<?php echo Text::url('ticketing/list');?>
&type=trouble"
               class="small-box-footer">
               <small>Total Ticket Gangguan</small>
            </a>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="ticket-card bg-today">
            <h4>📅 Ticket Hari Ini</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['today']->value;?>
</h1>
            <small>Dibuat Hari Ini</small>
        </div>
    </div>

    <div class="col-md-6">
        <div class="ticket-card bg-month">
            <h4>📈 Ticket Bulan Ini</h4>
            <h1><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</h1>
            <small>Dibuat Bulan Ini</small>
        </div>
    </div>

</div><?php }
}
