<?php /* Smarty version 2.6.31, created on 2023-02-10 11:35:12
         compiled from page_admin_settings_logs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'textformat', 'page_admin_settings_logs.tpl', 52, false),)), $this); ?>
<div class="admin_tab_content_title">
    <h2>System Log <?php echo $this->_tpl_vars['clear_logs']; ?>
</h2>
</div>

<div class="padding">
    <?php  require (TEMPLATES_PATH . "/admin.log.search.php"); ?>

    <div class="pagination">
        <span><?php echo $this->_tpl_vars['page_numbers']; ?>
</span>
    </div>

    <div class="table table_box">
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th class="text:left">Event</th>
                    <th class="text:left">Date/Time</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                <?php $_from = ($this->_tpl_vars['log_items']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
                    <tr class="collapse">
                        <td class="text:center"><?php echo $this->_tpl_vars['log']['type_img']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['log']['title']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['log']['date_str']; ?>
</td>
                        <td class="text:center"><?php echo $this->_tpl_vars['log']['user']; ?>
</td>
                    </tr>
                    <tr class="table_hide">
                        <td colspan="4">
                            <div class="collapse_content">
                                <div class="padding">
                                    <div class="margin-bottom">
                                        <?php echo $this->_tpl_vars['log']['message']; ?>

                                    </div>

                                    <div class="margin-bottom:half">
                                        <span class="text:bold">Parent Function:</span>

                                        <?php if ($this->_tpl_vars['log']['function']): ?>
                                            <span><?php echo $this->_tpl_vars['log']['function']; ?>
</span>
                                        <?php else: ?>
                                            <span class="text:italic">No information</span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="margin-bottom:half">
                                        <span class="text:bold">Query String:</span>

                                        <?php if ($this->_tpl_vars['log']['query']): ?>
                                            <span><?php $this->_tag_stack[] = array('textformat', array('wrap' => 62,'wrap_cut' => true)); $_block_repeat=true;smarty_block_textformat($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo $this->_tpl_vars['log']['query']; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_textformat($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                                        <?php else: ?>
                                            <span class="text:italic">No information</span>
                                        <?php endif; ?>
                                    </div>

                                    <div>
                                        <span class="text:bold">IP:</span>
                                        <span><?php echo $this->_tpl_vars['log']['host']; ?>
</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="themes/sourcebans-web-theme-fluent/scripts/collapse.js"></script>