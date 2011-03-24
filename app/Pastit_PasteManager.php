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

    public function post($content, $content_type)
    {
        if (Ethna::isError($user_id = $this->user->id())) {
            return $user_id;
        }

        $ret = $this->db->autoExecute(
            $this->_table,
            array(
                'user_id'      => $user_id,
                'content_type' => $content_type,
                'content'      => $content,
                'modified'     => date('Y-m-d H:i:s'),
                'created'      => date('Y-m-d H:i:s'),
            ),
            'INSERT'
        );

        if (!$ret) {
            return Ethna::raiseError('Error: insert failed.');
        }

        return 1;
    }
}

