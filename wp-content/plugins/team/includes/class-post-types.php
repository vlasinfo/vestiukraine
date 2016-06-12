<?php

/*
* @Author 		ParaTheme
* @Folder	 	Team/Includes
* @version     0.0.0

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 	

class team_class_post_types{
	
	
	public function __construct(){
		add_action( 'init', array( $this, 'team_posttype_team_member' ), 0 );
		add_action( 'init', array( $this, 'team_posttype_team' ), 0);		
		
		}
	
	
	public function team_posttype_team_member(){
			
		if ( post_type_exists( "team_member" ) )
		return;
	 
		$singular  = __( 'Сотрудник', 'team' );
		$plural    = __( 'Сотрудники', 'team' );
	 
	 	$team_member_slug = get_option('team_member_slug');
		
		if(empty($team_member_slug)) {$team_member_slug = 'team_member';}
		
	 
		register_post_type( "team_member",
			apply_filters( "register_post_type_team_member", array(
				'labels' => array(
					'name' 					=> $plural,
					'singular_name' 		=> $singular,
					'menu_name'             => __( 'Сотрудник', 'team' ),
					'all_items'             => sprintf( __( 'Все %s', 'team' ), $plural ),
					'add_new' 				=> __( 'Добавить', 'team' ),
					'add_new_item' 			=> sprintf( __( 'Добавить %s', 'team' ), $singular ),
					'edit' 					=> __( 'Редактировать', 'team' ),
					'edit_item' 			=> sprintf( __( 'Редактировать %s', 'team' ), $singular ),
					'new_item' 				=> sprintf( __( 'Новый %s', 'team' ), $singular ),
					'view' 					=> sprintf( __( 'Смотреть %s', 'team' ), $singular ),
					'view_item' 			=> sprintf( __( 'Смотреть %s', 'team' ), $singular ),
					'search_items' 			=> sprintf( __( 'Поиск %s', 'team' ), $plural ),
					'not_found' 			=> sprintf( __( 'No %s found', 'team' ), $plural ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s found in trash', 'team' ), $plural ),
					'parent' 				=> sprintf( __( 'Parent %s', 'team' ), $singular )
				),
				'description' => sprintf( __( 'This is where you can create and manage %s.', 'team' ), $plural ),
				'public' 				=> true,
				'show_ui' 				=> true,
				'capability_type' 		=> 'post',
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
				'hierarchical' 			=> false,
				'rewrite' 				=> array( 'slug' => $team_member_slug ),
				'query_var' 			=> true,
				'supports' 				=> array( 'title','editor','thumbnail','custom-fields' ),
				'show_in_nav_menus' 	=> false,
				'show_in_menu' 	=> 'edit.php?post_type=team',	
				'menu_icon' => 'dashicons-admin-users',

			) )
		); 
	 
			$singular  = __( 'Группа', 'team' );
			$plural    = __( 'Группы', 'team' );
	 
			register_taxonomy( "team_group",
				apply_filters( 'register_taxonomy_team_group_object_type', array( 'team_member' ) ),
	       	 	apply_filters( 'register_taxonomy_team_group_args', array(
		            'hierarchical' 			=> true,
		            'show_admin_column' 	=> true,					
		            'update_count_callback' => '_update_post_term_count',
		            'label' 				=> $plural,
		            'labels' => array(
						'name'              => $plural,
						'singular_name'     => $singular,
						'menu_name'         => ucwords( $plural ),
						'search_items'      => sprintf( __( 'Search %s', 'team' ), $plural ),
						'all_items'         => sprintf( __( 'All %s', 'team' ), $plural ),
						'parent_item'       => sprintf( __( 'Parent %s', 'team' ), $singular ),
						'parent_item_colon' => sprintf( __( 'Parent %s:', 'team' ), $singular ),
						'edit_item'         => sprintf( __( 'Edit %s', 'team' ), $singular ),
						'update_item'       => sprintf( __( 'Update %s', 'team' ), $singular ),
						'add_new_item'      => sprintf( __( 'Add New %s', 'team' ), $singular ),
						'new_item_name'     => sprintf( __( 'New %s Name', 'team' ),  $singular )
	            	),
		            'show_ui' 				=> true,
		            'public' 	     		=> true,
				    'rewrite' => array(
						'slug' => 'team_group', // This controls the base slug that will display before each term
						'with_front' => false, // Don't display the category base before "/locations/"
						'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
				),
		        ) )
		    );
	 

		
			}
	
	public function team_posttype_team(){
		if ( post_type_exists( "team" ) )
		return;

		$singular  = __( 'Команда', 'team' );
		$plural    = __( 'Команды', 'team' );
	 
	 
		register_post_type( "team",
			apply_filters( "register_post_type_team", array(
				'labels' => array(
					'name' 					=> $plural,
					'singular_name' 		=> $singular,
					'menu_name'             => __( 'Команда', 'team' ),
					'all_items'             => sprintf( __( 'Все %s', 'team' ), $plural ),
					'add_new' 				=> __( 'Создать команду', 'team' ),
					'add_new_item' 			=> sprintf( __( 'Добавить %s', 'team' ), $singular ),
					'edit' 					=> __( 'Редактировать', 'team' ),
					'edit_item' 			=> sprintf( __( 'Редактировать %s', 'team' ), $singular ),
					'new_item' 				=> sprintf( __( 'Новая %s', 'team' ), $singular ),
					'view' 					=> sprintf( __( 'Посмотреть %s', 'team' ), $singular ),
					'view_item' 			=> sprintf( __( 'Посмотреть %s', 'team' ), $singular ),
					'search_items' 			=> sprintf( __( 'Найти %s', 'team' ), $plural ),
					'not_found' 			=> sprintf( __( 'Не найдено %s', 'team' ), $plural ),
					'not_found_in_trash' 	=> sprintf( __( 'Не найдено в корзине %s', 'team' ), $plural ),
					'parent' 				=> sprintf( __( 'Родительская %s', 'team' ), $singular )
				),
				'description' => sprintf( __( 'This is where you can create and manage %s.', 'team' ), $plural ),
				'public' 				=> true,
				'show_ui' 				=> true,
				'capability_type' 		=> 'post',
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
				'hierarchical' 			=> false,
				'rewrite' 				=> true,
				'query_var' 			=> true,
				'supports' 				=> array( 'title'),
				'show_in_nav_menus' 	=> false,
				'menu_icon' => 'dashicons-admin-users',
			) )
		); 
	 
	 
		}
	
	
	
	
	
	}
	
	new team_class_post_types();