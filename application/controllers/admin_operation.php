
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Operation extends CI_Controller {

	public function admin_login()
	{
		$user_name = $this->input->post('userid');
		$user_password = $this->input->post('password');
		
		if($this->admin_model->login_data($user_name,$user_password))
		{
			$data = array('username'=>$user_name);
			$this->session->set_userdata('username',$data);
			redirect(base_url().'admin/home');
		}
		else
		{
			redirect(base_url().'admin?msg=Invalid username or password');
		}
	}
	
	public function admin_signout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url().'admin');
	}
	
	public function add_country()
	{
		$country = $this->input->post('country_name');
		
		if($this->admin_model->add_country($country))
		{
			$this->session->set_flashdata('success','Country Name Successfully Added');
			redirect(base_url().'admin/country');
		}
		else
		{
			$this->session->set_flashdata('error','Country Name Already Exists ');
			redirect(base_url().'admin/country');
		}
		
	}
	
	public function edit_country()
	{
		$data = $this->input->post();
			if($this->admin_model->edit_country($data))
			{
				$this->session->set_flashdata('success','Country Name Successfully Updated');
				redirect(base_url().'admin/country');	
			}
			else
			{
				$this->session->set_flashdata('error','Country Name Does Not Updated..!!! ');
				redirect(base_url().'admin/country');
			}
	}
	
	public function delete_country()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_country($id))
		{
			$this->session->set_flashdata('success','Country Name Successfully Deleted');
			redirect(base_url().'admin/country');	
		}
		else
		{
			$this->session->set_flashdata('error','Country Name Does Not Deleted..!!! ');
			redirect(base_url().'admin/country');
		}
	}

	public function add_state()
	{
		$state = $this->input->post();
		
		if($this->admin_model->add_state($state))
		{
			$this->session->set_flashdata('success','State Name Successfully Added');
			redirect(base_url().'admin/state');
		}
		else
		{
			$this->session->set_flashdata('error','State Name Already Exists ');
			redirect(base_url().'admin/state');
		}
	}
		
	public function edit_state()
	{
		$data = $this->input->post();
			if($this->admin_model->edit_state($data))
			{
				$this->session->set_flashdata('success','State Name Successfully Updated');
				redirect(base_url().'admin/state');	
			}
			else
			{
				$this->session->set_flashdata('error','State Name Does Not Updated..!!! ');
				redirect(base_url().'admin/state');
			}
	}
	
	public function delete_state()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_state($id))
		{
			$this->session->set_flashdata('success','State Name Successfully Deleted');
			redirect(base_url().'admin/state');	
		}
		else
		{
			$this->session->set_flashdata('error','State Name Does Not Deleted..!!! ');
			redirect(base_url().'admin/state');
		}
	}
	public function add_city()
	{
		$city=$this->input->post();
		
		if($this->admin_model->add_city($city))
		{
			$this->session->set_flashdata('success','City Name Successfull Added');
			redirect(base_url().'admin/city');
		}
		else
		{
			$this->session->set_flashdata('error','City Name Already Exists ');
			redirect(base_url().'admin/city');
		}
	}
	
	public function edit_city()
	{
		$data = $this->input->post();
			if($this->admin_model->edit_city($data))
			{
				$this->session->set_flashdata('success','City Name Successfully Updated');
				redirect(base_url().'admin/city');	
			}
			else
			{
				$this->session->set_flashdata('error','City Name Does Not Updated..!!! ');
				redirect(base_url().'admin/city');
			}
	}
	
	public function delete_city()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_city($id))
		{
			$this->session->set_flashdata('success','City Name Successfully Deleted');
			redirect(base_url().'admin/city');	
		}
		else
		{
			$this->session->set_flashdata('error','City Name Does Not Deleted..!!! ');
			redirect(base_url().'admin/city');
		}
	}
	public function add_religion()
	{
	$religion=$this->input->POST('religion_name');
	 if($this->admin_model->add_religion($religion))
	 {
	 	$this->session->set_flashdata('success','Religion Add Successfully Added');
		redirect(base_url().'admin/religion');
	 }
	 else
	 {
	 	$this->session->set_flashdata('error','Religion name Already Exist');
		redirect(base_url().'admin/religion');
	 }
   }
   
   public function delete_religion()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_religion($id))
		{
			$this->session->set_flashdata('success','Religion Successfully Deleted');
			redirect(base_url().'admin/religion');	
		}
		else
		{
			$this->session->set_flashdata('error','Religion Does Not Deleted..!!! ');
			redirect(base_url().'admin/religion');
		}
	}
	
	public function edit_religion()
	{
		$data = $this->input->post();
			if($this->admin_model->edit_religion($data))
			{
				$this->session->set_flashdata('success','religion Name Successfully Updated');
				redirect(base_url().'admin/religion');	
			}
			else
			{
				$this->session->set_flashdata('error','religion Name Does Not Updated..!!! ');
				redirect(base_url().'admin/religion');
			}
	}
	public function edit_caste()
	{
		$data = $this->input->post();
			if($this->admin_model->edit_caste($data))
			{
				$this->session->set_flashdata('success','caste Name Successfully Updated');
				redirect(base_url().'admin/caste');	
			}
			else
			{
				$this->session->set_flashdata('error','caste Name Does Not Updated..!!! ');
				redirect(base_url().'admin/caste');
			}
	}
	public function edit_sub_caste()
	{
		$data = $this->input->post();
			if($this->admin_model->edit_sub_caste($data))
			{
				$this->session->set_flashdata('success','sub caste Name Successfully Updated');
				redirect(base_url().'admin/sub_caste');	
			}
			else
			{
				$this->session->set_flashdata('error','sub caste Name Does Not Updated..!!! ');
				redirect(base_url().'admin/sub_caste');
			}
	}
	
	public function delete_caste()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_caste($id))
		{
			$this->session->set_flashdata('success','Caste Successfully Deleted');
			redirect(base_url().'admin/caste');	
		}
		else
		{
			$this->session->set_flashdata('error','Caste Does Not Deleted..!!! ');
			redirect(base_url().'admin/caste');
		}
	}
	
	public function delete_subcaste()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_subcaste($id))
		{
			$this->session->set_flashdata('success','Subcaste Successfully Deleted');
			redirect(base_url().'admin/sub_caste');	
		}
		else
		{
			$this->session->set_flashdata('error','Subcaste Does Not Deleted..!!! ');
			redirect(base_url().'admin/sub_caste');
		}
	}
	
   public function getState() { /// get State list bases on country 
   		$id = $this->input->post('c_id');
   		$res = $this->admin_model->getstate($id);
		 
		echo json_encode($res);
   }
   
    public function getCaste() {
   		$id = $this->input->post('c_id');
   		$res = $this->admin_model->getcaste($id);
		 
		echo json_encode($res);
   }
   
   public function add_caste()
   {
   $caste = $this->input->POST();
   if($this->admin_model->add_caste($caste))
   {
			$this->session->set_flashdata('success','caste Name Successfully Added');
			redirect(base_url().'admin/caste');
		}
		else
		{
			$this->session->set_flashdata('error','caste Name Already Exists ');
			redirect(base_url().'admin/caste');
		}
   }
   public function add_sub_caste()
	{
	$sub_caste = $this->input->POST();
	
	if($this->admin_model->add_sub_caste($sub_caste))
	{
				$this->session->set_flashdata('success','Sub-caste Name Successfull Added');
				redirect(base_url().'admin/sub_caste');
			}
			else
			{
				$this->session->set_flashdata('error','Sub_caste Name Already Exists ');
				redirect(base_url().'admin/sub_caste');
			}
	}
	public function add_plan()
	{
		$data = $this->input->post();
		//print_r($data);
	/*	if($data['plan_name']=="" || $data['plan_display_name']=="" || $data['plan_details']=="" || $data['no_of_contacts']=="" || $data['plan_duration']=="" || $data['plan_amount']=="")
		{
			$this->session->set_flashdata('error','fill up the blank space');
		}
		else
		{*/
			if($this->admin_model->add_plan($data))
			{
				$this->session->set_flashdata('success','plan add Successfully Added');
				redirect(base_url().'admin/membership_plan');
			}
			else
			{
				$this->session->set_flashdata('error','plan Already Exists ');
				redirect(base_url().'admin/membership_plan');
		//}
	}
	}

	public function monthchart()
	{
		$return_arr = array();
		$result = $this->db->query("SELECT MONTH(date) month,YEAR(date) year, count(visitor_id) AS visitor FROM `visitor` GROUP BY month");

		foreach ($result->result_array() as $results) {
			$return_arr[] = array(
				'month' => $results['month'],
				'qty' => $results['visitor']
			);
		}
		$data['result'] = $return_arr;
		$this->load->view('admin/monthchart',$data);
	}

	public function yearchart()
	{
		$return_arr = array();
		$result = $this->db->query("SELECT MONTH(date) month,YEAR(date) year, count(visitor_id) AS visitor FROM `visitor` GROUP BY year");

		foreach ($result->result_array() as $results) {
			$return_arr[] = array(
				'month' => $results['year'],
				'qty' => $results['visitor']
			);
		}
		$data['result'] = $return_arr;
		$this->load->view('admin/yearchart',$data);
	}
	public function blockuser_chart()
	{
		$return_arr = array();
		$result = $this->db->query("SELECT MONTH(date) month,YEAR(date) year, count(profile_id) AS user FROM `user_registration` where status='block' GROUP BY year");

		foreach ($result->result_array() as $results) {
			$return_arr[] = array(
				'month' => $results['year'],
				'qty' => $results['user']
			);
		}
		$data['result'] = $return_arr;
		$this->load->view('admin/block_member_chart',$data);
	}

	public function yearly_registeruser_chart()
	{
		$return_arr = array();
		$result = $this->db->query("SELECT MONTH(date) month,YEAR(date) year, count(profile_id) AS user FROM `user_registration` GROUP BY year");

		foreach ($result->result_array() as $results) {
			$return_arr[] = array(
				'month' => $results['year'],
				'qty' => $results['user']
			);
		}
		$data['result'] = $return_arr;
		$this->load->view('admin/registeruser_chart',$data);
	}

	public function monthly_registeruser_chart()
	{
		$return_arr = array();
		$result = $this->db->query("SELECT MONTH(date) month,YEAR(date) year, count(profile_id) AS user FROM `user_registration` GROUP BY month");

		foreach ($result->result_array() as $results) {
			$return_arr[] = array(
				'month' => $results['month'],
				'qty' => $results['user']
			);
		}
		$data['result'] = $return_arr;
		$this->load->view('admin/monthly_registeruser_chart',$data);
	}

	public function top_profile_chart()
	{
		$return_arr = array();
		$result = $this->db->query("SELECT profile_id, COUNT(profile_id)AS moreview FROM `who_view_profile` GROUP BY profile_id ORDER by COUNT(profile_id) DESC");

		foreach ($result->result_array() as $results) {
			$return_arr[] = array(
				'month' => $results['profile_id'],
				'qty' => $results['moreview']
			);
		}
		$data['result'] = $return_arr;
		$this->load->view('admin/top_view',$data);
	}
	// public function countrywise_registeruser_chart()
	// {
	// 	$return_arr = array();
	// 	$result = $this->db->query("SELECT user_country.country_id, count(profile_id) AS country FROM `user_country`,`user_registration` where country.country_id=user_register.country_id GROUP BY country");

	// 	foreach ($result->result_array() as $results) {
	// 		$return_arr[] = array(
	// 			'month' => $results['country'],
	// 			'qty' => $results['user']
	// 		);
	// 	}
	// 	$data['result'] = $return_arr;
	// 	$this->load->view('admin/countrywise_register_report',$data);
	// }



	public function delete_membership_plan()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_membership_plan($id))
		{
			$this->session->set_flashdata('success','plan Successfully Deleted');
			redirect(base_url().'admin/membership_plan');	
		}
		else
		{
			$this->session->set_flashdata('error','plan Does Not Deleted..!!! ');
			redirect(base_url().'admin/membership_plan');
		}
	}
	
	
	public function planblock($id)
	{
		$this->db->query("UPDATE `membership_plan` SET `status` = 'block' WHERE `membership_plan`.`plan_id` = $id;");
		redirect(base_url().'admin/membership_plan');
	}
	public function planactive($id)
	{
		$this->db->query("UPDATE `membership_plan` SET `status` = 'active' WHERE `membership_plan`.`plan_id` = $id;");
		redirect(base_url().'admin/membership_plan');
	}

	public function userblock($id)
	{
		$this->db->query("UPDATE `user_registration` SET `status` = 'block' WHERE `user_registration`.`profile_id` = $id;");
		redirect(base_url().'admin/register_members');
	}
	public function useractive($id)
	{
		$this->db->query("UPDATE `user_registration` SET `status` = 'active' WHERE `user_registration`.`profile_id` = $id;");
		redirect(base_url().'admin/register_members');
	}

	public function full_details($id)
	{
		$res['user_registration'] = $this->db->query("SELECT *,(SELECT user_country.country_name FROM user_country WHERE user_country.country_id=user_registration.country)c_name,(SELECT user_religion.religion_name FROM user_religion WHERE user_religion.religion_id=user_registration.religion)r_name FROM `user_registration` where `profile_id` = $id")->result_array();
		
		//$res['user_registration'] = $this->db->query("SELECT * FROM `user_registration` WHERE `profile_id` = $id;")->result_array();
//		$res['regi_details'] = $this->db->query('SELECT *,(SELECT state.country_name FROM user_country WHERE user_country.country_id=user_registration.country)c_name FROM `user_registration`,`user_country` where user_registration.country=user_country.country_id')->result_array();
		
		$res['user_basic_info'] = $this->db->query("SELECT *,(SELECT user_state.state_name FROM user_state where user_state.state_id=user_basic_infor.state)state_name,(SELECT user_city.city_name FROM user_city where user_city.city_id=user_basic_infor.city)city_name,(SELECT user_caste.caste_name FROM user_caste where user_caste.caste_id=user_basic_infor.community)community_name FROM `user_basic_infor` WHERE `profile_id` = $id;")->result_array();
		$res['user_education_info'] = $this->db->query("SELECT * FROM `user_education_info` WHERE `profile_id` = $id;")->result_array();
		$res['user_lifestyle'] = $this->db->query("SELECT * FROM `user_lifestyle` WHERE `profile_id` = $id;")->result_array();
		$res['family_details'] = $this->db->query("SELECT * FROM `user_family_detail` WHERE `profile_id` = $id;")->result_array();
		$res['user_photo'] = $this->db->query("SELECT * FROM `user_upload` WHERE `profile_id` = $id;")->result_array();
		$this->load->view('admin/view_profile',$res);
		//redirect(base_url().'admin/create_user');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function visitor()
	{
		$res['visitor'] =$this->admin_model->visitor();
		$this->load->view('admin/visitor_members',$res);
	}

	public function deletevisitor($id)
	{
		$this->admin_model->deletevisitor($id);
		redirect (base_url().'admin/visitor_members');
	}

	public function deleteallvisitor($id)
	{
		$this->admin_model->deleteallvisitor($id);
		redirect (base_url().'admin/visitor_members');
	}



public function des_coun() // desboard
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_country($id))
		{
			
			redirect(base_url().'admin/admin_country');	
		}
	}

	public function des_state()   // desboard
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_state($id))
		{
			
			redirect(base_url().'admin/admin_state');	
		}
	}

	public function des_city() // desboard
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_city($id))
		{
			
			redirect(base_url().'admin/admin_city');	
		}
	}

	public function des_religion() // desboard
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_religion($id))
		{
			
			redirect(base_url().'admin/admin_religion');	
		}
	}
	public function des_caste() // desboard
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_caste($id))
		{
			
			redirect(base_url().'admin/admin_caste');	
		}
	}
	public function des_subcaste() // desboard
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_subcaste($id))
		{
			
			redirect(base_url().'admin/admin_subcaste');	
		}
	}

public function blockmember_delete()
	{
		$id = $_GET['id'];
		if($this->admin_model->delete_blockmember($id))
		{
			$this->session->set_flashdata('success','Block user Successfully Deleted');
			redirect(base_url().'admin/block_members');	
		}
		else
		{
			$this->session->set_flashdata('error','block user Does Not Deleted..!!! ');
			redirect(base_url().'admin/block_members');
		}
	}

}

