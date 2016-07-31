<?php
add_action("init", function(){
	register_post_type("recipe", array(
		"supports" => array("title", "editor", "post-formats", "author", "thumbnail", "excerpt", "comments"),
		"public" => true,
		"description" => "Recipes from the HPI Cooking Club",
		"has_archhive" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-carrot",
		"labels" => array(
			"name" => "Recipes",
			"singular_name" => "Recipe",
			"add_new_item" => "Add New Recipe",
			"view_item" => "View Recipe",
			"search_items" => "Search Recipes",
			"not_found" => "No Recipes found",
		)
	));
});
add_action("widgets_init", function(){
	register_sidebar(array(
		'id' => 'recipe',
		'name' => __( 'Recipe' )
	));
});
add_theme_support("post-thumbnails");
add_filter("pre_get_posts", function($query){
	if((is_home() || is_archive()) && $query->is_main_query())
		$query->set("post_type", array("post", "recipe"));
	return $query;
});
