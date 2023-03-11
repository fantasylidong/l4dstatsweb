<?php /* Smarty version 2.6.31, created on 2023-02-10 11:34:42
         compiled from page_admin_groups_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sb_button', 'page_admin_groups_add.tpl', 55, false),)), $this); ?>
<?php if (! $this->_tpl_vars['permission_addgroup']): ?>
    <section class="error padding">
        <i class="fas fa-exclamation-circle"></i>
        <div class="error_title">Oops, there's a problem (╯°□°）╯︵ ┻━┻</div>

        <div class="error_content">
            Access Denied!
        </div>

        <div class="error_code">
            Error code: <span class="text:bold">403 Forbidden</span>
        </div>
    </section>
<?php else: ?>
    <div class="admin_tab_content_title">
        <h2>New Group</h2>
    </div>

    <div class="padding">
        <div class="margin-bottom:half">
            <label for="groupname" class="form-label form-label:bottom">
                Group Name
            </label>

            <input type="text" TABINDEX=1 class="form-input form-full" id="groupname" name="groupname" />

            <div class="form-desc">
                Type the name of the new group you want to create.
            </div>
            <div id="name.msg" class="message message:error margin-top:half" style="display: none;"></div>
        </div>

        <div class="margin-bottom:half">
            <label for="grouptype" class="form-label form-label:bottom">
                Group Type
            </label>

            <select onchange="UpdateGroupPermissionCheckBoxes()" TABINDEX=2 class="form-select form-full" name="grouptype"
                id="grouptype">
                <option value="0">Please Select...</option>
                <option value="1">Web Admin Group</option>
                <option value="2">Server Admin Group</option>
                <option value="3">Server Group</option>
            </select>

            <div class="form-desc">
                This defines the type of group you are about to create. This helps identify and catagorize the groups list.
            </div>
            <div id="type.msg" class="message message:info margin-top:half" style="display: none;"></div>

            <div class="test" colspan="2" id="perms" valign="top" style="height:5px;overflow:hidden;"></div>
        </div>

        <div class="flex flex-ai:center flex-jc:space-between margin-top">
            <?php echo smarty_function_sb_button(array('text' => 'Save Changes','onclick' => "ProcessGroup();",'class' => "button button-success",'id' => 'agroup','submit' => false), $this);?>

            <?php echo smarty_function_sb_button(array('text' => 'Back','onclick' => "history.go(-1)",'class' => "button button-light",'id' => 'back','submit' => false), $this);?>

        </div>
    </div>
<?php endif; ?>