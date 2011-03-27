<?php
/**
 *  Setting.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 7eaa7a065e4bbc15f8e3a92ab9fea5ab5d4d9fe4 $
 */

/**
 *  setting Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Form_Setting extends Pastit_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    protected $form = array(
    );
}

/**
 *  setting action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Action_Setting extends Pastit_ActionClass
{
    protected $login_required = true;

    /**
     *  preprocess of setting Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'error';
        }
        $sample = $this->af->get('sample');
        */
        return null;
    }

    /**
     *  setting action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'setting';
    }
}

