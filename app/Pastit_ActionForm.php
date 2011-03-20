<?php
// vim: foldmethod=marker
/**
 *  Pastit_ActionForm.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 8be5990e72ba7251813b07f304cee1b3d3c08791 $
 */

// {{{ Pastit_ActionForm
/**
 *  ActionForm class.
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @access     public
 */
class Pastit_ActionForm extends Ethna_ActionForm
{
    /**#@+
     *  @access protected
     */

    /** @var    array   form definition (default) */
    protected $form_template = array();

    /**#@-*/

    /**
     *  Error handling of form input validation.
     *
     *  @access public
     *  @param  string      $name   form item name.
     *  @param  int         $code   error code.
     */
    public function handleError($name, $code)
    {
        return parent::handleError($name, $code);
    }

    /**
     *  setter method for form template.
     *
     *  @access protected
     *  @param  array   $form_template  form template
     *  @return array   form template after setting.
     */
    protected function _setFormTemplate($form_template)
    {
        return parent::_setFormTemplate($form_template);
    }

    /**
     *  setter method for form definition.
     *
     *  @access protected
     */
    protected function _setFormDef()
    {
        return parent::_setFormDef();
    }

}
// }}}

