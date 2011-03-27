<?php
/**
 *  Download.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 3746a141b08f7277ff5d5367023b2f4f12139878 $
 */

/**
 *  download view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_View_Download extends Pastit_ViewClass
{
    /** @var boolean  layout template use flag   */
    public $use_layout = false;

    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $this->has_default_header = false;
        $this->header( array(
            'Content-Type' => 'text/plain',
        ));

        $content = file_get_contents(__DIR__ . '/../../bin/pastit');
        echo str_replace('___url___', $this->config->get('url'), $content);
        exit;
    }
}

