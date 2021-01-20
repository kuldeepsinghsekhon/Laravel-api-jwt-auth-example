<?php

	class Plans extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			//redirect(base_url());
			//Pagination config
			// $config['base_url'] = base_url('posts/index/');
			// $config['total_rows'] = $this->db->count_all('posts');
			// $config['per_page'] = 3;
			// $config['uri_segment'] = 3;
			// $config['attributes'] = array('class' => 'pagination-links');
		
			//Initialize Pagnation
			//$this->pagination->initialize($config);

			$data['events'] = $this->event_model->get_events();
			//echo '<pre>';print_r($data);die;

			$data['title'] = 'Bands';
			$this->load->view('templates/header');
			$this->load->view('events/index', $data);
			$this->load->view('templates/footer');
		}

		/*public function view($id)
		{
			$data['post'] = $this->post_model->get_post($id);
			// print_r($data);die;
			// if(empty($data['post'])) show_404();
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}*/

		public function create($type)
		{
			//$this->authentication($this->session->userdata('user_id'));
			$allowed_types = array('band');
			if(! in_array($type, $allowed_types))
				show_404();

			//$data['categories'] = $this->category_model->get_categories($type);
			$data['title'] = 'Create '.ucfirst($type);
			$data['for'] = 'create';
			$data['type'] = $type;
			//echo '<pre>'; print_r($data); die;
			$this->load->view('templates/header');
			$this->load->view('events/create', $data);
			$this->load->view('templates/footer');
		}

		public function create_ajax()
		{
		//	$this->authentication($this->session->userdata('user_id'));
			$data = $this->input->post();
			//print_r($data);die;

			$vld = array(
						array(
							'field' => 'title',
							'label' => 'Title',
							'rules' => 'required'
						),
						array(
							'field' => 'body',
							'label' => 'Body',
							'rules' => 'required'
						),
						array(
							'field' => 'price',
							'label' => 'Price',
							'rules' => 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]'
						)
			);

				$this->form_validation->set_rules($vld);

				if($this->form_validation->run() === FALSE)
				{
					$errors = array(
						'status' => FALSE,
						'title_error' => strip_tags(form_error('title')),
						'body_error' => strip_tags(form_error('body')),
						'price_error' => strip_tags(form_error('price'))
					);

					echo json_encode($errors);

				}
				else
				{
					$ins_data = array(
							//'type'  => htmlspecialchars($data['type']),
							//'user_id' => $this->session->userdata('user_id'),
						//	'Category_id' => htmlspecialchars($data['category']),
							'media_paths' => implode(',', array_merge($data['images_path'], $data['videos_path'] ?? array())),		//combine both image and video arrays and then convert array values into string  with ',' separator using implode function.
							'slug' => url_title(strtolower($data['title'])),
							'title' => htmlspecialchars($data['title']),
							'description' => htmlspecialchars($data['body']),
							'price' => htmlspecialchars($data['price'])
						);

					if($data['for'] === 'create' && $this->event_model->create_event($ins_data))
					{
						$this->session->set_flashdata('event_created', 'Event having title "'.$data['title'].'" has been created.');
						echo json_encode(array('status' => 'create'));
					}

					else if($data['for'] !== 'create' && $db_data = $this->post_model->update_post($ins_data, array('id' => $data['for'])))
					{
						echo json_encode(array('status' => 'edit', 'db_data' => $db_data));	
					}

					else
						echo json_encode(array('status' => 'Database Error..! Try Again.'));

				}

		}

		public function upload_images()
		{
			$config = array(
						'upload_path' => './assets/events/media/images',
						'allowed_types' => 'jpg|jpeg|png|gif',
						'file_ext_tolower' => TRUE,
						'encrypt_name' => TRUE,
						'max_size' => 2048							// 2MB
					);

			$files = $_FILES;
      $cpt = count($_FILES ['image_file'] ['name']);

      for ($i = 0; $i < $cpt; $i ++)
      {
      	$_FILES ['image_file'] ['name'] = $files ['image_file'] ['name'][$i];
        $_FILES ['image_file'] ['type'] = $files ['image_file'] ['type'] [$i];
        $_FILES ['image_file'] ['tmp_name'] = $files ['image_file'] ['tmp_name'] [$i];
        $_FILES ['image_file'] ['error'] = $files ['image_file'] ['error'] [$i];
        $_FILES ['image_file'] ['size'] = $files ['image_file'] ['size'] [$i];

        $this->load->library('upload', $config);

				if($this->upload->do_upload('image_file'))
				{
					$file_data = $this->upload->data();
					$media_array['paths'][] = 'events/media/images/'.$file_data['raw_name'].$file_data['file_ext'];
				}
				else
				{
					$media_array['file_name'][] = $_FILES['image_file']['name'];
					$media_array['errors'][] = $this->upload->display_errors('','');
				}

				unset($this->upload);

			}

			echo json_encode($media_array);

		}

		public function upload_videos()
		{
			$config = array(
						'upload_path' => './assets/events/media/videos',
						'allowed_types' => 'mp4|webm|ogg',
						'file_ext_tolower' => TRUE,
						'encrypt_name' => TRUE,
						'max_size' => 204800							// 200MB
					);

			$files = $_FILES;

      $cpt = count($_FILES ['video_file'] ['name']);

      for ($i = 0; $i < $cpt; $i ++)
      {
      	$_FILES ['video_file'] ['name'] = $files ['video_file'] ['name'][$i];
        $_FILES ['video_file'] ['type'] = $files ['video_file'] ['type'] [$i];
        $_FILES ['video_file'] ['tmp_name'] = $files ['video_file'] ['tmp_name'] [$i];
        $_FILES ['video_file'] ['error'] = $files ['video_file'] ['error'] [$i];
        $_FILES ['video_file'] ['size'] = $files ['video_file'] ['size'] [$i];

        $this->load->library('upload', $config);

				if($this->upload->do_upload('video_file'))
				{
					$file_data = $this->upload->data();
					$media_array['paths'][] = 'events/media/videos/'.$file_data['raw_name'].$file_data['file_ext'];
				}
				else
				{
					$media_array['file_name'][] = $_FILES ['video_file'] ['name'];
					$media_array['errors'][] = $this->upload->display_errors('','');
				}

				unset($this->upload);

			}

			echo json_encode($media_array);

		}

/*		public function data_table()
		{
			$this->authentication($this->session->userdata('user_id'));
			$body = '';

			if($post_type = $this->input->post('type') ?? FALSE) 
				$where = ($post_type === 'all') ? null : $this->input->post();
			else if($get_by = $this->input->post('category_id') ?? FALSE)
				$where = (is_numeric($get_by)) ? $this->input->post() : array('type'=>$get_by);

				$posts = $this->post_model->get_posts($where ?? FALSE);

			if($posts ?? FALSE) :
				foreach($posts as $post) : 
					$post['media_paths'] = explode(',', $post['media_paths']);

					$body .=
						'<tr id="tr'.$post['id'].'">
							<td>'.htmlspecialchars_decode($post['type']).'</td>
							<td><img src="'.base_url('assets/'.$post['media_paths'][0]).'" alt="Post" width="50" height="50" style=";display:block;margin:0 auto" ></td>
							<td>'.substr(htmlspecialchars_decode($post['title']),0,20).'</td>
							<td>'.substr(htmlspecialchars_decode($post['body']),0,20).'</td>
							<td>
								<a href="'.base_url('edit/'.$post['id']).'" class="btn btn-warning">Edit</a>
								<button onclick="delete_post('.$post['id'].')" class="btn btn-danger">Delete</button>
							</td>
						</tr>';
			 endforeach; 
		 else :
		 	$body = '<img id="no_data_found" src="'.base_url('assets/images/no_data_found.png').'" alt="No Data Found">';
		 endif;

		 $data['tbody'] = $body;

			if($pd = $this->input->post())
			{
				if(isset($pd['type']) && $pd['type'] !== 'all') :
					$categories = $this->category_model->get_categories($pd['type']);
					if(count($categories) > 0) :
						$category_str = '';
						$category_str = '
							<label>Category</label>
							<select id="category" class="form-control">
								<option value="'.$pd['type'].'">All '.ucfirst($pd['type']).'s</option>';
						foreach($categories as $category) :
							$category_str .= '
								<option value="'.$category['id'].'">'.$category['category_name'].'</option>';
						endforeach;
						$category_str .= '</select>';
						$data['categories'] = $category_str;
					endif;
				endif;
				if(isset($pd['type']))
					$data['title'] = ucfirst($pd['type']).' Data';

				echo json_encode($data);
			}
			else
			{
				$data['title']  = 'All Data';
				$data['types']  = $this->post_model->get_post_types();
				//echo '<pre>'; print_r($data); die;
				$this->load->view('templates/header');
				$this->load->view('posts/post_table', $data);
				$this->load->view('templates/footer');
			}
		}*/

	/*	public function edit($id)
		{
			$this->authentication($this->session->userdata('user_id'));

			$data['post'] = $this->post_model->get_post($id);

			if(count($data['post']) > 0)
			{ 
				$data['title'] = 'Edit Post';
				$data['categories'] = $this->category_model->get_categories($data['post']['type']);
				$data['for'] = $id;
				$data['type'] = $data['post']['type'];
				$data['post']['media_paths'] = explode(',' , $data['post']['media_paths']);

				foreach($data['post']['media_paths'] as $val)
				{
					if(($ext = substr($val, strrpos($val, '.')+1)) == 'mp4' || $ext == 'webm' || $ext == 'ogg')
						$data['post']['videos_path'][] = $val;
					else
						$data['post']['images_path'][] = $val;
				}

				if(!isset($data['post']['videos_path']))
					$data['post']['videos_path'][0] = false;

				unset($data['post']['media_paths']);
				//echo '<pre>'; print_r($data['post']); die;
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}
			// else
			// 	redirect(base_url('posts/'.$slug));
			
		}*/

		/*public function delete()
		{
			$this->authentication($this->session->userdata('user_id'));

			if($this->post_model->delete_post($this->input->post('id')))
				echo json_encode(array('status' => true));
			else
				echo json_encode(array('status' => 'Database Error..! Try Again.'));
		}*/

	/*	public function data_tabs($type = FALSE)
		{
			$post_data = '';

		  if($get_by = $this->input->post('category_id') ?? FALSE)
				$where = (is_numeric($get_by)) ? array('category_id'=>$this->input->post('category_id')) : array('type'=>$type) ;

			$posts = $this->post_model->get_posts(($where ?? array('type'=>$type)) , ($this->input->post('limit') ?? null), ($this->input->post('start') ?? null));

			if($posts ?? FALSE) :
				foreach($posts as $post) : 
					$post['media_paths'] = explode(',', $post['media_paths']);
		      $post_data .=
						'<div class="col-lg-4 col-md-6 wow move-up animate">
			        <a href="'.base_url('view/'.$post['id']).'" class="ht-large-box-images style-03">
			          <div class="large-image-box slideanim">
			            <div class="box-image">
			              <div class="default-image">
			                <img class="img-fluid" src="'.base_url('assets/'.$post['media_paths'][0]).'" alt="No Thumbnail">
			              </div>
			            </div>
			            <div class="content slideanim">
			                <h5 class="heading">'.htmlspecialchars_decode($post['title']).'</h5>
			                <div class="text">'.substr(htmlspecialchars_decode($post['body']), 0, 240).'...</div>
			                <div class="box-images-arrow">
			                    <span class="button-text">Discover now</span>
			                    <i class="fa fa-long-arrow-right"></i>
			                </div>
			            </div>
			          </div>
			        </a>
		      	</div>';
			 endforeach; 
		 else :
		 	$post_data = '<img id="no_data_found" src="'.base_url('assets/images/no_data_found.png').'" alt="No Data Found">';
		 endif;

		 $data['post_data'] = $post_data;

			if($get_by || $type === 'event')
			{
				echo json_encode($data);
			}
			else
			{
				$data['title']  = ucfirst($type).'s';
				$data['type']  = $type;
				$data['categories']  = $this->category_model->get_categories($type);
				//echo '<pre>'; print_r($data); die;
				$this->load->view('templates/header');
				$this->load->view('posts/index', $data);
				$this->load->view('templates/footer');
			}
		}*/

		/*public function project_tabs($type = FALSE)
		{
			$post_data = '';

		  if($get_by = $this->input->post('category_id') ?? FALSE)
				$where = (is_numeric($get_by)) ? array('category_id'=>$this->input->post('category_id')) : array('type'=>$type) ;

			$posts = $this->post_model->get_posts($where ?? array('type'=>$type));

			if($posts ?? FALSE) :
				foreach($posts as $post) : 
					$post['media_paths'] = explode(',', $post['media_paths']);
		      $post_data .=
		      	 '<div class="col-sm-6 col-lg-4 col-xxl-3">
              <div class="tab_contant slideanim">
                 <div class="img_sec ">
                    <img src="'.base_url('assets/'.$post['media_paths'][0]).'">   
                 </div>
                 <div class="text_sec slideanim">
                    <h1>'.$post['title'].'</h1>
                    <span>'.substr(htmlspecialchars_decode($post['body']), 0, 60).'...</span>
                 </div>
              </div>
           </div>';
			 endforeach; 
		 else :
		 	$post_data = '<img id="no_data_found" src="'.base_url('assets/images/no_data_found.png').'" alt="No Data Found">';
		 endif;

		 $data['post_data'] = $post_data;

 		 echo json_encode($data);
			
		}*/

	/*	public function delete_media()
		{
			$this->authentication($this->session->userdata('user_id'));
			$pd = $this->input->post();
			if(isset($pd['images_path']))
			{
				foreach($pd['images_path'] as $path)
				{
					@unlink('assets/'.$path);
				}
			}
			else if(isset($pd['videos_path']))
			{
				foreach($pd['videos_path'] as $path)
				{
					@unlink('assets/'.$path);
				}
			}
		}*/

		/*public function delete_multiple_media()
		{
			$this->authentication($this->session->userdata('user_id'));
			$post_data = $this->input->post();
			if(!empty($post_data['images_path']))
			{
				foreach($post_data['images_path'] as $val)
				{
					@unlink('assets/'.$val);
				}
			}
			if(!empty($post_data['videos_path']))
			{
				foreach($post_data['videos_path'] as $val)
				{
					@unlink('assets/'.$val);
				}
			}

		}*/

	}





?>