<?php

/**
 * Create a block with arbitrary content.
 *
 */
class PHPBlock extends Plugin
{
	/**
	 * Register the template.
	 **/
	function action_init()
	{
		$this->load_text_domain( 'phpblock' );
		$this->add_template( 'block.phpblock', dirname(__FILE__) . '/block.phpblock.php' );
	}

	/**
	 * Add to the list of possible block types.
	 **/
	public function filter_block_list( $block_list )
	{
		$block_list[ 'phpblock' ] = _t( 'PHP Block', 'phpblock' );
		return $block_list;
	}

	/**
	 * Output the content of the block, and nothing else.
	 **/
	public function action_block_content_phpblock( $block, $theme )
	{
/*		ob_start();
		$theme = Themes::create();
		eval( $block->content );
		$content = ob_get_clean();
		return $content; */
		return $block->content;
	}

	/**
	 * Configuration form with one big textarea. Raw to allow JS/HTML/etc. Insert them at your own peril.
	 **/
	public function action_block_form_phpblock( $form, $block )
	{
		$content = $form->append('textarea', 'content', $block, _t( 'Content:', 'phpblock' ) );
		$content->raw = true;
		$content->rows = 5;
	}

}

?>
