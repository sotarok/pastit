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

    public function post($content, $content_type, $title = "")
    {
        // not login
        if (Ethna::isError($user_id = $this->user->id())) {
            $user_id = 0;
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
        require_once 'geshi/geshi.php';
        $geshi = new GeSHi($content, $type);
        $geshi->set_overall_style('font-family: menlo, monaco, \'courier new\', mono-space;');
        $content =  $geshi->parse_code();
        //return '<pre class=" superpre">' . PHP_EOL . $body . '</pre>';
        return $content;
    }
}

