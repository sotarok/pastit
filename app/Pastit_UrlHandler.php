<?php
/**
 *  Pastit_UrlHandler.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: 3b358983bac484cec10ba3affe4e7106519a47c2 $
 */

/**
 *  URLHandler class.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_UrlHandler extends Ethna_UrlHandler
{
    /** @var    array   Action Mapping */
    var $action_map = array(
        /**
         * @see http://ethna.jp/ethna-document-dev_guide-urlhandler.html
         */
        'index'  => array(                      // UrlHandler's namespace seted in the entry point
            'user' => array(              // key as a action name
                'path'          => 'user',     // url path
                'path_regexp'   => array(
                    '|^user/(\d+)$|',
                    '|^user/(\w+)$|',
                ),
                'path_ext'      => array(
                    array('id' => array(),),
                    array('nickname' => array(),),
                ),
            ),
            'download' => array(
                'path'          => 'pastit',
                'path_ext'      => array(),
            ),
            'logout' => array(
                'path'          => 'logout',
                'path_ext'      => array(),
            ),
            'setting' => array(
                'path'          => 'setting',
                'path_ext'      => array(),
            ),
            'setting_do' => array(
                'path'          => 'setting_do',
                'path_ext'      => array(),
            ),
            'login' => array(
                'path'          => 'login',
                'path_ext'      => array(),
            ),
            'login_do' => array(
                'path'          => 'login_do',
                'path_ext'      => array(),
            ),
            'paste_do' => array(
                'path'          => 'paste_do',
                'path_ext'      => array(),
            ),
            'login_finish' => array(
                'path'          => 'login_finish',
                'path_ext'      => array(),
            ),
            'paste_view' => array(
                'path'          => 'paste_view',
                'path_regexp'   => '|^(\d+)$|',
                'path_ext'      => array('id' => array(),),
            ),
            'index' => array(
                'path'          => '',
                'path_regexp'   => '|^(\d+)$|',
                'path_ext'      => array('id' => array(),),
            ),
        ),
    );

    /**
     *  get Pastit_UrlHandler class instance.
     *
     *  @access public
     */
    public static function getInstance($class_name = null)
    {
        $instance = parent::getInstance(__CLASS__);
        return $instance;
    }

    // {{{ normalize gateway request method.
    /**
     *  normalize request(via user defined gateway)
     *
     *  @access private
     */
    /*
    function _normalizeRequest_User($http_vars)
    {
        return $http_vars;
    }
     */
    // }}}

    // {{{ generate gateway path method.
    /**
     *  generate path(via user defined gateway)
     *
     *  @access private
     */
    /*
    function _getPath_User($action, $param)
    {
        return array("/user", array());
    }
     */
    // }}}

    // {{{ filter 
    // }}}
}

// vim: foldmethod=marker tabstop=4 shiftwidth=4 autoindent
