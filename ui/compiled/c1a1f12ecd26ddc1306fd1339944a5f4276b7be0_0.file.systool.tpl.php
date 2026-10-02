<?php
/* Smarty version 4.5.3, created on 2026-07-01 19:02:34
  from '/data/html/system/plugin/ui/systool.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_6a4501da827972_05465460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1a1f12ecd26ddc1306fd1339944a5f4276b7be0' => 
    array (
      0 => '/data/html/system/plugin/ui/systool.tpl',
      1 => 1737056508,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_6a4501da827972_05465460 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>


/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #fff;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>




  
<button class="tablink" onclick=" window.open('/admin/phpmyadmin/','_blank', 'orange')">phpMyAdmin</button>
<button class="tablink" onclick=" window.open('/admin/fileman/','_blank', 'green')">Filemanager</button>
<button class="tablink" onclick="openPage('rst', this, 'red')">Restart</button>



<div id="rst" class="tabcontent">
<form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/systool" method="post">
<input type="hidden" name="restart" value="true">
<button type="submit" class="tablink" title="Restart container"
onclick="return confirm('Restart Server?')"><span
class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Restart Server</button>
</form>
</div>
<br>
<br>
<h1>Cron Editor</h1>
<form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/systool" method="POST">
    <textarea name="cron"  rows="4" cols="70"><?php echo $_smarty_tpl->tpl_vars['cront']->value;?>
</textarea>
	<br>
    <input type="submit" name="submit" value="Update Cron">
</form>


<?php echo '<script'; ?>
>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
