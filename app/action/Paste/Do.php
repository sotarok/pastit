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
        'title' => array(
            'name' => 'タイトル',
            'type' => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXT,
            'required' => false,
        ),
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
            //'option' => array(),
            'required' => true,
        ),
    );

    public function setFormDef_ViewHelper()
    {
        require_once 'geshi/geshi.php';
        $geshi = new GeSHi();
        $supported = $geshi->get_supported_languages();
        $option = array();
        foreach ($supported as $sl) {
            $option[$sl] = ucfirst($sl);
        }
        $sl = asort($option);
        $ct = $this->getDef('content_type');
        $ct['option'] = array(
            // frequent used languages
            'text' => 'Text',
            'php' => 'PHP',
            'diff' => 'Diff',
            '-' => '------',
        ) + $option;
        $this->setDef('content_type', $ct);
    }
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
    //protected $login_required = false;

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
        $pm = $this->backend->getManager('paste');
        $post_hash = $pm->post(
            $this->af->get('content'),
            $this->af->get('content_type'),
            $this->af->get('title')
        );
        if (Ethna::isError($post_hash)) {
            return 'error500';
        }

        return array('redirect', $this->config->get('url') . $post_hash);
    }
}

