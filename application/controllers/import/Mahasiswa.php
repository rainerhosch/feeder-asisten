<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Mahasiswa.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 03/10/2020 that my bhirt day.
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Mahasiswa extends CI_Controller
{
    private $__token__ = '';
    private $__uri_3__ = 'index';
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('manajemen/M_config_feeder', 'feeder');
        $this->load->model('import/M_mahasiswa', 'mahasiswa');
        $this->load->model('import/M_prodi', 'prodi');
        $this->load->model('masterdata/M_masterdata', 'masterdata');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'pages/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->__uri_3__;
        $this->load->view('template', $data);
    }

    public function cek_duplikasi_data()
    {
        $data_filtered = [];
        $nm_duplikat = $this->mahasiswa->cek_duplikat_1()->result_array();
        foreach ($nm_duplikat as $i => $mhs) {
            $detail_data = $this->mahasiswa->get_detail_duplikat(['nm_pd' => $mhs['nm_pd']])->result_array();
            // $cek_diff = array_diff($detail_data[0], $detail_data[1]);
            // $count_col = count($cek_diff);
            // foreach ($detail_data as $j => $mhs2) {
            //     $detail_data[$j]['diff_coll'] = $count_col;
            // }
            $data_filtered[$i] = $detail_data;
        }

        echo '<pre>';
        print_r($data_filtered);
        echo '</pre>';
        die;
    }

    public function detail()
    {
        $data = [];
        $id = $this->input->get('id');

        $param = [
            'table' => 'mahasiswa',
            'where' => ['id_pd' => $id]
        ];
        $res_mhs = $this->mahasiswa->get_data($param)->row_array();
        $param = [
            'table' => 'mahasiswa_pt',
            'where' => ['id_pd' => $id]
        ];
        $res_mhs_pt = $this->mahasiswa->get_data($param)->row_array();

        $data['detail_mhs']['data']['id_feeder'] = $res_mhs_pt['id_feeder'];
        $data['detail_mhs']['data']['id_pd'] = $res_mhs['id_pd'];
        $data['detail_mhs']['data']['nama'] = $res_mhs['nm_pd'];
        $data['detail_mhs']['data']['tmpt_lahir'] = $res_mhs['tmpt_lahir'];
        $data['detail_mhs']['data']['tgl_lahir'] = $res_mhs['tgl_lahir'];
        $data['detail_mhs']['data']['jk'] = $res_mhs['jk'];
        $data['detail_mhs']['data']['agama'] = $res_mhs['id_agama'];
        $data['detail_mhs']['data']['nama_ibu'] = $res_mhs['nm_ibu_kandung'];
        // Data alamat
        $data['detail_mhs']['alamat']['kewargnegaraan'] = $res_mhs['kewarganegaraan'];
        $data['detail_mhs']['alamat']['nik'] = $res_mhs['nik'];
        $data['detail_mhs']['alamat']['nisn'] = $res_mhs['nisn'];
        $data['detail_mhs']['alamat']['npwp'] = $res_mhs['npwp'];
        $data['detail_mhs']['alamat']['jalan'] = $res_mhs['jln'];
        $data['detail_mhs']['alamat']['tlp'] = $res_mhs['telepon_rumah'];
        $data['detail_mhs']['alamat']['dusun'] = $res_mhs['nm_dsn'];
        $data['detail_mhs']['alamat']['rt'] = $res_mhs['rt'];
        $data['detail_mhs']['alamat']['rw'] = $res_mhs['rw'];
        $data['detail_mhs']['alamat']['no_hp'] = $res_mhs['telepon_seluler'];
        $data['detail_mhs']['alamat']['kelurahan'] = $res_mhs['ds_kel'];
        $data['detail_mhs']['alamat']['kode_pos'] = $res_mhs['kode_pos'];
        $data['detail_mhs']['alamat']['email'] = $res_mhs['email'];
        $data['detail_mhs']['alamat']['terima_kps'] = $res_mhs['a_terima_kps'];
        $data['detail_mhs']['alamat']['kecamatan'] = $res_mhs['id_wil_feeder'];
        $data['detail_mhs']['alamat']['alat_transportasi'] = $res_mhs['id_alat_transport'];
        $data['detail_mhs']['alamat']['jenis_tinggal'] = $res_mhs['id_jns_tinggal'];
        // data ortu #ayah
        $data['detail_mhs']['data_ortu']['nik_ayah'] = $res_mhs['nik_ayah'];
        $data['detail_mhs']['data_ortu']['nama_ayah'] = $res_mhs['nm_ayah'];
        $data['detail_mhs']['data_ortu']['tgl_lahir_ayah'] = $res_mhs['tgl_lahir_ayah'];
        $data['detail_mhs']['data_ortu']['pendidikan_ayah'] = $res_mhs['id_jenjang_pendidikan_ayah'];
        $data['detail_mhs']['data_ortu']['pekerjaan_ayah'] = $res_mhs['id_pekerjaan_ayah'];
        $data['detail_mhs']['data_ortu']['penghasilan_ayah'] = $res_mhs['id_penghasilan_ayah'];
        // data ortu #ibu
        $data['detail_mhs']['data_ortu']['nik_ibu'] = $res_mhs['nik_ibu'];
        $data['detail_mhs']['data_ortu']['nama_ibu'] = $res_mhs['nm_ibu_kandung'];
        $data['detail_mhs']['data_ortu']['tgl_lahir_ibu'] = $res_mhs['tgl_lahir_ibu'];
        $data['detail_mhs']['data_ortu']['pendidikan_ibu'] = $res_mhs['id_jenjang_pendidikan_ibu'];
        $data['detail_mhs']['data_ortu']['pekerjaan_ibu'] = $res_mhs['id_pekerjaan_ibu'];
        $data['detail_mhs']['data_ortu']['penghasilan_ibu'] = $res_mhs['id_penghasilan_ibu'];
        // data ortu #wali
        $data['detail_mhs']['data_wali']['nama_wali'] = $res_mhs['nm_wali'];
        $data['detail_mhs']['data_wali']['tgl_lahir_wali'] = $res_mhs['tgl_lahir_wali'];
        $data['detail_mhs']['data_wali']['pendidikan_wali'] = $res_mhs['id_jenjang_pendidikan_wali'];
        $data['detail_mhs']['data_wali']['pekerjaan_wali'] = $res_mhs['id_pekerjaan_wali'];
        $data['detail_mhs']['data_wali']['penghasilan_wali'] = $res_mhs['id_penghasilan_wali'];
        // data kebutuhan khusus
        $data['detail_mhs']['data']['kebutuhan_khusus'] = $res_mhs['id_kebutuhan_khusus_mahasiswa'];
        // echo json_encode($data);
        // dump($data);
        // die;



        if ($this->__uri_3__ != '') {
            $this->__uri_3__ = $this->uri->segment(3);
            $data['subpage'] = $this->uri->segment(3);
        }
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'pages/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/v_' . $this->__uri_3__;
        $this->load->view('template', $data);
    }

    public function histori_pendidikan()
    {
        $data = [];
        $id = $this->input->get('id');
        $Conf = $this->feeder->get_data()->row(); // Get data config
        $this->__token__ = get_token($Conf); // Get Token Feeder from config account
        $sync_status = 0;
        $sync_status_aktivitas = 0;
        $msg_sync = '';
        $msg_sync_aktivitas = '';

        $param = [
            'table' => 'mahasiswa',
            'where' => ['id_pd' => $id]
        ];
        $res_mhs = $this->mahasiswa->get_data($param)->row_array();
        $param = [
            'table' => 'mahasiswa_pt',
            'where' => ['id_pd' => $id]
        ];
        $res_mhs_pt = $this->mahasiswa->get_data($param)->row_array();
        // echo '<pre>';
        // var_dump($res_mhs_pt);
        // echo '</pre>';
        // die;

        $data_param = [
            'token' => $this->__token__,
            "act" => 'GetListRiwayatPendidikanMahasiswa',
            "filter" => "nim = '" . $res_mhs_pt['nipd'] . "'",
            "limit" => "",
            "offset" => ""
        ];
        $response = service_request($data_param, $Conf);
        // dump($response);
        // die;
        $jsonResponse = json_encode($response);
        $data = json_decode($jsonResponse, true);
        if ($response->error_code == 0) {
            if (count($data['data']) > 0) {
                $sync_status = 1;
            }
        } else {
            $sync_status = 99;
            $msg_sync = 'Koneksi terputus.';
        }


        $dataProdi = $this->prodi->get_data(['id' => $res_mhs_pt['id_sms']])->row_array();

        // dump($res_mhs_pt);
        // die;



        $dataPendaftaran = $this->masterdata->getData('masterdata_jenis_pendaftaran', 'nama_jenis_daftar', ['id_jenis_daftar' => $res_mhs_pt['id_jns_daftar']])->row_array();
        if ($dataPendaftaran == null) {
            $dataPendaftaran['nama_jenis_daftar'] = null;
        }
        $dataJalurMasuk = $this->masterdata->getData('masterdata_jalur_masuk', 'nama_jalur_masuk', ['id_jalur_masuk' => $res_mhs_pt['id_jalur_daftar']])->row_array();
        if ($dataPendaftaran == null) {
            $dataJalurMasuk['nama_jalur_masuk'] = null;
        }

        // dump($dataPendaftaran);
        // die;
        $res_mhs_pt['prodi'] = $dataProdi;
        // histori pendidikan
        $data['detail_mhs']['histori_pendidikan'] = [
            'id_mahasiswa_feeder' => $res_mhs_pt['id_feeder'],
            'nim' => $res_mhs_pt['nipd'],
            'jenis_daftar' => $dataPendaftaran['nama_jenis_daftar'],
            'jalur_masuk' => $dataJalurMasuk['nama_jalur_masuk'],
            'sync_status' => $sync_status,
            'msg_sync' => $msg_sync,
            // 'id_jalur_daftar' => $res_mhs_pt['nipd'],
            // 'jalur_pendaftaran' => $res_mhs_pt['nipd'],
            // 'periode_masuk' => $res_mhs_pt['nipd'],
            'tanggal_daftar' => $res_mhs_pt['tgl_masuk_sp'],
            // 'id_perguruan_tinggi' => $res_mhs_pt['nipd'],
            'kode_program_studi' => $dataProdi['kode_program_studi'],
            'nama_program_studi' => $dataProdi['nama_program_studi'],
        ];

        // aktivitas perkuliahan
        $data_param_aktivitas = [
            'token' => $this->__token__,
            "act" => 'GetDetailPerkuliahanMahasiswa',
            "filter" => "nim = '" . $res_mhs_pt['nipd'] . "'",
            "limit" => "",
            "offset" => ""
        ];
        $response_aktivitas = service_request($data_param_aktivitas, $Conf);
        $jsonResponseAktivitas = json_encode($response_aktivitas);
        // dump($jsonResponseAktivitas);
        // die;
        $dataAktivitas = json_decode($jsonResponseAktivitas, true);
        if ($response_aktivitas->error_code == 0) {
            if (count($dataAktivitas['data']) > 0) {
                $sync_status_aktivitas = 1;
            }
        } else {
            $sync_status_aktivitas = 99;
            $msg_sync_aktivitas = 'Koneksi terputus.';
        }

        $data['detail_mhs']['aktivitas_perkuliahan'] = [
            'sync_status' => $sync_status_aktivitas,
        ];


        $data['detail_mhs']['data']['id_feeder'] = $res_mhs_pt['id_feeder'];
        $data['detail_mhs']['data']['id_pd'] = $res_mhs['id_pd'];
        $data['detail_mhs']['data']['nama'] = $res_mhs['nm_pd'];
        $data['detail_mhs']['data']['tmpt_lahir'] = $res_mhs['tmpt_lahir'];
        $data['detail_mhs']['data']['tgl_lahir'] = $res_mhs['tgl_lahir'];
        $data['detail_mhs']['data']['jk'] = $res_mhs['jk'];
        $data['detail_mhs']['data']['agama'] = $res_mhs['id_agama'];
        $data['detail_mhs']['data']['nama_ibu'] = $res_mhs['nm_ibu_kandung'];
        if ($this->__uri_3__ != '') {
            $this->__uri_3__ = $this->uri->segment(3);
            $data['subpage'] = $this->uri->segment(3);
        }
        // echo '<pre>';
        // var_dump($data['detail_mhs']);
        // echo '</pre>';
        // die;
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'pages/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/v_' . $this->__uri_3__;
        $this->load->view('template', $data);
    }

    public function sync_histori_pendidikan()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $Conf = $this->feeder->get_data()->row(); // Get data config
            $this->__token__ = get_token($Conf); // Get Token Feeder from config account
            $biaya_awal = 0;


            $param = [
                'table' => 'mahasiswa_pt',
                'where' => ['id_pd' => $data_post['id_pd']]
            ];
            $res_mhs_pt = $this->mahasiswa->get_data($param)->row_array();

            $panjang_nim = strlen($res_mhs_pt['nipd']);
            if ($panjang_nim > 8) {
                $periode_masuk = '20' . substr($res_mhs_pt['nipd'], 0, 2) . '1';
                $angkatan = '20' . substr($res_mhs_pt['nipd'], 0, 2);
            } else {
                $periode_masuk = '200' . substr($res_mhs_pt['nipd'], 0, 1) . '1';
                $angkatan = '200' . substr($res_mhs_pt['nipd'], 0, 1);
            }

            $dataProdi = $this->prodi->get_data(['id' => $res_mhs_pt['id_sms']])->row_array();
            $jenjang_didik = $dataProdi['nama_jenjang_pendidikan'];
            $cek_konversi = substr($res_mhs_pt['nipd'], 5, 1);
            $dataPendaftaran = $this->masterdata->getData('masterdata_jenis_pendaftaran', 'nama_jenis_daftar', ['id_jenis_daftar' => $cek_konversi])->row_array();

            // Set default id_jenis_daftar if not found by cek_konversi
            $id_jenis_daftar = 1; // Default: Peserta didik baru
            if (isset($dataPendaftaran['id_jenis_daftar'])) {
                $id_jenis_daftar = $dataPendaftaran['id_jenis_daftar'];
            } elseif (isset($res_mhs_pt['id_jns_daftar']) && $res_mhs_pt['id_jns_daftar'] != '') {
                $id_jenis_daftar = $res_mhs_pt['id_jns_daftar'];
            }


            // $dataPembiayaan = $this->masterdata->getData('masterdata_pembiayaan', 'nama_pembiayaan', ['id_pembiayaan' =>  $cek_konversi])->row_array();
            if (substr($res_mhs_pt['nipd'], 2, 3) == '113') {
                $id_pembiayaan = 3; //Beasiswa 
                $biaya_awal = 2400000;
            } else {
                $id_pembiayaan = 1; //Mandiri

                $where_jnj = [
                    'angkatan' => $angkatan,
                ];
                $dataBiaya = $this->masterdata->getDataBiayaKuliah($where_jnj)->row_array();
                // var_dump($dataBiaya);
                // die;

                if ($jenjang_didik == 'S1') {
                    $biaya_awal = $dataBiaya['PK'] + $dataBiaya['CS'];
                } else {
                    $biaya_awal = $dataBiaya['PK_D3'] + $dataBiaya['CS_D3'];
                }
            }
            // var_dump($biaya_awal);
            // die;
            // $id_on_feeder = $res_mhs_pt['id_feeder'];

            $data_param = [
                'token' => $this->__token__,
                'act' => 'GetProfilPT'
            ];
            $responseProfil = service_request($data_param, $Conf);
            $jsonProfil = json_encode($responseProfil);
            $data_Profil = json_decode($jsonProfil, true);
            $id_pt = $data_Profil['data'][0]['id_perguruan_tinggi'];

            $data['record'] = [
                'nim' => $res_mhs_pt['nipd'],
                'id_jenis_daftar' => $id_jenis_daftar,
                'id_jalur_daftar' => 12,
                'id_periode_masuk' => $periode_masuk,
                'tanggal_daftar' => $res_mhs_pt['tgl_masuk_sp'],
                'id_mahasiswa' => $res_mhs_pt['id_feeder'],
                'id_pembiayaan' => $id_pembiayaan,
                'biaya_masuk' => $biaya_awal,
                'id_perguruan_tinggi' => $id_pt,
                'id_prodi' => $dataProdi['id_prodi'],
            ];
            // var_dump($data['record']);
            // die;

            $data_param = [
                'token' => $this->__token__,
                "act" => 'InsertRiwayatPendidikanMahasiswa',
                "record" => $data['record'],
            ];
            $response = service_request($data_param, $Conf);
            $jsonResponse = json_encode($response);
            $responseArray = json_decode($jsonResponse, true);
            if ($responseArray['error_code'] == 0) {
                $this->mahasiswa->update_data([
                    'table' => 'mahasiswa_pt',
                    'where' => ['id_pd' => $data_post['id_pd']],
                    'data' => ['id_riwayat_pendidikan_feeder' => $responseArray['data']['id_registrasi_mahasiswa']]
                ]);
                $response = [
                    'status' => true,
                    'code' => $responseArray['error_code'],
                    'msg' => 'Histori Pendidikan Berhasil di input',
                ];
            } else {
                $err_desc = $responseArray['error_desc'];
                $fetch_param = [
                    'token' => $this->__token__,
                    "act" => 'GetListRiwayatPendidikanMahasiswa',
                    "filter" => "nim = '" . $data['record']['nim'] . "'",
                    "limit" => "1",
                    "offset" => "0"
                ];
                $res_fetch = service_request($fetch_param, $Conf);
                $res_fetch_arr = json_decode(json_encode($res_fetch), true);

                if (isset($res_fetch_arr['error_code']) && $res_fetch_arr['error_code'] == 0 && count($res_fetch_arr['data']) > 0) {
                    $id_registrasi = $res_fetch_arr['data'][0]['id_registrasi_mahasiswa'];
                    $this->mahasiswa->update_data([
                        'table' => 'mahasiswa_pt',
                        'where' => ['id_pd' => $data_post['id_pd']],
                        'data' => ['id_riwayat_pendidikan_feeder' => $id_registrasi]
                    ]);
                    $response = [
                        'status' => true,
                        'code' => 0,
                        'msg' => 'Data sudah ada di Feeder. Sinkronisasi histori berhasil ditautkan!',
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'code' => $responseArray['error_code'],
                        'msg' => $err_desc,
                    ];
                }
            }

            echo json_encode($response);
        } else {
            handler_404();
        }
    }

    public function sync_aktivitas_mahasiswa()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $Conf = $this->feeder->get_data()->row(); // Get data config
            $this->__token__ = get_token($Conf); // Get Token Feeder from config account
            // $biaya_awal = 0;

            $param = [
                'table' => 'mahasiswa_pt',
                'where' => ['id_pd' => $data_post['id_pd']]
            ];
            $res_mhs_pt = $this->mahasiswa->get_data($param)->row_array();

            $data['record'] = [];

            $data_param = [
                'token' => $this->__token__,
                "act" => 'InsertAktivitasMahasiswa',
                "record" => $data['record'],
            ];
            $response = service_request($data_param, $Conf);
            $jsonResponse = json_encode($response);
            $responseArray = json_decode($jsonResponse, true);
            if ($responseArray['error_code'] == 0) {
                $response = [
                    'status' => true,
                    'code' => $responseArray['error_code'],
                    'msg' => 'Histori Pendidikan Berhasil di input',
                ];
            } else {
                $response = [
                    'status' => false,
                    'code' => $responseArray['error_code'],
                    'msg' => $responseArray['error_desc'],
                ];
            }
            echo json_encode($response);
        } else {
            handler_404();
        }
    }
    public function get_data_feeder()
    {
        // if ($this->input->is_ajax_request()) {

        $data_post = $this->input->post();
        $Conf = $this->feeder->get_data()->row(); // Get data config
        $this->__token__ = get_token($Conf); // Get Token Feeder from config account

        $data_param = [
            "act" => "GetListMahasiswa",
            "token" => $this->__token__,
            "filter" => "",
            "limit" => 5,
            "offset" => 0
        ];
        $response = service_request($data_param, $Conf);
        $jsonResponse = json_encode($response);
        $decodeData = json_decode($jsonResponse, true);
        // return json_decode($jsonResponse, true);
        dump($decodeData['data']);
        // } else {
        //     handler_404();
        // }
    }

    public function get_biodata_feeder()
    {
        $data_post = $this->input->post();
        $Conf = $this->feeder->get_data()->row(); // Get data config
        $this->__token__ = get_token($Conf); // Get Token Feeder from config account

        $data_param = [
            "act" => "GetBiodataMahasiswa",
            "token" => $this->__token__,
            "filter" => "",
            "limit" => 3,
            "offset" => 0
        ];
        $response = service_request($data_param, $Conf);
        $jsonResponse = json_encode($response);
        $decodeData = json_decode($jsonResponse, true);
        // return json_decode($jsonResponse, true);
        dump($decodeData['data']);
    }

    public function perbaikan_data_wilayah()
    {
        $data_asal = [];
        $data_tujuan = [];
        $param_pmb = [
            'table' => 'mahasiswa_pt',
            // 'table' => 'pmb_mahasiswa_pt',
            // 'where' => 'SUBSTRING(nipd,1,2)="22" AND SUBSTRING(nipd,3,3)="113"'
            'where' => 'SUBSTRING(nipd,1,2)="23"'
        ];
        $dataMhs = $this->mahasiswa->get_data($param_pmb)->result_array();
        // dump($dataMhs);
        // die;
        foreach ($dataMhs as $i => $mpt) {
            $param_pmb2 = [
                'table' => 'mahasiswa',
                // 'table' => 'pmb_mahasiswa',
                'where' => ['id_pd' => $mpt['id_pd']]
            ];
            $biodata = $this->mahasiswa->get_data($param_pmb2)->row_array();
            // unset($biodata['id_pd']);
            $dataMhs[$i] = $biodata; //escape ?
            $dataMhs[$i]['nipd'] = $mpt['nipd'];
        }
        $data_asal = $dataMhs;
        dump($data_asal);
        die;
        $data = [];
        $resUpdate = [];
        foreach ($data_asal as $i => $mhs) {
            // $data_wilayah[$i]['kewarganegaraan'] = $mhs['kewarganegaraan'];
            $data[$i]['id_pd'] = $mhs['id_pd'];
            $data[$i]['nipd'] = $mhs['nipd'];
            $data[$i]['data_kecamatan'] = $mhs['kecamatan'];

            $data[$i]['data_kota_kab'] = $mhs['kabupaten'];

            // $data_negara = $this->masterdata->getDataWilayahV3(['nama_wilayah' => $mhs['kewarganegaraan']])->row_array();
            $data_kecamatan = $this->masterdata->getDataWilayah($mhs['kecamatan'], 'befor')->row_array();
            // $data_kota_kab = $this->masterdata->getDataWilayah($mhs['kabupaten'], 'befor')->row_array();

            // [data_kecamatan_feeder] => 
            // [

            // $data[$i]['negara'] = $data_negara;
            $data[$i]['data_id_will'] = $data_kecamatan['id_wilayah'];
            $data[$i]['data_kecamatan_feeder'] = $data_kecamatan['nama_wilayah'];
            $param_update = [
                'table' => 'mahasiswa',
                'where' => ['id_pd' => $mhs['id_pd']],
                'data' => [
                    'id_wil_feeder' => $data_kecamatan['id_wilayah'],
                    'kecamatan' => $mhs['kecamatan']
                ]
            ];
            $resUpdate = $this->mahasiswa->update_data($param_update);
            // $data[$i]['data_kota_kab_feeder'] = $data_kota_kab;
            // $data[$i]['query'] = $this->db->last_query();
        }
        dump($resUpdate);
        die;
    }

    public function format_npwp()
    {
        $data_asal = [];
        $data_tujuan = [];
        $param_pmb = [
            'table' => 'mahasiswa_pt',
            // 'table' => 'pmb_mahasiswa_pt',
            // 'where' => 'SUBSTRING(nipd,1,2)="22" AND SUBSTRING(nipd,3,3)="113"'
            'where' => 'SUBSTRING(nipd,1,2)="23"'
        ];
        $dataMhs = $this->mahasiswa->get_data($param_pmb)->result_array();
        // dump($dataMhs);
        // die;
        foreach ($dataMhs as $i => $mpt) {
            $param_pmb2 = [
                'table' => 'mahasiswa',
                // 'table' => 'pmb_mahasiswa',
                'where' => ['id_pd' => $mpt['id_pd']]
            ];
            $biodata = $this->mahasiswa->get_data($param_pmb2)->row_array();
            if ($biodata['npwp'] != '' || (int) $biodata['npwp'] != 0) {
                // $biodata['npwp'] = trim($biodata['npwp'], '.');
                $biodata['npwp'] = preg_replace('/[0-9]/', '', $biodata['npwp']);
            }
            unset($biodata['id_pd']);
            $dataMhs[$i] = $biodata; //escape ?
            $dataMhs[$i]['nipd'] = $mpt['nipd'];
        }
        $data_asal = $dataMhs;
        dump($data_asal);
        die;
    }

    public function perbaikan_biodata_from_pmb()
    {
        $data_asal = [];
        $data_tujuan = [];
        $param_pmb = [
            'table' => 'mahasiswa_pt_pmb',
            // 'table' => 'pmb_mahasiswa_pt',
            // 'where' => 'SUBSTRING(nipd,1,2)="22" AND SUBSTRING(nipd,3,3)="113"'
            'where' => 'SUBSTRING(nipd,1,2)="24"'
        ];
        $dataMhs = $this->mahasiswa->get_data($param_pmb)->result_array();
        // dump($dataMhs);
        // die;
        foreach ($dataMhs as $i => $mpt) {
            $dataMhs[$i]['id_jenjang_pendidikan_ayah_update'] = null;
            $param_pmb2 = [
                'table' => 'mahasiswa_pmb',
                // 'table' => 'pmb_mahasiswa',
                'where' => ['id_pd' => $mpt['id_pd']]
            ];
            $biodata = $this->mahasiswa->get_data($param_pmb2)->row_array();
            unset($biodata['id_pd']);
            $dataMhs[$i] = $biodata; //escape ?
            $dataMhs[$i]['nipd'] = $mpt['nipd'];
        }
        $data_asal = $dataMhs;
        dump($data_asal);
        die;
        // for update
        foreach ($data_asal as $i => $mhs) {
            $param = [
                'table' => 'mahasiswa_pt',
                'where' => ['nipd' => $mhs['nipd']]
            ];
            $res = $this->mahasiswa->get_data($param)->row_array();
            unset($mhs['nipd']);

            // perbaikan id jenjang didik
            // $jen_didik_ayah = $mhs['id_jenjang_pendidikan_ayah'];
            // $param_jnj_didik_ayah = [
            //     'table' => 'wastu_jenjang_pendidikan',
            //     'where' => ['id' => $mhs['id_jenjang_pendidikan_ayah']]
            // ];
            // $data_jnj_didik_ayah = $this->mahasiswa->get_data($param_jnj_didik_ayah)->row_array();
            // $param_master_jnj_didik_ayah = [
            //     'table' => 'masterdata_jenjang_pendidikan',
            //     'where_like' => [
            //         'title' => 'nama_jenjang_didik',
            //         'query' => $data_jnj_didik_ayah['jenjang']
            //     ]
            // ];
            // $data_perbaikan_jnj_didik_ayah = $this->mahasiswa->get_data($param_master_jnj_didik_ayah)->row_array();


            // $param_jnj_didik_ibu = [
            //     'table' => 'wastu_jenjang_pendidikan',
            //     'where' => ['id' => $mhs['id_jenjang_pendidikan_ibu']]
            // ];
            // $data_jnj_didik_ibu = $this->mahasiswa->get_data($param_jnj_didik_ibu)->row_array();
            // $param_jnj_didik_wali = [
            //     'table' => 'wastu_jenjang_pendidikan',
            //     'where' => ['id' => $mhs['id_jenjang_pendidikan_wali']]
            // ];
            // $data_jnj_didik_wali = $this->mahasiswa->get_data($param_jnj_didik_wali)->row_array();
            // $jen_didik_ibu = $mhs['id_jenjang_pendidikan_ibu'];
            // $jen_didik_wali = $mhs['id_jenjang_pendidikan_wali'];

            $data_asal[$i]['id_jenjang_pendidikan_ayah_update'] = $data_perbaikan_jnj_didik_ayah;
            // $mhs['id_jenjang_pendidikan_ibu_update'] = ;
            // $mhs['id_jenjang_pendidikan_wali_update'] = ;
            $id_update = $res['id_pd'];
            $update_param = [
                'table' => 'mahasiswa',
                'where' => [
                    'id_pd' => $id_update
                ],
                'data' => $mhs
            ];
            // $updated = $this->mahasiswa->update_data($update_param);
            $updated = true;
            if ($updated) {
                $data_tujuan[$i] = $updated . 'SUCCESS UPDATE';
            } else {
                $data_tujuan[$i] = 'ERROR!';
            }
        }
        dump($data_asal);
        die;
    }
    public function perbaikan_status()
    {
        // $data_post = $this->input->post();
        $dataFeeder = [];
        $Conf = $this->feeder->get_data()->row(); // Get data config
        $condition = [
            'table' => 'mahasiswa',
            'limit' => 100,
            'offset' => 6600,
            'where' => null,
            'join_tbl' => [
                0 => [
                    'table' => 'mahasiswa_pt mpt',
                    'on' => 'mahasiswa.id_pd = mpt.id_pd',
                    'join_type' => 'left'
                ]
            ]
        ];

        $resMhs = $this->mahasiswa->get_list_data($condition)->result_array();
        $this->__token__ = get_token($Conf); // Get Token Feeder from config account
        foreach ($resMhs as $i => $val) {
            $data_param = [
                "act" => "GetListMahasiswa",
                "token" => $this->__token__,
                "filter" => "nim = '" . $val['nipd'] . "'",
                // "limit" => 1,
                // "offset" => 0
            ];
            $response = service_request($data_param, $Conf);
            $jsonResponse = json_encode($response);
            $decodeData = json_decode($jsonResponse, true);
            $cek_data = count($decodeData['data']);
            if ($cek_data != 0) {
                $dataFeeder[$i] = $decodeData['data'][0];
            }
        }
        foreach ($dataFeeder as $j => $mhs) {
            if ($mhs['id_status_mahasiswa'] == '') {
                $mhs['id_status_mahasiswa'] = 5;
            }
            // query insert id feeder ke simak
            $update_param = [
                'table' => 'mahasiswa_pt',
                'where' => [
                    'nipd' => $mhs['nipd']
                ],
                'data' => [
                    'status' => $mhs['id_status_mahasiswa'],
                ]
            ];
            $updated = $this->mahasiswa->update_data($update_param);
            if ($updated) {
                $status_update[$j]['status'] = 'success';
            } else {
                $status_update[$j]['status'] = 'gagal';
            }
        }
        dump($status_update);
        die;
    }

    public function get_list_data()
    {
        if ($this->input->is_ajax_request()) {

            $Conf = $this->feeder->get_data()->row(); // Get data config
            $this->__token__ = get_token($Conf); // Get Token Feeder from config account

            $d = date('Y');
            $data_post = $this->input->post();
            $post_limit = $this->input->post('limit');
            $post_offset = $this->input->post('offset');
            $filter = $this->input->post('filter');
            $url_pagination = $this->input->post('url_pagination');
            // dump($tahun_angkatan);
            // die;

            $filter_angkatan = null;
            $filter_prodi = null;
            $filter_krs = null;
            $filter_search = null;
            $cek_len = 0;
            if (isset($filter['angkatan'])) {
                $filter_angkatan = $filter['angkatan'];
            }
            if (isset($filter['status_krs'])) {
                $filter_krs = $filter['status_krs'];
            }
            if (isset($filter['prodi'])) {
                $filter_prodi = $filter['prodi'];
            }
            if (isset($filter['search'])) {
                $filter_search = $filter['search'];
                $cek_len = strlen($filter_search);
            }
            $cek_krs = $this->mahasiswa->get_krs(['id_tahun_ajaran' => date('Y') . '1'])->result_array();
            $nim_krs = [];
            foreach ($cek_krs as $mhs) {
                $nim_krs[] = $mhs['nipd'];
            }
            $nim_krs = implode(',', $nim_krs);
            // var_dump(($nim_krs));
            // die;

            $where = [];

            // Global filter: only show angkatan >= 2013 and <= current year
            $angkatan_expr = 'CAST(CASE WHEN LENGTH(mpt.nipd) <= 8 THEN CONCAT("200", SUBSTR(mpt.nipd,1,1)) ELSE CONCAT("20", SUBSTR(mpt.nipd,1,2)) END AS UNSIGNED)';
            $where[$angkatan_expr . ' >='] = 2013;
            $where[$angkatan_expr . ' <='] = date('Y');

            if ($filter_angkatan != null && $filter_angkatan != '0') {
                $where[$angkatan_expr . ' ='] = $filter_angkatan;
            }

            $filter_sync = null;
            if (isset($filter['status_sync'])) {
                $filter_sync = $filter['status_sync'];
            }

            if ($filter_prodi != null && $filter_prodi != '0') {
                $where['mpt.id_sms ='] = $filter_prodi;
            }

            if ($filter_sync !== null && $filter_sync !== 'all' && $filter_sync !== '') {
                if ($filter_sync == '2') {
                    $where['mpt.id_feeder IS NOT NULL AND mpt.id_feeder != "" AND mpt.id_riwayat_pendidikan_feeder IS NOT NULL AND mpt.id_riwayat_pendidikan_feeder != ""'] = null;
                } else if ($filter_sync == '1') {
                    $where['mpt.id_feeder IS NOT NULL AND mpt.id_feeder != "" AND (mpt.id_riwayat_pendidikan_feeder IS NULL OR mpt.id_riwayat_pendidikan_feeder = "")'] = null;
                } else if ($filter_sync == '0') {
                    $where['(mpt.id_feeder IS NULL OR mpt.id_feeder = "")'] = null;
                }
            }

            if ($cek_len > 0) {
                if (is_numeric($filter_search)) {
                    $where['mpt.nipd LIKE'] = "%" . $filter_search . "%";
                } else {
                    $where['mahasiswa.nm_pd LIKE'] = "%" . $filter_search . "%";
                }
            }

            if (empty($where)) {
                $where = null;
            }
            // dump($where);
            // die;

            if ($post_offset != null) {
                $offset = $post_offset;
            } else {
                $offset = 0;
            }
            if ($post_limit != 0) {
                $limit = $post_limit;
            } else {
                $limit = 10;
            }
            if ($offset != 0) {
                $offset = ($offset - 1) * $limit;
            }

            $this->load->library('pagination');

            $condition = [
                'table' => 'mahasiswa',
                'limit' => $limit,
                'offset' => $offset,
                'where' => $where,
                // 'where_in' => $where_in,
                'join_tbl' => [
                    0 => [
                        'table' => 'mahasiswa_pt mpt',
                        'on' => 'mahasiswa.id_pd = mpt.id_pd',
                        'join_type' => 'left'
                    ],
                    // 1 => [
                    //     'table' => 'krs_new kn',
                    //     'on' => 'kn.nipd = mpt.nipd',
                    //     'join_type' => 'left'
                    // ]
                ]
            ];
            $resMhs = $this->mahasiswa->get_list_data($condition)->result_array();
            $data['query'] = $this->db->last_query();
            // dump($resMhs);
            // die;
            foreach ($resMhs as $i => $val) {
                // Default sync_history to 2 (loading) to be checked via ajax in view to prevent slow loading
                // Default sync_history to 0 so the sync button is always rendered for manual QA
                $resMhs[$i]['sync_history'] = 2;




                $resMhs[$i]['aktif_krs'] = 1;
                // $param_mpt = [
                //     'table' => 'mahasiswa_pt',
                //     'where' => ['id_pd' => $val['id_pd']],
                // ];
                // $mhsPT = $this->mahasiswa->get_data($param_mpt)->row_array();
                $dataProdi = $this->prodi->get_data(['id' => $val['id_sms']])->row_array();
                $dataAgama = $this->masterdata->getData('masterdata_agama', 'nama_agama', ['id_agama' => $val['id_agama']])->row_array();
                $dataStatus = $this->masterdata->getData('masterdata_status_mahasiswa', 'status_mahasiswa', ['id' => $val['status']])->row_array();
                if ($dataAgama != null) {
                    $resMhs[$i]['nama_agama'] = $dataAgama['nama_agama'];
                }
                if (isset($val['nipd']) && strlen($val['nipd']) >= 9) {
                    $resMhs[$i]['angkatan'] = isset($val['nipd']) ? '20' . substr($val['nipd'], 0, 2) : '';
                    $kode_daftar = substr($val['nipd'], 5, 1);
                    if ($kode_daftar == '1') {
                        $resMhs[$i]['jenis_daftar'] = 'Peserta didik baru'; //'Reguler';
                    } elseif ($kode_daftar == '2') {
                        $resMhs[$i]['jenis_daftar'] = '(<b style="color: #007bff;">Konversi Internal (RPL)</b>)';
                    } elseif ($kode_daftar == '3') {
                        $resMhs[$i]['jenis_daftar'] = '(<b style="color: #ff0000;">Konversi Eksternal (RPL)</b>)';
                    } elseif ($kode_daftar == '4') {
                        $resMhs[$i]['jenis_daftar'] = 'Peserta didik baru </br>(<b>Beasiswa KIP</b>)';
                    } elseif ($kode_daftar == '5') {
                        $resMhs[$i]['jenis_daftar'] = 'Peserta didik baru </br>(<b>Beasiswa Yayasan</b>)';
                    } else {
                        $resMhs[$i]['jenis_daftar'] = 'Lainnya';
                    }
                } else {
                    $resMhs[$i]['angkatan'] = isset($val['nipd']) ? '200' . substr($val['nipd'], 0, 1) : '';
                    $resMhs[$i]['jenis_daftar'] = '-';
                }

                if ($resMhs[$i]['angkatan'] == $d) {
                    // $where
                    $cek_krs = $this->mahasiswa->get_krs(['nipd' => $val['nipd'], 'id_tahun_ajaran' => $d . '1'])->result_array();
                    $resMhs[$i]['data_krs'] = $cek_krs;
                    if (count($cek_krs) <= 0) {
                        $resMhs[$i]['aktif_krs'] = 0;
                    }
                }

                if ($val['jk'] == 'L') {
                    $resMhs[$i]['jk'] = 'Laki-laki';
                } else {
                    $resMhs[$i]['jk'] = 'Perempuan';
                }

                $resMhs[$i]['id_feeder'] = $val['id_feeder'];
                $resMhs[$i]['nipd'] = $val['nipd'];
                $resMhs[$i]['prodi'] = $dataProdi['nama_program_studi'];
                // $resMhs[$i]['status'] = $dataStatus['nama_status_mahasiswa'];

                // $Conf = $this->feeder->get_data()->row(); // Get data config
                // $this->__token__ = get_token($Conf); // Get Token Feeder from config account

                // $data_param = [
                //     "act" => "GetListMahasiswa",
                //     "token" => $this->__token__,
                //     "filter" => "nama_mahasiswa = '" . $val['nm_pd'] . "'",
                //     "limit" => '',
                //     "offset" => ''
                // ];
                // $response = service_request($data_param, $Conf);
                // $jsonResponse = json_encode($response);
                // $decodeData = json_decode($jsonResponse, true);
                // $resMhs[$i]['feeder'] = $decodeData['data'];
                // return json_decode($jsonResponse, true);


            }
            $data['mhs'] = $resMhs;
            $fil = [
                'table' => 'mahasiswa',
                'where' => $where,
                'join_tbl' => [
                    0 => [
                        'table' => 'mahasiswa_pt mpt',
                        'on' => 'mahasiswa.id_pd = mpt.id_pd',
                        'join_type' => ''
                    ],
                ]
            ];
            $data['total_data'] = $this->mahasiswa->getCount($fil);
            // $data['total_data'] = $this->mahasiswa->getData($condition)->num_rows();
            $total_page = ($data['total_data'] / $limit);
            $convert_data = intval(preg_replace('/[^\d.]/', '', $total_page));
            $data['total_page'] = $convert_data;
            $data['current_page'] = $offset;
            $data['limit_per_page'] = $post_limit;
            $data["uri_segment"] = $where;


            // config pagination
            $config['base_url'] = base_url('import/mahasiswa/get_list_data');
            $config['total_rows'] = $data['total_data'];
            $config['per_page'] = $limit;
            $config["uri_segment"] = 4;
            $config['use_page_numbers'] = TRUE;
            $config['first_link'] = FALSE;
            $config['last_link'] = FALSE;

            // ============ config css pagination ======================
            $config['full_tag_open'] = "<nav aria-label='Page navigation example'><ul class='pagination pagination-sm float-end'>";
            $config['full_tag_close'] = '</ul></nav>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link"  href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
            $config['prev_tag_open'] = '<li class="page-item prev">';
            $config['prev_tag_close'] = '</li>';


            $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
            $config['next_tag_open'] = '<li class="page-item next">';
            $config['next_tag_close'] = '</li>';
            // ============ End config css pagination ======================

            $this->pagination->initialize($config);
            $data['pagination_link'] = $this->pagination->create_links();


            $res = [
                'code' => 200,
                'status' => true,
                'message' => 'Success',
                'data' => $data,
            ];
            echo json_encode($res);
        } else {
            handler_404();
        }
    }

    // new function
    public function check_sync_history()
    {
        if ($this->input->is_ajax_request()) {
            $nipd = $this->input->post('nipd');
            $Conf = $this->feeder->get_data()->row();
            $this->__token__ = get_token($Conf);

            $sync_status = 0;
            $msg_sync = '';

            $data_param = [
                'token' => $this->__token__,
                "act" => 'GetListRiwayatPendidikanMahasiswa',
                "filter" => "nim = '" . $nipd . "'",
                "limit" => "",
                "offset" => ""
            ];
            $response = service_request($data_param, $Conf);
            $jsonResponse = json_encode($response);
            $data = json_decode($jsonResponse, true);

            if (isset($response->error_code) && $response->error_code == 0) {
                if (isset($data['data']) && count($data['data']) > 0) {
                    $sync_status = 1;
                    $id_pd = $this->input->post('id_pd');
                    if ($id_pd) {
                        $this->mahasiswa->update_data([
                            'table' => 'mahasiswa_pt',
                            'where' => ['id_pd' => $id_pd],
                            'data' => ['id_riwayat_pendidikan_feeder' => $data['data'][0]['id_registrasi_mahasiswa']]
                        ]);
                    }
                }
            } else {
                $sync_status = 99;
                $msg_sync = 'Koneksi terputus.';
            }

            echo json_encode(['status' => $sync_status, 'msg' => $msg_sync]);
        }
    }

    function cek_data_from_feeder(array $data, object $config)
    {
        $this->__token__ = $data['token'];
        $nm_pd = $data['nm_pd'];
        $action = $data['action'];

        $data_param = [
            'token' => $this->__token__,
            "act" => $action,
            "filter" => "nama_mahasiswa = '" . $nm_pd . "'",
            "limit" => "",
            "offset" => ""
        ];
        $response = service_request($data_param, $config);
        $jsonResponse = json_encode($response);
        return json_decode($jsonResponse, true);
    }

    public function insert_data_to_feeder(array $data, object $config)
    {
        $data_param = [
            "act" => "InsertBiodataMahasiswa",
            "token" => $data['token'],
            "record" => $data['record']
        ];
        $response = service_request($data_param, $config);
        $jsonResponse = json_encode($response);
        return json_decode($jsonResponse, true);
    }

    public function sync_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $Conf = $this->feeder->get_data()->row(); // Get data config
            $this->__token__ = get_token($Conf); // Get Token Feeder from config account


            $id_pd = $data_post['id_pd'];
            $nipd = $data_post['nipd'];
            $query = $data_post['query'];

            $convert_str = explode(" ", $query);
            $model = strtolower($convert_str[(count($convert_str) - 1)]);
            $data_post['action'] = implode($convert_str);
            $data_post['token'] = $this->__token__; // Get Token Feeder from config account

            $responseArray = $this->cek_data_from_feeder($data_post, $Conf);
            $data_feeder = $responseArray['data'];
            $error_code = $responseArray['error_code'];
            $response_status = $responseArray['error_desc'];

            // dump($responseArray);
            // die;

            if ($error_code === 0) {
                // insert data baru ke feeder
                $param = [
                    'table' => $model,
                    'where' => ['id_pd' => $id_pd]
                ];
                $data_mhs = $this->$model->get_data($param)->row_array();
                // dump($data_mhs);
                // die;

                $ds = $data_mhs;
                $valid_penghasilan = array_column($this->db->get('masterdata_penghasilan')->result_array(), 'id_penghasilan');
                $valid_kebutuhan = array_column($this->db->get('masterdata_kebutuhan_khusus')->result_array(), 'id_kebutuhan_khusus');

                $penghasilan_fields = ['id_penghasilan_ayah', 'id_penghasilan_ibu', 'id_penghasilan_wali'];
                foreach ($penghasilan_fields as $f) {
                    if (!isset($ds[$f]) || !in_array((string) $ds[$f], $valid_penghasilan)) {
                        $ds[$f] = '0';
                    }
                }

                $kebutuhan_fields = ['id_kebutuhan_khusus_mahasiswa', 'id_kebutuhan_khusus_ayah', 'id_kebutuhan_khusus_ibu'];
                foreach ($kebutuhan_fields as $f) {
                    if (!isset($ds[$f]) || !in_array((string) $ds[$f], $valid_kebutuhan)) {
                        $ds[$f] = '0';
                    }
                }

                $data_post['record'] = [
                    "nama_mahasiswa" => $ds['nm_pd'],
                    "jenis_kelamin" => $ds['jk'],
                    "tempat_lahir" => $ds['tmpt_lahir'],
                    "tanggal_lahir" => $ds['tgl_lahir'],
                    "id_agama" => $ds['id_agama'],
                    "nik" => $ds['nik'],
                    "nisn" => $ds['nisn'],
                    "npwp" => $ds['npwp'],
                    "kewarganegaraan" => $ds['kewarganegaraan'],
                    "jalan" => $ds['jln'],
                    "dusun" => $ds['nm_dsn'],
                    "rt" => $ds['rt'],
                    "rw" => $ds['rw'],
                    "kelurahan" => $ds['ds_kel'],
                    "kode_pos" => $ds['kode_pos'],
                    "id_wilayah" => $ds['id_wil_feeder'],
                    "id_jenis_tinggal" => $ds['id_jns_tinggal'],
                    "id_alat_transportasi" => $ds['id_alat_transport'],
                    "telepon" => $ds['telepon_rumah'],
                    "handphone" => $ds['telepon_seluler'],
                    "email" => $ds['email'],
                    "penerima_kps" => $ds['a_terima_kps'],
                    "nomor_kps" => $ds['no_kps'],
                    // "id_wilayah"                     =>   $ds['id_wil'],

                    // data ibu
                    "nama_ibu_kandung" => $ds['nm_ibu_kandung'],
                    "tanggal_lahir_ibu" => $ds['tgl_lahir_ibu'],
                    "nik_ibu" => $ds['nik_ibu'],
                    "id_kebutuhan_khusus_ibu" => $ds['id_kebutuhan_khusus_ibu'],
                    "id_pendidikan_ibu" => $ds['id_jenjang_pendidikan_ibu'],
                    "id_pekerjaan_ibu" => $ds['id_pekerjaan_ibu'],
                    "id_penghasilan_ibu" => $ds['id_penghasilan_ibu'],
                    "id_kebutuhan_khusus_ibu" => $ds['id_kebutuhan_khusus_ibu'],
                    // data ayah
                    "nik_ayah" => $ds['nik_ayah'],
                    "nama_ayah" => $ds['nm_ayah'],
                    "tanggal_lahir_ayah" => $ds['tgl_lahir_ayah'],
                    "id_pendidikan_ayah" => $ds['id_jenjang_pendidikan_ayah'],
                    "id_pekerjaan_ayah" => $ds['id_pekerjaan_ayah'],
                    "id_penghasilan_ayah" => $ds['id_penghasilan_ayah'],
                    "id_kebutuhan_khusus_ayah" => $ds['id_kebutuhan_khusus_ayah'],
                    // data wali
                    "nama_wali" => $ds['nm_wali'],
                    // "tanggal_lahir_wali"            =>   $ds['tgl_lahir_wali'],
                    "id_pendidikan_wali" => $ds['id_jenjang_pendidikan_wali'],
                    "id_pekerjaan_wali" => $ds['id_pekerjaan_wali'],
                    "id_penghasilan_wali" => $ds['id_penghasilan_wali'],
                    "id_kebutuhan_khusus_mahasiswa" => $ds['id_kebutuhan_khusus_mahasiswa'],
                ];
                // var_dump($data_post['record']);
                // die;
                $responseArray = $this->insert_data_to_feeder($data_post, $Conf);
                $data_feeder = $responseArray['data'];
                $error_code = $responseArray['error_code'];
                $response_status = $responseArray['error_desc'];
                // var_dump($responseArray);
                // die;
                if ($error_code != 0) {
                    if (strpos(strtolower($response_status), 'nik sudah digunakan') !== false || (strpos(strtolower($response_status), 'nik') !== false && strpos(strtolower($response_status), 'sudah ada') !== false)) {
                        $fetch_param = [
                            'token' => $this->__token__,
                            "act" => 'GetBiodataMahasiswa',
                            "filter" => "nik = '" . $data_post['record']['nik'] . "'",
                            "limit" => "1",
                            "offset" => "0"
                        ];
                        $response_fetch = service_request($fetch_param, $Conf);
                        $json_fetch = json_encode($response_fetch);
                        $arr_fetch = json_decode($json_fetch, true);

                        if ($arr_fetch['error_code'] == 0 && count($arr_fetch['data']) > 0) {
                            $id_feeder = $arr_fetch['data'][0]['id_mahasiswa'];

                            $update_param = [
                                'table' => 'mahasiswa_pt',
                                'where' => ['id_pd' => $id_pd],
                                'data' => ['id_feeder' => $id_feeder]
                            ];
                            $updated = $this->$model->update_data($update_param);
                            if ($updated) {
                                $status = true;
                                $res_code = 0;
                                $msg = 'Data sudah ada di Feeder. Sinkronisasi id_feeder (NIK: ' . $data_post['record']['nik'] . ') berhasil ditautkan!';
                                $data = [
                                    'id_pd' => $id_pd,
                                    'nipd' => $nipd,
                                    'id_feeder' => $id_feeder
                                ];
                            } else {
                                $status = false;
                                $res_code = 500;
                                $msg = 'Gagal menyimpan id_feeder ke database lokal.';
                                $data = ['id_pd' => $id_pd, 'nipd' => $nipd];
                            }
                        } else {
                            $status = false;
                            $res_code = $error_code;
                            $msg = $response_status . " (Gagal tarik ID via NIK)";
                            $data = ['id_pd' => $id_pd, 'nipd' => $nipd];
                        }
                    } else {
                        $status = false;
                        $res_code = $error_code;
                        $msg = $response_status;
                        $data = [
                            'id_pd' => $id_pd,
                            'nipd' => $nipd
                        ];
                    }
                } else {
                    // query insert id feeder ke simak
                    $update_param = [
                        'table' => 'mahasiswa_pt',
                        'where' => [
                            'id_pd' => $id_pd
                        ],
                        'data' => [
                            'id_feeder' => $data_feeder['id_mahasiswa'],
                        ]
                    ];
                    $updated = $this->$model->update_data($update_param);
                    if (!$updated) {
                        $status = false;
                        $res_code = 500;
                        $msg = "ERROR, entah kenapa";
                        $data = $data_feeder['id_mahasiswa'];
                    } else {
                        $status = true;
                        $res_code = $error_code;
                        $msg = 'Data mahasiswa dengan nim ' . $nipd . ' berhasil ditambahkan ke feeder!';
                        $data = [
                            'id_pd' => $id_pd,
                            'nipd' => $nipd,
                            'id_feeder' => $data_feeder['id_mahasiswa']
                        ];
                    }
                }
            } else {
                // insert id_pd_feeder ke simak untuk keperluan update data
                if ($error_code != 121) {
                    foreach ($data_feeder as $val) {
                        $update_param = [
                            'table' => 'mahasiswa_pt',
                            'where' => [
                                'id_pd' => $id_pd
                            ],
                            'data' => [
                                'id_feeder' => $val['id_mahasiswa'],
                            ]
                        ];
                        $update = $this->$model->update_data($update_param);
                        if (!$update) {
                            // update gagal
                            $status = false;
                            $res_code = $error_code;
                            $msg = 'Id Feeder mahasiswa, gagal di insert ke simak!';
                            $data = [
                                'id_pd' => $id_pd,
                                'nipd' => $nipd,
                                'id_feeder' => $val['id_mahasiswa']
                            ];
                        } else {
                            $status = true;
                            $res_code = $error_code;
                            $msg = 'Id Feeder berhasil di insert ke simak!';
                            $data = [
                                'id_pd' => $id_pd,
                                'nipd' => $nipd,
                                'id_feeder' => $val['id_mahasiswa']
                            ];
                        }
                    }
                } else {
                    $status = false;
                    $res_code = $error_code;
                    $msg = $response_status;
                    $data = null;
                }
            }

            $response = [
                'status' => $status,
                'res_code' => $res_code,
                'msg' => $msg,
                'data' => $data
            ];
        } else {
            $response = [
                'status' => false,
                'res_code' => 500,
                'msg' => 'Invalid Request',
                'data' => null
            ];
        }
        echo json_encode($response);
    }

    public function sync_batch()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $filter_angkatan = $data_post['angkatan'];
            $filter_prodi = $data_post['prodi'];

            $data_mhs_simak = [];
            if ($filter_angkatan != 'All') {
                $substr = substr($filter_angkatan, 2, 2);
                $str = (int) $substr;
                $substrl_len = '';
                if ($str <= 9) {
                    $substrl_len = 1;
                } else {
                    $substrl_len = 2;
                }

                if ($filter_prodi != '') {
                    $condition = [
                        'table' => 'mahasiswa_pt',
                        'where' => [
                            'substr(nipd, 1, ' . $substrl_len . ')=' => (string) $str,
                            'id_sms' => (string) $filter_prodi
                        ]
                    ];
                } else {
                    $condition = [
                        'table' => 'mahasiswa_pt',
                        'where' => [
                            'substr(nipd, 1, ' . $substrl_len . ')=' => (string) $str,
                            'id_feeder' => ''
                        ]
                    ];
                }
            } else {
                $condition = [
                    'table' => 'mahasiswa_pt',
                    'where' => ['id_feeder' => '']
                ];
            }
            $data_mpt = $this->mahasiswa->get_data($condition)->result_array();

            // var_dump($data_mpt);
            // die;
            $numb = 0;
            foreach ($data_mpt as $i => $mpt) {
                if ($mpt['id_feeder'] == '') {
                    $condition = [
                        'table' => 'mahasiswa',
                        'where' => ['id_pd' => $mpt['id_pd']]
                    ];
                    $data_mhs_simak[$numb] = $this->mahasiswa->get_data($condition)->row_array();
                    $data_mhs_simak[$numb]['nipd'] = $mpt['nipd'];
                    $numb++;
                }
            }
            // var_dump($data_mhs_simak);
            // die;
            // $Conf = $this->feeder->get_data()->row(); // Get data config
            // $this->__token__ = get_token($Conf); // Get Token Feeder from config account
            // $data_post['token'] = $this->__token__;

            $dataFromFeeder = [];
            $status = false;
            $msg = [];
            $dataF = [];

            $valid_penghasilan = array_column($this->db->get('masterdata_penghasilan')->result_array(), 'id_penghasilan');
            $valid_kebutuhan = array_column($this->db->get('masterdata_kebutuhan_khusus')->result_array(), 'id_kebutuhan_khusus');

            foreach ($data_mhs_simak as $j => $ds) {
                // KRS Check
                $nipd_len = strlen($ds['nipd']);
                $angkatan = ($nipd_len <= 8) ? '200' . substr($ds['nipd'], 0, 1) : '20' . substr($ds['nipd'], 0, 2);
                $current_year = date('Y');

                if ($angkatan != $current_year) {
                    // Check if student has KRS for their angkatan year on db_simak
                    $krs_param = [
                        'table' => 'krs_new',
                        'where' => [
                            'nipd' => $ds['nipd'],
                            'SUBSTR(id_tahun_ajaran, 1, 4) =' => $angkatan
                        ]
                    ];
                    $krs_check = $this->mahasiswa->get_data($krs_param)->row_array();
                    if (!$krs_check) {
                        $msg[] = "Sinkronisasi dibatalkan: Mahasiswa " . $ds['nm_pd'] . " (" . $ds['nipd'] . ") belum mengisi KRS pada tahun angkatan " . $angkatan;
                        $status = false;
                        continue;
                    }
                }

                $Conf = $this->feeder->get_data()->row(); // Get data config
                $this->__token__ = get_token($Conf); // Get Token Feeder from config account
                $data_post['token'] = $this->__token__;

                $data_post['action'] = 'GetListMahasiswa';
                // $data_post['nm_pd'] = 'MUHAMMAD AMIN IBADURRAHMAN';
                $data_post['nm_pd'] = $ds['nm_pd'];
                $responseArray = $this->cek_data_from_feeder($data_post, $Conf);

                $data_feeder = isset($responseArray['data']) ? $responseArray['data'] : [];
                $error_code = isset($responseArray['error_code']) ? $responseArray['error_code'] : null;
                $jumlah = isset($responseArray['jumlah']) ? $responseArray['jumlah'] : (is_array($data_feeder) ? count($data_feeder) : 0);
                $response_status = isset($responseArray['error_desc']) ? $responseArray['error_desc'] : null;
                if (isset($data_feeder[0]['id_mahasiswa'])) {
                    $dataFromFeeder[$j] = $data_feeder;
                }

                if ($jumlah > 0) {
                    if (isset($data_feeder[0]['id_mahasiswa'])) {
                        // get id feeder and insert to simak
                        $update_param = [
                            'table' => 'mahasiswa_pt',
                            'where' => [
                                'id_pd' => $ds['id_pd']
                            ],
                            'data' => [
                                'id_feeder' => $data_feeder[0]['id_mahasiswa'],
                            ]
                        ];
                        $updated = $this->mahasiswa->update_data($update_param);
                        if (!$updated) {
                            $msg[] = "ERROR, entah kenapa";
                            $status = false;
                            $dataF[] = $data_feeder[0]['id_mahasiswa'];
                        } else {
                            $msg[] = 'Data mahasiswa dengan nim ' . $ds['nipd'] . ' berhasil ditambahkan ke feeder!';
                            $status = true;
                            $dataF[] = $data_feeder[0]['id_mahasiswa'];
                        }
                    }
                } else {
                    // insert ke 
                    $data_post['action'] = 'InsertBiodataMahasiswa';

                    $penghasilan_fields = ['id_penghasilan_ayah', 'id_penghasilan_ibu', 'id_penghasilan_wali'];
                    foreach ($penghasilan_fields as $f) {
                        if (!isset($ds[$f]) || !in_array((string) $ds[$f], $valid_penghasilan)) {
                            $ds[$f] = '0';
                        }
                    }

                    $kebutuhan_fields = ['id_kebutuhan_khusus_mahasiswa', 'id_kebutuhan_khusus_ayah', 'id_kebutuhan_khusus_ibu'];
                    foreach ($kebutuhan_fields as $f) {
                        if (!isset($ds[$f]) || !in_array((string) $ds[$f], $valid_kebutuhan)) {
                            $ds[$f] = '0';
                        }
                    }

                    $data_post['record'] = [
                        "nama_mahasiswa" => $ds['nm_pd'],
                        "jenis_kelamin" => $ds['jk'],
                        "tempat_lahir" => $ds['tmpt_lahir'],
                        "tanggal_lahir" => $ds['tgl_lahir'],
                        "id_agama" => $ds['id_agama'],
                        "nik" => $ds['nik'],
                        "nisn" => $ds['nisn'],
                        "npwp" => $ds['npwp'],
                        "kewarganegaraan" => $ds['kewarganegaraan'],
                        "jalan" => $ds['jln'],
                        "dusun" => $ds['nm_dsn'],
                        "rt" => $ds['rt'],
                        "rw" => $ds['rw'],
                        "kelurahan" => $ds['ds_kel'],
                        "kode_pos" => $ds['kode_pos'],
                        "id_wilayah" => $ds['id_wil_feeder'],
                        "id_jenis_tinggal" => $ds['id_jns_tinggal'],
                        "id_alat_transportasi" => $ds['id_alat_transport'],
                        "telepon" => $ds['telepon_rumah'],
                        "handphone" => $ds['telepon_seluler'],
                        "email" => $ds['email'],
                        "penerima_kps" => $ds['a_terima_kps'],
                        "nomor_kps" => $ds['no_kps'],
                        // "id_wilayah"                     =>   $ds['id_wil'],

                        // data ibu
                        "nama_ibu_kandung" => $ds['nm_ibu_kandung'],
                        "tanggal_lahir_ibu" => $ds['tgl_lahir_ibu'],
                        "nik_ibu" => $ds['nik_ibu'],
                        "id_kebutuhan_khusus_ibu" => $ds['id_kebutuhan_khusus_ibu'],
                        "id_pendidikan_ibu" => $ds['id_jenjang_pendidikan_ibu'],
                        "id_pekerjaan_ibu" => $ds['id_pekerjaan_ibu'],
                        "id_penghasilan_ibu" => $ds['id_penghasilan_ibu'],
                        "id_kebutuhan_khusus_ibu" => $ds['id_kebutuhan_khusus_ibu'],
                        // data ayah
                        "nik_ayah" => $ds['nik_ayah'],
                        "nama_ayah" => $ds['nm_ayah'],
                        "tanggal_lahir_ayah" => $ds['tgl_lahir_ayah'],
                        "id_pendidikan_ayah" => $ds['id_jenjang_pendidikan_ayah'],
                        "id_pekerjaan_ayah" => $ds['id_pekerjaan_ayah'],
                        "id_penghasilan_ayah" => $ds['id_penghasilan_ayah'],
                        "id_kebutuhan_khusus_ayah" => $ds['id_kebutuhan_khusus_ayah'],
                        // data wali
                        "nama_wali" => $ds['nm_wali'],
                        // "tanggal_lahir_wali"            =>   $ds['tgl_lahir_wali'],
                        "id_pendidikan_wali" => $ds['id_jenjang_pendidikan_wali'],
                        "id_pekerjaan_wali" => $ds['id_pekerjaan_wali'],
                        "id_penghasilan_wali" => $ds['id_penghasilan_wali'],
                        "id_kebutuhan_khusus_mahasiswa" => $ds['id_kebutuhan_khusus_mahasiswa'],
                    ];
                    // dump($data_post['record']);
                    // die;

                    $responseArray = $this->insert_data_to_feeder($data_post, $Conf);
                    // $response = $this->feeder->makeRequest($paramFeeder);
                    // $responseArray = json_decode($response, true);

                    $dataFeeder = $responseArray['data'];
                    $error_code = $responseArray['error_code'];
                    $response_status = $responseArray['error_desc'];
                    // dump($responseArray);
                    // die;
                    // $msg = [];
                    // $dataF = [];

                    if ($error_code != 0) {
                        if (strpos(strtolower($response_status), 'nik sudah digunakan') !== false || (strpos(strtolower($response_status), 'nik') !== false && strpos(strtolower($response_status), 'sudah ada') !== false)) {
                            $fetch_param = [
                                'token' => $this->__token__,
                                "act" => 'GetBiodataMahasiswa',
                                "filter" => "nik = '" . $data_post['record']['nik'] . "'",
                                "limit" => "1",
                                "offset" => "0"
                            ];
                            $response_fetch = service_request($fetch_param, $Conf);
                            $json_fetch = json_encode($response_fetch);
                            $arr_fetch = json_decode($json_fetch, true);

                            if ($arr_fetch['error_code'] == 0 && count($arr_fetch['data']) > 0) {
                                $id_feeder = $arr_fetch['data'][0]['id_mahasiswa'];
                                $update_param = [
                                    'table' => 'mahasiswa_pt',
                                    'where' => ['id_pd' => $ds['id_pd']],
                                    'data' => ['id_feeder' => $id_feeder]
                                ];
                                $this->mahasiswa->update_data($update_param);
                                $status = true;
                                $msg[] = "Sinkronisasi id_feeder (NIK: " . $data_post['record']['nik'] . ") berhasil ditautkan!";
                                $dataF[] = 'Tersimpan';
                            } else {
                                $msg[] = $response_status . " (Gagal tarik ID via NIK)";
                                $status = false;
                                $dataF[] = 'Error ' . $error_code;
                            }
                        } else {
                            $msg[] = $response_status;
                            $status = false;
                            $dataF[] = 'Error ' . $error_code;
                        }
                    } else {
                        // query insert ke simak
                        $update_param = [
                            'table' => 'mahasiswa_pt',
                            'where' => [
                                'id_pd' => $ds['id_pd']
                            ],
                            'data' => [
                                'id_feeder' => $dataFeeder['id_mahasiswa'],
                            ]
                        ];
                        $updated = $this->mahasiswa->update_data($update_param);
                        if (!$updated) {
                            $msg[] = "Error update to simak, nama : " . $ds['nm_pd'];
                            $status = false;
                            $dataF[] = $dataFeeder['id_mahasiswa'];
                        } else {
                            $msg[] = 'Data mahasiswa dengan nim ' . $ds['nipd'] . ' berhasil ditambahkan ke feeder!';
                            $status = true;
                            $dataF[] = $dataFeeder['id_mahasiswa'];
                        }
                    }
                }
            }
            // var_dump($dataFromFeeder);
            // die;
            $response = [
                'status' => $status,
                'msg' => $msg,
                'data' => $dataF
            ];
            echo json_encode($response);
        } else {
            handler_404();
        }
    }

    public function sync_batch_history()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $filter_angkatan = $data_post['angkatan'];
            $filter_prodi = $data_post['prodi'];

            $data_mhs_simak = [];
            if ($filter_angkatan != 'All') {
                $substr = substr($filter_angkatan, 2, 2);
                $str = (int) $substr;
                $substrl_len = '';
                if ($str <= 9) {
                    $substrl_len = 1;
                } else {
                    $substrl_len = 2;
                }

                if ($filter_prodi != '') {
                    $condition = [
                        'table' => 'mahasiswa_pt',
                        'where' => [
                            'substr(nipd, 1, ' . $substrl_len . ')=' => (string) $str,
                            'id_sms' => (string) $filter_prodi,
                            'id_feeder !=' => ''
                        ]
                    ];
                } else {
                    $condition = [
                        'table' => 'mahasiswa_pt',
                        'where' => [
                            'substr(nipd, 1, ' . $substrl_len . ')=' => (string) $str,
                            'id_feeder !=' => ''
                        ]
                    ];
                }
            } else {
                $condition = [
                    'table' => 'mahasiswa_pt',
                    'where' => ['id_feeder !=' => '']
                ];
            }
            $data_mpt = $this->mahasiswa->get_data($condition)->result_array();

            $Conf = $this->feeder->get_data()->row();
            $this->__token__ = get_token($Conf);

            $data_param = [
                'token' => $this->__token__,
                'act' => 'GetProfilPT'
            ];
            $responseProfil = service_request($data_param, $Conf);
            $jsonProfil = json_encode($responseProfil);
            $data_Profil = json_decode($jsonProfil, true);
            $id_pt = $data_Profil['data'][0]['id_perguruan_tinggi'];

            $status = false;
            $msg = [];
            $dataF = [];
            $success_count = 0;
            $error_count = 0;

            foreach ($data_mpt as $mpt) {
                $panjang_nim = strlen($mpt['nipd']);
                if ($panjang_nim > 8) {
                    $periode_masuk = '20' . substr($mpt['nipd'], 0, 2) . '1';
                    $angkatan = '20' . substr($mpt['nipd'], 0, 2);
                } else {
                    $periode_masuk = '200' . substr($mpt['nipd'], 0, 1) . '1';
                    $angkatan = '200' . substr($mpt['nipd'], 0, 1);
                }

                $dataProdi = $this->prodi->get_data(['id' => $mpt['id_sms']])->row_array();
                $jenjang_didik = isset($dataProdi['nama_jenjang_pendidikan']) ? $dataProdi['nama_jenjang_pendidikan'] : 'S1';
                $cek_konversi = substr($mpt['nipd'], 5, 1);
                $dataPendaftaran = $this->masterdata->getData('masterdata_jenis_pendaftaran', 'nama_jenis_daftar', ['id_jenis_daftar' => $cek_konversi])->row_array();

                $id_jenis_daftar = 1;
                if (isset($dataPendaftaran['id_jenis_daftar'])) {
                    $id_jenis_daftar = $dataPendaftaran['id_jenis_daftar'];
                } elseif (isset($mpt['id_jns_daftar']) && $mpt['id_jns_daftar'] != '') {
                    $id_jenis_daftar = $mpt['id_jns_daftar'];
                }

                if (substr($mpt['nipd'], 2, 3) == '113') {
                    $id_pembiayaan = 3;
                    $biaya_awal = 2400000;
                } else {
                    $id_pembiayaan = 1;
                    $where_jnj = ['angkatan' => $angkatan];
                    $dataBiaya = $this->masterdata->getDataBiayaKuliah($where_jnj)->row_array();
                    if ($dataBiaya) {
                        if ($jenjang_didik == 'S1') {
                            $biaya_awal = (isset($dataBiaya['PK']) ? $dataBiaya['PK'] : 0) + (isset($dataBiaya['CS']) ? $dataBiaya['CS'] : 0);
                        } else {
                            $biaya_awal = (isset($dataBiaya['PK_D3']) ? $dataBiaya['PK_D3'] : 0) + (isset($dataBiaya['CS_D3']) ? $dataBiaya['CS_D3'] : 0);
                        }
                    } else {
                        $biaya_awal = 0;
                    }
                }

                $data['record'] = [
                    'nim' => $mpt['nipd'],
                    'id_jenis_daftar' => $id_jenis_daftar,
                    'id_jalur_daftar' => 12,
                    'id_periode_masuk' => $periode_masuk,
                    'tanggal_daftar' => $mpt['tgl_masuk_sp'],
                    'id_mahasiswa' => $mpt['id_feeder'],
                    'id_pembiayaan' => $id_pembiayaan,
                    'biaya_masuk' => $biaya_awal,
                    'id_perguruan_tinggi' => $id_pt,
                    'id_prodi' => isset($dataProdi['id_prodi']) ? $dataProdi['id_prodi'] : '',
                ];

                $data_param = [
                    'token' => $this->__token__,
                    "act" => 'InsertRiwayatPendidikanMahasiswa',
                    "record" => $data['record'],
                ];
                $response = service_request($data_param, $Conf);
                $jsonResponse = json_encode($response);
                $responseArray = json_decode($jsonResponse, true);


                if (isset($responseArray['error_code']) && $responseArray['error_code'] == 0) {
                    $this->mahasiswa->update_data([
                        'table' => 'mahasiswa_pt',
                        'where' => ['id_pd' => $mpt['id_pd']],
                        'data' => ['id_riwayat_pendidikan_feeder' => $responseArray['data']['id_registrasi_mahasiswa']]
                    ]);
                    $success_count++;
                } else {
                    $err_desc = isset($responseArray['error_desc']) ? $responseArray['error_desc'] : 'Unknown error';

                    $fetch_param = [
                        'token' => $this->__token__,
                        "act" => 'GetListRiwayatPendidikanMahasiswa',
                        "filter" => "nim = '" . $data['record']['nim'] . "'",
                        "limit" => "1",
                        "offset" => "0"
                    ];
                    $res_fetch = service_request($fetch_param, $Conf);
                    $res_fetch_arr = json_decode(json_encode($res_fetch), true);

                    if (isset($res_fetch_arr['error_code']) && $res_fetch_arr['error_code'] == 0 && count($res_fetch_arr['data']) > 0) {
                        $id_registrasi = $res_fetch_arr['data'][0]['id_registrasi_mahasiswa'];
                        $this->mahasiswa->update_data([
                            'table' => 'mahasiswa_pt',
                            'where' => ['id_pd' => $mpt['id_pd']],
                            'data' => ['id_riwayat_pendidikan_feeder' => $id_registrasi]
                        ]);
                        $success_count++;
                    } else {
                        $error_count++;
                        if (!in_array($err_desc, $msg)) {
                            $msg[] = $mpt['nipd'] . ": " . $err_desc;
                        }
                    }
                }
            }

            if ($success_count > 0 || $error_count == 0) {
                $status = true;
            }

            if (empty($msg)) {
                $msg[] = "Berhasil mensinkronisasi " . $success_count . " histori pendidikan.";
            } else {
                array_unshift($msg, "Berhasil: " . $success_count . ", Gagal: " . $error_count . ".");
            }

            $response = [
                'status' => $status,
                'msg' => implode("<br>", $msg),
                'res_code' => $status ? 'Success' : 'Error',
                'data' => []
            ];
            echo json_encode($response);
        } else {
            handler_404();
        }
    }

    public function update_data_to_feeder(array $data, object $config)
    {
        $data_param = [
            "act" => "UpdateBiodataMahasiswa",
            "token" => $data['token'],
            "key" => $data['key'],
            "record" => $data['record']
        ];
        $response = service_request($data_param, $config);
        $jsonResponse = json_encode($response);
        return json_decode($jsonResponse, true);
    }

    public function update_data()
    {
        if ($this->input->is_ajax_request()) {
            $Conf = $this->feeder->get_data()->row(); // Get data config
            $this->__token__ = get_token($Conf);
            $data_post = $this->input->post();

            $data_post['token'] = $this->__token__;

            $id_mhs = $data_post['data_mhs_id'];
            $data_update = [
                'nm_pd' => $data_post['data_mhs_nama'],
                'jk' => $data_post['data_mhs_jk'],
                'nisn' => $data_post['data_mhs_nisn'],
                'nik' => $data_post['data_mhs_nik'],
                'tmpt_lahir' => $data_post['data_mhs_tempat_lahir'],
                'tgl_lahir' => $data_post['data_mhs_tgl_lahir'],
                'id_agama' => $data_post['data_mhs_agama'],
                'npwp' => $data_post['data_mhs_npwp'],
                'jln' => $data_post['data_mhs_jln'],
                'rt' => $data_post['data_mhs_rt'],
                'rw' => $data_post['data_mhs_rw'],
                'nm_dsn' => $data_post['data_mhs_dusun'],
                'id_wil_feeder' => $data_post['data_mhs_kecamatan'],
                'ds_kel' => $data_post['data_mhs_kelurahan'],
                'kode_pos' => $data_post['data_mhs_kode_pos'],
                'nm_ibu_kandung' => $data_post['data_mhs_nama_ibu'],
                'tgl_lahir_ibu' => $data_post['data_mhs_tgl_lahir_ibu'],
                'kewarganegaraan' => $data_post['data_mhs_negara'],
                'a_terima_kps' => $data_post['data_mhs_terima_kps'],
                'email' => $data_post['data_mhs_email'],
                'id_jns_tinggal' => $data_post['data_mhs_jns_tinggal'],
                'id_alat_transport' => $data_post['data_mhs_alat_transportasi'],
                'telepon_rumah' => $data_post['data_mhs_tlp'],
                'telepon_seluler' => $data_post['data_mhs_hp'],
                'nik_ayah' => $data_post['data_mhs_nik_ayah'],
                'nik_ibu' => $data_post['data_mhs_nik_ibu'],
                'nm_ayah' => $data_post['data_mhs_nama_ayah'],
                'tgl_lahir_ayah' => $data_post['data_mhs_tgl_lahir_ayah'],
                'id_jenjang_pendidikan_ayah' => $data_post['data_mhs_pendidikan_ayah'],
                'id_pekerjaan_ayah' => $data_post['data_mhs_pekerjaan_ayah'],
                'id_penghasilan_ayah' => $data_post['data_mhs_penghasilan_ayah'],
                'id_jenjang_pendidikan_ibu' => $data_post['data_mhs_pendidikan_ibu'],
                'id_pekerjaan_ibu' => $data_post['data_mhs_pekerjaan_ibu'],
                'id_penghasilan_ibu' => $data_post['data_mhs_penghasilan_ibu'],
                'nm_wali' => $data_post['data_mhs_nama_wali'],
                'tgl_lahir_wali' => $data_post['data_mhs_tgl_lahir_wali'],
                'id_jenjang_pendidikan_wali' => $data_post['data_mhs_pendidikan_wali'],
                'id_pekerjaan_wali' => $data_post['data_mhs_pekerjaan_wali'],
                'id_penghasilan_wali' => $data_post['data_mhs_penghasilan_wali'],
                'id_kebutuhan_khusus_mahasiswa' => $data_post['data_mhs_kebutuhan_khusus'],
            ];
            $update_param = [
                'table' => 'mahasiswa',
                'where' => [
                    'id_pd' => $id_mhs
                ],
                'data' => $data_update
            ];
            $updated = $this->mahasiswa->update_data($update_param);
            if ($updated) {
                // update to feeder
                $data_post['action'] = 'GetBiodataMahasiswa';
                $data_post['nm_pd'] = $data_post['data_mhs_nama'];
                $responseArray1 = $this->cek_data_from_feeder($data_post, $Conf);
                $data_feeder = $responseArray1['data'];
                $error_code = $responseArray1['error_code'];
                $response_status = $responseArray1['error_desc'];

                if (count($data_feeder) > 0) {
                    // update to feeder
                    $data_post['key'] = [
                        'id_mahasiswa' => $data_feeder[0]['id_mahasiswa']
                    ];
                    $param = [
                        'table' => 'mahasiswa',
                        'where' => ['id_pd' => $id_mhs]
                    ];
                    $data_mhs = $this->mahasiswa->get_data($param)->row_array();
                    $ds = $data_mhs;
                    $data_post['record'] = [
                        "nama_mahasiswa" => $ds['nm_pd'],
                        "jenis_kelamin" => $ds['jk'],
                        "tempat_lahir" => $ds['tmpt_lahir'],
                        "tanggal_lahir" => $ds['tgl_lahir'],
                        "id_agama" => $ds['id_agama'],
                        "nik" => $ds['nik'],
                        "nisn" => $ds['nisn'],
                        "npwp" => $ds['npwp'],
                        "kewarganegaraan" => $ds['kewarganegaraan'],
                        "jalan" => $ds['jln'],
                        "dusun" => $ds['nm_dsn'],
                        "rt" => $ds['rt'],
                        "rw" => $ds['rw'],
                        "kelurahan" => $ds['ds_kel'],
                        "kode_pos" => $ds['kode_pos'],
                        "id_wilayah" => $ds['id_wil_feeder'],
                        "id_jenis_tinggal" => $ds['id_jns_tinggal'],
                        "id_alat_transportasi" => $ds['id_alat_transport'],
                        "telepon" => $ds['telepon_rumah'],
                        "handphone" => $ds['telepon_seluler'],
                        "email" => $ds['email'],
                        "penerima_kps" => $ds['a_terima_kps'],
                        "nomor_kps" => $ds['no_kps'],
                        // "id_wilayah"                     =>   $ds['id_wil'],

                        // data ibu
                        "nama_ibu_kandung" => $ds['nm_ibu_kandung'],
                        "tanggal_lahir_ibu" => $ds['tgl_lahir_ibu'],
                        "nik_ibu" => $ds['nik_ibu'],
                        "id_kebutuhan_khusus_ibu" => $ds['id_kebutuhan_khusus_ibu'],
                        "id_pendidikan_ibu" => $ds['id_jenjang_pendidikan_ibu'],
                        "id_pekerjaan_ibu" => $ds['id_pekerjaan_ibu'],
                        "id_penghasilan_ibu" => $ds['id_penghasilan_ibu'],
                        "id_kebutuhan_khusus_ibu" => $ds['id_kebutuhan_khusus_ibu'],
                        // data ayah
                        "nik_ayah" => $ds['nik_ayah'],
                        "nama_ayah" => $ds['nm_ayah'],
                        "tanggal_lahir_ayah" => $ds['tgl_lahir_ayah'],
                        "id_pendidikan_ayah" => $ds['id_jenjang_pendidikan_ayah'],
                        "id_pekerjaan_ayah" => $ds['id_pekerjaan_ayah'],
                        "id_penghasilan_ayah" => $ds['id_penghasilan_ayah'],
                        "id_kebutuhan_khusus_ayah" => $ds['id_kebutuhan_khusus_ayah'],
                        // data wali
                        "nama_wali" => $ds['nm_wali'],
                        // "tanggal_lahir_wali"            =>   $ds['tgl_lahir_wali'],
                        "id_pendidikan_wali" => $ds['id_jenjang_pendidikan_wali'],
                        "id_pekerjaan_wali" => $ds['id_pekerjaan_wali'],
                        "id_penghasilan_wali" => $ds['id_penghasilan_wali'],
                        "id_kebutuhan_khusus_mahasiswa" => $ds['id_kebutuhan_khusus_mahasiswa'],
                    ];
                    $responseArray = $this->update_data_to_feeder($data_post, $Conf);
                    $dataFeeder = $responseArray['data'];
                    $error_code = $responseArray['error_code'];
                    $response_status = $responseArray['error_desc'];
                    // dump($responseArray);
                    // die;
                    if ($error_code != 0) {
                        $status = false;
                        $icon = 'error';
                        $code = $error_code;
                        $msg = $response_status;
                        $dataF = $dataFeeder;
                    } else {
                        $status = true;
                        $icon = 'success';
                        $code = $error_code;
                        $dataF = $dataFeeder;
                        $msg = 'Data mahasiswa ' . $data_post['data_mhs_nama'] . ' berhasil diupdate ke feeder!';
                    }
                } else {
                    // insert
                    $status = true;
                    $icon = 'info';
                    $code = $error_code;
                    $dataF = $data_feeder;
                    $msg = 'Silahkan sinkronkan data update ke feeder!';
                }
            } else {
                $status = false;
                $icon = 'error';
                $code = 500;
                $dataF = null;
                $msg = "Error update data " . $data_post['data_mhs_nama'];
            }
            $response = [
                'status' => $status,
                'code' => $code,
                'message' => $msg,
                'data' => $dataF,
                'icon' => $icon
            ];
            echo json_encode($response);
        } else {
            handler_404();
        }
    }
}
