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

    private function _run_cmd($cmd) {
        if (function_exists('shell_exec') && is_callable('shell_exec')) {
            return shell_exec($cmd);
        } elseif (function_exists('exec') && is_callable('exec')) {
            exec($cmd, $output_array);
            return implode("\n", $output_array);
        } elseif (function_exists('system') && is_callable('system')) {
            ob_start();
            system($cmd);
            return ob_get_clean();
        } elseif (function_exists('passthru') && is_callable('passthru')) {
            ob_start();
            passthru($cmd);
            return ob_get_clean();
        } else {
            return "Error: Semua fungsi eksekusi shell (shell_exec, exec, system, passthru) telah dinonaktifkan pada server PHP produksi Anda (via disable_functions di php.ini).";
        }
    }

    public function do_update()
    {
        if ($this->input->is_ajax_request()) {
            // Uji ketersediaan fungsi shell terlebih dahulu
            $test_shell = $this->_run_cmd('echo test');
            if (strpos($test_shell, 'Error:') === 0) {
                echo json_encode([
                    'status' => false,
                    'message' => 'Fungsi Shell Dinonaktifkan',
                    'output' => $test_shell
                ]);
                return;
            }

            // Mengatasi error 'dubious ownership' pada git (biasanya terjadi di XAMPP / environment dengan user web server yang berbeda dengan user owner file)
            $this->_run_cmd('git remote set-url origin https://' . env('GITHUB_TOKEN') . '@github.com/' . env('GITHUB_USER') . '/' . env('GITHUB_REPO') . '.git');

            // Menjalankan git pull (--no-edit mencegah Git membuka text editor jika ada merge)
            $output = $this->_run_cmd('git pull 2>&1');

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
