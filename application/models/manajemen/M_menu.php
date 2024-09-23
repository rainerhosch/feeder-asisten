<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_menu.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 23/05/2022
 *  Quots of the code     : 'sebuah code program bukanlah sebatas perintah-perintah yang ditulis di komputer, melainkan sebuah kesempatan berkomunikasi antara komputer dan manusia. (bagi yang tidak punya teman wkwk)'
 */
class M_menu extends CI_Model
{
    public function get_data($data = null)
    {
        $this->db->select('*');
        $this->db->from('mfa_menu');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }
    public function insert_data()
    {
    }
    public function update_data()
    {
    }
    public function delete_data()
    {
    }
    public function get_user_access($data = null)
    {
        $this->db->select('*');
        $this->db->from('mfa_menu_access');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }
}
