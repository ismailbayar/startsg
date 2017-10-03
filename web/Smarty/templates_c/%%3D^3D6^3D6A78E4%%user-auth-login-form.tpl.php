<?php /* Smarty version 2.6.20, created on 2017-09-16 19:52:29
         compiled from user-auth-login-form.tpl */ ?>
<form class="form-vertical" name="login_form" id="login-form" method="post" action="<?php echo @_URL; ?>
/login.php">
  <fieldset>
  <div class="control-group">
    <label class="control-label" for="username"><?php echo $this->_tpl_vars['lang']['your_username_or_email']; ?>
</label>
    <div class="controls"><input type="text" class="hocusfocus input-large" id="hocusfocus" name="username" value="<?php echo $this->_tpl_vars['inputs']['username']; ?>
"></div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pass"><?php echo $this->_tpl_vars['lang']['password']; ?>
</label>
    <div class="controls"><input type="password" class="input-large" id="pass" name="pass" maxlength="32" autocomplete="off"></div>
  </div>


    <div class="">
        <div class="controls">
        <button type="submit" name="Login" value="<?php echo $this->_tpl_vars['lang']['login']; ?>
" class="btn btn-blue" data-loading-text="<?php echo $this->_tpl_vars['lang']['login']; ?>
"><?php echo $this->_tpl_vars['lang']['login']; ?>
</button>
        <span class="signup"><small><a href="<?php echo @_URL; ?>
/login.<?php echo @_FEXT; ?>
?do=forgot_pass"><?php echo $this->_tpl_vars['lang']['forgot_pass']; ?>
</a></small></span>
        </div>
    </div>
  </fieldset>
</form>