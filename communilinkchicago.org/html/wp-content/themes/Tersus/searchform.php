<form method="get" id="searchform" action="<?php echo home_url(); ?>">
	<fieldset>
	<input type="text" value="<?php _e('Search', 'NorthVantage' ); ?>" name="s" id="s" onfocus="if(this.value == '<?php _e('Search', 'NorthVantage' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search', 'NorthVantage' ); ?>';}" />
	<input type="submit" id="searchsubmit" value="&nbsp;" />
	</fieldset>
</form>