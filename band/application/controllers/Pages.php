<?php

	class Pages extends CI_Controller
	{
		public function index()
		{
			redirect(base_url('home'));
		}

		public function view($page = 'home')
		{
			if(! file_exists(APPPATH.'views/pages/'.$page.'.php'))
				show_404();

			/*if($page === 'home')
			{
				$data['headers'] = $this->post_model->get_posts(array('type'=>'header'));
				$data['project_title'] = 'Our Projects';
				$data['project_categories'] = $this->category_model->get_categories('project');
				$data['client_reviews'] = $this->post_model->get_posts(array('type'=>'client_review'));
				$data['teams'] = $this->post_model->get_posts(array('type'=>'team'));
				$data['special_post'] = $this->post_model->get_posts(array('type'=>'special_post'));
				$data['post_title'] = 'Latest Posts';
				$data['post_categories'] = $this->category_model->get_categories('post');
				
			}*/
			
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

		public function contact_us()
		{
			if($pd = $this->input->post())
			{
				//print_r($pd);die;
				$vld = array(
						array(
							'field' => 'name',
							'label' => 'Name',
							'rules' => 'required|min_length[2]|max_length[50]'
						),
						array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required'
						),
						array(
							'field' => 'subject',
							'label' => 'Subject',
							'rules' => 'max_length[100]'
						),
						array(
							'field' => 'message',
							'label' => 'Message',
							'rules' => 'required|min_length[2]|max_length[400]'
						)
				);

			$this->form_validation->set_rules($vld);
			if($this->form_validation->run())
			{
				$this->load->library('email');

				// $config['protocol'] = 'ssmtp';
				// $config['smtp_host'] = 'ssl://ssmtp.gmail.com';
				// $this->email->initialize($config);

				$this->email->from($pd['email'], $pd['name']);
				$this->email->to('tejisingh342@gmail.com');
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject($pd['subject']);
				$this->email->message($pd['message']);

				if($this->email->send())
				{
					echo '<script>alert("Message Send")</script>';
					redirect(base_url('contact_us'));
				}
				else
				{
					echo '<script>alert("Error...! Try Again.")</script>';
					redirect(base_url('contact_us'));
				}

			}
			else
			{
				$this->load->view('templates/header');
				$this->load->view('pages/contact_us');
				$this->load->view('templates/footer');
			}
		}
		else
			show_404();
		}

	}





?>