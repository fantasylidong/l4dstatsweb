<?php /* Smarty version 2.6.31, created on 2023-02-10 11:34:42
         compiled from page_admin_groups_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlspecialchars', 'page_admin_groups_list.tpl', 223, false),)), $this); ?>
<?php if (! $this->_tpl_vars['permission_listgroups']): ?>
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
        <h2>Groups</h2>
    </div>

    <div class="padding">
        <div>
            Click on a group to view its permissions.
        </div>

        <h3>Web Admin Groups (<?php echo $this->_tpl_vars['web_group_count']; ?>
)</h3>

        <div class="table table_box">
            <table>
                <thead>
                    <tr>
                        <th class="text:left">Group Name</th>
                        <th class="text:left">Admins in group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = ($this->_tpl_vars['web_group_list']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['web_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['web_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['web_group']['iteration']++;
?>
                        <tr class="collapse">
                            <td style="width: 350px;">
                                <?php echo $this->_tpl_vars['group']['name']; ?>

                            </td>

                            <td>
                                <?php echo $this->_tpl_vars['web_admins'][($this->_foreach['web_group']['iteration']-1)]; ?>

                            </td>

                            <td class="flex flex-jc:center flex-ai:center">
                                <?php if ($this->_tpl_vars['permission_editgroup']): ?>
                                    <a class="button button-light margin-right:half"
                                        href="index.php?p=admin&c=groups&o=edit&type=web&id=<?php echo $this->_tpl_vars['group']['gid']; ?>
">
                                        Edit
                                    </a>
                                <?php endif; ?>

                                <?php if ($this->_tpl_vars['permission_deletegroup']): ?>
                                    <button class="button button-light"
                                        onclick="RemoveGroup(<?php echo $this->_tpl_vars['group']['gid']; ?>
, '<?php echo $this->_tpl_vars['group']['name']; ?>
', 'web');">
                                        Delete
                                    </button>
                                <?php endif; ?>
                            </td>
                        <tr class="table_hide">
                            <td colspan="8">
                                <div class="collapse_content">
                                    <div class="padding:half flex m:flex-fd:column">
                                        <div class="flex:11">
                                            <h4>Permissions</h4>

                                            <ul>
                                                <?php if ($this->_tpl_vars['group']['permissions']): ?>
                                                    <?php $_from = $this->_tpl_vars['group']['permissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['permission']):
?>
                                                        <li><?php echo $this->_tpl_vars['permission']; ?>
</li>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                <?php else: ?>
                                                    <li class="text:italic">None</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                        <div class="flex:11">
                                            <h4>Members</h4>

                                            <div class="table table_box">
                                                <table>
                                                    <tbody>
                                                        <?php $_from = $this->_tpl_vars['web_admins_list'][($this->_foreach['web_group']['iteration']-1)]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['web_admin']):
?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $this->_tpl_vars['web_admin']['user']; ?>

                                                                </td>
                                                                <?php if ($this->_tpl_vars['permission_editadmin']): ?>
                                                                    <td class="flex flex-jc:center flex-ai:center">
                                                                        <a class="button button-light margin-right:half"
                                                                            href="index.php?p=admin&c=admins&o=editgroup&id=<?php echo $this->_tpl_vars['web_admin']['aid']; ?>
"
                                                                            title="Edit Groups">
                                                                            Edit
                                                                        </a>

                                                                        <a class="button button-light"
                                                                            href="index.php?p=admin&c=admins&o=editgroup&id=<?php echo $this->_tpl_vars['web_admin']['aid']; ?>
&wg="
                                                                            title="Remove From Group">
                                                                            Remove
                                                                        </a>
                                                                    </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>

        <h3>Server Admin Groups (<?php echo $this->_tpl_vars['server_admin_group_count']; ?>
)</h3>

        <div class="table table_box">
            <table>
                <thead>
                    <tr>
                        <th class="text:left">Group Name</th>
                        <th class="text:left">Admins in group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = ($this->_tpl_vars['server_group_list']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['server_admin_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['server_admin_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['server_admin_group']['iteration']++;
?>
                        <tr class="collapse">
                            <td style="width: 350px;">
                                <?php echo $this->_tpl_vars['group']['name']; ?>

                            </td>

                            <td>
                                <?php echo $this->_tpl_vars['server_admins'][($this->_foreach['server_admin_group']['iteration']-1)]; ?>

                            </td>

                            <td class="flex flex-jc:center flex-ai:center">
                                <?php if ($this->_tpl_vars['permission_editgroup']): ?>
                                    <a class="button button-light margin-right:half"
                                        href="index.php?p=admin&c=groups&o=edit&type=srv&id=<?php echo $this->_tpl_vars['group']['id']; ?>
">
                                        Edit
                                    </a>
                                <?php endif; ?>

                                <?php if ($this->_tpl_vars['permission_deletegroup']): ?>
                                    <button class="button button-light" onclick="RemoveGroup(<?php echo $this->_tpl_vars['group']['id']; ?>
, '<?php echo $this->_tpl_vars['group']['name']; ?>
', 'srv');">
                                        Delete
                                    </button>
                                <?php endif; ?>
                            </td>
                        <tr class="table_hide">
                            <td colspan="8">
                                <div class="collapse_content">
                                    <div class="padding:half flex m:flex-fd:column">
                                        <div class="flex:11">
                                            <h4>Permissions</h4>

                                            <ul>
                                                <?php if ($this->_tpl_vars['group']['permissions']): ?>
                                                    <?php $_from = $this->_tpl_vars['group']['permissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['permission']):
?>
                                                        <li><?php echo $this->_tpl_vars['permission']; ?>
</li>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                <?php else: ?>
                                                    <li class="text:italic">None</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                        <div class="flex:11">
                                            <h4>Members</h4>

                                            <div class="table table_box">
                                                <table>
                                                    <tbody>
                                                        <?php $_from = $this->_tpl_vars['server_admins_list'][($this->_foreach['server_admin_group']['iteration']-1)]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['server_admin']):
?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $this->_tpl_vars['server_admin']['user']; ?>

                                                                </td>
                                                                <?php if ($this->_tpl_vars['permission_editadmin']): ?>
                                                                    <td class="flex flex-jc:center flex-ai:center">
                                                                        <a class="button button-light margin-right:half"
                                                                            href="index.php?p=admin&c=admins&o=editgroup&id=<?php echo $this->_tpl_vars['server_admin']['aid']; ?>
"
                                                                            title="Edit Groups">
                                                                            Edit
                                                                        </a>

                                                                        <a class="button button-light"
                                                                            href="index.php?p=admin&c=admins&o=editgroup&id=<?php echo $this->_tpl_vars['server_admin']['aid']; ?>
&sg="
                                                                            title="Remove From Group">
                                                                            Remove
                                                                        </a>
                                                                    </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ($this->_tpl_vars['server_overrides_list'][($this->_foreach['server_admin_group']['iteration']-1)]): ?>
                                        <div class="table table_box padding:half">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="text:left">Type</th>
                                                        <th class="text:left">Name</th>
                                                        <th class="text:left">Access</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $_from = $this->_tpl_vars['server_overrides_list'][($this->_foreach['server_admin_group']['iteration']-1)]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['override']):
?>
                                                        <tr>
                                                            <td><?php echo $this->_tpl_vars['override']['type']; ?>
</td>
                                                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['override']['name'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : htmlspecialchars($_tmp)); ?>
</td>
                                                            <td><?php echo $this->_tpl_vars['override']['access']; ?>
</td>
                                                        </tr>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>

        <h3>Server Groups (<?php echo $this->_tpl_vars['server_group_count']; ?>
)</h3>

        <div class="table table_box">
            <table>
                <thead>
                    <tr>
                        <th class="text:left">Group Name</th>
                        <th class="text:left">Admins in group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = ($this->_tpl_vars['server_list']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['server_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['server_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['server_group']['iteration']++;
?>
                        <tr class="collapse">
                            <td style="width: 350px;">
                                <?php echo $this->_tpl_vars['group']['name']; ?>

                            </td>

                            <td>
                                <?php echo $this->_tpl_vars['server_counts'][($this->_foreach['server_group']['iteration']-1)]; ?>

                            </td>

                            <td class="flex flex-jc:center flex-ai:center">
                                <?php if ($this->_tpl_vars['permission_editgroup']): ?>
                                    <a class="button button-light margin-right:half"
                                        href="index.php?p=admin&c=groups&o=edit&type=server&id=<?php echo $this->_tpl_vars['group']['gid']; ?>
">
                                        Edit
                                    </a>
                                <?php endif; ?>

                                <?php if ($this->_tpl_vars['permission_deletegroup']): ?>
                                    <button class="button button-light"
                                        onclick="RemoveGroup(<?php echo $this->_tpl_vars['group']['gid']; ?>
, '<?php echo $this->_tpl_vars['group']['name']; ?>
', 'server');">
                                        Delete
                                    </button>
                                <?php endif; ?>
                            </td>
                        <tr class="table_hide">
                            <td colspan="8">
                                <div class="collapse_content">
                                    <div class="padding">
                                        <h3>Servers in this group</h3>

                                        <ul>
                                            <li id="servers_<?php echo $this->_tpl_vars['group']['gid']; ?>
">Please Wait!</li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>

        <script type="text/javascript" src="themes/<?php echo $this->_tpl_vars['theme']; ?>
/scripts/collapse.js"></script>
        <script>
            document.querySelectorAll('.button').forEach(e => e.addEventListener('click', el => el.stopPropagation()));
        </script>
    </div>
<?php endif; ?>