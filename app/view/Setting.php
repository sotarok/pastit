<?php
/**
 *  Setting.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 3746a141b08f7277ff5d5367023b2f4f12139878 $
 */

/**
 *  setting view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_View_Setting extends Pastit_ViewClass
{
    /** @var boolean  layout template use flag   */
    public $use_layout = true;

    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $user = $this->session->get('user');
        $this->af->setApp('user', $user);
    }
}

