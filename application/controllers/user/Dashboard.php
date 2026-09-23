<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Dashboard.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 26/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('import/M_mahasiswa', 'mahasiswa');
        $this->load->model('import/M_prodi', 'prodi');
    }
    public function index()
    {
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'pages/v_dashboard';
        $this->load->view('template', $data);
    }

    /**
     * AJAX endpoint: returns sync statistics with optional prodi/angkatan filters
     */
    public function get_stats()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
            return;
        }

        $prodi = $this->input->post('prodi');
        $angkatan = $this->input->post('angkatan');

        $filters = [];
        if (!empty($prodi)) {
            $filters['prodi'] = $prodi;
        }
        if (!empty($angkatan) && $angkatan != '0') {
            $filters['angkatan'] = $angkatan;
        }

        // Get overall totals
        $totals = $this->mahasiswa->get_sync_stats($filters);

        // Get breakdown by prodi (with prodi names from masterdata_prodi)
        $by_prodi_raw = $this->mahasiswa->get_stats_by_prodi($filters);
        $prodi_list = $this->prodi->get_data(['id !=' => '99'])->result_array();

        // Map id_sms => nama_program_studi
        $prodi_map = [];
        foreach ($prodi_list as $p) {
            $prodi_map[$p['id_prodi']] = $p['nama_program_studi'] . ' (' . $p['nama_jenjang_pendidikan'] . ')';
        }

        $by_prodi = [];
        foreach ($by_prodi_raw as $row) {
            $row['nama_prodi'] = isset($prodi_map[$row['id_sms']]) ? $prodi_map[$row['id_sms']] : 'Unknown';
            $by_prodi[] = $row;
        }

        // Get breakdown by angkatan
        $by_angkatan = $this->mahasiswa->get_stats_by_angkatan($filters);

        $response = [
            'status' => true,
            'totals' => $totals,
            'by_prodi' => $by_prodi,
            'by_angkatan' => $by_angkatan,
        ];

        echo json_encode($response);
    }
}
