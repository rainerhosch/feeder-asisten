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

    public function getWilayahNew($search)
    {
        $this->db->select('id_wilayah, nama_wilayah, 
                    (SELECT nama_wilayah FROM masterdata_wilayah w2 
                    WHERE LEFT(w2.id_wilayah,4)=LEFT(masterdata_wilayah.id_wilayah,4) 
                    AND (w2.nama_wilayah LIKE "Kab%" OR w2.nama_wilayah LIKE "Kot%") 
                    LIMIT 1) AS kabupaten,
                    (SELECT nama_wilayah FROM masterdata_wilayah w3 
                    WHERE LEFT(w3.id_wilayah,2)=LEFT(masterdata_wilayah.id_wilayah,2) 
                    AND w3.nama_wilayah LIKE "Prov%" 
                    LIMIT 1) AS provinsi');
        $this->db->from('masterdata_wilayah');
        $this->db->where('id_negara', 'ID');
        if (!empty($search)) {
            $this->db->like('nama_wilayah', $search);
        }
        return $this->db->limit(5)->get();
    }

    public function getWilayahDetail($id)
    {
        return $this->db->get_where('masterdata_wilayah', ['id_wilayah' => $id]);
    }
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
