<?php /* Smarty version 2.6.31, created on 2023-02-03 06:56:09
         compiled from core/title.tpl */ ?>
<div id="dialog-placement" class="popup popup_block">
    <div class="layout_box">
        <div class="popup_title padding:half">
            <div id="dialog-title"></div>
        </div>

        <div class="padding:half">
            <div class="popup_icon margin-bottom:half">
                <i id="dialog-icon"></i>
            </div>

            <div id="dialog-content-text"></div>
        </div>

        <div class="popup_footer padding:half flex" id="dialog-control"></div>
    </div>
</div>
<div id="dialog-placement-background" class="popup popup_background" onclick="closeMsg('');"></div>

<div class="page_header">
    <h1><?php echo $this->_tpl_vars['title']; ?>
</h1>
</div>

<div class="breadcrumb">
    <?php $_from = $this->_tpl_vars['breadcrumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['crumb']):
?>
        <i class="fas fa-angle-right"></i> <a href="<?php echo $this->_tpl_vars['crumb']['url']; ?>
"><?php echo $this->_tpl_vars['crumb']['title']; ?>
</a>
    <?php endforeach; endif; unset($_from); ?>
</div>

<!-- <div id="content"> -->