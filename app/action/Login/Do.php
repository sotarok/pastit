<?php
/**
 *  Login/Do.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 7eaa7a065e4bbc15f8e3a92ab9fea5ab5d4d9fe4 $
 */

/**
 *  login_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Form_LoginDo extends Pastit_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    protected $form = array(
        'url' => array(
            'type' => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXT,
            'name' => 'OpenID URL',
            'required'    => true,
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
 *  login_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_Action_LoginDo extends Pastit_ActionClass
{
    /**
     *  preprocess of login_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'login';
        }

        return null;
    }

    /**
     *  login_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        require_once 'Auth/OpenID.php';
        require_once "Auth/OpenID/Consumer.php";
        require_once "Auth/OpenID/FileStore.php";
        require_once "Auth/OpenID/SReg.php";
        require_once "Auth/OpenID/PAPE.php";

        $store_path = $this->backend->getController()->getDirectory('tmp') . "/openid_filestore";
        $consumer = new Auth_OpenID_Consumer(new Auth_OpenID_FileStore($store_path));

        $auth_request = $consumer->begin($this->af->get('url'));
        if (!$auth_request) {
            $this->ae->add(null, "OpenID が不正です");
            return 'login';
        }

        $sreg_request = Auth_OpenID_SRegRequest::build(
            // Required
            array('nickname'),
            // Optional
            array()
        );
        if ($sreg_request) {
            $auth_request->addExtension($sreg_request);
        }

        if ($auth_request->shouldSendRedirect()) {
            $redirect_url = $auth_request->redirectURL(
                $this->config->get('url'),
                $this->config->get('url') . "login_finish"
            );

            // If the redirect URL can't be built, display an error
            // message.
            if (Auth_OpenID::isFailure($redirect_url)) {
                $this->ae->add(null, "Could not redirect to server: " . $redirect_url->message);
                return 'login';
            } else {
                return array('redirect', $redirect_url);
            }
        }
        else {
            // Generate form markup and render it.
            $form_html = $auth_request->formMarkup(
                $this->config->get('url'),
                $this->config->get('url') . "login_finish",
                false,
                array('id' => 'openid_form')
            );

            // Display an error if the form markup couldn't be generated;
            // otherwise, render the HTML.
            if (Auth_OpenID::isFailure($form_html)) {
                $this->ae->add(null, "Could not redirect to server: " . $form_html->message);
                return 'login';
            } else {
                return array('login_do', $form_html);
            }
        }

        return 'login_do';
    }
}

