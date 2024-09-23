<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_mahasiswa.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'sebuah code program bukanlah sebatas perintah-perintah yang ditulis di komputer, melainkan sebuah kesempatan berkomunikasi antara komputer dan manusia. (bagi yang tidak punya teman wkwk)'
 */
class M_mahasiswa extends CI_Model
{
    private $_table = 'mahasiswa';
    private $_field = '*';
    private $db_simak;

    function __construct()
    {
        $this->db_simak = $this->load->database('wastudig_simak', TRUE);
    }
    function get_data(array $data)
    {
        if (isset($data['table'])) {
            $this->_table = $data['table'];
        }
        if (isset($data['field'])) {
            $this->_field = $data['field'];
        }
        $this->db_simak->select($this->_field);
        $this->db_simak->from($this->_table);
        if (isset($data['where'])) {
            $this->db_simak->where($data['where']);
        }
        return $this->db_simak->get();
    }
    function get_data_local(array $data)
    {
        if (isset($data['table'])) {
            $this->_table = $data['table'];
        }
        if (isset($data['field'])) {
            $this->_field = $data['field'];
        }
        $this->db->select($this->_field);
        $this->db->from($this->_table);
        if (isset($data['where'])) {
            $this->db->where($data['where']);
        }
        return $this->db->get();
    }

    public function cek_duplikat_1()
    {
        $this->db_simak->select('m.id_pd, m.nm_pd, m.nik, m.nm_ibu_kandung, m.tmpt_lahir, m.tgl_lahir, count(m.nm_pd) as jml_data');
        $this->db_simak->from('mahasiswa m');
        $this->db_simak->group_by('m.nm_pd');
        $this->db_simak->having('jml_data > 1', null, false);

        return $this->db_simak->get();
    }

    public function get_detail_duplikat($data)
    {
        $this->db_simak->select('m.id_pd, m.nm_pd, m.nik, m.nm_ibu_kandung, m.nm_ayah, m.tmpt_lahir, m.tgl_lahir');
        $this->db_simak->from('mahasiswa m');
        $this->db_simak->where($data);
        return $this->db_simak->get();
    }

    public function get_list_data($data = null)
    {
        if (isset($data['field'])) {
            $this->_field = $data['field'];
        }
        $this->db_simak->select($this->_field);
        $this->db_simak->from($this->_table);
        if (isset($data['join_tbl'])) {
            foreach ($data['join_tbl'] as $key => $value) {
                $this->db_simak->join($value['table'], $value['on'], $value['join_type']);
            }
        }
        if (isset($data['where'])) {
            $this->db_simak->where($data['where']);
        }
        if (isset($data['limit']) && isset($data['offset'])) {
            $this->db_simak->limit($data['limit'], $data['offset']);
        } elseif (isset($data['limit'])) {
            $this->db_simak->limit($data['limit']);
        } elseif (isset($data['offset'])) {
            $this->db_simak->limit($this->_limit, $data['offset']);
        }
        $this->db_simak->order_by('mpt.nipd', 'ASC');
        // $this->db_simak->order_by($this->_table . '.id_pd', 'DESC');
        return $this->db_simak->get();
    }
    public function getCount($data = null)
    {
        if (isset($data['field'])) {
            $this->_field = $data['field'];
        }
        $this->db_simak->select($this->_field);
        $this->db_simak->from($data['table']);
        if (isset($data['join_tbl'])) {
            foreach ($data['join_tbl'] as $key => $value) {
                $this->db_simak->join($value['table'], $value['on'], $value['join_type']);
            }
        }
        if (isset($data['where'])) {
            $this->db_simak->where($data['where']);
        }
        return $this->db_simak->get()->num_rows();
    }

    public function get_krs($data = null)
    {
        $this->db_simak->select('*');
        $this->db_simak->from('krs_new');
        if ($data != null) {
            $this->db_simak->where($data);
        }
        return $this->db_simak->get();
    }

    // insert data
    public function insert_data($data)
    {
        $this->db_simak->insert($this->_table, $data);
        if ($this->db_simak->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // update data
    function update_data(array $data)
    {
        $this->db_simak->where($data['where']);
        $this->db_simak->update($data['table'], $data['data']);
        if ($this->db_simak->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // delete data
    public function delete_data(array $where)
    {
        $this->db_simak->delete($this->_table, $where);
        if ($this->db_simak->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}