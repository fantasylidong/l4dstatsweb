<?php /* Smarty version 2.6.31, created on 2023-03-10 21:43:17
         compiled from box_admin_bans_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sb_button', 'box_admin_bans_search.tpl', 240, false),)), $this); ?>
<div class="layout_box margin-bottom">
    <div class="table padding">
        <div class="table_box">
            <table>
                <tbody>
                    <tr class="collapse">
                        <td class="text:center">
                            <span class="text:bold">Advanced Search</span> (Click)
                        </td>
                    </tr>

                    <tr class="table_hide">
                        <td colspan="1">
                            <div class="collapse_content flex flex-jc:center">
                                <div class="padding">
                                    <div class="flex m:flex-fd:column">
                                        <div class="flex:11 margin-right">
                                            <div class="margin-bottom:half">
                                                <input id="name" name="search_type" class="form-radio" type="radio"
                                                    value="name" />

                                                <label for="name" class="form-label form-label:bottom">
                                                    Nickname
                                                </label>

                                                <input class="form-input form-full" type="text" id="nick" value=""
                                                    onmouseup="$('name').checked = true" />
                                            </div>

                                            <div class="margin-bottom:half">
                                                <input id="steam_" type="radio" name="search_type" class="form-radio"
                                                    value="radiobutton" />

                                                <label for="steam_"
                                                    class="form-label form-label:bottom form-label:right">
                                                    Steam ID
                                                </label>

                                                <div class="flex">
                                                    <input class="form-input form-full margin-right" type="text"
                                                        id="steamid" value="" onmouseup="$('steam_').checked = true" />

                                                    <select class="form-select form-full" id="steam_match"
                                                        onmouseup="$('steam_').checked = true">
                                                        <option value="0" selected>Exact Match</option>
                                                        <option value="1">Partial Match</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php if (! $this->_tpl_vars['hideplayerips']): ?>
                                                <div class="margin-bottom:half">
                                                    <input id="ip_" type="radio" class="form-radio" name="search_type"
                                                        value="radiobutton" />

                                                    <label for="ip" class="form-label form-label:bottom">
                                                        IP
                                                    </label>

                                                    <input class="form-input form-full" type="text" id="ip" value=""
                                                        onmouseup="$('ip_').checked = true" />
                                                </div>
                                            <?php endif; ?>

                                            <div class="margin-bottom:half">
                                                <input id="reason_" type="radio" name="search_type" class="form-radio"
                                                    value="radiobutton" />

                                                <label for="ban_reason" class="form-label form-label:bottom">
                                                    Reason
                                                </label>

                                                <input class="form-input form-full" type="text" id="ban_reason" value=""
                                                    onmouseup="$('reason_').checked = true" />
                                            </div>
                                        </div>

                                        <div class="flex:11">
                                            <div class="margin-bottom:half">
                                                <input id="date" type="radio" name="search_type" class="form-radio"
                                                    value="radiobutton" />

                                                <label for="date" class="form-label form-label:bottom form-label:right">
                                                    Date
                                                </label>

                                                <div class="flex">
                                                    <input class="form-input form-full margin-right" type="text"
                                                        id="day" value="DD" onmouseup="$('date').checked = true"
                                                        maxlength="2" />
                                                    <input class="form-input form-full margin-right" type="text"
                                                        id="month" value="MM" onmouseup="$('date').checked = true"
                                                        maxlength="2" />
                                                    <input class="form-input form-full" type="text" id="year" value="YY"
                                                        onmouseup="$('date').checked = true" maxlength="4" />
                                                </div>
                                            </div>

                                            <div class="margin-bottom:half">
                                                <input id="ban_type_" type="radio" name="search_type" class="form-radio"
                                                    value="radiobutton" />

                                                <label for="ban_type"
                                                    class="form-label form-label:bottom form-label:right">
                                                    Type
                                                </label>

                                                <select class="form-select form-full" id="ban_type"
                                                    onmouseup="$('ban_type_').checked = true">
                                                    <option value="0" selected>Steam ID</option>
                                                    <option value="1">IP Address</option>
                                                </select>
                                            </div>

                                            <?php if (! $this->_tpl_vars['hideadminname']): ?>
                                                <div class="margin-bottom:half">
                                                    <input id="admin" name="search_type" type="radio" class="form-radio"
                                                        value="radiobutton" />

                                                    <label for="ban_admin"
                                                        class="form-label form-label:bottom form-label:right">
                                                        Admin
                                                    </label>

                                                    <select class="form-select form-full" id="ban_admin"
                                                        onmouseup="$('admin').checked = true">
                                                        <?php $_from = ($this->_tpl_vars['admin_list']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['admin']):
?>
                                                            <option label="<?php echo $this->_tpl_vars['admin']['user']; ?>
" value="<?php echo $this->_tpl_vars['admin']['aid']; ?>
"><?php echo $this->_tpl_vars['admin']['user']; ?>

                                                            </option>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>

                                            <div class="margin-bottom:half">
                                                <input id="where_banned" name="search_type" class="form-radio"
                                                    type="radio" value="radiobutton" />

                                                <label for="server"
                                                    class="form-label form-label:bottom form-label:right">
                                                    Server
                                                </label>

                                                <select class="form-select form-full" id="server"
                                                    onmouseup="$('where_banned').checked = true">
                                                    <option label="Web Ban" value="0">Web Ban</option>
                                                    <?php $_from = ($this->_tpl_vars['server_list']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['server']):
?>
                                                        <option value="<?php echo $this->_tpl_vars['server']['sid']; ?>
" id="ss<?php echo $this->_tpl_vars['server']['sid']; ?>
">Retrieving
                                                            Hostname...
                                                            (<?php echo $this->_tpl_vars['server']['ip']; ?>
:<?php echo $this->_tpl_vars['server']['port']; ?>
)</option>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="margin-bottom:half">
                                        <input id="length_" type="radio" name="search_type" class="form-radio"
                                            value="radiobutton" />

                                        <label for="other_length" class="form-label form-label:bottom form-label:right">
                                            Length
                                        </label>

                                        <div class="flex">
                                            <select class="form-select form-full margin-right" id="length_type"
                                                onmouseup="$('length_').checked = true">
                                                <option value="e" title="equal to">=</option>
                                                <option value="h" title="greater">&gt;</option>
                                                <option value="l" title="smaller">&lt;</option>
                                                <option value="eh" title="equal to or greater">&gt;=</option>
                                                <option value="el" title="equal to or smaller">&lt;=</option>
                                            </select>

                                            <select class="form-select form-full margin-right" id="length"
                                                onmouseup="$('length_').checked = true" onchange="switch_length(this);"
                                                onmouseover="if(this.options[this.selectedIndex].value=='other')$('length').setStyle('width', '210px');if(this.options[this.selectedIndex].value=='other')this.focus();"
                                                onblur="if(this.options[this.selectedIndex].value=='other')$('length').setStyle('width', '20px');">
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
                                                    <option value="40320">1 month</option>
                                                    <option value="80640">2 months</option>
                                                    <option value="120960">3 months</option>
                                                    <option value="241920">6 months</option>
                                                    <option value="483840">12 months</option>
                                                </optgroup>
                                                <option value="other">Other length in minutes</option>
                                            </select>

                                            <input type="text" id="other_length" name="other_length"
                                                class="form-input form-full" onmouseup="$('length_').checked = true"
                                                style="display: none;" />
                                        </div>
                                    </div>

                                    <?php if ($this->_tpl_vars['is_admin']): ?>
                                        <div class="margin-bottom:half">
                                            <input id="comment_" type="radio" name="search_type" class="form-radio"
                                                value="radiobutton" />

                                            <label for="ban_comment" class="form-label form-label:bottom form-label:right">
                                                Comment
                                            </label>

                                            <input class="form-input form-full" type="text" id="ban_comment" value=""
                                                onmouseup="$('comment_').checked = true" />
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex">
                                        <?php echo smarty_function_sb_button(array('text' => 'Search','onclick' => "search_bans();",'class' => "button button-primary flex:11",'id' => 'searchbtn','submit' => false), $this);?>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $this->_tpl_vars['server_script']; ?>