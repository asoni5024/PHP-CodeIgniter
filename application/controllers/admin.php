<?php

class Admin extends MY_Controller{

	public function dashboard( ){
		
		$this->load->helper('form');
		$this->load->model('articlesmodel','articles');

		$this->load->library('pagination');

		$config = [

			'base_url'  =>  base_url('admin/dashboard'),
			'per_page'  => 5,
			'total_rows' => $this->articles->num_rows()
		];

		$this->pagination->initialize($config);
 
		$articles = $this->articles->articles_list($config['per_page'],$this->uri->segment(3));

		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}

	public function add_article(){
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('admin/add_article');
	}
	public function store_article(){
		$this->load->library('form_validation');

		if( $this->form_validation->run('add_article_rules')){

				$post = $this->input->post();
			     
			     unset($post['submit']);

				$this->load->model('articlesmodel','articles');

				if($this->articles->add_article($post)){
					$this->session->set_flashdata('feedback',"Article Added Successfully.");
					$this->session->set_flashdata('feedback_class','alert-succcess');
				}else{
					$this->session->set_flashdata('feedback',"Article Failed to Add,Please Try Again.");
					$this->session->set_flashdata('feedback_class','alert-danger');
				}
				return redirect('admin/dashboard');
		}else{
			$this->load->view('admin/add_article');
		}
	}
	public function edit_article($article_id){
		$this->load->helper('form');
		$this->load->model('articlesmodel','articles');
		$article = $this->articles->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);
	}

	public function update_article($article_id){

		$this->load->library('form_validation');

		if( $this->form_validation->run('add_article_rules')){

				$post = $this->input->post();
			     
			     unset($post['submit']);

				$this->load->model('articlesmodel','articles');

				if($this->articles->update_article($article_id,$post)){
					$this->session->set_flashdata('feedback',"Article Updated Successfully.");
					$this->session->set_flashdata('feedback_class','alert-succcess');
				}else{
					$this->session->set_flashdata('feedback',"Article Failed to Update,Please Try Again.");
					$this->session->set_flashdata('feedback_class','alert-danger');
				}
				return redirect('admin/dashboard');
		}else{
			$this->load->view('admin/edit_article');
		}
	}

	public function delete_article(){

		$article_id = $this->input->post('article_id');
		$this->load->model('articlesmodel','articles');
		if($this->articles->delete_article($article_id)){
					$this->session->set_flashdata('feedback',"Article Deleted Successfully.");
					$this->session->set_flashdata('feedback_class','alert-succcess');
				}else{
					$this->session->set_flashdata('feedback',"Article Failed to Delete,Please Try Again.");
					$this->session->set_flashdata('feedback_class','alert-danger');
				}
				return redirect('admin/dashboard');
	}

	public function const(){

		
		if(! $this->session->userdata('userid'))
			return redirect('login');
		

	}
}

?>