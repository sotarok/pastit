<?php
/**
 *  Index.php
 *
 *  @author    {$author}
 *  @package   Pastit
 *  @version   $Id: a99fe534b4ecfeb17370b31d06f0d4426eba7d50 $
 */

/**
 *  Index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   Pastit
 */

class Pastit_Form_Index extends Pastit_ActionForm
{
    /**
     *  @access   protected
     *
     *  @var      array   form definition.
     */
    protected $form = array(
        'id' => array(
            'type' => VAR_TYPE_INT,
            'required' => false,
        ),
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
 *  Index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Action_Index extends Pastit_ActionClass
{
    /**
     *  preprocess Index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    public function prepare()
    {
        if ($this->af->get('id')) {
            return 'paste_view';
        }
        return null;
    }

    /**
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    public function perform()
    {
        return 'index';
    }
}

