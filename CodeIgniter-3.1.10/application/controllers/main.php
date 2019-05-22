<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->login();
    }
    
    public function login()
    {
        // $this->load->view('main_view');
        $this->load->view('login');
    }
    
    public function login_validation()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("id", "ID", "required|trim|xss_clean");
        $this->form_validation->set_rules("password", "パスワード", "required|md5|trim");
        if ($this->form_validation->run()) {	//バリデーションエラーがなかった場合の処理
            redirect("main/members");
        } else {							//バリデーションエラーがあった場合の処理
            $this->load->view("login");
        }
    }
}
