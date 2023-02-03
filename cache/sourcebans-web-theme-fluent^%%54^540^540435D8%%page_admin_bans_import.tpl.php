<?php /* Smarty version 2.6.31, created on 2023-01-27 01:20:56
         compiled from page_admin_bans_import.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sb_button', 'page_admin_bans_import.tpl', 54, false),)), $this); ?>
<?php if (! $this->_tpl_vars['permission_import']): ?>
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
        <h2>Import Bans</h2>
    </div>

    <div class="padding">
        <div class="margin-bottom">
            For more information or help regarding a certain subject move your mouse over the question mark.
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="margin-bottom:half">
                <label for="importFile" class="form-label form-label:bottom">
                    File
                </label>

                <input type="file" TABINDEX=1 class="form-input form-full" id="importFile" name="importFile" />
                <div class="form-desc">
                    Select the <span class="text:bold">banned_users.cfg</span> or <span
                        class="text:bold">banned_ip.cfg</span>
                    file to upload and add bans.
                </div>

                <div id="file.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <div class="margin-bottom:half">
                <input type="checkbox" class="form-check" name="friendsname" id="friendsname" />
                <label for="friendsname" class="form-label form-label:left">
                    Get Names
                </label>

                <div class="form-desc">
                    Check this box, if you want to get the names of the players from their steam community profile. <span
                        class="text:italic">(just works with banned_users.cfg)</span>.
                </div>

                <div id="friendsname.msg" class="message message:error margin-top:half" style="display: none;"></div>
            </div>

            <div class="flex flex-ai:center flex-jc:space-between margin-top">
                <?php echo smarty_function_sb_button(array('text' => 'Import','class' => "button button-success",'id' => 'iban','submit' => true), $this);?>

                <?php echo smarty_function_sb_button(array('text' => 'Back','onclick' => "history.go(-1)",'class' => "button button-light",'id' => 'iback'), $this);?>

            </div>
        </form>
    </div>
    <?php if (! $this->_tpl_vars['extreq']): ?>
        <script type="text/javascript">
            $('friendsname').disabled = true;
        </script>
    <?php endif; ?>
<?php endif; ?>