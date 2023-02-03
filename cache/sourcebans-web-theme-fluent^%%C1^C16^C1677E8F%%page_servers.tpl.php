<?php /* Smarty version 2.6.31, created on 2023-02-03 06:56:09
         compiled from page_servers.tpl */ ?>
<div class="layout_box">
    <div class="table padding">
        <div class="table_box">
            <table>
                <thead>
                    <tr>
                        <th>MOD</th>
                        <th>OS</th>
                        <th>VAC</th>
                        <th class="text:left">Hostname</th>
                        <th class="text:left">IP adress</th>
                        <th>Players</th>
                        <th>Map</th>
                        <th class="responsive_show:desktop">Connect</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['server_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['server']):
?>
                        <tr id="server_<?php echo $this->_tpl_vars['server']['sid']; ?>
" <?php if ($this->_tpl_vars['IN_SERVERS_PAGE']): ?>class="collapse" <?php endif; ?>>
                            <td class="text:center">
                                <img src="images/games/<?php echo $this->_tpl_vars['server']['icon']; ?>
" alt="<?php echo $this->_tpl_vars['server']['icon']; ?>
" />
                            </td>
                            <td id="os_<?php echo $this->_tpl_vars['server']['sid']; ?>
" class="text:center"></td>
                            <td id="vac_<?php echo $this->_tpl_vars['server']['sid']; ?>
" class="text:center"></td>
                            <td id="host_<?php echo $this->_tpl_vars['server']['sid']; ?>
"><i>Querying Server Data...</i></td>
                            <td><?php echo $this->_tpl_vars['server']['ip']; ?>
:<?php echo $this->_tpl_vars['server']['port']; ?>
</td>
                            <td id="players_<?php echo $this->_tpl_vars['server']['sid']; ?>
" class="text:center">N/A</td>
                            <td id="map_<?php echo $this->_tpl_vars['server']['sid']; ?>
" class="text:center">N/A</td>
                            <td class="text:center responsive_show:desktop">
                                <a class="button button-success" href="steam://connect/<?php echo $this->_tpl_vars['server']['ip']; ?>
:<?php echo $this->_tpl_vars['server']['port']; ?>
"><i
                                        class="fa fa-sign-in"></i> Connect</a>
                            </td>
                        </tr>
                        <?php if ($this->_tpl_vars['IN_SERVERS_PAGE']): ?>
                            <tr id="server_<?php echo $this->_tpl_vars['server']['sid']; ?>
:desc" class="table_hide">
                                <td colspan="8">
                                    <div class="collapse_content" id="sinfo_<?php echo $this->_tpl_vars['server']['sid']; ?>
">
                                        <table id="playerlist_<?php echo $this->_tpl_vars['server']['sid']; ?>
" class="table" name="playerlist_<?php echo $this->_tpl_vars['server']['sid']; ?>
">
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if ($this->_tpl_vars['IN_SERVERS_PAGE']): ?>
    <script type="text/javascript" src="themes/<?php echo $this->_tpl_vars['theme']; ?>
/scripts/collapse.js"></script>
    <script>
        document.querySelectorAll('.button').forEach(e => e.addEventListener('click', el => el.stopPropagation()));
    </script>
<?php endif; ?>