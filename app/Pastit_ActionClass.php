<?php
// vim: foldmethod=marker
/**
 *  Pastit_ActionClass.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: fa6d926943d0d227b86f127fa6d4ab9fd084e19d $
 */

// {{{ Pastit_ActionClass
/**
 *  action execution class
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @access     public
 */
class Pastit_ActionClass extends Ethna_ActionClass
{
    protected $login_required = false;
    /**
     *  authenticate before executing action.
     *
     *  @access public
     *  @return string  Forward name.
     *                  (null if no errors. false if we have something wrong.)
     */
    public function authenticate()
    {
        if (!$this->session->isStart()) {
            $this->session->start();
        }
        if ($user = $this->session->get('user')) {
            $this->af->setApp('user', $this->session->get('user'));
            $this->af->setApp('is_login', true);
        }
        else {
            $this->af->setApp('user', array());
            $this->af->setApp('is_login', false);
        }

        if ($this->login_required) {
            if (!$this->session->get('user')) {
                return 'login';
            }
        }

        return null;
    }

    /**
     *  Preparation for executing action. (Form input check, etc.)
     *
     *  @access public
     *  @return string  Forward name.
     *                  (null if no errors. false if we have something wrong.)
     */
    public function prepare()
    {
        return parent::prepare();
    }

    /**
     *  execute action.
     *
     *  @access public
     *  @return string  Forward name.
     *                  (we does not forward if returns null.)
     */
    public function perform()
    {
        return parent::perform();
    }
}
// }}}

