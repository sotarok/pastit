<?php
/**
 *  Paste/Do.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 7eaa7a065e4bbc15f8e3a92ab9fea5ab5d4d9fe4 $
 */

/**
 *  paste_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Form_PasteDo extends Pastit_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    protected $form = array(
        'content' => array(
            'name' => '内容',
            'type' => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXTAREA,
            'required' => true,
        ),
        'content_type' => array(
            'name' => 'コンテンツタイプ',
            'type' => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_SELECT,
            'option' => array(
                1 => 'TEXT',
                2 => 'PHP',
            ),
            'required' => true,
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
 *  paste_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Action_PasteDo extends Pastit_ActionClass
{
    /**
     *  preprocess of paste_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'index';
        }
        $sample = $this->af->get('sample');
        return null;
    }

    /**
     *  paste_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'paste_do';
    }
}

