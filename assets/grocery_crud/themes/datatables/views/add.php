<?php

	$this->set_css($this->default_theme_path.'/datatables/css/datatables.css');
    $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js_config($this->default_theme_path.'/datatables/js/datatables-add.js');
	$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<div class=''>
	<h3 class="ui-accordion-header ui-helper-reset form-title text-white bg-dark">
		<div class='floatL form-title-left'>
			<?php echo $this->l('form_add'); ?> <?php echo $subject?>
		</div>
		<div class='clear'></div>
	</h3>
<div class='form-content form-div container'>
	<?php echo form_open( $insert_url, 'method="post" id="crudForm" enctype="multipart/form-data"'); ?>
		<div>
			<?php
			$counter = 0;
				foreach($fields as $field)
				{
					$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
					$counter++;
			?>
			<?php if($even_odd == "Nombre : ") {?>

				<div class="input-group mb-3">
  					<div class="input-group-prepend">
    					<label class="input-group-text" for="inputGroupSelect01">Options</label>
  					</div>
  					<select class="custom-select" id="inputGroupSelect01">
    					<option selected>Choose...</option>
    					<option value="1">One</option>
    					<option value="2">Two</option>
    					<option value="3">Three</option>
  					</select>
				</div>
			<?php } else { ?>
			<div class='form-field-box <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
				<div class='form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
					<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :
				</div>
				<div class='form-input-box aplicarContainer' id="<?php echo $field->field_name; ?>_input_box">
					<div class="container">
						<input type="" name="<?php echo $field->field_name; ?>">
						<!-- <?php echo $input_fields[$field->field_name]->input?> -->
					</div>
				</div>
				<div class='clear'></div>
			</div>
			<?php } ?>
			<?php }?>
			<!-- Start of hidden inputs -->
				<?php
					foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
			<!-- End of hidden inputs -->
			<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
			<div class='line-1px'></div>
			<div id='report-error' class='report-div error'></div>
			<div id='report-success' class='report-div success'></div>
		</div>
		<div class='buttons-box'>
			<div class='form-button-box'>
				<input id="form-button-save" type='submit' value='<?php echo $this->l('form_save'); ?>' class='border border-dark btn btn-success'/>
			</div>
<?php 	if(!$this->unset_back_to_list) { ?>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_save_and_go_back'); ?>' class='border border-dark btn btn-info' id="save-and-go-back-button"/>
			</div>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_cancel'); ?>' class='border border-dark btn btn-secondary' id="cancel-button" />
			</div>
<?php   } ?>
			<div class='form-button-box loading-box'>
				<div class='small-loading' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>
			</div>
			<div class='clear'></div>
		</div>
	<?php echo form_close(); ?>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_add_form = "<?php echo $this->l('alert_add_form')?>";
	var message_insert_error = "<?php echo $this->l('insert_error')?>";
</script>