<?php /* Smarty version 2.6.31, created on 2023-02-03 05:56:03
         compiled from page_bans.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlspecialchars', 'page_bans.tpl', 36, false),array('modifier', 'count', 'page_bans.tpl', 80, false),array('modifier', 'escape', 'page_bans.tpl', 88, false),array('modifier', 'stripslashes', 'page_bans.tpl', 88, false),)), $this); ?>
<?php if ($this->_tpl_vars['comment']): ?>
  <div class="flex flex-jc:center flex-ai:center">
    <div class="layout_box layout_box_medium">
      <div class="layout_box_title">
        <h2><?php echo $this->_tpl_vars['commenttype']; ?>
 Comment</h2>
      </div>

      <div class="padding">
        <textarea class="form-text" id="commenttext" name="commenttext"><?php echo $this->_tpl_vars['commenttext']; ?>
</textarea>

        <div id="commenttext.msg" class="message message:error" style="display:none;"></div>

        <div class="margin-top:half flex flex-jc:space-between flex-ai:center">
          <input type="hidden" name="bid" id="bid" value="<?php echo $this->_tpl_vars['comment']; ?>
">
          <input type="hidden" name="ctype" id="ctype" value="<?php echo $this->_tpl_vars['ctype']; ?>
">

          <?php if ($this->_tpl_vars['cid'] != ""): ?>
            <input type="hidden" name="cid" id="cid" value="<?php echo $this->_tpl_vars['cid']; ?>
">
          <?php else: ?>
            <input type="hidden" name="cid" id="cid" value="-1">
          <?php endif; ?>

          <input type="hidden" name="page" id="page" value="<?php echo $this->_tpl_vars['page']; ?>
">

		  <a class="button button-light" onclick="history.go(-1)">Cancel</a>
          <a class="button button-primary" onclick="ProcessComment();">Add</a>
        </div>
      </div>
    </div>
  </div>
<?php else: ?>
<?php  require (TEMPLATES_PATH . "/admin.bans.search.php"); ?>

<div class="layout_box margin-bottom padding:half flex flex-jc:space-between flex-ai:center m:flex-fd:column">
    <span>
        <a href="index.php?p=banlist&hideinactive=<?php if ($this->_tpl_vars['hidetext'] == 'Hide'): ?>true<?php else: ?>false<?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['searchlink'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : htmlspecialchars($_tmp)); ?>
" title="<?php echo $this->_tpl_vars['hidetext']; ?>
 inactive"><?php echo $this->_tpl_vars['hidetext']; ?>
 inactive</a> | <i>Total Bans: <?php echo $this->_tpl_vars['total_bans']; ?>
 </i>
    </span>
        <div class="pagination">
            <span><?php echo $this->_tpl_vars['ban_nav']; ?>
</span>
        </div>
</div>

<div class="layout_box">
    <div class="table padding">
        <div class="table_box">
            <table>
                <thead>
                    <tr>
                        <?php if ($this->_tpl_vars['view_bans']): ?>
                            <th class="text:left">
                                <input type="checkbox" title="Select All" name="tickswitch" id="tickswitch" onclick="TickSelectAll()" class="form-check" />
                            </th>
                        <?php endif; ?>
                        <th>MOD/Country</th>
                        <th class="text:left">Date</th>
                        <th class="text:left">Player</th>
                        <?php if (! $this->_tpl_vars['hideadminname']): ?>
                            <th class="text:left">Admin</th>
                        <?php endif; ?>
                        <th class="text:left">Length</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['ban_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['banlist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['banlist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ban']):
        $this->_foreach['banlist']['iteration']++;
?>
                        <tr class="collapse" <?php if ($this->_tpl_vars['ban']['server_id'] != 0): ?>
						onclick="xajax_ServerHostPlayers(<?php echo $this->_tpl_vars['ban']['server_id']; ?>
, 'id', 'host_<?php echo $this->_tpl_vars['ban']['ban_id']; ?>
');"
						<?php endif; ?>
						>
                            <?php if ($this->_tpl_vars['view_bans']): ?>
                                <td>
                                    <input type="checkbox" name="chkb_<?php echo ($this->_foreach['banlist']['iteration']-1); ?>
" id="chkb_<?php echo ($this->_foreach['banlist']['iteration']-1); ?>
" class="form-check" value="<?php echo $this->_tpl_vars['ban']['ban_id']; ?>
">
                                </td>
                            <?php endif; ?>
                            <td class="text:center"><?php echo $this->_tpl_vars['ban']['mod_icon']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['ban']['ban_date']; ?>
</td>
                                <?php if (empty ( $this->_tpl_vars['ban']['player'] )): ?>
                                    <td class="text:italic">No nickname present</td>
                                <?php else: ?>
                                    <td>
	    			  	                <?php if ($this->_tpl_vars['view_comments'] && $this->_tpl_vars['ban']['commentdata'] != 'None' && count($this->_tpl_vars['ban']['commentdata']) > 0): ?>
                                            <div style="float:right;">
                                                <?php echo count($this->_tpl_vars['ban']['commentdata']); ?>
 <i class="fas fa-clipboard-list fa-lg"></i>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['ban']['demo_available']): ?>
                                            <i class="fas fa-video fa-lg"></i>
                                        <?php endif; ?>
                                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ban']['player'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                    </td>
                                <?php endif; ?>
                                <?php if (! $this->_tpl_vars['hideadminname']): ?>
                                    <?php if (! empty ( $this->_tpl_vars['ban']['admin'] )): ?>
                                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['ban']['admin'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
                                    <?php else: ?>
                                        <td class="text:italic">Admin deleted</td>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <td class="<?php echo $this->_tpl_vars['ban']['class']; ?>
"><?php echo $this->_tpl_vars['ban']['banlength']; ?>
</td>
                        </tr>
                                <tr class="table_hide">
                                    <td colspan="8">
                                        <div class="collapse_content">
                                            <div class="padding flex flex-jc:start">
                                                <ul class="ban_action responsive_show:desktop">
                                                    <li class="button button-primary"><?php echo $this->_tpl_vars['ban']['demo_link']; ?>
</li>
                                                    <?php if ($this->_tpl_vars['view_bans']): ?>
                                                        <?php if ($this->_tpl_vars['ban']['unbanned'] && $this->_tpl_vars['ban']['reban_link'] != false): ?>
                                                            <li class="button button-important"><?php echo $this->_tpl_vars['ban']['reban_link']; ?>
</li>
                                                        <?php endif; ?>
                                                        <li class="button button-important"><?php echo $this->_tpl_vars['ban']['blockcomm_link']; ?>
</li>
                                                        <li class="button button-success"><?php echo $this->_tpl_vars['ban']['addcomment']; ?>
</li>
                                                        <?php if ($this->_tpl_vars['ban']['type'] == 0): ?>
                                                            <?php if ($this->_tpl_vars['groupban']): ?>
                                                                <li class="button button-important"><?php echo $this->_tpl_vars['ban']['groups_link']; ?>
</li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['friendsban']): ?>
                                                                <li class="button button-important"><?php echo $this->_tpl_vars['ban']['friend_ban_link']; ?>
</li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if (( $this->_tpl_vars['ban']['view_edit'] && ! $this->_tpl_vars['ban']['unbanned'] )): ?>
                                                            <li class="button button-light"><?php echo $this->_tpl_vars['ban']['edit_link']; ?>
</li>
                                                        <?php endif; ?>
                                                        <?php if (( $this->_tpl_vars['ban']['unbanned'] == false && $this->_tpl_vars['ban']['view_unban'] )): ?>
                                                            <li class="button button-light"><?php echo $this->_tpl_vars['ban']['unban_link']; ?>
</li>
                                                        <?php endif; ?>
                                                        <?php if ($this->_tpl_vars['ban']['view_delete']): ?>
                                                            <li class="button button-light"><?php echo $this->_tpl_vars['ban']['delete_link']; ?>
</li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </ul>
                                                <ul class="ban_list_detal">
                                                    <li>
                                                        <span><i class="fas fa-user"></i> Player</span>
                                                            <?php if (empty ( $this->_tpl_vars['ban']['player'] )): ?>
                                                            <span class="text:italic">No nickname present</span>
                                                        <?php else: ?>
                                                            <span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ban']['player'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li>
                                                        <span><i class="fab fa-steam-symbol"></i> Steam ID</span>
                                                        <?php if (empty ( $this->_tpl_vars['ban']['steamid'] )): ?>
                                                            <span class="text:italic">No Steam ID present</span>
                                                        <?php else: ?>
                                                            <span><?php echo $this->_tpl_vars['ban']['steamid']; ?>
</span>
                                                        <?php endif; ?>
                                                    </li>
                                                <li>
                                                        <span><i class="fab fa-steam-symbol"></i> Steam3 ID</span>
                                                        <?php if (empty ( $this->_tpl_vars['ban']['steamid'] )): ?>
                                                            <span class="text:italic">No Steam3 ID present</span>
                                                        <?php else: ?>
                                                            <span>
                                                                <a href="http://steamcommunity.com/profiles/<?php echo $this->_tpl_vars['ban']['steamid3']; ?>
" target="_blank" rel="noopener"><?php echo $this->_tpl_vars['ban']['steamid3']; ?>
</a>
                                                            </span>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php if ($this->_tpl_vars['ban']['type'] == 0): ?>
                                                        <li>
                                                            <span><i class="fab fa-steam-symbol"></i> Steam Community</span>
                                                            <?php if (empty ( $this->_tpl_vars['ban']['steamid'] )): ?>
                                                                <span class="text:italic">No Steam Community ID present</span>
                                                            <?php else: ?>
                                                                <span>
                                                                    <a href="http://steamcommunity.com/profiles/<?php echo $this->_tpl_vars['ban']['communityid']; ?>
" target="_blank" rel="noopener"><?php echo $this->_tpl_vars['ban']['communityid']; ?>
</a>
                                                                </span>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (! $this->_tpl_vars['hideplayerips']): ?>
                                                        <li>
                                                            <span><i class="fas fa-network-wired"></i> IP address</span>
                                                            <?php if ($this->_tpl_vars['ban']['ip'] == 'none'): ?>
                                                                <span class="text:italic">No IP address present</span>
                                                            <?php else: ?>
                                                                <span><?php echo $this->_tpl_vars['ban']['ip']; ?>
</span>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endif; ?>
                                                        <li>
                                                            <span><i class="fas fa-play"></i> Invoked on</span>
                                                            <span><?php echo $this->_tpl_vars['ban']['ban_date']; ?>
</span>
                                                        </li>
                                                        <li>
                                                            <span><i class="fas fa-hourglass-half"></i> Ban length</span>
                                                            <span><?php echo $this->_tpl_vars['ban']['banlength']; ?>
</span>
                                                        </li>
                                                    <?php if ($this->_tpl_vars['ban']['unbanned']): ?>
                                                        <li>
                                                            <span><i class="fas fa-user-shield"></i> Unban reason</span>
                                                            <?php if ($this->_tpl_vars['ban']['ureason'] == ""): ?>
                                                                <span class="text:italic">No reason present</span>
                                                            <?php else: ?>
                                                                <span><?php echo $this->_tpl_vars['ban']['ureason']; ?>
</span>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <span><i class="fas fa-user-shield"></i> Unbanned by Admin</span>
                                                            <?php if (empty ( $this->_tpl_vars['ban']['removedby'] )): ?>
                                                                <span class="text:italic">Admin deleted</span>
                                                            <?php else: ?>
                                                                <span><?php echo ((is_array($_tmp=$this->_tpl_vars['ban']['removedby'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <span><i class="fas fa-clock"></i> Expires on</span>
                                                        <?php if ($this->_tpl_vars['ban']['expires'] == 'never'): ?>
                                                            <span class="text:italic">Not applicable</span>
                                                        <?php else: ?>
                                                            <span><?php echo $this->_tpl_vars['ban']['expires']; ?>
</span>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li>
                                                        <span><i class="fas fa-question"></i> Reason</span>
                                                        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['ban']['reason'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                                                    </li>
                                                    <?php if (! $this->_tpl_vars['hideadminname']): ?>
                                                        <li>
                                                            <span><i class="fas fa-ban"></i> Banned by Admin</span>
                                                            <?php if (! empty ( $this->_tpl_vars['ban']['admin'] )): ?>
                                                                <span><?php echo ((is_array($_tmp=$this->_tpl_vars['ban']['admin'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                                                            <?php else: ?>
                                                                <span class="text:italic">Admin deleted</span>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <span><i class="fas fa-ban"></i> Total Bans</span>
                                                        <span><?php echo $this->_tpl_vars['ban']['prevoff_link']; ?>
</span>
                                                    </li>
			    		                            <li>
                                                        <span><i class="fas fa-server"></i> Banned from </span>
                                                            <span <?php if ($this->_tpl_vars['ban']['server_id'] != 0): ?> id="host_<?php echo $this->_tpl_vars['ban']['ban_id']; ?>
"<?php endif; ?>>
											<?php if ($this->_tpl_vars['ban']['server_id'] == 0): ?>
											Web Ban
											<?php else: ?>
											Please Wait...
											<?php endif; ?></span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fas fa-ban"></i> Blocked (<?php echo $this->_tpl_vars['ban']['blockcount']; ?>
)</span>
                                                        <?php if ($this->_tpl_vars['ban']['banlog'] == ""): ?>
                                                            <span class="text:italic">Never</span>
                                                        <?php else: ?>
                                                            <i><?php echo $this->_tpl_vars['ban']['banlog']; ?>
</i>
                                                        <?php endif; ?>
                                                    </li>
                                                </ul>
                                                <?php if ($this->_tpl_vars['view_comments']): ?>
                                                    <ul class="ban_list_comments margin-left responsive_show:desktop">
                                                        <div class="layout_box_title">
                                                            <h2>Comments</h2>
                                                        </div>
                                                        <?php if ($this->_tpl_vars['ban']['commentdata'] != 'None'): ?>
                                                            <ul>
                                                                <?php $_from = $this->_tpl_vars['ban']['commentdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
                                                                <?php echo $this->_tpl_vars['ban']['commentdata']; ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if ($this->_tpl_vars['general_unban'] || $this->_tpl_vars['can_delete'] || $this->_tpl_vars['can_export']): ?>
        <div class="layout_box padding:half margin-top flex flex-ai:center flex-jc:space-between m:flex-fd:column">
            <?php if ($this->_tpl_vars['general_unban'] || $this->_tpl_vars['can_delete']): ?>
                <div>
                    <button onclick="TickSelectAll();return false;" title="Select All" name="tickswitchlink" id="tickswitchlink" class="button button:line button-light margin-right:half">Select All</button>
                    <select name="bulk_action" id="bulk_action" onchange="BulkEdit(this,'<?php echo $this->_tpl_vars['admin_postkey']; ?>
');" class="form-select">
                        <option value="-1">Action</option>
                        <?php if ($this->_tpl_vars['general_unban']): ?>
                            <option value="U">Unban</option>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['can_delete']): ?>
                            <option value="D">Delete</option>
                        <?php endif; ?>
                    </select>
                </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['can_export']): ?>
                <ul class="list-reset text:right">
                    <li>
                        <a href="./exportbans.php?type=steam" title="Export Permanent SteamID Bans">Export Permanent SteamID Bans</a>
                    </li>
                    <li>
                        <a href="./exportbans.php?type=ip" title="Export Permanent IP Bans">Export Permanent IP Bans</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>
  <script type="text/javascript" src="themes/<?php echo $this->_tpl_vars['theme']; ?>
/scripts/collapse.js"></script>
  <script>
    document.querySelectorAll('.form-check').forEach(e => e.addEventListener('click', el => el.stopPropagation()));
  </script>

  <?php echo '
    <script type="text/javascript">
      window.addEvent(\'domready\', function() {
      '; ?>

      <?php if ($this->_tpl_vars['view_bans']): ?>
        $('tickswitch').value = 0;
      <?php endif; ?>
      <?php echo '
      });
    </script>
  '; ?>

<?php endif; ?>