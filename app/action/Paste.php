<?php
/**
 *  Paste.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 7eaa7a065e4bbc15f8e3a92ab9fea5ab5d4d9fe4 $
 */

/**
 *  paste Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Form_Paste extends Pastit_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    protected $form = array(
    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    protected function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  paste action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Action_Paste extends Pastit_ActionClass
{
    /**
     *  preprocess of paste Action.
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
     *  paste action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'paste';
    }
}

