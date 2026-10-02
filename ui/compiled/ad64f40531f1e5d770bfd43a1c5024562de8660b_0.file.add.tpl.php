<?php
/* Smarty version 4.5.3, created on 2026-07-02 08:21:49
  from '/data/html/ui/ui_custom/admin/ticketing/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a45bd2dba75d1_90124950',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad64f40531f1e5d770bfd43a1c5024562de8660b' => 
    array (
      0 => '/data/html/ui/ui_custom/admin/ticketing/add.tpl',
      1 => 1782889117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a45bd2dba75d1_90124950 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="panel panel-default">

    <div class="panel-heading">
        Tambah Ticket
    </div>

    <div class="panel-body">

        <form method="post"
              action="<?php echo Text::url('ticketing/add-post');?>
">

            <div class="form-group">

                <label>Jenis Ticket</label>

                <select name="type"
                        id="ticket_type"
                        class="form-control">

                    <option value="">
                        -- Pilih Jenis Ticket --
                    </option>

                    <option value="trouble">
                        Gangguan
                    </option>

                    <option value="installation">
                        Pemasangan Baru
                    </option>

                </select>

            </div>

            <div id="trouble_form" style="display:none;">

                <hr>

                <div class="form-group">

                    <label>Pelanggan</label>

                    <select name="customer_id"
                            class="form-control">

                        <option value="">
                            -- Pilih Pelanggan --
                        </option>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customers']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>

                        <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['c']->value->fullname;?>
 | <?php echo $_smarty_tpl->tpl_vars['c']->value->pppoe_username;?>

                        </option>

                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </select>

                </div>

            </div>

            <div id="installation_form" style="display:none;">

                <hr>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text"
                           name="fullname"
                           class="form-control">
                </div>
                
                <div class="form-group">
                    <label>NIK</label>
                
                    <input type="text"
                           name="nik"
                           class="form-control"
                           maxlength="16"
                           placeholder="Masukkan NIK 16 digit">
                
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text"
                           name="phone"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address"
                              class="form-control"
                              rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Kota</label>
                    <input type="text"
                           name="city"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text"
                           name="district"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Provinsi</label>
                    <input type="text"
                           name="state"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="text"
                           name="zip"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control">
                </div>
                <div class="form-group">
                
                    <label>Kode Sales</label>
                
                    <input type="text"
                           name="sales_code"
                           class="form-control"
                           placeholder="Contoh : SAKUNTUL">
                
                </div>
                
                <div class="form-group">
                    <label>Paket Langganan</label>
                
                    <select class="form-control" name="package_id">
                
                        <option value="">-- Pilih Paket --</option>
                
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['plan']->value['id'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['plan']->value['name_plan'];?>
 - Rp <?php echo $_smarty_tpl->tpl_vars['plan']->value['price'];?>

                            </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                
                    </select>
                </div>

            </div>

            <div id="common_form" style="display:none;">

                <hr>

                <div class="form-group">

                    <label>Subject</label>

                    <input type="text"
                           name="subject"
                           class="form-control">

                </div>

                <div class="form-group">

                    <label>Deskripsi</label>

                    <textarea name="description"
                              class="form-control"
                              rows="5"></textarea>

                </div>

                <button class="btn btn-primary">

                    Simpan Ticket

                </button>

            </div>

        </form>

    </div>

</div>

<?php echo '<script'; ?>
>

document.addEventListener(
    'DOMContentLoaded',
    function() {

        var type =
            document.getElementById(
                'ticket_type'
            );

        type.addEventListener(
            'change',
            function() {

                document.getElementById(
                    'trouble_form'
                ).style.display = 'none';

                document.getElementById(
                    'installation_form'
                ).style.display = 'none';

                document.getElementById(
                    'common_form'
                ).style.display = 'none';

                if(this.value == 'trouble') {

                    document.getElementById(
                        'trouble_form'
                    ).style.display = 'block';

                    document.getElementById(
                        'common_form'
                    ).style.display = 'block';

                }

                if(this.value == 'installation') {

                    document.getElementById(
                        'installation_form'
                    ).style.display = 'block';

                    document.getElementById(
                        'common_form'
                    ).style.display = 'block';

                }

            }
        );

    }
);

<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
