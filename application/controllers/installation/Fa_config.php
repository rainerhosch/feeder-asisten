<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Fa_config.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 02/02/2022
 *  Quots of the code     : 'Code for change the world'
 */

class Fa_config extends CI_Controller
{
	private $__filename_	= 'database.php';
	private $__file_path__	= APPPATH . '/config' . '/';
	public function __construct()
	{
		parent::__construct();
		$file = $this->__file_path__ . $this->__filename_;
		include($file);
		if ($db['default']['database'] != '') {
			redirect(base_url());
		}
	}
	public function index()
	{
		$data['title'] = 'My Feeder Asisten';
		$data['title_alt'] = 'MFA';
		$data['page'] = 'Installation';
		$data['content'] = 'v_installation';
		$this->load->view('template', $data);
		// $this->load->view('instalation_page', $data);
	}

	function install()
	{
		$data_post = $this->input->post();
		$install = installation($data_post);
		if ($install) {
			redirect('installation/Fa_setup/generate_strustur_table');
		} else {
			echo 'Error installation';
		}
	}
}
