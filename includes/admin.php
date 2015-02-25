<?php $plugin_file_url = plugins_url() . '/'; ?>
<div id="gmoGoogleMapWrap" class="wrap clearfix">

	<h2>GMO　Google　Map</h2>
	<hr>
	
	<div id="gmoplugLeft">
	<form method="post" action="">
		<table class="form-table">
			<tr>
				<td>Address</td>
				<td><input name="input_Address" type="text" id="add_text" value="<?php $post_address ?>" class="regular-text gmo_google_map_Address" /></td>
			</tr>
			<tr>
				<td>Width</td>
				<td><input name="input_Width" type="text" id="add_text" value="<?php $post_width ?>" class="regular-text gmo_google_map_Width" /><span class="after">px</span></td>
			</tr>
			<tr>
				<td>Height</td>
				<td><input name="input_Height" type="text" id="add_text" value="<?php $post_height ?>" class="regular-text gmo_google_map_Height" /><span class="after">px</span></td>
			</tr>
			<tr>
				<td>Zoom</td>
				<td><input name="input_Zoom" type="text" id="add_text" value="<?php $post_zoom ?>" class="regular-text gmo_google_map_Zoom" /><span class="gmo_google_map_Ex">Min:1 Max:22 Default:16</span></td>
			</tr>
			<tr>
				<td>breakpoint</td>
				<td><input name="input_Breakpoint" type="text" id="add_text" value="<?php $post_breakpoint ?>" class="regular-text gmo_google_map_Breakpoint" /><span class="after">px</span></td>
			</tr>
			<tr>
				<td colspan="2" class="gmo_google_map_Save"><input type="submit" name="Submit" class="button-primary" value="Save" /></td>
			</tr>
		</table>
	</form>

<?php
	function get_information(){
		print('<p class="gmo_google_map_shortCode">Short Code</p><textarea cols="50" rows="2" readonly="readonly" onclick="this.select()">[map addr="'.htmlspecialchars($_POST['input_Address'], ENT_QUOTES).'"');
		print(' width="'.htmlspecialchars($_POST['input_Width'], ENT_QUOTES).'px"');
		print(' height="'.htmlspecialchars($_POST['input_Height'], ENT_QUOTES).'px"');
		print(' zoom="'.htmlspecialchars($_POST['input_Zoom'], ENT_QUOTES).'"');
		print(' breackpoint="'.htmlspecialchars($_POST['input_Breakpoint'], ENT_QUOTES).'"]</textarea>');
	}
	get_information();

?>

	</div><!-- gmoplugLeft -->

    <div id="gmoplugRight">
    <p class="title">Recommended</p>
    <div>
    <h3>WordPress Themes</h3>
    <a href="https://www.wpcloud.jp/en/themes/?banner_id=plugins" target="_blank"><img src="<?php echo ($plugin_file_url.'gmo-google-map/images/'.'wpcloud_bnr_themes.png'); ?>" alt="WordPress Themes for Everyone"></a>
    <p>Browse our recommended theme collection on GMO WP Cloud website.</p>
    <h3>WordPress Plugins</h3>
    <a href="https://www.wpcloud.jp/en/themes/?banner_id=plugins#plugins" target="_blank"><img src="<?php echo ($plugin_file_url.'gmo-google-map/images/'.'wpcloud_bnr_plugins.png'); ?>" alt="WordPress Plugins for Everyone"></a>
    <p>Browse our recommended plugin collection on GMO WP Cloud website.</p>
    <h3>Who We Are</h3>
    <a href="https://www.wpcloud.jp/en/?banner_id=plugins" target="_blank" class="logo"><img src="<?php echo ($plugin_file_url.'gmo-google-map/images/'.'wpcloud_logo.png'); ?>" alt="WPCloud by GMO"></a>
    </div>
    </div><!-- #gmoplugRight -->

</div><!-- #gmoGoogleMapWrap -->

<!--script type="text/javascript">
var url = '<?php echo admin_url('admin-ajax.php?action=fonts'); ?>';
var settings = <?php echo json_encode(get_option('gmofontagent-styles', array())); ?>;
</script -->
