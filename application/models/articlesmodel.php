 <?php
class Articlesmodel extends CI_Model{

	public function all_articles_list( $limit, $offset){
		

		$query = $this->db
							->select(['title','id'])
							//->select('id')
							->from('articles')
							->limit($limit, $offset)
							->get();

		return $query->result();
	}

public function articles_list( $limit, $offset){
		$userid = $this->session->userdata('userid');

		$query = $this->db
							->select(['title','id'])
							//->select('id')
							->from('articles')
							->where('userid',$userid)->limit($limit, $offset)
							->get();

		return $query->result();
	}
	public function count_articles_list(){

		$query = $this->db
							->select(['title','id'])
							//->select('id')
							->from('articles')
							->get();

		return $query->num_rows();
	}

	public function num_rows(){

		$userid = $this->session->userdata('userid');

		$query = $this->db
							->select(['title','id'])
							//->select('id')
							->from('articles')
							->where('userid',$userid)->get();

		return $query->num_rows();
	}

	public function add_article($array)
	{

	return	$this->db->insert( 'articles',$array );
	}

	public function find_article($article_id){

		$q = $this->db->select(['id','title','body'])->where('id',$article_id)->get('articles');
		return $q->row();

	}

	public function update_article($article_id, Array $article){

return	$this->db
		->where('id',$article_id)
		->update('articles',$article);
	}

	public function delete_article($article_id){

		return $this->db->delete('articles',['id'=>$article_id]);
	}

	public function search($query, $limit,$offset){
		$q = $this->db->from('articles')->like('title',$query)
		->like($limit,$offset)->get();
				return $q->result();
	
	}
	public function count_search_result($query){

		$q = $this->db->from('articles')->like('title',$query)->get();
		return $q->num_rows();
	}
} 