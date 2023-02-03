<?php /* Smarty version 2.6.31, created on 2023-01-27 01:20:56
         compiled from page_admin_bans_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sb_button', 'page_admin_bans_add.tpl', 163, false),)), $this); ?>
<?php if (! $this->_tpl_vars['permission_addban']): ?>
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
        <h2>Add Ban</h2>
    </div>

    <div class="padding">
        <div class="margin-bottom">
            For more information or help regarding a certain subject move your mouse over the question mark.
        </div>

        <div class="margin-bottom:half">
            <label for="nickname" class="form-label form-label:bottom">
                Nickname
            </label>

            <input type="hidden" id="fromsub" value="" />
            <input type="text" TABINDEX=1 class="form-input form-full" id="nickname" name="nickname" />

            <div id="nick.msg" class="message message:error margin-top:half" style="display: none;"></div>
        </div>

        <div class="margin-bottom:half">
            <label for="type" class="form-label form-label:bottom">
                Ban Type
            </label>

            <select id="type" name="type" TABINDEX=2 class="form-select form-full">
                <option value="0">Steam ID</option>
                <option value="1">IP Address</option>
            </select>
        </div>

        <div class="margin-bottom:half">
            <label for="steam" class="form-label form-label:bottom">
                Steam ID / Community ID
            </label>

            <input type="text" TABINDEX=3 class="form-input form-full" id="steam" name="steam" />

            <div id="steam.msg" class="message message:error margin-top:half" style="display: none;"></div>
        </div>

        <div class="margin-bottom:half">
            <label for="ip" class="form-label form-label:bottom">
                IP Address
            </label>

            <input type="text" TABINDEX=3 class="form-input form-full" id="ip" name="ip" />

            <div id="ip.msg" class="message message:error margin-top:half" style="display: none;"></div>
        </div>

        <div class="margin-bottom:half">
            <label for="listReason" class="form-label form-label:bottom">
                Ban Reason
            </label>

            <select id="listReason" name="listReason" TABINDEX=4 class="form-select form-full"
                onChange="changeReason(this[this.selectedIndex].value);">
                <option value="" selected> -- Select Reason -- </option>
                <optgroup label="Hacking">
                    <option value="Aimbot">Aimbot</option>
                    <option value="Antirecoil">Antirecoil</option>
                    <option value="Wallhack">Wallhack</option>
                    <option value="Spinhack">Spinhack</option>
                    <option value="Multi-Hack">Multi-Hack</option>
                    <option value="No Smoke">No Smoke</option>
                    <option value="No Flash">No Flash</option>
                </optgroup>
                <optgroup label="Behavior">
                    <option value="Team Killing">Team Killing</option>
                    <option value="Team Flashing">Team Flashing</option>
                    <option value="Spamming Mic/Chat">Spamming Mic/Chat</option>
                    <option value="Inappropriate Spray">Inappropriate Spray</option>
                    <option value="Inappropriate Language">Inappropriate Language</option>
                    <option value="Inappropriate Name">Inappropriate Name</option>
                    <option value="Ignoring Admins">Ignoring Admins</option>
                    <option value="Team Stacking">Team Stacking</option>
                </optgroup>
                <?php if ($this->_tpl_vars['customreason']): ?>
                    <optgroup label="Custom">
                        <?php $_from = ($this->_tpl_vars['customreason']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['creason']):
?>
                            <option value="<?php echo $this->_tpl_vars['creason']; ?>
"><?php echo $this->_tpl_vars['creason']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </optgroup>
                <?php endif; ?>
                <option value="other">Other Reason</option>
            </select>

            <div id="dreason" class="margin-top:half" style="display:none;">
                <textarea class="form-text" TABINDEX=4 cols="30" rows="5" id="txtReason" name="txtReason"></textarea>
            </div>

            <div id="reason.msg" class="message message:error margin-top:half" style="display: none;"></div>
        </div>

        <div class="margin-bottom:half">
            <label for="banlength" class="form-label form-label:bottom">
                Ban Length
            </label>

            <select id="banlength" TABINDEX=5 class="form-select form-full">
                <option value="0">Permanent</option>
                <optgroup label="minutes">
                    <option value="1">1 minute</option>
                    <option value="5">5 minutes</option>
                    <option value="10">10 minutes</option>
                    <option value="15">15 minutes</option>
                    <option value="30">30 minutes</option>
                    <option value="45">45 minutes</option>
                </optgroup>
                <optgroup label="hours">
                    <option value="60">1 hour</option>
                    <option value="120">2 hours</option>
                    <option value="180">3 hours</option>
                    <option value="240">4 hours</option>
                    <option value="480">8 hours</option>
                    <option value="720">12 hours</option>
                </optgroup>
                <optgroup label="days">
                    <option value="1440">1 day</option>
                    <option value="2880">2 days</option>
                    <option value="4320">3 days</option>
                    <option value="5760">4 days</option>
                    <option value="7200">5 days</option>
                    <option value="8640">6 days</option>
                </optgroup>
                <optgroup label="weeks">
                    <option value="10080">1 week</option>
                    <option value="20160">2 weeks</option>
                    <option value="30240">3 weeks</option>
                </optgroup>
                <optgroup label="months">
                    <option value="43200">1 month</option>
                    <option value="86400">2 months</option>
                    <option value="129600">3 months</option>
                    <option value="259200">6 months</option>
                    <option value="518400">12 months</option>
                </optgroup>
            </select>

            <div id="length.msg" class="message message:error margin-top:half" style="display: none;"></div>
        </div>

        <div class="margin-bottom:half">
            <label for="udemo" class="form-label form-label:bottom">
                Upload Demo
            </label>

            <?php echo smarty_function_sb_button(array('text' => 'Upload a demo','onclick' => "childWindow=open('pages/admin.uploaddemo.php','upload','resizable=no,width=300,height=130');",'class' => "button button-primary",'id' => 'udemo','submit' => false), $this);?>


            <div id="demo.msg" class="message message:error margin-top:half" style="display: none;"></div>
        </div>

        <div class="flex flex-ai:center flex-jc:space-between margin-top">
            <?php echo smarty_function_sb_button(array('text' => 'Add Ban','onclick' => "ProcessBan();",'class' => "button button-success",'id' => 'aban','submit' => false), $this);?>

            <?php echo smarty_function_sb_button(array('text' => 'Back','onclick' => "history.go(-1)",'class' => "button button-light",'id' => 'aback'), $this);?>

        </div>
    </div>
<?php endif; ?>