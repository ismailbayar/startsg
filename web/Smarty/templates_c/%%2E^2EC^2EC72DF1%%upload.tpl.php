<?php /* Smarty version 2.6.20, created on 2017-09-21 06:26:06
         compiled from upload.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'upload.tpl', 43, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('no_index' => '1','p' => 'upload','tpl_name' => 'upload')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="wrapper">
  <div class="container-fluid">
	  <div class="row-fluid">
	   <div class="span12 extra-space">
		<div id="primary">

		<h1><?php echo $this->_tpl_vars['lang']['upload_video']; ?>
</h1>
		<hr />
		<?php if ($this->_tpl_vars['success'] == 1): ?>
			<div class="alert alert-success">
			<?php echo $this->_tpl_vars['lang']['suggest_msg4']; ?>

			<br />
			<a href="upload.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['add_another_one']; ?>
</a> or <a href="index.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['return_home']; ?>
</a>
			</div>
		<?php elseif ($this->_tpl_vars['success'] == 2): ?>
			<div class="alert alert-success">
			<?php echo $this->_tpl_vars['lang']['upload_errmsg11']; ?>
 
			<a href="index.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['return_home']; ?>
</a>
			</div>
		<?php elseif ($this->_tpl_vars['success'] == 'custom'): ?>
			<div class="alert alert-success">
			<?php echo $this->_tpl_vars['success_custom_message']; ?>
 
			<a href="index.<?php echo @_FEXT; ?>
"><?php echo $this->_tpl_vars['lang']['return_home']; ?>
</a>
			</div>
		<?php else: ?>
			<?php if (count ( $this->_tpl_vars['errors'] ) > 0): ?>
			<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<ul class="subtle-list">
			<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<li><?php echo $this->_tpl_vars['v']; ?>
</li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
			</div>
			<?php endif; ?>
			
			<div class="hide" id="manage-video-ajax-message"></div>
			<div class="form-horizontal">
			<div class="pm-upload-file-select" id="upload-video-dropzone">
				<i class="fa fa-cloud-upload"></i>
				<p><?php echo ((is_array($_tmp=@$this->_tpl_vars['lang']['drop_files'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Drop file here') : smarty_modifier_default($_tmp, 'Drop file here')); ?>
</p>
				<div class="clearfix"></div>
				<span class="btn-upload fileinput-button">
					<span class="btn-upload-value"><?php echo $this->_tpl_vars['lang']['upload_video1']; ?>
</span>
					<input type="file" name="video" id="upload-video-file-btn" />
				</span>
			</div>
			<div class="clearfix"></div>

			<fieldset>
			<form name="upload-video-form" id="upload-video-form" class="upload-form-only" enctype="multipart/form-data" method="post" action="<?php echo $this->_tpl_vars['form_action']; ?>
">
			<div class="pm-video-manage-form">
				<div class="control-group">
					<label class="control-label"><?php echo $this->_tpl_vars['lang']['swfupload_file']; ?>
</label>
					<div class="controls">
						<div>
							<ol id="upload-video-selected-files-container"></ol>
						</div>
					</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="capture"><?php echo $this->_tpl_vars['lang']['upload_video2']; ?>
</label>
				  <div class="controls">
					<span class="btn-upload btn-upload-video">
						<span class="btn-upload-value"><?php echo $this->_tpl_vars['lang']['swfupload_btn_select']; ?>
</span>
						<input type="file" name="capture" class="capture" value="" size="40" />
					</span>
				  </div>
				</div>
				<div  id="upload-video-extra">
					<div class="control-group">
					  <label class="control-label" for="video_title"><?php echo $this->_tpl_vars['lang']['video']; ?>
</label>
					  <div class="controls">
					  <input name="video_title" type="text" value="<?php echo $_POST['video_title']; ?>
" class="input-large">
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="duration"><?php echo $this->_tpl_vars['lang']['_duration']; ?>
</label>
					  <div class="controls">
					  <input name="duration" id="duration" type="text" value="<?php echo $_POST['duration']; ?>
" class="input-mini" style="text-align: center;">
					  <span class="help-inline"><a href="#" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['duration_format']; ?>
"><i class="icon-info-sign"></i></a></span>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="category"><?php echo $this->_tpl_vars['lang']['category']; ?>
</label>
					  <div class="controls">
						<?php echo $this->_tpl_vars['categories_dropdown']; ?>

					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="description"><?php echo $this->_tpl_vars['lang']['description']; ?>
</label>
					  <div class="controls">
						<textarea name="description" class="span5" rows="3"><?php if ($_POST['description']): ?><?php echo $_POST['description']; ?>
<?php endif; ?></textarea>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="tags"><?php echo $this->_tpl_vars['lang']['tags']; ?>
</label>
					  <div class="controls">
						<div class="tagsinput">
						  <input id="tags_upload" name="tags" type="text" class="tags" value="<?php echo $_POST['tags']; ?>
"> <span class="help-inline"><a href="#" rel="tooltip" title="<?php echo $this->_tpl_vars['lang']['suggest_ex']; ?>
"><i class="icon-info-sign"></i></a></span>
						</div>
					  </div>
					</div>
					<?php if (isset ( $this->_tpl_vars['mm_upload_fields_inject'] )): ?><?php echo $this->_tpl_vars['mm_upload_fields_inject']; ?>
<?php endif; ?>
					<div class="">
					  <div class="controls">
						<button name="Submit" type="submit" id="upload-video-submit-btn" value="<?php echo $this->_tpl_vars['lang']['submit_upload']; ?>
" class="btn btn-success" data-loading-text="<?php echo $this->_tpl_vars['lang']['submit_send']; ?>
"><?php echo $this->_tpl_vars['lang']['submit_upload']; ?>
</button>
						<span id="uploading_gif">
						</span>
					  </div>
					</div>
				</div><!-- #upload-video-extra -->
			</div>
			</fieldset>
			
			<input type="hidden" name="form_id" value="<?php echo $this->_tpl_vars['form_id']; ?>
" />
			<input type="hidden" name="_pmnonce_t" id="upload-video-form-nonce" value="<?php echo $this->_tpl_vars['form_csrfguard_token']; ?>
" />
			<input type="hidden" name="temp_id" id="temp_id" value="" />
			<input type="hidden" name="p" value="upload" />
			<input type="hidden" name="do" value="upload-media-file" />
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['max_file_size']; ?>
">
			</form>
			</div>
		<?php endif; ?>
		</div><!-- #primary -->
		</div><!-- .span12 -->
	</div><!-- .row-fluid --> 
  </div>
  <!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array('tpl_name' => 'upload')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>