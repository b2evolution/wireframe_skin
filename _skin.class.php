<?php
/**
 * This file implements a class derived of the generic Skin class in order to provide custom code for
 * the skin in this folder.
 *
 * This file is part of the b2evolution project - {@link http://b2evolution.net/}
 *
 * @package skins
 * @subpackage wireframe
 *
 * @version $Id: _skin.class.php,v 1.3 2009/05/24 21:14:38 fplanque Exp $
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

/**
 * Specific code for this skin.
 *
 * ATTENTION: if you make a new skin you have to change the class name below accordingly
 */
class wireframe_Skin extends Skin
{
  /**
	 * Get default name for the skin.
	 * Note: the admin can customize it.
	 */
	function get_default_name()
	{
		return 'WireFrame';
	}


  /**
	 * Get default type for the skin.
	 */
	function get_default_type()
	{
		return 'normal';
	}


	/**
   * Get definitions for editable params
   *
	 * @see Plugin::GetDefaultSettings()
	 * @param local params like 'for_editing' => true
	 */


	/**
	 * Get ready for displaying the skin.
	 *
	 * This may register some CSS or JS...
	 */
	function display_init()
	{
		// call parent:
		parent::display_init();

		// Add CSS:
		// fp> Note: having those here should allow
		// 1) Requesting them earlier as if they are @import'ed
		// 2) Allow bundling
		// fp> I am not 100% sure though. Comments welcome :)
		require_css( 'basic.css' );
		require_css( 'basic_styles.css', false, NULL, NULL, '' );	// Do not include v= for now or else that css will be loaded twice due to @import
		require_css( 'blog_base.css' );
		require_css( 'item_base.css', false, NULL, NULL, '' );	// Do not include v= for now or else that css will be loaded twice due to @import
		require_css( 'item.css', true );
		require_css( 'style.css', true );
	}

}

/*
 * $Log: _skin.class.php,v $
 */
?>
