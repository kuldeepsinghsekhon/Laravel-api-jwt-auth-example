<?php

	class Categories extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->authentication($this->session->userdata('user_id'));
		}
		
		public function index()
		{
			$table_body  = '';
			$data['title'] = ucfirst($this->input->get('type') ?? 'all').' Categories';
			$categories = $this->category_model->get_categories($this->input->get('type') ?? 'all');
			//echo '<pre>'; print_r($categories);

			if($categories ?? FALSE):
				foreach($categories as $category) :
					$table_body .=
						'<tr id="tr'.$category['id'].'">
							<td>'.$category['type'].'</td>
							<td>'.$category['category_name'].'</td>
							<td>'.$category['category_desc'].'</td>
							<td>
								<button onclick=edit_category('.$category['id'].',"'.preg_replace('/\s+/', '_', $category['category_name']).'") class="btn btn-warning">Edit</button>
								<button onclick="delete_category('.$category['id'].')" class="btn btn-danger">Delete</button>
							</td>
						</tr>';
				endforeach;
			else:
				$table_body = '<img id="no_data_found" src="'.base_url('assets/images/no_data_found.png').'" alt="No Data Found">';
			endif;

			$data['table_body'] = $table_body;

			if($this->input->get('type') ?? FALSE)
			{
				echo json_encode($data);
			}
			else
			{
				$this->load->view('templates/header');
				$this->load->view('categories/view', $data);
				$this->load->view('templates/footer');
			}
		}

		public function create()
		{
			if($pd = $this->input->post())
			{// echo '<pre>'; print_r($pd); die;
				$vld = array(
					array(
						'field' => 'category_name',
						'label' => 'Category Name',
						'rules' => 'required|min_length[2]|max_length[40]'
					),
					array(
						'field' => 'category_desc',
						'label' => 'Category Description',
						'rules' => 'required|min_length[2]|max_length[500]'
					)
				);
				if($pd['for']  === 'create')
				{
					$vld[2] = array(
						'field' => 'category_type',
							'label' => 'Category Type',
							'rules' => 'required'
					);
				}

				$this->form_validation->set_rules($vld);

				if($this->form_validation->run() === FALSE)
				{
					if($pd['for']  === 'create')
					{
						$data['title'] = 'Create Category'; 
						$data['for'] = 'create';
						$this->load->view('templates/header');
						$this->load->view('categories/create_category', $data);
						$this->load->view('templates/footer');
					}
					else
					{
						$data['category']['category_name'] = $pd['category_name'];
						$data['category']['category_desc'] = $pd['category_desc'];
						$data['category']['id'] = $pd['for'];
						$data['title'] = 'Edit Category';
						$data['for'] = 'edit';
						$this->load->view('templates/header');
						$this->load->view('categories/create_category', $data);
						$this->load->view('templates/footer');
					}
				}
				else
				{
					$ins_data = array(
						'category_name' => htmlspecialchars($pd['category_name']),
						'category_desc' => htmlspecialchars($pd['category_desc'])
					);

					if($pd['for'] === 'create')
						$ins_data['type'] = htmlspecialchars($pd['category_type']);

					if($pd['for'] === 'create' && $this->category_model->create($ins_data))
					{
						$this->session->set_flashdata('category_created', 'Category "'.$pd['category_name'].'" is Created.');
						redirect('create_category');
					}
					else if($cn = $this->category_model->update_category($ins_data, array('id' => $pd['for'])))
					{
						if($cn === 'no')
						{
							$this->session->set_flashdata('make_changes', 'Make changes to update.');
							$data['category']['category_name'] = $pd['category_name'];
							$data['category']['category_desc'] = $pd['category_desc'];
							$data['category']['id'] = $pd['for'];
							$data['title'] = 'Edit Category';
							$data['for'] = 'edit';
							$this->load->view('templates/header');
							$this->load->view('categories/create_category', $data);
							$this->load->view('templates/footer');
						}
						else
						{
							$this->session->set_flashdata('category_updated', 'Category "'.$cn['category_name'].'" is Updated.');
								redirect('categories');	
						}
					}
					else 
						redirect('categories');
				}
			}
			else
			{
				$data['title'] = 'Create Category'; 
				$data['for'] = 'create';
				$this->load->view('templates/header');
				$this->load->view('categories/create_category', $data);
				$this->load->view('templates/footer');
			}
		}

		public function edit()
		{ 
			$data['category'] = $this->category_model->get_category($this->input->post('id'));
			
			if($data['category'] ?? FALSE)
			{
				$data['title'] = 'Edit Category';
				$data['for'] = 'edit';
				$this->load->view('templates/header');
				$this->load->view('categories/create_category', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error...! Try Again.');
				redirect(base_url('categories'));
			}
		}

		public function delete()
		{
			if($pd = $this->input->post())
			{
				if($this->category_model->delete($pd))
					echo json_encode(array('status' => TRUE));
				else
					echo json_encode(array('status' => 'Error...! Try Again.'));
			}
		}

	}


?>