<?php if ( gf_current_user_can_admin()||gf_current_user_can_mod() ) : ?>
<!-- mimick bbpress dashboard-->
<div class="admin">
<div class="dashboard" id="dashboard-right-now">
    <h3><?php _e("Right Now","gf");?></h3>
	<?php $forum=bb_get_forum(gf_get_root_forum_id());
	?>
	<div class="table">
            <table cellspacing="0" cellpadding="0">
		<thead>
                    <tr>
			<th>Totals</th>
			<th>Per Day</th>
                    </tr>
		</thead>
		<tbody>
                    <tr>
                        <td><a href="<?php echo gf_get_forum_manage_link();?>"><span> <?php echo gf_get_total_forums_count();?></span> <?php _e("forums","gf");?></a></td>
			<td>N/A</td>
                    </tr>
                    <tr>
			<td><span><?php echo gf_get_total_topic_count();?></span> topics</td>
			<td><span>N/A</span> </td>
                    </tr>
                    <tr>
                        <td><span><?php echo gf_get_total_posts_count();?></span> posts</td>
                        <td><span>N/A</span> </td>
                    </tr>
                    <tr>
                        <td><span><?php echo gf_get_total_tags();?></span> tags</td>
                        <td><span>N/A</span> </td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo gf_get_manage_users_link();?>"><span> <?php echo gf_get_total_users();?></span> users</a></td>
			<td><span>N/A</span></td>
                    </tr>
		</tbody>
            </table>
	</div>

		
</div>
</div>
<?php else: ?>

    <div id="message" class="info">
    	<p><?php _e( 'You don\'t have sufficient rights.', 'gf' ) ?></p>
    </div>

<?php endif;?>