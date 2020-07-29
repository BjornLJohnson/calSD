<?php 

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    calSD
 * @subpackage calSD/includes
 * @author     Your Name <bjorn@lundjohnson.com>
 */
class CalSD_Deactivator {

	/**
	 * Removes listings pages.
	 * 
	 * This function deletes the pages associated with the calsd plugin from the site
	 */
	private static function deleteListingsPages() {
		$listingsID = get_option('listingsPageID');
		if( $listingsID ) {
			wp_delete_post( $listingsID ); // this will trash, not delete
		}

		$newListingID = get_option('newListingPageID');
		if( $newListingID ) {
			wp_delete_post( $newListingID ); // this will trash, not delete
		}
	}
	/**
	 * Runs all deactivation functions
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		CalSD_Deactivator::deleteListingsPages();
	}
}