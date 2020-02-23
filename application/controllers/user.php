<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		session_destroy();
		$ip='139.5.20.92';
		$date=date("Y-m-d"); 
		$data=$this->db->query("select * from visitor where ip_address='$ip' AND date='$date'")->result_array();
		if($data==NULL)
		{
			//$ip_add=$this->input->ip_address();
			$browser=$this->agent->browser();
			$system=$this->agent->platform();
		
		    $this->load->library('Geolocation');
		    $this->load->config('geolocation', true);
		    $config = $this->config->config['geolocation'];
		    $this->geolocation->initialize($config);
		    $this->geolocation->set_ip_address($ip);
		    $locationdetail = $this->geolocation->get_city();
			$countryCode=$locationdetail['countryCode'];
			$country=$locationdetail['countryName'];
			$state=$locationdetail['regionName'];
			$city=$locationdetail['cityName'];
			$zipcode=$locationdetail['zipCode'];
			$latitude=$locationdetail['latitude'];
			$longitude=$locationdetail['longitude'];
			$timezone=$locationdetail['timeZone'];
			$time=date("H:i:s"); 
			$this->db->query("INSERT INTO `visitor` (`visitor_id`, `ip_address`,`os`, `browser`, `date`, `time`, `country`, `state`, `city`, `zipcode`, `latitude`, `longitude`) VALUES (NULL, '$ip', '$system', '$browser', '$date', '$time', '$country', '$state', '$city', '$zipcode', '$latitude', '$longitude');");
		}
		
		$data['religion'] = $this->admin_model->getReligion();
		$data['featureduser'] = $this->user_mo->featureuser();
		$this->load->view('home',$data);		
	}

	public function login()
	{
		$this->load->view('login');
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function changepwd($id)
	{
			$data['token'] = $id;
			$this->load->view('changepwd',$data);
	}

	public function matches()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$config = array();
	        $config["base_url"] = base_url() . "user/matches";
    	    $config["total_rows"] = $this->user_mo->record_count();
    	    $config["per_page"] = 4;
     	    $config["uri_segment"] = 3;

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    	    
    	    $data["user"] = $this->user_mo->
       		     fetch_user($config["per_page"], $page);
        	
        	$data["links"] = $this->pagination->create_links();
//print_r($data['user']);
	//		$data['user'] = $this->user_mo->getuserdata();
			$this->load->view('matches',$data);
		}
	}

	public function members()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$this->load->view('members');
		}
	}

	public function viewed_profile()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$data['userdata']=$this->user_mo->getwhoviewed();
			$this->load->view('viewed-profile',$data);
		}
	}
	
	public function viewedprofile()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$data['userdata'] = $this->user_mo->viewedprofile();
			$this->load->view('viewedprofile',$data);
		}
	}
	
	public function search()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$data['country'] = $this->admin_model->getCountry();
			$data['religion'] = $this->admin_model->getReligion();
			$this->load->view('search',$data);
		}
	}

	public function profile()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			if($email)
			{
				$id = $this->user_mo->getprofileid($email);
				$data['pro_id'] = $id[0]['profile_id'];
			}
			else
			{
				$id = $this->user_mo->getprofileid($email1);
				$data['pro_id'] = $id[0]['profile_id'];
			}
//			echo $data['pro_id'];
			$data['reguser'] = $this->user_mo->getuserpro($data['pro_id']);
//			print_r($data);
			$this->load->view('update_profile',$data);
		}
	}

	public function search_id()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$this->load->view('search-id');
		}
	}
	public function faq()
	{
		$this->load->view('faq');
	}
	public function shortcodes()
	{
		$this->load->view('shortcodes');
	}
	
	public function upgrade()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$this->load->view('upgrade');
		}
	}
	public function contact()
	{
		$this->load->view('contact');
	}
	
	public function view_profile($id)
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{ 

			$data['pro_id'] = $id;
			$data['userpro'] = $this->user_mo->getuserpro($data['pro_id']);
			$this->load->view('view_profile',$data);
		}
	}
	
	public function view_wizard()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$this->load->view('wizard_form');
		}
	}
	
	public function profile_upload()
	{
		$email1 = $this->session->userdata('username');
		$email = $this->session->userdata('userinfo');
		if($email1)
		{
			$em = $email1;
		}
		else
		{
			$em = $email;
		}

		if(!($em))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$this->load->view('upload_profile_pic');
		}
	}
	
	public function search_result()
	{
		$email = $this->session->userdata('userinfo');
		$email1 = $this->session->userdata('username');
		if(!($email || $email1))
		{
			redirect(base_url('user/login'));
		}
		else
		{
			$this->load->view('search_result');
		}	
	}
}
?>
	