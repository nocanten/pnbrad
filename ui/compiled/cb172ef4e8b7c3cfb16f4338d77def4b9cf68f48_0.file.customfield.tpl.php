<?php
/* Smarty version 4.5.3, created on 2026-07-02 11:00:53
  from '/data/html/ui/ui/admin/settings/customfield.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a45e2755584e9_46876205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb172ef4e8b7c3cfb16f4338d77def4b9cf68f48' => 
    array (
      0 => '/data/html/ui/ui/admin/settings/customfield.tpl',
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
function content_6a45e2755584e9_46876205 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form class="form-horizontal" method="post" role="form" action="<?php echo Text::url('');?>
customfield/save">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-success panel-hovered panel-stacked mb30">
                <div class="panel-heading"><?php echo Lang::T('New Field');?>
</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo Lang::T("Sequence");?>
</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="order[]" style="width: 100%" value="99" placeholder="99">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo Lang::T("Name");?>
</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name[]" style="width: 100%" placeholder="Your Salary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Placeholder</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="placeholder[]" style="width: 100%" placeholder="this is placeholder">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo Lang::T("Type");?>
</label>
                        <div class="col-md-8">
                            <select class="form-control" name="type[]" style="width: 100%">
                                <option value="text"><?php echo Lang::T("Text");?>
</option>
                                <option value="date"><?php echo Lang::T("Date");?>
</option>
                                <option value="time"><?php echo Lang::T("Time");?>
</option>
                                <option value="number"><?php echo Lang::T("Number");?>
</option>
                                <option value="option"><?php echo Lang::T("Option");?>
</option>
                                <!-- <option value="image"><?php echo Lang::T("Image");?>
</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo Lang::T("Option Values");?>
</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="value[]" style="width: 100%" placeholder="Male,Female">
                            <span class="help-block"><?php echo Lang::T("Use comma separated values ​​for this option.");?>
</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo Lang::T("Registration page");?>
</label>
                        <div class="col-md-8">
                            <select class="form-control" name="register[]" style="width: 100%">
                                <option value="1">show</option>
                                <option value="0">hide</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><?php echo Lang::T("Required");?>
</label>
                        <div class="col-md-8">
                            <select class="form-control" name="required[]" style="width: 100%">
                                <option value="1"><?php echo Lang::T("Yes");?>
</option>
                                <option value="0"><?php echo Lang::T("No");?>
</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-success btn-sm btn-block" type="submit"><?php echo Lang::T('Add');?>
</button>
                            <span class="help-block"><?php echo Lang::T("To delete, empty the name");?>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields']->value, 'field');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label"><?php echo Lang::T("Sequence");?>
</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="order[]" style="width: 100%" value="<?php echo $_smarty_tpl->tpl_vars['field']->value['order'];?>
" placeholder="99">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><?php echo Lang::T("Name");?>
</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name[]" style="width: 100%" placeholder="Your Salary" value="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Placeholder</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="placeholder[]" style="width: 100%" placeholder="this is placeholder" value="<?php echo $_smarty_tpl->tpl_vars['field']->value['placeholder'];?>
">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><?php echo Lang::T("Type");?>
</label>
                            <div class="col-md-8">
                                <select class="form-control" name="type[]" style="width: 100%">
                                    <option value="text" <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'text') {?>selected<?php }?>><?php echo Lang::T("Text");?>
</option>
                                    <option value="date" <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'date') {?>selected<?php }?>><?php echo Lang::T("Date");?>
</option>
                                    <option value="time" <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'time') {?>selected<?php }?>><?php echo Lang::T("Time");?>
</option>
                                    <option value="number" <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'number') {?>selected<?php }?>><?php echo Lang::T("Number");?>
</option>
                                    <option value="option" <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'option') {?>selected<?php }?>><?php echo Lang::T("Option");?>
</option>
                                    <!-- <option value="image" <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == 'image') {?>selected<?php }?>><?php echo Lang::T("Image");?>
</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><?php echo Lang::T("Option Values");?>
</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="value[]" style="width: 100%" placeholder="Male,Female" value="<?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>
">
                                <span class="help-block"><?php echo Lang::T("Use comma separated values for this option.");?>
</span>
                            </div>
                        </div>
                        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['field']->value['register'] == 1) {?>has-success<?php }?>">
                            <label class="col-md-4 control-label"><?php echo Lang::T("Registration page");?>
</label>
                            <div class="col-md-8">
                                <select class="form-control" name="register[]" style="width: 100%">
                                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['field']->value['register'] == 1) {?>selected<?php }?>>show</option>
                                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['field']->value['register'] != 1) {?>selected<?php }?>>hide</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['field']->value['required'] == 1) {?>has-error<?php }?>">
                            <label class="col-md-4 control-label"><?php echo Lang::T("Required");?>
</label>
                            <div class="col-md-8">
                                <select class="form-control" name="required[]" style="width: 100%">
                                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['field']->value['required'] == 1) {?>selected<?php }?>><?php echo Lang::T("Yes");?>
</option>
                                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['field']->value['required'] != 1) {?>selected<?php }?>><?php echo Lang::T("No");?>
</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <button class="btn btn-success btn-sm btn-block" type="submit"><?php echo Lang::T('Save');?>
</button>
        </div>
    </div>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
