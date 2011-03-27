<?php
/**
 *  Login/Finish.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 7eaa7a065e4bbc15f8e3a92ab9fea5ab5d4d9fe4 $
 */

/**
 *  login_finish Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Form_LoginFinish extends Pastit_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    protected $form = array(
        'janrain_nonce' => array(
            'type' => VAR_TYPE_STRING,
            'required' => false,
        ),
        'openid_identity' => array(
            'type' => VAR_TYPE_STRING,
            'required' => true,
        ),
    );
}

/**
 *  login_finish action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Action_LoginFinish extends Pastit_ActionClass
{
    /**
     *  preprocess of login_finish Action.
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
     *  login_finish action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        // if login do?
        $identity = $this->af->get('openid_identity');
        if ($this->af->get('janrain_nonce')) {
            require_once 'Auth/OpenID.php';
            require_once "Auth/OpenID/Consumer.php";
            require_once "Auth/OpenID/FileStore.php";
            require_once "Auth/OpenID/SReg.php";
            require_once "Auth/OpenID/PAPE.php";

            $store_path = $this->backend->getController()->getDirectory('tmp') . "/openid_filestore";
            $consumer = new Auth_OpenID_Consumer(new Auth_OpenID_FileStore($store_path));
            $response = $consumer->complete($this->config->get('url') . "login_finish");

            if ($response->status == Auth_OpenID_CANCEL) {
                // This means the authentication was cancelled.
                $this->ae->add(null, "認証がキャンセルされました．Pastitを利用するには認証してください．");
                return 'login';

            }
            else if ($response->status == Auth_OpenID_FAILURE) {
                // Authentication failed; display the error message.
                $this->ae->add(null, "認証に失敗しました．(" . $response->message . ")");
                return 'login';
            }
            else if ($response->status == Auth_OpenID_SUCCESS) {
                $openid_success_url = $response->getDisplayIdentifier();
                $sreg_resp = Auth_OpenID_SRegResponse::fromSuccessResponse($response);

                $sreg = $sreg_resp->contents();
                $nickname = isset($sreg['nickname']) ? $sreg['nickname'] : "";

                $this->session->set("identity", $identity);
                $this->session->set("openid_success_url", $openid_success_url);
            }
        }

        $um = $this->backend->getManager('user');
        if ($user = $um->getUserByIdentity($identity)) {
            $this->session->set('user', $user);
            return array('redirect', '/');
        }
        else {
            if (!Ethna::isError($id = $um->create($identity, $nickname))) {
                $user = $um->getUser($id);
                $this->session->set('user', $user);
                return array('redirect', 'setting');
            }
            else {
                $this->ae->addObject('name', $id);
                return 'error500';
            }
        }

        return 'login';
    }
}

