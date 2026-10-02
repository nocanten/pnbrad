<?php
/* Smarty version 4.5.3, created on 2026-07-02 10:53:00
  from '/data/html/ui/ui/admin/reports/pppoe-offline.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a45e09cd9fd74_18120302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae75105d393075e5a0f2d9a61f8f2bf29de51030' => 
    array (
      0 => '/data/html/ui/ui/admin/reports/pppoe-offline.tpl',
      1 => 1781999336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a45e09cd9fd74_18120302 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/data/html/system/vendor/smarty/smarty/libs/plugins/function.math.php','function'=>'smarty_function_math',),));
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        PPPoE Offline
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
		    <th>Status</th>
		    <th>Last Seen</th>
		    <th>Offline Sejak</th>
                </tr>
            </thead>

            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['offline']->value, 'o');
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
			<span class="label label-danger">Offline</span>
		    </td>
		    <td><?php echo $_smarty_tpl->tpl_vars['o']->value->last_online;?>
</td>
		    <td>
        		<?php $_smarty_tpl->_assignInScope('durasi', $_smarty_tpl->tpl_vars['o']->value->offline_detik);?>

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
