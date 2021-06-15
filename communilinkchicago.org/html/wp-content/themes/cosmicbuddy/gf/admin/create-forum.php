<?php
$forum_options=gf_forum_prepare_fields();
?>
<h2>Create New Forum</h2>
<form class="standard-form" method="post" id="create-forum" action="<?php echo gf_get_forum_create_link();?>">
	<fieldset>
		<legend><?php echo $legend; ?></legend>
<?php
foreach ($forum_options as $option => $args ) {
	bb_option_form_element( $option, $args );
}
?>
	<fieldset class="submit">
<?php if ( $forum_id ) : ?>
		<input type="hidden" name="forum_id" value="<?php echo $forum_id; ?>" />
<?php endif; ?>
		<?php wp_nonce_field( 'gf_create_forum' ); ?>
		<input type="hidden" name="action" value="<?php echo $action; ?>" />
		<input class="submit" type="submit" name="save-forum" value="Create Forum" />
	</fieldset>
</form>
<?php


?>