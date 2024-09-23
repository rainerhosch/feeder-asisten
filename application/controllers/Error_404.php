<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Error_404.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : dd/mm/yyyy
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Error_404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
    }

    public function index()
    {
        handler_404();
    }
}
