<?php /* Smarty version 2.6.31, created on 2023-01-27 01:20:56
         compiled from page_admin_bans_protests_archiv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'page_admin_bans_protests_archiv.tpl', 189, false),)), $this); ?>
<?php if (! $this->_tpl_vars['permission_protests']): ?>
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
        <h2>Ban Protests Archive (<span id="protcountarchiv"><?php echo $this->_tpl_vars['protest_count_archiv']; ?>
</span>)</h2>
    </div>

    <div class="padding">
        <div class="margin-bottom">
            Click a player's nickname to view information about their ban.
        </div>

        <div class="pagination">
            <span><?php echo $this->_tpl_vars['aprotest_nav']; ?>
</span>
        </div>

        <div class="table table_box">
            <table>
                <thead>
                    <tr>
                        <th class="text:left">Nickname</th>
                        <th class="text:left">Steam ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = ($this->_tpl_vars['protest_list_archiv']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['protest']):
?>
                        <tr class="collapse">
                            <td>
                                <?php echo $this->_tpl_vars['protest']['name']; ?>

                            </td>
                            <td>
                                <?php if ($this->_tpl_vars['protest']['authid'] != ""): ?>
                                    <?php echo $this->_tpl_vars['protest']['authid']; ?>

                                <?php else: ?>
                                    <?php echo $this->_tpl_vars['protest']['ip']; ?>

                                <?php endif; ?>
                            </td>
                            <td class="flex flex-jc:center flex-ai:center">
                                <?php if ($this->_tpl_vars['permission_editban']): ?>
                                    <button class="button button-light margin-right:half"
                                        onclick="RemoveProtest('<?php echo $this->_tpl_vars['protest']['pid']; ?>
', '<?php if ($this->_tpl_vars['protest']['authid'] != ""): ?><?php echo $this->_tpl_vars['protest']['authid']; ?>
<?php else: ?><?php echo $this->_tpl_vars['protest']['ip']; ?>
<?php endif; ?>', '2');">
                                        Restore
                                    </button>

                                    <button class="button button-light margin-right:half"
                                        onclick="RemoveProtest('<?php echo $this->_tpl_vars['protest']['pid']; ?>
', '<?php if ($this->_tpl_vars['protest']['authid'] != ""): ?><?php echo $this->_tpl_vars['protest']['authid']; ?>
<?php else: ?><?php echo $this->_tpl_vars['protest']['ip']; ?>
<?php endif; ?>', '0');">
                                        Delete
                                    </button>
                                <?php endif; ?>

                                <a class="button button-primary"
                                    href="index.php?p=admin&c=bans&o=email&type=p&id=<?php echo $this->_tpl_vars['protest']['pid']; ?>
">
                                    Contact
                                </a>
                            </td>
                        </tr>

                        <tr class="table_hide">
                            <td colspan="3">
                                <div class="collapse_content">
                                    <div class="padding flex flex-jc:start">
                                        <ul class="ban_action">
                                            <li class="button button-success">
                                                <?php echo $this->_tpl_vars['protest']['protaddcomment']; ?>

                                            </li>
                                        </ul>

                                        <ul class="ban_list_detal">
                                            <li>
                                                <span>Player</span>
                                                <span>
                                                    <a href="./index.php?p=banlist&advSearch=<?php echo $this->_tpl_vars['protest']['authid']; ?>
&advType=steamid"
                                                        title="Show ban">
                                                        <?php echo $this->_tpl_vars['protest']['name']; ?>

                                                    </a>
                                                </span>
                                            </li>

                                            <li>
                                                <span>Steam ID</span>
                                                <?php if ($this->_tpl_vars['protest']['authid'] == ""): ?>
                                                    <span class="text:italic">No steamid present</span>
                                                <?php else: ?>
                                                    <span><?php echo $this->_tpl_vars['protest']['authid']; ?>
</span>
                                                <?php endif; ?>
                                            </li>

                                            <li>
                                                <span>IP address</span>
                                                <?php if ($this->_tpl_vars['protest']['ip'] == 'none' || $this->_tpl_vars['protest']['ip'] == ''): ?>
                                                    <span class="text:italic">No IP address present</span>
                                                <?php else: ?>
                                                    <span><?php echo $this->_tpl_vars['protest']['ip']; ?>
</span>
                                                <?php endif; ?>
                                            </li>

                                            <li>
                                                <span>Invoked on</span>
                                                <span><?php echo $this->_tpl_vars['protest']['date']; ?>
</span>
                                            </li>

                                            <li>
                                                <span>End Date</span>
                                                <?php if ($this->_tpl_vars['protest']['ends'] == 'never'): ?>
                                                    <span class="text:italic">Not applicable.</span>
                                                <?php else: ?>
                                                    <span><?php echo $this->_tpl_vars['protest']['ends']; ?>
</span>
                                                <?php endif; ?>
                                            </li>

                                            <li>
                                                <span>Reason</span>
                                                <span><?php echo $this->_tpl_vars['protest']['ban_reason']; ?>
</span>
                                            </li>

                                            <li>
                                                <span>Banned by Admin</span>
                                                <span><?php echo $this->_tpl_vars['protest']['admin']; ?>
</span>
                                            </li>

                                            <li>
                                                <span>Banned from</span>
                                                <span><?php echo $this->_tpl_vars['protest']['server']; ?>
</span>
                                            </li>

                                            <li>
                                                <span>Archived by</span>
                                                <span>
                                                    <?php if (! empty ( $this->_tpl_vars['protest']['archivedby'] )): ?>
                                                        <span><?php echo $this->_tpl_vars['protest']['archivedby']; ?>
</span>
                                                    <?php else: ?>
                                                        <span class="text:italic">Admin deleted</span>
                                                    <?php endif; ?>
                                                </span>
                                            </li>

                                            <li>
                                                <span>Protester IP</span>
                                                <span><?php echo $this->_tpl_vars['protest']['pip']; ?>
</span>
                                            </li>

                                            <li>
                                                <span>Protested on</span>
                                                <span><?php echo $this->_tpl_vars['protest']['datesubmitted']; ?>
</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="ban_list_comments margin-bottom">
                                        <div class="layout_box_title">
                                            <h2>Protest message</h2>
                                        </div>

                                        <div class="layout_box-child padding margin">
                                            <div class="ban_list_comments_header">
                                                <span class="text:bold"><?php echo $this->_tpl_vars['protest']['name']; ?>
</span>
                                            </div>

                                            <div class="margin-top flex flex-fd:column">
                                                <?php echo $this->_tpl_vars['protest']['reason']; ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="ban_list_comments">
                                        <div class="layout_box_title">
                                            <h2>Comments</h2>
                                        </div>

                                        <?php if ($this->_tpl_vars['protest']['commentdata'] != 'None'): ?>
                                            <ul>
                                                <?php $_from = $this->_tpl_vars['protest']['commentdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['commenta']):
?>
                                                    <li>
                                                        <div class="layout_box-child padding">
                                                            <div class="ban_list_comments_header">
                                                                <?php if (! empty ( $this->_tpl_vars['commenta']['comname'] )): ?>
                                                                    <span class="text:bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['commenta']['comname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                                                                <?php else: ?>
                                                                    <span class="text:italic">Admin deleted</span>
                                                                <?php endif; ?>
                                                                <span><?php echo $this->_tpl_vars['commenta']['added']; ?>
</span>
                                                                <?php if ($this->_tpl_vars['commenta']['editcomlink'] != ""): ?>
                                                                    <?php echo $this->_tpl_vars['commenta']['editcomlink']; ?>
 <?php echo $this->_tpl_vars['commenta']['delcomlink']; ?>

                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="margin-top flex flex-fd:column">
                                                                <?php echo $this->_tpl_vars['commenta']['commenttxt']; ?>


                                                                <?php if (! empty ( $this->_tpl_vars['commenta']['edittime'] )): ?>
                                                                    <span class="margin-top:half text:italic">
                                                                        <i class="fas fa-pencil-alt"></i> Last edit
                                                                        <?php echo $this->_tpl_vars['commenta']['edittime']; ?>
 by <?php echo $this->_tpl_vars['commenta']['editname']; ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </ul>
                                        <?php else: ?>
                                            <div class="padding">
                                                <?php echo $this->_tpl_vars['protest']['commentdata']; ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>
        <script>
            document.querySelectorAll('.button').forEach(e => e.addEventListener('click', el => el.stopPropagation()));
        </script>
    </div>
<?php endif; ?>