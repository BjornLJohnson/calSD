<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    calSD
 * @subpackage calSD/includes
 * @author     Your Name <bjorn@lundjohnson.com>
 */
class CalSD_Activator {


	/**
	 * Adds listing page.
	 * 
	 * This function creates our main listing page, if it does not already exist
	 * 
	 * @since 1.0.0
	 */
	private static function createListingsPages() {
		global $wpdb;
		$current_user = wp_get_current_user();

		if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'calsd-listings'", 'ARRAY_A' ) ) {

          // define page characteristics
		  $listingsPage = array(
			'post_title'  => 'CalSD Listings',
			'post_status' => 'publish',
			'post_author' => $current_user->ID,
			'post_type'   => 'page',
		  );

		  $newListingPage = array(
			'post_title'  => 'CalSD Add Listing',
			'post_status' => 'publish',
			'post_author' => $current_user->ID,
			'post_type'   => 'page',
		  );

		  $listingsTemplate = plugin_dir_path( __FILE__ ) . "templates/listings-template.php";

		  $newListingTemplate = plugin_dir_path( __FILE__ ) . "templates/new-listing-template.php";
		  
		  // insert the pages into the database
		  $listingsPageID = wp_insert_post( $listingsPage );

		  $newListingPageID = wp_insert_post( $newListingPage );

		  update_post_meta($listingsPageID, ‘_wp_page_template’, $listingsTemplate);
		  update_post_meta($newListingPageID, ‘_wp_page_template’, $newListingTemplate);

		  // save page ids into database
		  update_option( 'listingsPageID', $listingsPageID );
		  update_option( 'newListingPageID', $newListingPageID );
		}
	}

	/**
	 * Runs all activation functions
	 * 
	 * @since    1.0.0
	 */
	public static function activate() {
		CalSD_Activator::createListingsPages();
	}
}