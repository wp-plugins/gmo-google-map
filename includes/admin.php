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
	<h3>How to Use</h3>
	<ul>
	<li><a href="http://support.wpshop.com/?p=535" target="_blank">How to use the GMO Google Map</a></li>
	</ul>
	<h3>WordPress Themes</h3>
	<ul>
	<li><a href="https://wordpress.org/themes/kotenhanagara" target="_blank">Kotehanagara</a></li>
	<li><a href="https://wordpress.org/themes/madeini" target="_blank">Madeini</a></li>
	<li><a href="https://wordpress.org/themes/azabu-juban" target="_blank">Azabu Juban</a></li>
	<li><a href="http://wordpress.org/themes/de-naani" target="_blank">de naani</a></li>
	</ul>
	<a href="http://wpshop.com/themes?=vn_wps_showtime" target="_blank"><img src="<?php echo ($plugin_file_url.'gmo-google-map/images/'.'wpshop_bnr_themes.png'); ?>" alt="WPShop by GMO WordPress Themes for Everyone!"></a>
	<ul><li class="bnrlink"><a href="http://wpshop.com/themes?=wps_showtime" target="_blank">Visit WP Shop Themes</a></li></ul>
	<h3>WordPress Plugins</h3>
	<ul>
	<li><a href="http://wordpress.org/plugins/gmo-showtime/" target="_blank">GMO Showtime</a></li>
	<li><a href="http://wordpress.org/plugins/gmo-font-agent/" target="_blank">GMO Font Agent</a></li>
	<li><a href="http://wordpress.org/plugins/gmo-share-connection/" target="_blank">GMO Share Connection</a></li>
	<li><a href="http://wordpress.org/plugins/gmo-ads-master/" target="_blank">GMO Ads Master</a></li>
	<li><a href="http://wordpress.org/plugins/gmo-page-transitions/" target="_blank">GMO Page Trasitions</a></li>
	<li><a href="http://wordpress.org/plugins/gmo-go-to-top/" target="_blank">GMO Go to Top</a></li>
	</ul>
	<a href="http://wpshop.com/plugins?=vn_wps_showtime" target="_blank"><img src="<?php echo ($plugin_file_url.'gmo-google-map/images/'.'wpshop_bnr_plugins.png'); ?>" alt="WPShop by GMO WordPress Plugins for Everyone!"></a>
	<ul><li class="bnrlink"><a href="http://wpshop.com/plugins?=wps_showtime" target="_blank">Visit WP Shop Plugins</a></li></ul>
	<h3>Contact Us</h3>
	<a href="http://support.wpshop.com/?page_id=15" target="_blank"><img src="<?php echo ($plugin_file_url.'gmo-google-map/images/'.'wpshop_logo.png'); ?>" alt="WPShop by GMO"></a>
	</div><!-- #gmoplugRight -->

</div><!-- #gmoGoogleMapWrap -->

<!--script type="text/javascript">
var url = '<?php echo admin_url('admin-ajax.php?action=fonts'); ?>';
var settings = <?php echo json_encode(get_option('gmofontagent-styles', array())); ?>;
</script -->
