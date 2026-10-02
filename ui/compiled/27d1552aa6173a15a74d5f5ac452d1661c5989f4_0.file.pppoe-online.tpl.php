<?php
/* Smarty version 4.5.3, created on 2026-07-02 08:08:46
  from '/data/html/ui/ui/admin/reports/pppoe-online.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a45ba1e274225_09045450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27d1552aa6173a15a74d5f5ac452d1661c5989f4' => 
    array (
      0 => '/data/html/ui/ui/admin/reports/pppoe-online.tpl',
      1 => 1781998643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a45ba1e274225_09045450 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/data/html/system/vendor/smarty/smarty/libs/plugins/function.math.php','function'=>'smarty_function_math',),));
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        PPPoE Online
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
		    <th>Status</th>
                    <th>IP Address</th>
                    <th>Login Time</th>
		    <th>Durasi</th>
                </tr>
            </thead>

            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['online']->value, 'o');
$_smarty_tpl->tpl_vars['o']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['o']->value->username;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['o']->value->fullname;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['o']->value->paket;?>
</td>
		    <td>
			 <span class="label label-success">Online</span>
		    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['o']->value->framedipaddress;?>
</td>
		    <td><?php echo $_smarty_tpl->tpl_vars['o']->value->acctstarttime;?>
</td>

		    <td>
		    <?php $_smarty_tpl->_assignInScope('durasi', $_smarty_tpl->tpl_vars['o']->value->durasi_detik);?>

		    <?php if ($_smarty_tpl->tpl_vars['durasi']->value >= 86400) {?>
			<?php echo smarty_function_math(array('equation'=>"floor(x/86400)",'x'=>$_smarty_tpl->tpl_vars['durasi']->value),$_smarty_tpl);?>
 Hari
			<?php echo smarty_function_math(array('equation'=>"floor((x%86400)/3600)",'x'=>$_smarty_tpl->tpl_vars['durasi']->value),$_smarty_tpl);?>
 Jam
		    <?php } elseif ($_smarty_tpl->tpl_vars['durasi']->value >= 3600) {?>
			<?php echo smarty_function_math(array('equation'=>"floor(x/3600)",'x'=>$_smarty_tpl->tpl_vars['durasi']->value),$_smarty_tpl);?>
 Jam
			<?php echo smarty_function_math(array('equation'=>"floor((x%3600)/60)",'x'=>$_smarty_tpl->tpl_vars['durasi']->value),$_smarty_tpl);?>
 Menit
		    <?php } else { ?>
			<?php echo smarty_function_math(array('equation'=>"floor(x/60)",'x'=>$_smarty_tpl->tpl_vars['durasi']->value),$_smarty_tpl);?>
 Menit
		    <?php }?>
		    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>

        </table>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
