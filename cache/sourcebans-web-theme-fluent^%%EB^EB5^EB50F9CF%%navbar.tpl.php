<?php /* Smarty version 2.6.31, created on 2023-03-11 12:53:52
         compiled from core/navbar.tpl */ ?>
<main>
  <div class="layout_topBar">
    <div class="layout_container flex flex-jc:end flex-ai:center">
      <ul class="layout_topBar_action flex">
        <li>
          <button id="user_action_change_dark" aria-label="Dark mode"><i class="fas fa-moon"></i></button>
        </li>
        <li class="jscolor_li">
          <button data-jscolor aria-label="Color"></button>
        </li>
        <li id="jscolor_reset" class="jscolor_li" style="display: none;">
          <button aria-label="Reset color"><i class="fa fa-refresh"></i></button>
        </li>
      </ul>

      <ul class="layout_topBar_userBar responsive_show:desktop flex flex-ai:center">
        <?php if ($this->_tpl_vars['login']): ?>
          <li class="margin-right">
            Welcome, <a href='index.php?p=account'><i class="fas fa-user"></i> <?php echo $this->_tpl_vars['username']; ?>
</a>
          </li>
          <li>
            <a class="button button-important" href='index.php?p=logout'><i class="fas fa-sign-out-alt"></i>
              Logout</a>
          </li>
        <?php else: ?>
          <li>
            <a class="button button-success" href='index.php?p=login'>Existing user? Sign In</a>
          </li>
        <?php endif; ?>
      </ul>

      <button id="button_mobile_open" class="nav_mobile_open responsive_hide:desktop" aria-label="Mobile nav open">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </div>

  <div id="layout_mobile" class="nav_mobile">
    <button id="button_mobile_close" class="nav_mobile_close" aria-label="Mobile nav close">
      <i class="fas fa-times"></i>
    </button>
    <div class="nav_mobile_content">

      <div class="nav_mobile_tab_top padding flex">
        <?php if ($this->_tpl_vars['login']): ?>
          <a class="button button-important button:full" href='index.php?p=logout'><i class="fas fa-sign-out-alt"></i>
            Logout</a>
        <?php else: ?>
          <a class="button button-success button:full" href='index.php?p=login'>Existing user? Sign In</a>
        <?php endif; ?>
      </div>
      <nav class="nav_mobile_tab_nav">
        <ul>
          <?php $_from = $this->_tpl_vars['navbar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
            <li class="<?php echo $this->_tpl_vars['nav']['state']; ?>
">
              <a href="index.php?p=<?php echo $this->_tpl_vars['nav']['endpoint']; ?>
" data-nav="<?php echo $this->_tpl_vars['nav']['endpoint']; ?>
">
                <?php echo $this->_tpl_vars['nav']['title']; ?>

              </a>
            </li>
          <?php endforeach; endif; unset($_from); ?>
        </ul>
      </nav>

    </div>
    <div class="nav_mobile_background"></div>
  </div>

  <nav id="navBar" class="nav responsive_show:desktop">
    <div class="nav_tab">
      <ul>
        <?php $_from = $this->_tpl_vars['navbar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
          <li class="<?php echo $this->_tpl_vars['nav']['state']; ?>
">
            <a href="index.php?p=<?php echo $this->_tpl_vars['nav']['endpoint']; ?>
" data-nav="<?php echo $this->_tpl_vars['nav']['endpoint']; ?>
">
              <?php echo $this->_tpl_vars['nav']['title']; ?>

            </a>
          </li>
        <?php endforeach; endif; unset($_from); ?>
      </ul>
    </div>
  </nav>
  <div id="mainwrapper" class="layout_body flex:11">