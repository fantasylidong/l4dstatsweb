<?php /* Smarty version 2.6.31, created on 2023-01-28 16:03:07
         compiled from core/admin_tabs.tpl */ ?>
<div class="flex m:flex-fd:column">
    <div class="admin_tab layout_box padding">
        <button id="admin_tab_mobile" class="button button-light admin_tab_mobile responsive_hide:desktop">
            Navigation
        </button>

        <div id="admin-page-menu" class="admin_tab_ul">
            <?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tab']):
?>
                <button onclick="openTab(this, '<?php echo $this->_tpl_vars['tab']['name']; ?>
');"><?php echo $this->_tpl_vars['tab']['name']; ?>
</button>
            <?php endforeach; endif; unset($_from); ?>
            <a href="index.php?p=admin">Back</a>
        </div>

        <script type="text/javascript" src="themes/<?php echo $this->_tpl_vars['theme']; ?>
/scripts/tab.js"></script>
    </div>