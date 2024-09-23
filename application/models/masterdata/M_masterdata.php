<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_masterdata.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 01/11/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_Masterdata extends CI_Model
{
    private $db_siskeu;

    function __construct()
    {
        $this->db_siskeu = $this->load->database('db_siskeu_new', TRUE);
    }
    public function crt_table($table, $field)
    {
        $this->dbforge->add_field([
            $field[0] => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            $field[1] => [
                'type' => 'VARCHAR',
                'constraint' => '128'
            ],
        ]);
        $this->dbforge->create_table($table, TRUE);
    }

    public function getDataBiayaKuliah($data = null)
    {
        $this->db_siskeu->select('*');
        $this->db_siskeu->from('biaya_angkatan');
        if ($data != null) {
            $this->db_siskeu->where($data);
        }
        return $this->db_siskeu->get();
    }
    public function getData($table, $field = null, $condition = null, $order = null)
    {
        $this->load->dbforge();
        if ($this->db->table_exists($table)) {
            // table exists some code run query
            $this->db->select('*');
            $this->db->from($table);
            if ($condition != null) {
                $this->db->where($condition);
            }
            if ($order != null) {
                $this->db->order_by('id_' . $order, 'ASC');
            }
            return $this->db->get();
        } else {
            // table does not exist
            $this->dbforge->add_field([
                $field[0] => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ],
                $field[1] => [
                    'type' => 'VARCHAR',
                    'constraint' => '128'
                ],
            ]);
            $this->dbforge->add_key($field[0], TRUE);
            $create = $this->dbforge->create_table($table, TRUE);
            if ($create) {
                $this->db->select('*');
                $this->db->from($table);
                if ($condition != null) {
                    $this->db->where($condition);
                }
                return $this->db->get();
            }
        }
    }

    // public function getDataAgama($table, $field = null, $condition = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from($table);
    //     if ($condition != null) {
    //         $this->db->where($condition);
    //     }
    //     $this->db->order_by('id_agama', 'ASC');
    //     return $this->db->get();
    // }
    // public function get_data_negara($table, $field = null, $condition = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from($table);
    //     if ($condition != null) {
    //         $this->db->where($condition);
    //     }
    //     $this->db->order_by('id_negara', 'ASC');
    //     return $this->db->get();
    // }
    // public function get_alat_transportasi($table, $field = null, $condition = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from($table);
    //     if ($condition != null) {
    //         $this->db->where($condition);
    //     }
    //     $this->db->order_by('id_alat_transportasi', 'ASC');
    //     return $this->db->get();
    // }
    // public function get_jenis_tinggal($table, $field = null, $condition = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from($table);
    //     if ($condition != null) {
    //         $this->db->where($condition);
    //     }
    //     $this->db->order_by('id_jenis_tinggal', 'ASC');
    //     return $this->db->get();
    // }
    public function getDataWilayahV3($data = null)
    {
        $this->db->select('*');
        $this->db->from('masterdata_wilayah');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }
    public function getDataWilayahV2($data = null)
    {
        $this->db->select('*');
        $this->db->from('masterdata_wilayah');
        if ($data != null) {
            $this->db->where($data);
        }
        $this->db->order_by('nama_wilayah', 'ASC');
        return $this->db->get();
    }
    public function getDataWilayah($data = null, $position = null)
    {
        $this->db->select('*');
        $this->db->from('masterdata_wilayah');
        if ($data != null) {
            $this->db->like('nama_wilayah', $data, $position);
        }
        return $this->db->get();
    }

    public function insertData($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}