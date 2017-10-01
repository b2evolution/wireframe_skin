<?php
/**
 * This is the template that displays the item block
 *
 * This file is not meant to be called directly.
 * It is meant to be called by an include in the main.page.php template (or other templates)
 *
 * b2evolution - {@link http://b2evolution.net/}
 * Released under GNU GPL License - {@link http://b2evolution.net/about/license.html}
 * @copyright (c)2003-2009 by Francois PLANQUE - {@link http://fplanque.net/}
 *
 * @package evoskins
 * @subpackage wireframe
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

global $Item;

// Default params:
$params = array_merge( array(
		'feature_block'   => false,
		'content_mode'    => 'auto',		// 'auto' will auto select depending on $disp-detail
		'item_class'      => 'item_block',
		'image_size'	    => 'fit-400x320',
	), $params );

?>

<div id="<?php $Item->anchor_id() ?>" class="<?php $Item->div_classes( $params ) ?>" lang="<?php $Item->lang() ?>">

	<?php
		$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)
	?>

	<?php
		$Item->title( array(
				'before'      => '<h2 class="item_title">',
				'after'       => '</h2>',
				'format'      => 'htmlbody',
				'link_type'   => '#',
			) );
	?>

	<div class="item_header">
	<?php
		$Item->edit_link( array( // Link to backoffice for editing
				'before'    => '<div class="floatright">',
				'after'     => '</div>',
			) );

		$Item->issue_time( array(
				'before'    => ' ',
				'after'     => '',
				'date_format' => locale_datefmt(),
			));

		$Item->author( array(
				'before'    => ' '.T_('by').' ',
				'after'     => '',
			) );
	?>
	</div>

	<?php
		// ---------------------- POST CONTENT INCLUDED HERE ----------------------
		skin_include( '_item_content.inc.php', $params );
		// Note: You can customize the default item feedback by copying the generic
		// /skins/_item_content.inc.php file into the current skin folder.
		// -------------------------- END OF POST CONTENT -------------------------
	?>

	<div class="item_actions">
        <?php
			// Link to comments, trackbacks, etc.:
			$Item->feedback_link( array(
							'type' => 'comments',
							'link_before' => '',
							'link_after' => '',
							'link_text_zero' => '#',
							'link_text_one' => '#',
							'link_text_more' => '#',
							'link_title' => '#',
							'use_popup' => false,
						) );

			// Link to comments, trackbacks, etc.:
			$Item->feedback_link( array(
							'type' => 'trackbacks',
							'link_before' => ' &bull; ',
							'link_after' => '',
							'link_text_zero' => '#',
							'link_text_one' => '#',
							'link_text_more' => '#',
							'link_title' => '#',
							'use_popup' => false,
						) );

		?>
	</div>

	<div class="item_footer">
		<?php

			$Item->categories( array(
				'before'          => T_('Categories').': ',
				'after'           => ' ',
				'include_main'    => true,
				'include_other'   => true,
				'include_external'=> true,
				'link_categories' => true,
			) );

			// List all tags attached to this post:
			$Item->tags( array(
				'before' =>         ' &bull; '.T_('Tags').': ',
				'after' =>          ' ',
				'separator' =>      ', ',
			) );
		?>
    </div>

	<?php
		// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
		skin_include( '_item_feedback.inc.php', array(
				'before_section_title' => '<h3>',
				'after_section_title'  => '</h3>',
			) );
		// Note: You can customize the default item feedback by copying the generic
		// /skins/_item_feedback.inc.php file into the current skin folder.
		// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
	?>

	<?php
		locale_restore_previous();	// Restore previous locale (Blog locale)
	?>
</div>

<?php

/*
 * $Log: _item_block.inc.php,v $
 * Revision 1.1  2009/05/23 14:12:42  fplanque
 * All default skins now support featured posts and intro posts.
 *
 */
?>
