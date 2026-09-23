<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Mfa_update.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/09/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Mfa_update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
    }

    public function index()
    {
        $data['title'] = 'My Feeder Asisten';
        $data['title_alt'] = 'MFA';
        $data['dir'] = $this->uri->segment(1);
        $data['page'] = $this->uri->segment(2);
        $data['content'] = 'pages/' . $this->uri->segment(1) . '/v_' . $this->uri->segment(2);
        $this->load->view('template', $data);
    }

    public function do_update()
    {
        if ($this->input->is_ajax_request()) {
            // Mengatasi error 'dubious ownership' pada git (biasanya terjadi di XAMPP / environment dengan user web server yang berbeda dengan user owner file)
            $repo_dir = rtrim(str_replace('\\', '/', FCPATH), '/');
            shell_exec('git config --global --add safe.directory ' . escapeshellarg($repo_dir) . ' 2>&1');
            shell_exec('git config --global --add safe.directory "*" 2>&1');
            
            // Mencegah Git meminta input (username/password atau konfirmasi SSH) di terminal yang bisa menyebabkan proses hang
            putenv('GIT_TERMINAL_PROMPT=0');
            putenv('GIT_SSH_COMMAND=ssh -o StrictHostKeyChecking=no');
            
            // Menjalankan git pull (--no-edit mencegah Git membuka text editor jika ada merge)
            $output = shell_exec('git pull --no-edit 2>&1');
            
            $response = [
                'status' => true,
                'message' => 'Proses update selesai.',
                'output' => $output
            ];
            
            echo json_encode($response);
        } else {
            show_404();
        }
    }
}
