<div class="forums">
<?php if(gf_current_user_can_admin()):?>
	<?php
	//it is a copy paste/edit of wpmu-users.php, we will make it much better in next version
	include_once(ABSPATH.WPINC."/user.php");
	include_once(ABSPATH."wp-admin/includes/user.php");
    ?>
<div class="users">
	<?php
	$apage = isset( $_GET['apage'] ) ? intval( $_GET['apage'] ) : 1;
	$num = isset( $_GET['num'] ) ? intval( $_GET['num'] ) :5;
	$s = wp_specialchars( trim( $_GET[ 's' ] ) );

	$query = "SELECT * FROM {$wpdb->users}";

	if( !empty( $s ) ) {
		$search = '%' . trim( $s ) . '%';
		$query .= " WHERE user_login LIKE '$search' OR user_email LIKE '$search'";
	}

	if( !isset($_GET['sortby']) ) {
		$_GET['sortby'] = 'id';
	}

	if( $_GET['sortby'] == 'email' ) {
		$query .= ' ORDER BY user_email ';
	} elseif( $_GET['sortby'] == 'id' ) {
		$query .= ' ORDER BY ID ';
	} elseif( $_GET['sortby'] == 'login' ) {
		$query .= ' ORDER BY user_login ';
	} elseif( $_GET['sortby'] == 'name' ) {
		$query .= ' ORDER BY display_name ';
	} elseif( $_GET['sortby'] == 'registered' ) {
		$query .= ' ORDER BY user_registered ';
	}
	
	$query .= ( $_GET['order'] == 'DESC' ) ? 'DESC' : 'ASC';

	if( !empty( $s )) {
		$total = $wpdb->get_var( str_replace('SELECT *', 'SELECT COUNT(ID)', $query) );
	} else {
		$total = $wpdb->get_var( "SELECT COUNT(ID) FROM {$wpdb->users}");
	}

	$query .= " LIMIT " . intval( ( $apage - 1 ) * $num) . ", " . intval( $num );

	$user_list = $wpdb->get_results( $query, ARRAY_A );

	// Pagination
	$user_navigation = paginate_links( array(
		'total' => ceil($total / $num),	
		'current' => $apage,
		'base' => add_query_arg( 'apage', '%#%' ),
		'format' => ''
	));
	
	if ( $user_navigation ) {
		$user_navigation = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s' ) . '</span>%s',
			number_format_i18n( ( $apage - 1 ) * $num + 1 ),
			number_format_i18n( min( $apage * $num, $total ) ),
			number_format_i18n( $total ),
			$user_navigation
		);
	}
	
	?>
	<div class="wrap">
	<h2> <?php _e("Manage Users"); ?></h2>
	<form action="" method="get" class="search-form">
		<p class="search-box">
		<input type="text" name="s" value="<?php if (isset($_GET['s'])) _e( stripslashes( $s ) ); ?>" class="search-input" id="user-search-input" />
		<input type="submit" id="post-query-submit" value="<?php _e('Search Users') ?>" class="button" />
		</p>
	</form>
	<br class="clear" />
	</div>

	<form id="form-user-list" action='' method='post'>
		<div class="navigation">
			<?php if ( $user_navigation ) echo "<div class='tablenav-pages'>$user_navigation</div><br class='clear' />"; ?>

			<div class="alignleft actions">
				
				<input type="submit" value="<?php _e('Mark as Spammers') ?>" name="alluser_spam" class="button-secondary" />
				<input type="submit" value="<?php _e('Not Spam') ?>" name="alluser_notspam" class="button-secondary" />
				<?php wp_nonce_field( 'allusers' ); ?>
				<br class="clear" />
			</div>
			<br class="clear" />
		</div>

		

		<?php
		// define the columns to display, the syntax is 'internal name' => 'display name'
		$posts_columns = array(
			'checkbox'	 => '',
			'name'       => __('Name'),
			'login'      => __('Username'),
			'email'      => __('E-mail'),
			'registered' => __('Registered'),
			'posts'      => ''
		);
		$posts_columns = apply_filters('wpmu_users_columns', $posts_columns);
		?>
		<table class="widefat" cellspacing="0">
			<thead>
			<tr>
				<?php foreach( (array) $posts_columns as $column_id => $column_display_name) {
					if( $column_id == 'posts' ) {
						echo '<th scope="col">'.__('No of Posts').'</th>';
					} elseif( $column_id == 'checkbox') {
						echo '<th scope="col" class="check-column"><input type="checkbox" /></th>';
					} else { ?>
						<th scope="col"><a href="<?php echo gf_get_manage_users_link();?>?sortby=<?php echo $column_id ?>&amp;<?php if( $_GET['sortby'] == $column_id ) { if( $_GET['order'] == 'DESC' ) { echo "order=ASC&amp;" ; } else { echo "order=DESC&amp;"; } } ?>apage=<?php echo $apage ?>"><?php echo $column_display_name; ?></a></th>
					<?php } ?>
				<?php } ?>
			</tr>
			</thead>
			<tbody id="users" class="list:user user-list">
			<?php if ($user_list) {
				$bgcolor = '';
				foreach ( (array) $user_list as $user) {
				$user_id=$user['ID'];
					$class = ('alternate' == $class) ? '' : 'alternate';
					
					$status_list = array( "spam" => "#faa", "deleted" => "#f55" );
					
					$bgcolour = "";
					foreach ( $status_list as $status => $col ) {
						if( $user[$status] ) {
							$bgcolour = "style='background: $col'";
						}
					}
                                        if(gf_is_user_banned($user_id))
                                            $bgcolour = "style='background:#faa'";
					?>

					<tr <?php echo $bgcolour; ?> class="<?php echo $class; ?>">
					<?php
					foreach( (array) $posts_columns as $column_name=>$column_display_name) :
						switch($column_name) {
							case 'checkbox': ?>
								<th scope="row" class="check-column"><input type='checkbox' id='user_<?php echo $user['ID'] ?>' name='allusers[]' value='<?php echo $user['ID'] ?>' /></th>
							<?php 
							break;

							case 'name':
							
								$avatar	= bp_core_fetch_avatar( array("item_id"=>$user_id));
								?>	<td class="name column-name">
									<?php echo $avatar; ?><strong><?php echo bp_core_get_userlink($user_id);?></strong>
									<br/>
									<div class="row-actions">
                                                                            <?php if(!gf_is_user_banned($user_id)):?>
                                                                                        <a href="<?php echo gf_get_user_ban_link($user_id); ?>"><?php _e("Ban","gf");?></a>
                                                                            <?php else:
                                                                                ?>
                                                                               <a href="<?php echo gf_get_user_unban_link($user_id); ?>"><?php _e("Unban","gf");?></a>
                                                                             <?php endif;?>
                                                                             <?php if(!gf_is_user_mod($user_id)):?>
                                                                                        <a href="<?php echo gf_get_user_promote_mod_link($user_id);?>"><?php _e("Promote to Mod","gf");?></a>
                                                                              <?php endif;?>
                                                                              <?php if(!gf_is_user_admin($user_id)):?>
                                                                                <a href="<?php echo gf_get_user_promote_admin_link($user_id);?>"><?php _e("Prmote to Admin","gf");?></a>
                                                                              <?php endif;?>

                                                                               <?php if(gf_is_user_admin($user_id)||gf_is_user_mod($user_id)):?>
                                                                                <a href="<?php echo gf_get_user_demote_link($user_id);?>"><?php _e("Demote","gf");?></a>

                                                                                <?php endif;?>
										
									</div>
								</td>
							<?php
							break;

							case 'login': ?>
								<td class="username column-username"><?php echo $user['user_login'] ?></td>
							<?php
							break;

							case 'email': ?>
								<td class="email column-email"><a href="mailto:<?php echo $user['user_email'] ?>"><?php echo $user['user_email'] ?></a></td>
							<?php
							break;

							case 'registered': ?>
								<td><?php echo mysql2date(__('Y-m-d \<\b\r \/\> g:i a'), $user['user_registered']); ?></td>
							<?php
							break;

							case 'posts': 
								$blogs = get_blogs_of_user( $user['ID'], true );
								?>
								<td>
									10
								</td>
							<?php
							break;

							default: ?>
								<td><?php do_action('manage_users_custom_column', $column_name, $user['ID']); ?></td>
							<?php
							break;
						}
					endforeach
					?>
					</tr> 
					<?php
				}
			} else {
			?>
				<tr style='background-color: <?php echo $bgcolor; ?>'> 
					<td colspan="<?php echo (int) count($posts_columns); ?>"><?php _e('No users found.') ?></td> 
				</tr> 
				<?php
			} // end if ($users)
			?> 
			</tbody>
		</table>
		
		<div class="navigation">
			<?php if ( $user_navigation ) echo "<div class='tablenav-pages'>$user_navigation</div><br class='clear' />"; ?>

			<div class="alignleft">
				
				<input type="submit" value="<?php _e('Mark as Spammers') ?>" name="alluser_spam" class="button-secondary" />
				<input type="submit" value="<?php _e('Not Spam') ?>" name="alluser_notspam" class="button-secondary" />
				<?php wp_nonce_field( 'allusers' ); ?>
				<br class="clear" />
			</div>
		</div>
	</form>
</div>
<?php else:?>
<div class="messagae error"><p><?php _e("You don't have access to this page","gf");?></p></div>
<?php endif;?>

</div>