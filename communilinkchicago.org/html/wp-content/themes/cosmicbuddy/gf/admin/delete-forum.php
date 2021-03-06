<?php
$forum_options=gf_forum_prepare_fields(gf_get_current_forum_id());
$deleted_forum = bb_get_forum( gf_get_current_forum_id() );
?>
<form class="delete-forum standard-form" method="post" id="delete-forums" action="">
	<fieldset>
		<legend><?php _e('Delete Forum'); ?></legend>
		<p><?php _e('This forum contains:'); ?></p>
		<ul>
			<li><?php printf(__ngettext('%d topic', '%d topics', $deleted_forum->topics), $deleted_forum->topics); ?></li>
			<li><?php printf(__ngettext('%d post', '%d posts', $deleted_forum->posts), $deleted_forum->posts); ?></li>
		</ul>
		<div id="option-forum-delete-contents">
			<div class="label"><?php _e( 'Action' ); ?></div>
			<div class="inputs">
				<label class="radios">
					<input type="radio" name="move_topics" id="move-topics-delete" value="delete" /> <?php _e('Delete all topics and posts in this forum. <em>This can never be undone.</em>'); ?>
				</label>
				<label class="radios">
					<input type="radio" name="move_topics" id="move-topics-move" value="move" checked="checked" /> <?php _e('Move topics from this forum into the replacement forum below.'); ?>
				</label>
			</div>
		</div>
		<div id="option-forum-delete-contents">
			<label for="move-topics-forum"><?php _e( 'Replacement forum' ); ?></label>
			<div class="inputs">
				<?php echo gf_get_forum_dropdown( array('id' => 'move_topics_forum', 'callback' => 'strcmp', 'callback_args' => array($deleted_forum->forum_id), 'selected' => $deleted_forum->forum_parent) ); ?>
			</div>
		</div>
	</fieldset>
	<fieldset class="submit">
		<?php wp_nonce_field( 'delete-forums' ); ?>
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="forum_id" value="<?php echo $deleted_forum->forum_id; ?>" />
		<input class="submit delete" type="submit" name="submit" value="<?php _e('Delete Forum') ?>" />
	</fieldset>
</form>
