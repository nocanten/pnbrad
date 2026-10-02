<?php
/* Smarty version 4.5.3, created on 2026-07-02 18:07:28
  from '/data/html/ui/ui/admin/print/by-date.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a464670c58090_39265570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b82ec5ba49d6b253b3bbebe73123bfd346989ac0' => 
    array (
      0 => '/data/html/ui/ui/admin/print/by-date.tpl',
      1 => 1781467124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a464670c58090_39265570 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/styles/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/images/favicon.ico">

    <style type="text/css">
        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
</head>

<body>
<div class="row">
    <div class="col-md-12">
        <div id="printable">
            <h4><?php echo Lang::T('All Transactions at Date');?>
: <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['sd']->value,$_smarty_tpl->tpl_vars['ts']->value);?>
 - <?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ed']->value,$_smarty_tpl->tpl_vars['te']->value);?>
</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-bordered" style="background: #ffffff">
                    <th class="text-center"><?php echo Lang::T('Username');?>
</th>
                    <th class="text-center"><?php echo Lang::T('Plan Name');?>
</th>
                    <th class="text-center"><?php echo Lang::T('Type');?>
</th>
                    <th class="text-center"><?php echo Lang::T('Plan Price');?>
</th>
                    <th class="text-center"><?php echo Lang::T('Created On');?>
</th>
                    <th class="text-center"><?php echo Lang::T('Expires On');?>
</th>
                    <th class="text-center"><?php echo Lang::T('Method');?>
</th>
                    <th class="text-center"><?php echo Lang::T('Routers');?>
</th>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                            <td class="text-right"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                            <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>
</td>
                            <td><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</td>
                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
            </div>
			<div class="clearfix text-right total-sum mb10">
				<h4 class="text-uppercase text-bold"><?php echo Lang::T('Total Income');?>
:</h4>
				<h3 class="sum"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['dr']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h3>
			</div>
        </div>
        <button type="button" id="actprint" class="btn btn-default btn-sm no-print"><?php echo Lang::T('Click Here to Print');?>
</button>
    </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/scripts/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/ui/scripts/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php if ((isset($_smarty_tpl->tpl_vars['xfooter']->value))) {?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }
echo '<script'; ?>
>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        $("#actprint").click(function() {
            window.print();
            return false;
        });
    });
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
