<?php
/**
 *  Pastit_UserManager.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id: a17b62fb78834da3c636228f401e740cd5bfdb64 $
 */

/**
 *  Pastit_UserManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Pastit
 */
class Pastit_UserManager extends Ethna_AppManager
{
    private $_table = 'pastit_users';

    public function __construct($backend)
    {
        parent::__construct($backend);
    }

    public function create($uri, $nickname = "")
    {
        $ret = $this->db->autoExecute(
            $this->_table,
            array(
                'identity' => $uri,
                'nickname' => $nickname,
                'token'    => sha1($uri . $this->config->get('token_seed')),
                'created'  => date('Y-m-d H:i:s'),
                'deleted'  => false,
            ),
            'INSERT'
        );

        if (!$ret) {
            return Ethna::raiseError('Error: user create failed.');
        }

        $id = $this->db->getOne('SELECT LAST_INSERT_ID()');
        return $id;
    }

    public function updateNickname($id, $nickname)
    {
        $ret = $this->db->autoExecute(
            $this->_table,
            array(
                'nickname' => $nickname,
            ),
            'UPDATE',
            'id = \'' . addslashes($id) . '\''
        );
        if (!$ret) {
            return Ethna::raiseError('Error: update failed.');
        }
        return $ret;
    }

    public function getUserByIdentity($uri)
    {
        $ret = $this->db->getRow(
            sprintf('SELECT * FROM %s WHERE identity = ?', $this->_table),
            $uri
        );
        if (Ethna::isError($ret)) {
            return array();
        }
        return $ret;
    }

    public function getUser($id)
    {
        $ret = $this->db->getRow(
            sprintf('SELECT * FROM %s WHERE id = ?', $this->_table),
            $id
        );
        if (Ethna::isError($ret)) {
            return array();
        }
        return $ret;
    }

    public function id()
    {
        return 1;
    }
}
