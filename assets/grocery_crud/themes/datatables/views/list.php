<table cellpadding="0" cellspacing="0" border="0" class="table" style="margin-top: 20px" id="<?php echo uniqid(); ?>"> <!--  groceryCrudTable -->
	<thead class="bg-dark text-white">
		<tr>
			<?php foreach($columns as $column){?>
				<th><?php echo $column->display_as; ?></th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<th class='actions'>Acciones</th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $num_row => $row){ ?>
		<tr id='row-<?php echo $num_row?>'>
			<?php foreach($columns as $column){?>
				<td><?php echo $row->{$column->field_name}?></td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td class='actions'>
				<?php
				if(!empty($row->action_urls)){
					foreach($row->action_urls as $action_unique_id => $action_url){
						$action = $actions[$action_unique_id];
				?>
						<a href="<?php echo $action_url; ?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
							<span class="ui-button-icon-primary ui-icon <?php echo $action->css_class; ?> <?php echo $action_unique_id;?>"></span><span class="ui-button-text">&nbsp;<?php echo $action->label?></span>
						</a>
				<?php }
				}
				?>
				<?php if(!$unset_read){?>
					<a href="<?php echo $row->read_url?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<input type="image" src="https://img.icons8.com/nolan/64/view-details.png" width="32" height="32"></input>
						<!--<button class="ui-button-text btn btn-info"><img src="https://img.icons8.com/nolan/64/view-details.png"/></button>-->
					</a>
				<?php }?>

                <?php if(!$unset_clone){?>
                    <a href="<?php echo $row->clone_url?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
                    	<input type="image" src="https://img.icons8.com/nolan/64/copy.png" width="32" height="32"></input>
                        <!--<button class="ui-button-text btn btn-secondary">&nbsp;Clonar</button>-->
                        <!--<span class="ui-button-text btn btn-outline-secondary">&nbsp;Clonar</span>-->
                    </a>
                <?php }?>

				<?php if(!$unset_edit){?>
					<a href="<?php echo $row->edit_url?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<input type="image" src="https://img.icons8.com/nolan/64/edit-file.png" width="32" height="32"></input>
						<!--<button class="ui-button-text btn btn-warning"></button> -->
					</a>
				<?php }?>

				<?php if(!$unset_delete){?>
					<a onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')"
						href="javascript:void(0)" class="delete_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<input type="image" src="https://img.icons8.com/nolan/64/minus.png" width="32" height="32"></input>
						<!--<button class="ui-button-text btn btn-danger">&nbsp;Borrar</button> -->
					</a>
				<?php }?>
			</td>
			<?php }?>
		</tr>
		<?php }?>
	</tbody>
</table>
