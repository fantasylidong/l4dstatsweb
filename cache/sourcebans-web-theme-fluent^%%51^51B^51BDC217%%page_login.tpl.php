<?php /* Smarty version 2.6.31, created on 2023-01-30 08:10:10
         compiled from page_login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sb_button', 'page_login.tpl', 46, false),)), $this); ?>
<div class="flex flex-jc:center flex-ai:center">
    <div class="layout_box_small layout_box">
        <div class="layout_box_title">
            <h2>Admin Login</h2>
        </div>

        <div class="padding">
            <?php if ($this->_tpl_vars['steamlogin_show'] == 1): ?>
                <div class="margin-bottom:half">
                    <label for="loginUsername" class="form-label form-label:bottom">
                        Username
                    </label>
                    <input id="loginUsername" class="form-input form-full" type="text" name="username" />
                    <div id="loginUsername.msg" class="message message:error margin-top:half" style="display: none;">
                    </div>
                </div>

                <div class="margin-bottom:half">
                    <label for="loginPassword" class="form-label form-label:bottom">
                        Password
                    </label>
                    <input id="loginPassword" class="form-input form-full" type="password" name="password" />
                    <div id="loginPassword.msg" class="message message:error margin-top:half" style="display: none;">
                    </div>
                </div>

                <div class="flex flex-jc:space-between flex-ai:center margin-top">
                    <div class="flex flex-jc:space-between flex-ai:center">
                        <span class="input_checkbox">
                            <input id="loginRememberMe" type="checkbox" name="remember" value="checked"
                                class="form-check" />
                            <label for="loginRememberMe" class="form-label form-label:left">Remember me</label>
                        </span>
                    </div>

                    <?php if ($this->_tpl_vars['steamlogin_show'] == 1): ?>
                        <a href="index.php?p=lostpassword">
                            Lost your password?
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['steamlogin_show'] == 1): ?>
                <div class="flex margin-top">
                    <?php echo smarty_function_sb_button(array('text' => 'Login','onclick' => $this->_tpl_vars['redir'],'class' => "button button-success flex:11",'id' => 'alogin','submit' => false), $this);?>

                </div>
            <?php endif; ?>

            <div class="margin-top text:center">
                <a href="index.php?p=login&o=steam">
                    <img src="images/steamlogin.png" alt="Login Steam">
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $E('html').onkeydown = function(event) {
        var event = new Event(event);
        if (event.key == 'enter' ) <?php echo $this->_tpl_vars['redir']; ?>

    };
    $('loginRememberMeDiv').onkeydown = function(event) {
        var event = new Event(event);
        if (event.key == 'space') $('loginRememberMeDiv').checked = true;
    };
    $('button').onkeydown = function(event) {
        var event = new Event(event);
        if (event.key == 'space' ) <?php echo $this->_tpl_vars['redir']; ?>

    };
</script>