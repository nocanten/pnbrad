<?php
/* Smarty version 4.5.3, created on 2026-07-02 11:00:56
  from '/data/html/ui/ui/admin/settings/maintenance-mode.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a45e278d28d06_11862861',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b33a10c7a672ffdc0e3829cb9244969e901fbeff' => 
    array (
      0 => '/data/html/ui/ui/admin/settings/maintenance-mode.tpl',
      1 => 1781467124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a45e278d28d06_11862861 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    /* Checkbox container */
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    /* Hidden checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* Slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }
</style>

<form class="form-horizontal" method="post" autocomplete="off" role="form" action="">
    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-primary panel-hovered panel-stacked mb30">
                <div class="panel-heading"><?php echo Lang::T('Maintenance Mode');?>
</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Status:');?>
</label>
                        <div class="col-md-6">
                            <label class="switch">
                                <input type="checkbox" id="maintenance_mode" value="1" name="maintenance_mode" <?php if ($_smarty_tpl->tpl_vars['_c']->value['maintenance_mode'] == 1) {?>checked<?php }?>>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('Force Logout:');?>
</label>
                        <div class="col-md-6">
                            <label class="switch">
                                <input type="checkbox" id="maintenance_mode_logout" value="1"
                                    name="maintenance_mode_logout" <?php if ($_smarty_tpl->tpl_vars['_c']->value['maintenance_mode_logout'] == 1) {?>checked<?php }?>>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo Lang::T('End Date:');?>
</label>
                        <div class="col-md-6">
                            <input class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['maintenance_date'];?>
" type="date" id="start_date"
                                name="maintenance_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary waves-effect waves-light" name="save" value="save"
                                type="submit"><?php echo Lang::T('Save');?>
</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
