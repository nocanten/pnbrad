<?php
/* Smarty version 4.5.3, created on 2026-07-01 18:55:08
  from '/data/html/ui/ui_custom/admin/ticketing/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a45001c332666_54922868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31d37a465e32b4a968e8379a390725756ae61bc5' => 
    array (
      0 => '/data/html/ui/ui_custom/admin/ticketing/list.tpl',
      1 => 1782232974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a45001c332666_54922868 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="panel panel-default">

    <div class="panel-heading">
        Daftar Ticket
    </div>

    <div class="panel-body">

        <a href="<?php echo Text::url('ticketing/add');?>
"
           class="btn btn-primary">
            Tambah Ticket
        </a>

        <hr>

        <div class="btn-group" style="margin-bottom:15px;">
        
            <a href="<?php echo Text::url('ticketing/list');?>
&status=open"
               class="btn btn-danger">
               Open
            </a>
        
            <a href="<?php echo Text::url('ticketing/list');?>
&status=assigned"
               class="btn btn-warning">
               Assigned
            </a>
        
            <a href="<?php echo Text::url('ticketing/list');?>
&status=progress"
               class="btn btn-info">
               Progress
            </a>
        
            <a href="<?php echo Text::url('ticketing/list');?>
&status=closed"
               class="btn btn-success">
               Closed
            </a>
            
            <a href="<?php echo Text::url('ticketing/list');?>
&type=installation"
               class="btn btn-primary">
               Pemasangan
            </a>
        
            <a href="<?php echo Text::url('ticketing/list');?>
&type=trouble"
               class="btn btn-danger">
               Gangguan
            </a>
            
            <a href="<?php echo Text::url('ticketing/list');?>
"
               class="btn btn-default">
               Semua
            </a>
        
        </div>

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No Ticket</th>
                    <th>Pelanggan</th>
                    <th>PPPoE</th>
                    <th>Type</th>
                    <th>Subject</th>
		    <th>Teknisi</th>
                    <th>Status</th>
		    <th>Assigned</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tickets']->value, 't');
$_smarty_tpl->tpl_vars['t']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->do_else = false;
?>

                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['t']->value['ticket_no'];?>
</td>

                    <td>
                        <?php echo (($tmp = $_smarty_tpl->tpl_vars['t']->value['fullname'] ?? null)===null||$tmp==='' ? '-' ?? null : $tmp);?>

                    </td>

                    <td>
                        <?php echo (($tmp = $_smarty_tpl->tpl_vars['t']->value['pppoe_username'] ?? null)===null||$tmp==='' ? '-' ?? null : $tmp);?>

                    </td>

                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['t']->value['type'];?>

                    </td>

                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['t']->value['subject'];?>

                    </td>

		    <td>
			<?php echo (($tmp = $_smarty_tpl->tpl_vars['t']->value['technician_name'] ?? null)===null||$tmp==='' ? '-' ?? null : $tmp);?>

		    </td>

                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['t']->value['status'] == 'open') {?>
                            <span class="label label-danger">Open</span>

                        <?php } elseif ($_smarty_tpl->tpl_vars['t']->value['status'] == 'assigned') {?>
                            <span class="label label-warning">Assigned</span>

                        <?php } elseif ($_smarty_tpl->tpl_vars['t']->value['status'] == 'progress') {?>
                            <span class="label label-info">Progress</span>

                        <?php } elseif ($_smarty_tpl->tpl_vars['t']->value['status'] == 'closed') {?>
                            <span class="label label-success">Closed</span>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['t']->value['status'];?>

                        <?php }?>
                    </td>

		    <td>
			<?php echo (($tmp = $_smarty_tpl->tpl_vars['t']->value['assigned_at'] ?? null)===null||$tmp==='' ? '-' ?? null : $tmp);?>

		    </td>

                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['t']->value['created_at'];?>

                    </td>

                    <td>
                        <a href="<?php echo Text::url('ticketing/view');?>
&id=<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"
                           class="btn btn-xs btn-info">
                            Detail
                        </a>
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
