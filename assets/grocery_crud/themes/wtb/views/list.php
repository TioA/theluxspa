<?php $uniqid = uniqid(); ?>
<table cellpadding="0" cellspacing="0" border="0" class="display groceryCrudTable table table-striped table-bordered nowrap dataTable" id="<?php echo $uniqid; ?>">
	<thead>
		<tr>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<th class='actions'><?php echo $this->l('list_actions'); ?></th>
			<?php }?>
			<?php foreach($columns as $column){?>
				<th><?php echo $column->display_as; ?></th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $num_row => $row){ ?>
		<tr id='row-<?php echo $num_row?>'>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td class='actions'>
				<?php
				if(!empty($row->action_urls)){
					foreach($row->action_urls as $action_unique_id => $action_url){
						$action = $actions[$action_unique_id];
				?>
						<a href="<?php echo $action_url; ?>" class="edit_button text text-info" role="button">
							<span class="ui-button-icon-primary ui-icon <?php echo $action->css_class; ?> <?php echo $action_unique_id;?>"></span><span class="ui-button-text">&nbsp;<?php echo $action->label?></span>
						</a>
				<?php }
				}
				?>
				<?php if(!$unset_read){?>
					<a href="<?php echo $row->read_url?>" class="edit_button text text-info" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
						<span class="ui-button-text">&nbsp;<?php echo $this->l('list_view'); ?></span>
					</a>
				<?php }?>

                <!-- <?php if(!$unset_clone){?>
                    <a href="<?php echo $row->clone_url?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
                        <span class="ui-button-icon-primary ui-icon ui-icon-copy"></span>
                        <span class="ui-button-text">&nbsp;<?php echo $this->l('list_clone'); ?></span>
                    </a>
                <?php }?> -->

				<?php if(!$unset_edit){?>
					<a href="<?php echo $row->edit_url?>" class="edit_button text text-success" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-pencil"></span>
						<span class="ui-button-text">&nbsp;<?php echo $this->l('list_edit'); ?></span>
					</a>
				<?php }?>

				<?php if(!$unset_delete){?>
					<a onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')"
						href="javascript:void(0)" class="delete_button text text-danger" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-circle-minus"></span>
						<span class="ui-button-text">&nbsp;<?php echo $this->l('list_delete'); ?></span>
					</a>
				<?php }?>
			</td>
			<?php }?>
			<?php foreach($columns as $column){?>
				<td><?php echo $row->{$column->field_name}?></td>
			<?php }?>
		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<tr>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<th>
					<button class="btn btn-success waves-effect waves-light refresh-data" role="button" data-url="<?php echo $ajax_list_url; ?>">
						<span class="ui-button-icon-primary ui-icon ui-icon-refresh"></span><span class="ui-button-text">Refresh</span>
					</button>
					<a href="javascript:void(0)" role="button" class="clear-filtering btn btn-primary waves-effect waves-light">
						<span class="ui-button-icon-primary ui-icon ui-icon-arrowrefresh-1-e"></span>
						<span class="ui-button-text"><?php echo $this->l('list_clear_filtering');?></span>
					</a>
				</th>
			<?php }?>
			<?php foreach($columns as $column){?>
				<th><input type="text" name="<?php echo $column->field_name; ?>" placeholder="<?php echo $this->l('list_search').' '.$column->display_as; ?>" class="search_<?php echo $column->field_name; ?>" /></th>
			<?php }?>
		</tr>
	</tfoot>
</table>
<script type="text/javascript">
	
// 	$(document).ready(function() {
// 	    $('#<?php echo $uniqid; ?>').DataTable( {
// 	        responsive: {
// 	            details: {
// 	                type: 'column',
// 	                target: 'tr'
// 	            }
// 	        },
// 	        columnDefs: [ {
// 	            className: 'control',
// 	            orderable: false,
// 	            targets:   0
// 	        } ],
// 	        order: [ 1, 'asc' ]
//     } );
// } );
</script>
