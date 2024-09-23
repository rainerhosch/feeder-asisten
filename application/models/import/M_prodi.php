<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_prodi.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'sebuah code program bukanlah sebatas perintah-perintah yang ditulis di komputer, melainkan sebuah kesempatan berkomunikasi antara komputer dan manusia. (bagi yang tidak punya teman wkwk)'
 */
class M_prodi extends CI_Model
{
    private $_table = 'masterdata_prodi';
    function get_data($where = null)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        if ($where != null)
            $this->db->where($where);
        return $this->db->get();
    }

    // insert data
    public function insert_data($data)
    {
        $this->db->insert($this->_table, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // update data
    function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update($this->_table, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // delete data
    public function delete_data($where)
    {
        $this->db->delete($this->_table, $where);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
