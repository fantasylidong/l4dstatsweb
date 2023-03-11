<?php /* Smarty version 2.6.31, created on 2023-02-10 11:35:12
         compiled from page_admin_settings_themes.tpl */ ?>
<div class="admin_tab_content_title">
    <h2>Themes</h2>
</div>

<div class="padding">
    <div class="margin-bottom">
        <span class="text:bold">Selected Theme:</span> <span id="theme.name"><?php echo $this->_tpl_vars['theme_name']; ?>
</span>
    </div>

    <div class="flex m:flex-fd:column" id="current-theme-details">
        <div id="current-theme-screenshot" class="text:center">
            <?php echo $this->_tpl_vars['theme_screenshot']; ?>

        </div>

        <ul class="theme_list">
            <li>
                <h3>Theme Author:</h3>
                <span id="theme.auth"><?php echo $this->_tpl_vars['theme_author']; ?>
</span>
            </li>
            <li>
                <h3>Theme Version:</h3>
                <span id="theme.vers"><?php echo $this->_tpl_vars['theme_version']; ?>
</span>
            </li>
            <li>
                <h3>Theme Link:</h3>
                <span id="theme.link">
                    <a href="<?php echo $this->_tpl_vars['theme_link']; ?>
" target="_new"><?php echo $this->_tpl_vars['theme_link']; ?>
</a>
                </span>
            </li>
        </ul>
    </div>
</div>

<div class="admin_tab_content_title">
    <h2>Available Themes</h2>
</div>

<div class="padding">
    <div>
        Click a theme below to see details about it.
    </div>

    <ul class="margin-top">
        <?php $_from = $this->_tpl_vars['theme_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
            <li><a href="javascript:void(0);" onclick="javascript:xajax_SelTheme('<?php echo $this->_tpl_vars['theme']['dir']; ?>
');"><b><?php echo $this->_tpl_vars['theme']['name']; ?>
</b></a>
            </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>

    <div id="theme.apply"></div>
</div>