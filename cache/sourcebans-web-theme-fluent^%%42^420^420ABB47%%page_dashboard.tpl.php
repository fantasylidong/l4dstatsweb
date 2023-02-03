<?php /* Smarty version 2.6.31, created on 2023-02-03 01:05:51
         compiled from page_dashboard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'page_dashboard.tpl', 38, false),)), $this); ?>
<?php if ($this->_tpl_vars['dashboard_text']): ?>
  <div class="layout_box padding margin-bottom">
    <?php echo $this->_tpl_vars['dashboard_text']; ?>

  </div>
<?php endif; ?>

<div class="margin-bottom">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page_servers.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div class="layout_box margin-bottom">
  <div class="layout_box_title flex flex-jc:space-between flex-ai:center">
    <h2>Latest Added Bans</h2>
    <span>Total bans: <?php echo $this->_tpl_vars['total_bans']; ?>
</span>
  </div>

  <div class="padding">
    <div class="table table_box">
      <table>
        <thead>
          <tr>
            <th>MOD</th>
            <th class="text:left">Name</th>
            <th class="text:left">Date/Time</th>
            <th>Length</th>
          </tr>
        </thead>
        <tbody>
          <?php $_from = $this->_tpl_vars['players_banned']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['player']):
?>
            <tr class="collapse" onclick="<?php echo $this->_tpl_vars['player']['link_url']; ?>
">
              <td class="text:center">
                <img src="images/games/<?php echo $this->_tpl_vars['player']['icon']; ?>
" alt="<?php echo $this->_tpl_vars['player']['icon']; ?>
" title="MOD" />
              </td>
              <td>
                <?php if (empty ( $this->_tpl_vars['player']['short_name'] )): ?>
                  <span class="text:italic">No nickname present</span>
                <?php else: ?>
                  <span><?php echo ((is_array($_tmp=$this->_tpl_vars['player']['short_name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                <?php endif; ?>
              </td>
              <td>
                <?php echo $this->_tpl_vars['player']['created']; ?>

              </td>
              <td
                class="listtable_1<?php if ($this->_tpl_vars['player']['unbanned']): ?>_unbanned<?php elseif ($this->_tpl_vars['player']['perm']): ?>_permanent<?php elseif ($this->_tpl_vars['player']['temp']): ?>_banned<?php endif; ?>">
                <?php echo $this->_tpl_vars['player']['length']; ?>
<?php if ($this->_tpl_vars['player']['unbanned']): ?> (<?php echo $this->_tpl_vars['player']['ub_reason']; ?>
)<?php endif; ?>
              </td>
            </tr>
          <?php endforeach; endif; unset($_from); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="flex flex-ai:start flex-jc:space-bwtween m:flex-fd:column">
  <div class="layout_box flex:11 margin-right margin-bottom">
    <div class="layout_box_title flex flex-jc:space-between flex-ai:center">
      <h2>Latest Added Comms Block</h2>
      <span>Total Blocked: <?php echo $this->_tpl_vars['total_comms']; ?>
</span>
    </div>

    <div class="padding">
      <div class="table table_box">
        <table>
          <thead>
            <tr>
              <th>Type</th>
              <th class="text:left">Name</th>
              <th class="text:left">Date/Time</th>
              <th>Length</th>
            </tr>
          </thead>
          <tbody>
            <?php $_from = $this->_tpl_vars['players_commed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['player']):
?>
              <tr class="collapse" onclick="<?php echo $this->_tpl_vars['player']['link_url']; ?>
">
                <td class="text:center">
                  <i class="<?php echo $this->_tpl_vars['player']['type']; ?>
"></i>
                </td>
                <td>
                  <?php if (empty ( $this->_tpl_vars['player']['short_name'] )): ?>
                    <span class="text:italic">No nickname present</span>
                  <?php else: ?>
                    <span><?php echo ((is_array($_tmp=$this->_tpl_vars['player']['short_name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php echo $this->_tpl_vars['player']['created']; ?>

                </td>
                <td
                  class="listtable_1<?php if ($this->_tpl_vars['player']['unbanned']): ?>_unbanned<?php elseif ($this->_tpl_vars['player']['perm']): ?>_permanent<?php elseif ($this->_tpl_vars['player']['temp']): ?>_banned<?php endif; ?>">
                  <?php echo $this->_tpl_vars['player']['length']; ?>
<?php if ($this->_tpl_vars['player']['unbanned']): ?> (<?php echo $this->_tpl_vars['player']['ub_reason']; ?>
)<?php endif; ?>
                </td>
              </tr>
            <?php endforeach; endif; unset($_from); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="layout_box flex:11 margin-bottom">
    <div class="layout_box_title flex flex-jc:space-between flex-ai:center">
      <h2>Latest Players Blocked</h2>
      <span>Total Stopped: <?php echo $this->_tpl_vars['total_blocked']; ?>
</span>
    </div>

    <div class="padding">
      <div class="table table_box">
        <table>
          <thead>
            <tr>
              <th>Type</th>
              <th class="text:left">Name</th>
              <th class="text:left">Date/Time</th>
              <th>Length</th>
            </tr>
          </thead>
          <tbody>
            <?php $_from = $this->_tpl_vars['players_blocked']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['player']):
?>
              <tr class="collapse" <?php if ($this->_tpl_vars['dashboard_lognopopup']): ?> onclick="<?php echo $this->_tpl_vars['player']['link_url']; ?>
" 
              <?php else: ?>onclick="<?php echo $this->_tpl_vars['player']['popup']; ?>
"
                <?php endif; ?>>
                <td class="text:center">
                  <i class="fas fa-ban fa-lg"></i>
                </td>
                <td>
                  <span><?php echo ((is_array($_tmp=$this->_tpl_vars['player']['short_name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                </td>
                <td>
                  <?php echo $this->_tpl_vars['player']['date']; ?>

                </td>
                <td
                  class="listtable_1<?php if ($this->_tpl_vars['player']['unbanned']): ?>_unbanned<?php elseif ($this->_tpl_vars['player']['perm']): ?>_permanent<?php elseif ($this->_tpl_vars['player']['temp']): ?>_banned<?php endif; ?>">
                  <?php echo $this->_tpl_vars['player']['length']; ?>
<?php if ($this->_tpl_vars['player']['unbanned']): ?> (<?php echo $this->_tpl_vars['player']['ub_reason']; ?>
)<?php endif; ?>
                </td>
              </tr>
            <?php endforeach; endif; unset($_from); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>