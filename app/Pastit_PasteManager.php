<?php
/**
 *  Pastit_Paste.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id$
 */

/**
 *  Pastit_PasteManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_PasteManager extends Ethna_AppManager
{
    private $_table = 'pastit_paste';

    protected $user;

    public function __construct($backend)
    {
        parent::__construct($backend);

        $this->user = $backend->getManager('user');
    }

    public function post($content, $content_type, $title = "", $token = false)
    {
        $user_id = 0;
        if ($token){
            $user = $this->user->getUserByToken($token);
            if (Ethna::isError($user)){
                return Ethna::raiseError('token invalid: ' . $user->getMessage());
             }
            $user_id = $user['id'];
        }
        elseif ($user = $this->session->get('user')) {
            $user_id = $user['id'];
        }
        $session_id = session_id();

        $ret = $this->db->autoExecute(
            $this->_table,
            array(
                'user_id'      => $user_id,
                'session_id'   => $session_id,
                'content_type' => $content_type,
                'content'      => $content,
                'title'        => $title,
                'modified'     => date('Y-m-d H:i:s'),
                'created'      => date('Y-m-d H:i:s'),
            ),
            'INSERT'
        );

        if (!$ret) {
            return Ethna::raiseError('Error: post failed.');
        }

        $id = $this->db->getOne('SELECT LAST_INSERT_ID()');

        return $id;
    }

    public function getPaste($id)
    {
        $paste = $this->db->getRow(sprintf('SELECT * FROM %s WHERE id = ?', $this->_table), $id);
        return $paste;
    }

    public function getSyntaxHighlightedContent($content, $type)
    {
        if ($type == '__pastit_type_none__') {
            $type = 'none';

            // auto detect
            $first_line = explode(PHP_EOL, $content);
            $first_line = $first_line[0];
            if (preg_match('@#!.+bin/(\w+)@', $first_line, $m)) {
                $type = $m[1];
            }

            if (preg_match('@#!.+bin/env\s+(\w+)@', $first_line, $m)) {
                $type = $m[1];
            }

            if (preg_match('@\+\+\+@', $content) && preg_match('@\-\-\-@', $content)) {
                $type = 'diff';
            }
        }
        require_once 'geshi/geshi.php';
        $geshi = new GeSHi($content, $type);
        $geshi->set_overall_style('font-family: menlo, monaco, \'courier new\', mono-space;');
        $content =  $geshi->parse_code();
        //return '<pre class=" superpre">' . PHP_EOL . $body . '</pre>';
        return array($content, $type);;
    }
}

