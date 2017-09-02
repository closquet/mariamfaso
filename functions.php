<?php
/*
* Create own thumbnails
*/
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	// additional image sizes
	add_image_size( 'my_thumbnail', 392, 392, true );
	add_image_size( 'title_image', 1919, 348, true );
	
}



/**
 * custom UI admin
 */
add_action( 'admin_menu', 'remove_links_tab_menu_pages' );
function remove_links_tab_menu_pages() {
	//remove_menu_page('link-manager.php'); //liens
	//remove_menu_page('edit.php'); //article
	remove_menu_page('edit-comments.php'); //com
	remove_menu_page('users.php'); //utilisateurs
	//remove_menu_page('tools.php'); //outils
	remove_menu_page('index.php'); //tableau de board (dashboard)
    
}

/**
 * show taxo in custom post type
 */
add_filter( 'manage_taxonomies_for_projets_c//olumns', 'projets_type_columns' );
function projets_type_columns( $taxonomies ) {
	$taxonomies[] = 'project_places';
	return $taxonomies;
}
add_filter( 'manage_taxonomies_for_voyages_columns', 'voyages_type_columns' );
function voyages_type_columns( $taxonomies ) {
	$taxonomies[] = 'travel_places';
	return $taxonomies;
}

/**
 * Add custom field in taxonomy
 */
function my_taxonomy_add_meta_fields( $taxonomy ) {
	?>
	<div class="form-field term-group">
		<label for="type"><?php _e( 'Type de lieux', 'my-plugin' ); ?></label>
		<input type="text" id="type" name="type" />
    </div>
	<?php
}
add_action( 'project_places_add_form_fields', 'my_taxonomy_add_meta_fields', 10, 2 );
add_action( 'travel_places_add_form_fields', 'my_taxonomy_add_meta_fields', 10, 2 );

function my_taxonomy_edit_meta_fields( $term, $taxonomy ) {
	$type = get_term_meta( $term->term_id, 'type', true );
	?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="type"><?php _e( 'Type de lieux', 'my-plugin' ); ?></label>
		</th>
		<td>
			<input type="text" id="type" name="type" value="<?php echo $type; ?>" />
		</td>
	</tr>
	<?php
}
add_action( 'project_places_edit_form_fields', 'my_taxonomy_edit_meta_fields', 10, 2 );
add_action( 'travel_places_edit_form_fields', 'my_taxonomy_edit_meta_fields', 10, 2 );

function my_taxonomy_save_taxonomy_meta( $term_id, $tag_id ) {
	if( isset( $_POST['type'] ) ) {
		update_term_meta( $term_id, 'type', esc_attr( $_POST['type'] ) );
	}
}
add_action( 'created_project_places', 'my_taxonomy_save_taxonomy_meta', 10, 2 );
add_action( 'edited_project_places', 'my_taxonomy_save_taxonomy_meta', 10, 2 );
add_action( 'created_travel_places', 'my_taxonomy_save_taxonomy_meta', 10, 2 );
add_action( 'edited_travel_places', 'my_taxonomy_save_taxonomy_meta', 10, 2 );

function my_taxonomy_add_field_column_contents( $content, $column_name, $term_id ) {
	switch( $column_name ) {
		case 'type' :
			$content = get_term_meta( $term_id, 'type', true );
			break;
	}
	
	return $content;
}
add_filter( 'manage_project_places_custom_column', 'my_taxonomy_add_field_column_contents', 10, 3 );
add_filter( 'manage_travel_places_custom_column', 'my_taxonomy_add_field_column_contents', 10, 3 );



function theme_columns($theme_columns) {
	$new_columns = array(
		'cb' => '<input type="checkbox" />',
		'name' => __('Name'),
		'header_icon' => '',
		'description' => __('Description'),
		'slug' => __('Slug'),
		'posts' => __('Posts'),
		'type' => __('<a href="http://mariamfaso.app/wp-admin/edit-tags.php?taxonomy=travel_places&post_type=voyages&orderby=type&order=asc">Type de lieux</a>')
	);
	return $new_columns;
}
add_filter("manage_edit-project_places_columns", 'theme_columns');
add_filter("manage_edit-travel_places_columns", 'theme_columns');





/**
 * Register custom post types on INIT event
 */

add_action('init','ec_init_types');
function ec_init_types()
{
	register_post_type('projets', [
		'label' => 'Projets',
		'labels' => [
			'singular_name' => 'projet',
			'add_new' => 'Ajouter un projet',
			'all_items' => 'Tous les projets'
		],
		'description' => 'Type d\'article permettant d\'ajouter des projets à la section projets du site.',
		'menu_position' => 4,
		'public' => true,
		'capability_type' => 'post',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'excerpt'
		]
	]);
	register_taxonomy('project_places', 'projets', [
		'label' => 'Endroits',
		'labels' => [
			'singular_name' => 'endroit',
			'edit_item' => 'Éditer l\'endroit',
			'add_new_item' => 'Ajouter un nouvel endroit'
		],
		'description' => 'Endroits au quel appartient le projet.',
		'public' => true,
		'hierarchical' => true
	]);
	
	register_post_type('voyages', [
		'label' => 'Voyages',
		'labels' => [
			'singular_name' => 'voyage',
			'add_new' => 'Ajouter un voyage',
			'all_items' => 'Tous les voyages'
		],
		'description' => 'Type d\'article permettant d\'ajouter des voyages à la section voyages du site.',
		'menu_position' => 5,
		'public' => true,
		'capability_type' => 'post',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'excerpt'
		]
	]);
	register_taxonomy('travel_places', 'voyages', [
		'label' => 'Endroits',
		'labels' => [
			'singular_name' => 'endroit',
			'edit_item' => 'Éditer l\'endroit',
			'add_new_item' => 'Ajouter un nouvel endroit'
		],
		'description' => 'Endroits au quel appartient le voyage.',
		'public' => true,
		'hierarchical' => true
	]);
	
	register_post_type('agenda', [
		'label' => 'Agenda',
		'labels' => [
			'singular_name' => 'évenement',
			'add_new' => 'Ajouter un évenement',
			'all_items' => 'Tous les évenements'
		],
		'description' => 'Type d\'article permettant d\'ajouter des évenements à la section agenda du site.',
		'menu_position' => 6,
		'public' => true,
		'capability_type' => 'post',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'excerpt'
		]
	]);
	
}

/*
 * Return the terms taxonomy for current post (in the loop)
 */
function ec_get_the_terms($glue = '', $prefix = '', $suffix = '', $taxo)
{
	$terms = wp_get_post_terms(get_the_ID(), $taxo, ['orderby' => 'name', 'order' => 'ASC', 'fields' => 'all']);
	
	if(!$terms) return '';
	
	return implode($glue,
		array_map(
			function($term) use ($prefix, $suffix){
				return str_replace(':type', get_term_meta($term->term_id)['type'][0], $prefix) . $term->name . $suffix;
			},
			$terms)
	);
}

/*
 * Output the terms taxonomy for current post (in the loop)
 */
function ec_the_terms($glue = '', $prefix = '', $suffix = '', $taxo)
{
	echo ec_get_the_terms($glue, $prefix, $suffix, $taxo);
}





/*
 * Register navigation menu
 */
register_nav_menus([
	'aside'=>'Menu du aside.',
	'header'=>'Menu du header.'
	]);

/*
 * Get menu items
 */
function ec_get_nav_items($location)
{
	$id = ec_get_nav_id($location);
	if(!$id) return [];
	$nav = [];
	$children = [];
	foreach (wp_get_nav_menu_items($id) as $object) {
		$item = new stdClass();
		$item->link = $object->url;
		$item->label = $object->title;
		$item->children = [];
		
		if($object->menu_item_parent) {
			$item->parent = $object->menu_item_parent;
			$children[] = $item;
		}
		else {
			$nav[$object->ID] = $item;
		}
	}
	foreach ($children as $item) {
		$nav[$item->parent]->children[] = $item;
	}
	return $nav;
}

/*
 * Get menu ID from location
*/
function ec_get_nav_id($location)
{
	foreach (get_nav_menu_locations() as $navLocation => $id) {
		if($navLocation == $location) return $id;
	}
	return false;
}

/*
 * Get theme asset URI (pour avoir un bon chemin url pour les fichiers css/js)
*/
function ec_get_uri_asset($resource){
return get_template_directory_uri() . '/assets/' . trim($resource, '/'); //trim, enlève le second éléments (le /) de la string du premier élément ($resouce) au début et à la fin.
}

/*
 * Output theme asset URI
 */
function ec_asset($resource){
echo ec_get_uri_asset($resource);
}

/**
 *  Get a customizable excerpt
 */
function ec_get_the_excerpt($length = null)
{
	$excerpt_tmp = get_the_excerpt();
	if(is_null($length) || strlen($excerpt_tmp) <= $length) return $excerpt_tmp;
	$excerpt_tmp = substr( $excerpt_tmp, 0, $length);
	$excerpt_tmp_array = explode( ' ', $excerpt_tmp);
	unset( $excerpt_tmp_array[count( $excerpt_tmp_array) - 1]);
	$excerpt = implode( ' ', $excerpt_tmp_array);
	return trim( $excerpt ) . '&hellip;';
}

/**
 *  Output a customizable excerpt
 */
function ec_the_excerpt($length = null)
{
	echo ec_get_the_excerpt($length);
}

/*
 * fil d'ariane
 */
function ec_fildarian(){
	$def = "index";
	$dPath = $_SERVER['REQUEST_URI'];
	$dChunks = explode("/", $dPath);
	
	echo('<a class="link" href="/">Accueil</a><span class="arian-sep">  >  </span>');
	for($i=1; $i<count($dChunks)-1; $i++ ){
		echo('<a class="link" href="/');
		for($j=1; $j<=$i; $j++ ){
			echo($dChunks[$j]);
			if($j!=count($dChunks)-1){ echo("/");}
		}
		
		if($i==count($dChunks)-2){
			$prChunks = explode(".", $dChunks[$i]);
			if ($prChunks[0] == $def) $prChunks[0] = "";
			$prChunks[0] = $prChunks[0] . "</a>";
		}
		else $prChunks[0]=$dChunks[$i] . '</a><span class="dynNav">  >  </span>';
		echo('">');
		echo(str_replace("_" , " " , $prChunks[0]));
	}
}

/*
 * Get a converted  date format from jj/mm/aaa to jj-mm-aaaa
 */

function ec_get_html_date_field($field_name){
    $mydate = get_field($field_name);
    $mydate = str_replace( '/', '-', $mydate);
    return $mydate;
}

/*
 * Output a converted  date format from jj/mm/aaa to jj-mm-aaaa
 */

function ec_the_html_date_field($field_name){
	echo ec_get_html_date_field($field_name);
}