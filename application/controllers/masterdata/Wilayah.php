<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Wilayah.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Wilayah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('masterdata/M_masterdata', 'masterdata');
    }
    public function get_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $idNegara = $data_post['id_negara'];
            $condition = [
                'id_negara' => $idNegara,
                'SUBSTR(id_wilayah, 1,3) !=' => '000'
            ];
            $res['data'] = $this->masterdata->getData('masterdata_wilayah', null, $condition, 'wilayah')->result_array();

            echo json_encode($res);
        } else {
            handler_404();
        }
    }

    public function getWilayah() {
        $search = $this->input->get('search');
    
        $wilayah = $this->masterdata->getWilayahNew($search)->result_array();
        $res = [];
        foreach ($wilayah as $row) {
            $res[] = [
                'id_wilayah' => $row['id_wilayah'],
                'nama_wilayah' => $row['nama_wilayah'].' - '.$row['kabupaten'].' - '.$row['provinsi']
            ];
        }
        // ['query'] = $this->db->last_query();
        echo json_encode(['data' => $res]);
    }
    
    public function wilayah_detail()
    {
        $id = $this->input->get('id');
        $wilayah = $this->masterdata->getWilayahDetail($id)->row_array();

        if (!$wilayah) {
            echo json_encode([]);
            return;
        }
        
        $id_kab = substr($id, 0, 4); // 4 digit pertama = kabupaten
        $id_prov = substr($id, 0, 2); // 2 digit pertama = provinsi

        // ambil kabupaten
        $kabupaten = $this->db->select('nama_wilayah')
            ->from('masterdata_wilayah')
            ->like('id_wilayah', $id_kab, 'after')
            ->group_start()
                ->like('nama_wilayah', 'Kab', 'after')
                ->or_like('nama_wilayah', 'Kot', 'after')
            ->group_end()
            ->limit(1)
            ->get()->row_array();

        // ambil provinsi
        $provinsi = $this->db->select('nama_wilayah')
            ->from('masterdata_wilayah')
            ->like('id_wilayah', $id_prov, 'after')
            ->like('nama_wilayah', 'Prov', 'after')
            ->limit(1)
            ->get()->row_array();

        $result = [
            'id_wilayah'   => $wilayah['id_wilayah'],
            'nama_wilayah' => trim($wilayah['nama_wilayah']),
            'kabupaten'    => $kabupaten ? $kabupaten['nama_wilayah'] : null,
            'provinsi'     => $provinsi ? $provinsi['nama_wilayah'] : null,
            'label'        => trim($wilayah['nama_wilayah']) .
                            ($kabupaten ? " - {$kabupaten['nama_wilayah']}" : '') .
                            ($provinsi ? " - {$provinsi['nama_wilayah']}" : ''),
        ];

        echo json_encode(['data' => $result]);
    }
    
}
