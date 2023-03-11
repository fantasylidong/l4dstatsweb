<?php /* Smarty version 2.6.31, created on 2023-03-05 01:29:05
         compiled from page_lostpassword.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sb_button', 'page_lostpassword.tpl', 27, false),)), $this); ?>
<div class="flex flex-jc:center flex-ai:center">
    <div class="layout_box_small layout_box">
        <div class="layout_box_title">
            <h2>Lost your password</h2>
        </div>
        <div class="padding">
            <div class="margin-bottom:half">
                Please type your email address in the box below to have your password reset.
            </div>

            <div id="msg-red" class="message message:error margin-bottom:half" style="display:none;">
                The email address you supplied is not registered on the system.
            </div>

            <div id="msg-blue" class="message message:info margin-bottom:half" style="display:none;">
                Please check your email inbox (and spam) for a link which will help you reset your password.
            </div>

            <div class="margin-bottom:half">
                <label for="email" class="form-label form-label:bottom">
                    Email Address
                </label>
                <input id="email" class="form-input form-full" type="text" name="email" />
            </div>

            <div class="flex margin-top">
                <?php echo smarty_function_sb_button(array('text' => 'Recover Password','onclick' => "xajax_LostPassword($('email').value);",'class' => "button button-success flex:11",'id' => 'alogin','submit' => false), $this);?>

            </div>
        </div>
    </div>
</div>