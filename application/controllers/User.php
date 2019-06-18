<?php

class User extends MY_Controller{

public function index(){
$this->load->helper('form');
	$this->load->model('articlesmodel','articles');
	$this->load->library('pagination');

		$config = [

			'base_url'  =>  base_url('user/index'),
			'per_page'  => 5,
			'total_rows' => $this->articles->count_articles_list()
		];

		$this->pagination->initialize($config);

		$articles = $this->articles->all_articles_list($config['per_page'], $this->uri->segment(3));
	$this->load->view('public/articles_list',compact('articles'));
}

public function search(){

	$this->load->library('form_validation');
	$this->form_validation->set_rules('query','Query','required');
	if(! $this->form_validation->run()){
	return	$this->index();}
	$query = $this->input->post('query');
	return redirect("user/search_result/$query");	
}
public function search_result($query){

	$this->load->helper('form');
	
	$this->load->model('articlesmodel','articles');
	$this->load->library('pagination');

		$config = [

			'base_url'  =>  base_url("user/search_result/$query"),
			'per_page'  => 5,
			'total_rows' => $this->articles->count_search_result($query),
			'uri_segment' =>4
		];

		$this->pagination->initialize($config);

		$articles = $this->articles->search($query,$config['per_page'], $this->uri->segment(4));
		$this->load->view('public/search_result',compact('articles'));
	
}
}

?>