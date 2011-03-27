<?php
/**
 *  Setting/Do.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 7eaa7a065e4bbc15f8e3a92ab9fea5ab5d4d9fe4 $
 */

/**
 *  setting_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Form_SettingDo extends Pastit_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    protected $form = array(
        'nickname' => array(
            'type' => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXT,
            'required' => true,
        ),
    );
}

/**
 *  setting_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Action_SettingDo extends Pastit_ActionClass
{
    protected $login_required = true;

    /**
     *  preprocess of setting_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'setting';
        }
        return null;
    }

    /**
     *  setting_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $um = $this->backend->getManager('user');
        $user = $this->session->get('user');
        if (Ethna::isError($um->updateNickname($user['id'], $this->af->get('nickname')))) {
            return 'error500';
        }
        $user['nickname'] = $this->af->get('nickname');
        $this->session->set('user', $user);
        return array('redirect', 'setting');
    }
}

