<?php /* Smarty version 2.6.31, created on 2023-01-27 01:20:56
         compiled from page_admin_bans_submissions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'page_admin_bans_submissions.tpl', 59, false),array('modifier', 'escape', 'page_admin_bans_submissions.tpl', 180, false),)), $this); ?>
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
        <h2>Ban Submissions (<span id="subcount"><?php echo $this->_tpl_vars['submission_count']; ?>
</span>)</h2>
    </div>

    <div class="padding">
        <div class="margin-bottom">
            Click a player's nickname to view information about their submission.
        </div>

        <div class="pagination">
            <span><?php echo $this->_tpl_vars['submission_nav']; ?>
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
                    <?php $_from = ($this->_tpl_vars['submission_list']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
                        <tr class="collapse" <?php if ($this->_tpl_vars['sub']['hostname'] == ""): ?>
                            onclick="xajax_ServerHostPlayers('<?php echo $this->_tpl_vars['sub']['server']; ?>
', 'id', 'sub<?php echo $this->_tpl_vars['sub']['subid']; ?>
');" <?php endif; ?>>
                            <td>
                                <?php echo $this->_tpl_vars['sub']['name']; ?>

                            </td>
                            <td>
                                <?php if ($this->_tpl_vars['sub']['SteamId'] != ""): ?>
                                    <?php echo $this->_tpl_vars['sub']['SteamId']; ?>

                                <?php else: ?>
                                    <?php echo $this->_tpl_vars['sub']['sip']; ?>

                                <?php endif; ?>
                            </td>
                            <td class="flex flex-jc:center flex-ai:center">
                                <button class="button button-important margin-right:half"
                                    onclick="xajax_SetupBan(<?php echo $this->_tpl_vars['sub']['subid']; ?>
);return false;">
                                    Ban
                                </button>

                                <?php if ($this->_tpl_vars['permissions_editsub']): ?>
                                    <button class="button button-light"
                                        onclick="RemoveSubmission(<?php echo $this->_tpl_vars['sub']['subid']; ?>
, '<?php echo ((is_array($_tmp=$this->_tpl_vars['sub']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
', '1');return false;">
                                        Archive
                                    </button>
                                <?php endif; ?>

                                <a href="index.php?p=admin&c=bans&o=email&type=s&id=<?php echo $this->_tpl_vars['sub']['subid']; ?>
"
                                    class="button button-primary margin-right:half">
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
                                                <?php echo $this->_tpl_vars['sub']['subaddcomment']; ?>

                                            </li>
                                            <li class="button button-light">
                                                <?php echo $this->_tpl_vars['sub']['demo']; ?>

                                            </li>
                                        </ul>

                                        <ul class="ban_list_detal">
                                            <li>
                                                <span>Player</span>
                                                <span>
                                                    <?php echo $this->_tpl_vars['sub']['name']; ?>

                                                </span>
                                            </li>

                                            <li>
                                                <span>Submitted</span>
                                                <span>
                                                    <?php echo $this->_tpl_vars['sub']['submitted']; ?>

                                                </span>
                                            </li>

                                            <li>
                                                <span>Steam ID</span>
                                                <?php if ($this->_tpl_vars['sub']['SteamId'] == ""): ?>
                                                    <span class="text:italic">No steamid present</span>
                                                <?php else: ?>
                                                    <span><?php echo $this->_tpl_vars['sub']['SteamId']; ?>
</span>
                                                <?php endif; ?>
                                            </li>

                                            <li>
                                                <span>IP address</span>
                                                <?php if ($this->_tpl_vars['sub']['sip'] == ""): ?>
                                                    <span class="text:italic">No IP address present</span>
                                                <?php else: ?>
                                                    <span><?php echo $this->_tpl_vars['sub']['sip']; ?>
</span>
                                                <?php endif; ?>
                                            </li>

                                            <li>
                                                <span>Server</span>
                                                <span><?php echo $this->_tpl_vars['sub']['admin']; ?>
</span>

                                                <div id="sub<?php echo $this->_tpl_vars['sub']['subid']; ?>
">
                                                    <?php if ($this->_tpl_vars['sub']['hostname'] == ""): ?>
                                                        <span class="text:italic">Retrieving Hostname</span>
                                                    <?php else: ?>
                                                        <span><?php echo $this->_tpl_vars['sub']['hostname']; ?>
</span>
                                                    <?php endif; ?>
                                                </div>
                                            </li>

                                            <li>
                                                <span>MOD</span>
                                                <span><?php echo $this->_tpl_vars['sub']['mod']; ?>
</span>
                                            </li>

                                            <li>
                                                <span>Submitter Name</span>
                                                <?php if ($this->_tpl_vars['sub']['subname'] == ""): ?>
                                                    <span class="text:italic">No name present</span>
                                                <?php else: ?>
                                                    <span><?php echo $this->_tpl_vars['sub']['subname']; ?>
</span>
                                                <?php endif; ?>
                                            </li>

                                            <li>
                                                <span>Submitter IP</span>
                                                <span><?php echo $this->_tpl_vars['sub']['ip']; ?>
</span>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="ban_list_comments margin-bottom">
                                        <div class="layout_box_title">
                                            <h2>Reason</h2>
                                        </div>

                                        <div class="layout_box-child padding margin">
                                            <div class="ban_list_comments_header">
                                                <span class="text:bold"><?php echo $this->_tpl_vars['sub']['name']; ?>
</span>
                                            </div>

                                            <div class="margin-top flex flex-fd:column">
                                                <?php echo $this->_tpl_vars['sub']['reason']; ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="ban_list_comments">
                                        <div class="layout_box_title">
                                            <h2>Comments</h2>
                                        </div>

                                        <?php if ($this->_tpl_vars['sub']['commentdata'] != 'None'): ?>
                                            <ul>
                                                <?php $_from = $this->_tpl_vars['sub']['commentdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
                                                <?php echo $this->_tpl_vars['sub']['commentdata']; ?>

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