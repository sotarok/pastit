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
    private $_table = 'pastit_user';

    public function __construct($backend)
    {
        parent::__construct($backend);
    }

    public function getUserByIdentify($uri)
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
