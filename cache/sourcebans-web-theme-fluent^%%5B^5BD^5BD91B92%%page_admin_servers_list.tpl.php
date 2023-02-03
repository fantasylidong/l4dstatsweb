<?php /* Smarty version 2.6.31, created on 2023-01-24 12:19:11
         compiled from page_admin_servers_list.tpl */ ?>
<div class="layout_box flex:11 admin_tab_content tabcontent" id="List servers" style="display: block;">
    <?php if (! $this->_tpl_vars['permission_list']): ?>
        Access Denied
    <?php else: ?>
        <div class="admin_tab_content_title">
            <h2>Servers (<span id="srvcount"><?php echo $this->_tpl_vars['server_count']; ?>
</span>)</h2>
        </div>

        <div class="padding">
            <div class="table table_box">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mod</th>
                            <th class="text:left">Hostname</th>
                            <th>Players</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = ($this->_tpl_vars['server_list']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['server']):
?>
                            <script>
                                xajax_ServerHostPlayers(<?php echo $this->_tpl_vars['server']['sid']; ?>
);
                            </script>

                            <tr id="sid_<?php echo $this->_tpl_vars['server']['sid']; ?>
" <?php if ($this->_tpl_vars['server']['enabled'] == 0): ?><?php endif; ?>>
                                <td class="text:center">
                                    <?php echo $this->_tpl_vars['server']['sid']; ?>

                                </td>
                                <td class="text:center">
                                    <img src="images/games/<?php echo $this->_tpl_vars['server']['icon']; ?>
" alt="<?php echo $this->_tpl_vars['server']['icon']; ?>
" />
                                </td>
                                <td id="host_<?php echo $this->_tpl_vars['server']['sid']; ?>
">
                                    <span class="text:italic">
                                        Querying Server Data...
                                    </span>
                                </td>
                                <td id="players_<?php echo $this->_tpl_vars['server']['sid']; ?>
" class="text:center">
                                    <span class="text:italic">
                                        N/A
                                    </span>
                                </td>
                                <td>
                                    <ul class="list-reset list-margin:right flex flex:ai:center flex-jc:center">
                                        <?php if ($this->_tpl_vars['server']['rcon_access']): ?>
                                            <li>
                                                <a class="button button-light"
                                                    href="index.php?p=admin&c=servers&o=rcon&id=<?php echo $this->_tpl_vars['server']['sid']; ?>
">
                                                    RCON
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <a class="button button-light"
                                                href="index.php?p=admin&c=servers&o=admincheck&id=<?php echo $this->_tpl_vars['server']['sid']; ?>
">
                                                Admins
                                            </a>
                                        </li>
                                        <?php if ($this->_tpl_vars['permission_editserver']): ?>
                                            <li>
                                                <a class="button button-light"
                                                    href="index.php?p=admin&c=servers&o=edit&id=<?php echo $this->_tpl_vars['server']['sid']; ?>
">
                                                    Edit
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['pemission_delserver']): ?>
                                            <li>
                                                <button class="button button-light"
                                                    onclick="RemoveServer(<?php echo $this->_tpl_vars['server']['sid']; ?>
, '<?php echo $this->_tpl_vars['server']['ip']; ?>
:<?php echo $this->_tpl_vars['server']['port']; ?>
');">
                                                    Delete
                                                </button>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    </tbody>
                </table>
            </div>

            <?php if ($this->_tpl_vars['permission_addserver']): ?>
                <div class="margin-top">
                    <button class="button button-light" id="upload"
                        onclick="childWindow=open('pages/admin.uploadmapimg.php','upload','resizable=yes,width=300,height=130');">
                        Upload Map Image
                    </button>
                    <div id="mapimg.msg" class="message message:error margin-top:half" style="display: none;"></div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>