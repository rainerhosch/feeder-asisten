<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Fa_setup.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 20/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Fa_setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    function generate_strustur_table()
    {
        $this->load->library('migration');
        if (!$this->migration->current()) {
            show_error($this->migration->error_string());
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Instalasi Sukses, Silahkan Login!</div>');
            redirect(base_url('Auth'));
        }
    }
}
