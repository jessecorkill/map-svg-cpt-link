<?
if( function_exists('acf_add_options_page') ):

acf_add_options_page(array(
	'page_title' => 'MSCL',
	'menu_slug' => 'admin-mapsvg-cpt-link',
	'menu_title' => 'MapSVG CPT Link',
	'capability' => 'edit_plugins',
	'position' => '100',
	'parent_slug' => 'mapsvg-config',
	'icon_url' => '',
	'redirect' => true,
	'post_id' => 'options',
	'autoload' => false,
	'update_button' => 'Update',
	'updated_message' => 'MSCL Updated',
));

endif;
