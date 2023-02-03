<?php /* Smarty version 2.6.31, created on 2023-01-24 12:19:11
         compiled from page_admin_servers_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sb_button', 'page_admin_servers_add.tpl', 96, false),)), $this); ?>
<div class="layout_box flex:11 admin_tab_content tabcontent" id="Add new server">
    <?php if (! $this->_tpl_vars['permission_addserver']): ?>
        Access Denied
    <?php else: ?>
        <div class="admin_tab_content_title">
            <h2>Server Details</h2>
        </div>

        <div class="padding">
            <div class="margin-bottom">
                For more information or help regarding a certain subject move your mouse over the question mark.
            </div>

            <input type="hidden" name="insert_type" value="add">
            <div class="margin-bottom:half">
                <label for="address" class="form-label form-label:bottom">
                    Server IP/Domain
                </label>
                <input type="text" TABINDEX=1 class="form-input form-full" id="address" name="address" value="<?php echo $this->_tpl_vars['ip']; ?>
" />
                <div id="address.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <div class="margin-bottom:half">
                <label for="port" class="form-label form-label:bottom">
                    Server Port
                </label>
                <input type="text" TABINDEX=2 class="form-input form-full" id="port" name="port"
                    value="<?php if ($this->_tpl_vars['port']): ?><?php echo $this->_tpl_vars['port']; ?>
<?php else: ?><?php echo 27015; ?>
<?php endif; ?>" />
                <div id="port.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <div class="margin-bottom:half">
                <label for="rcon" class="form-label form-label:bottom">
                    RCON Password
                </label>
                <input type="password" TABINDEX=3 class="form-input form-full" id="rcon" name="rcon" value="<?php echo $this->_tpl_vars['rcon']; ?>
" />
                <div id="rcon.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <div class="margin-bottom:half">
                <label for="rcon2" class="form-label form-label:bottom">
                    RCON Password (Confirm)
                </label>
                <input type="password" TABINDEX=4 class="form-input form-full" id="rcon2" name="rcon2" value="<?php echo $this->_tpl_vars['rcon']; ?>
" />
                <div id="rcon2.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <div class="margin-bottom:half">
                <label for="mod" class="form-label form-label:bottom">
                    Server MOD
                </label>

                <select name="mod" TABINDEX=5 onchange="" id="mod" class="form-select form-full">
                    <?php if (! $this->_tpl_vars['edit_server']): ?>
                        <option value="-2">Please Select...</option>
                    <?php endif; ?>
                    <?php $_from = ($this->_tpl_vars['modlist']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mod']):
?>
                        <option value='<?php echo $this->_tpl_vars['mod']['mid']; ?>
'><?php echo $this->_tpl_vars['mod']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>

                <div id="mod.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <div class="margin-bottom:half">
                <label for="enabled" class="form-label form-label:bottom">
                    Enabled
                </label>
                <input type="checkbox" id="enabled" class="form-check" name="enabled" checked="checked" />
                <div id="enabled.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <?php if ($this->_tpl_vars['grouplist']): ?>
                <div class="margin-bottom:half">
                    <label class="form-label form-label:bottom">
                        Server Groups
                    </label>

                    <ul class="form_ul margin-top">
                        <?php $_from = ($this->_tpl_vars['grouplist']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
                            <li class="margin-bottom:half">
                                <input type="checkbox" class="form-check" value="<?php echo $this->_tpl_vars['group']['gid']; ?>
" id="g_<?php echo $this->_tpl_vars['group']['gid']; ?>
"
                                    name="groups[]" />
                                <label for="g_<?php echo $this->_tpl_vars['group']['gid']; ?>
" class="form-label form-label:right">
                                    <?php echo $this->_tpl_vars['group']['name']; ?>

                                </label>
                            </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <div id="nsgroup" class="message message:error margin-top:half" style="display: none;"></div>
                </div>
            <?php endif; ?>

            <div class="flex flex-ai:center flex-jc:space-between margin-top">
                <?php if ($this->_tpl_vars['edit_server']): ?>
                    <?php echo smarty_function_sb_button(array('text' => $this->_tpl_vars['submit_text'],'onclick' => "process_edit_server();",'class' => "button button-success",'id' => 'aserver','submit' => false), $this);?>

                <?php else: ?>
                    <?php echo smarty_function_sb_button(array('text' => $this->_tpl_vars['submit_text'],'onclick' => "process_add_server();",'class' => "button button-success",'id' => 'aserver','submit' => false), $this);?>

                <?php endif; ?>

                <?php echo smarty_function_sb_button(array('text' => 'Back','onclick' => "history.go(-1)",'class' => "button button-light",'id' => 'back','submit' => false), $this);?>

            </div>
        </div>
    <?php endif; ?>
</div>
</div>