<?php
class Login extends MY_Controller{
	
	public function index()
	{ 
		if($this->session->userdata('userid'))
			return redirect('admin/dashboard');
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->view('public/admin_login');
	}	 

	public function admin_login()
	{
	$this->load->helper('url');

	$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|alpha');

		$this->form_validation->set_rules('password','Password','required');

		//$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		if($this->form_validation->run()){
		$username = $this->input->post('username');	
		$password = $this->input->post('password');	


			$this->load->model('loginmodel');

			$login_id = $this->loginmodel->valid_login($username, $password);
			if($login_id ){
				
				$this->session->set_userdata('userid',$login_id);
				return redirect('admin/dashboard');
				//Credentials valid,Login user.
			}else{
				$this->session->set_flashdata('login_failed','Invalid Username/Password');
				return redirect('login');
				
			}
		}
		else{
		$this->load->view('public/admin_login');
			
		}
		}
		public function logout(){

			$this->session->unset_userdata('userid');
			return redirect('login');

		}

    
}
?>