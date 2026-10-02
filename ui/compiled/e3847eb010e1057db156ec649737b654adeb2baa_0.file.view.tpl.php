<?php
/* Smarty version 4.5.3, created on 2026-07-02 08:43:09
  from '/data/html/ui/ui_custom/admin/ticketing/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a45c22db80319_86633600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3847eb010e1057db156ec649737b654adeb2baa' => 
    array (
      0 => '/data/html/ui/ui_custom/admin/ticketing/view.tpl',
      1 => 1782889606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a45c22db80319_86633600 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="panel panel-default">

    <div class="panel-heading">
        Detail Ticket
    </div>

    <div class="panel-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">No Ticket</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value->ticket_no;?>
</td>
            </tr>

            <tr>
                <th>Pelanggan</th>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                        <?php echo $_smarty_tpl->tpl_vars['customer']->value->fullname;?>

                    <?php } else { ?>
                        -
                    <?php }?>
                </td>
            </tr>

            <tr>
                <th>PPPoE</th>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['customer']->value) {?>
                        <?php echo $_smarty_tpl->tpl_vars['customer']->value->pppoe_username;?>

                    <?php } else { ?>
                        -
                    <?php }?>
                </td>
            </tr>

            <tr>
                <th>Subject</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value->subject;?>
</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value->description;?>
</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    <?php if ($_smarty_tpl->tpl_vars['ticket']->value->status == 'open') {?>
                        <span class="label label-danger">Open</span>

                    <?php } elseif ($_smarty_tpl->tpl_vars['ticket']->value->status == 'assigned') {?>
                        <span class="label label-warning">Assigned</span>

                    <?php } elseif ($_smarty_tpl->tpl_vars['ticket']->value->status == 'approved') {?>
                    <span class="label label-primary">
                    Approved
                    </span>
                    
                    <?php } elseif ($_smarty_tpl->tpl_vars['ticket']->value->status == 'closed') {?>
                    <span class="label label-success">
                    Closed
                    </span>

                    <?php } elseif ($_smarty_tpl->tpl_vars['ticket']->value->status == 'closed') {?>
                        <span class="label label-success">Closed</span>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['ticket']->value->status;?>

                    <?php }?>

                </td>
            </tr>
            
            <?php if ($_smarty_tpl->tpl_vars['installation']->value) {?>

            <tr>
                <th>Nama Calon Pelanggan</th>
                <td><?php echo $_smarty_tpl->tpl_vars['installation']->value->fullname;?>
</td>
            </tr>
            
            <tr>
                <th>NIK</th>
                <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['installation']->value->nik ?? null)===null||$tmp==='' ? '-' ?? null : $tmp);?>
</td>
            </tr>
            
            <tr>
                <th>No HP</th>
                <td><?php echo $_smarty_tpl->tpl_vars['installation']->value->phone;?>
</td>
            </tr>
            
            <tr>
                <th>Alamat</th>
                <td><?php echo $_smarty_tpl->tpl_vars['installation']->value->address;?>
</td>
            </tr>
            
            <tr>
                <th>Kecamatan</th>
                <td><?php echo $_smarty_tpl->tpl_vars['installation']->value->district;?>
</td>
            </tr>
            
            <tr>
                <th>Kota</th>
                <td><?php echo $_smarty_tpl->tpl_vars['installation']->value->city;?>
</td>
            </tr>
            
            <tr>
                <th>Provinsi</th>
                <td><?php echo $_smarty_tpl->tpl_vars['installation']->value->state;?>
</td>
            </tr>
            
            <tr>
                <th>Email</th>
                <td><?php echo $_smarty_tpl->tpl_vars['installation']->value->email;?>
</td>
            </tr>
            
            <tr>
                <th>Paket Langganan</th>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['package']->value) {?>
                        <?php echo $_smarty_tpl->tpl_vars['package']->value->name_plan;?>

                        (Rp <?php echo $_smarty_tpl->tpl_vars['package']->value->price;?>
)
                    <?php } else { ?>
                        -
                    <?php }?>
            <tr>
                <th>Kode Sales</th>
                <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['installation']->value->sales_code ?? null)===null||$tmp==='' ? '-' ?? null : $tmp);?>
</td>
            </tr>
                </td>
            </tr>
            
            <?php }?>

            <tr>
                <th>Teknisi</th>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['ticket']->value->technician_name) {?>
                        <?php echo $_smarty_tpl->tpl_vars['ticket']->value->technician_name;?>

                    <?php } else { ?>
                        Belum Ditugaskan
                    <?php }?>
                </td>
            </tr>

            <tr>
                <th>Assigned At</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value->assigned_at;?>
</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value->created_at;?>
</td>
            </tr>

	    <tr>
		 <th>Catatan Teknisi</th>
		 <td>
		     <?php echo (($tmp = $_smarty_tpl->tpl_vars['ticket']->value->technician_note ?? null)===null||$tmp==='' ? 'Belum ada catatan' ?? null : $tmp);?>

		 </td>
	    </tr>

        </table>

        <hr>

        <h4>Catatan Teknisi</h4>

    	<form method="post"
    	      action="<?php echo Text::url('ticketing/save-note');?>
">
    
    	     <input type="hidden"
    	           name="id"
    	           value="<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
">
    
    	    <div class="form-group">
    
    	        <textarea name="technician_note"
    	                  class="form-control"
    	                  rows="6"><?php echo $_smarty_tpl->tpl_vars['ticket']->value->technician_note;?>
</textarea>
    
    	    </div>
    
    	    <button type="submit"
    	            class="btn btn-success">
    
    	        Simpan Catatan
    
    	    </button>
    
    	</form>
    
    	<hr>
    	
    	<h4>Upload Foto Pekerjaan</h4>

        <form method="post"
              enctype="multipart/form-data"
              action="<?php echo Text::url('ticketing/upload-photo');?>
">
        
            <input type="hidden"
                   name="id"
                   value="<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
">
        
            <div class="row">
        
                <div class="col-md-6">
                    <label>Foto Sebelum</label>
        
                    <input type="file"
                           name="before_photo"
                           class="form-control">
                </div>
        
                <div class="col-md-6">
                    <label>Foto Sesudah</label>
        
                    <input type="file"
                           name="after_photo"
                           class="form-control">
                </div>
        
            </div>
        
            <br>
        
            <button type="submit"
                    class="btn btn-primary">
                Upload Foto
            </button>
        
        </form>
        
        <hr>

        <h4>Assign Teknisi</h4>
        
        <?php if ($_smarty_tpl->tpl_vars['ticket']->value->before_photo || $_smarty_tpl->tpl_vars['ticket']->value->after_photo) {?>

        <hr>
        
        <div class="row">
        
            <?php if ($_smarty_tpl->tpl_vars['ticket']->value->before_photo) {?>
            <div class="col-md-6">
        
                <h4>Foto Sebelum</h4>
        
                <img src="/uploads/tickets/<?php echo $_smarty_tpl->tpl_vars['ticket']->value->before_photo;?>
"
                     class="img-responsive img-thumbnail">
        
            </div>
            <?php }?>
        
            <?php if ($_smarty_tpl->tpl_vars['ticket']->value->after_photo) {?>
            <div class="col-md-6">
        
                <h4>Foto Sesudah</h4>
        
                <img src="/uploads/tickets/<?php echo $_smarty_tpl->tpl_vars['ticket']->value->after_photo;?>
"
                     class="img-responsive img-thumbnail">
        </div>
        
        <?php }?>
        
        </div>

        <?php }?>

        <form method="post"
              action="<?php echo Text::url('ticketing/assign');?>
">

            <input type="hidden"
                   name="id"
                   value="<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
">

            <div class="form-group">

                <label>Pilih Teknisi</label>

                <select name="technician_id"
                        class="form-control">

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>

                        <option value="<?php echo $_smarty_tpl->tpl_vars['u']->value->id;?>
"
                        <?php if ($_smarty_tpl->tpl_vars['ticket']->value->technician_id == $_smarty_tpl->tpl_vars['u']->value->id) {?>selected<?php }?>>

                            <?php echo $_smarty_tpl->tpl_vars['u']->value->fullname;?>

                            (<?php echo $_smarty_tpl->tpl_vars['u']->value->user_type;?>
)

                        </option>

                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </select>

            </div>

            <?php if ($_smarty_tpl->tpl_vars['ticket']->value->status == 'open') {?>

            <button type="submit"
                    class="btn btn-warning">
                Assign Teknisi
            </button>
            
            <?php }?>
            
            </form>
            
            <br>
            
            <?php if ($_smarty_tpl->tpl_vars['ticket']->value->status == 'assigned') {?>

            <a href="<?php echo Text::url('ticketing/progress');?>
&id=<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
"
               class="btn btn-primary">
            
                Progres
            
            </a>
            
            <?php }?>
            
            <?php if ($_smarty_tpl->tpl_vars['ticket']->value->status == 'progress' && $_smarty_tpl->tpl_vars['ticket']->value->technician_note && $_smarty_tpl->tpl_vars['ticket']->value->before_photo && $_smarty_tpl->tpl_vars['ticket']->value->after_photo) {?>
            
            <a href="<?php echo Text::url('ticketing/close');?>
&id=<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
"
               class="btn btn-success">
            
                Close Ticket
            
            </a>
            
            <?php }?>
            
            <a href="<?php echo Text::url('ticketing/list');?>
"
               class="btn btn-default">
            
                Kembali
            
            </a>
    </div>
    
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
