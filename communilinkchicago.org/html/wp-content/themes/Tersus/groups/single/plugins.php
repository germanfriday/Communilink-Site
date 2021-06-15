<?php get_header( 'buddypress' ); ?>

	<?php if( empty ( $NV_layout ) ) $NV_layout=get_option("buddylayout"); ?>
	<?php if($NV_layout!="layout_four" && $NV_layout!="layout_five") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">

		<article class="padder">
			<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_plugin_template' ); ?>

			<div id="item-header">
				<?php locate_template( array( 'groups/single/group-header.php' ), true ); ?>
			</div><!-- #item-header -->

			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>
						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_group_plugin_options_nav' ); ?>
					</ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body">

				<?php do_action( 'bp_before_group_body' ); ?>

				<?php do_action( 'bp_template_content' ); ?>

				<?php do_action( 'bp_after_group_body' ); ?>
			</div><!-- #item-body -->

			<?php do_action( 'bp_after_group_plugin_template' ); ?>

			<?php endwhile; endif; ?>

		</article>
	</div><!-- #content -->

	<?php get_sidebar( 'buddypress' ); ?>

<?php get_footer( 'buddypress' ); ?>