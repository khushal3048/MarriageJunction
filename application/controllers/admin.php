<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/admin_login');
	}

	public function home()
	{
		$query['tot_religion'] = $this->db->query('SELECT * FROM `user_religion` ')->result_array(); // display total religion on desboard 
		$query['tot_caste'] = $this->db->query('SELECT * FROM `user_caste` ')->result_array(); // display total caste on desboard
		$query['tot_subcaste'] = $this->db->query('SELECT * FROM `user_sub_caste` ')->result_array();  // display total sub caste on desboard
		$query['tot_country'] = $this->db->query('SELECT * FROM `user_country` ')->result_array(); // display total country on desboard
		$query['tot_state'] = $this->db->query('SELECT * FROM `user_state` ')->result_array(); // display total state on desboard
		$query['tot_city'] = $this->db->query('SELECT * FROM `user_city` ')->result_array(); // display total city on desboard
		$query['tot_block'] = $this->db->query('SELECT * FROM `user_registration` where status="block" ')->result_array(); // display total block user on desboard
		$query['tot_vis'] = $this->db->query('SELECT * FROM `visitor` ')->result_array();// display total visitor on desboard
		$query['tot_reg'] = $this->db->query('SELECT * FROM `user_registration` ')->result_array(); // display total user on desboard
		$this->load->view('admin/admin_home',$query);
	}
	
	public function member_approval()
	{
		$this->load->view('admin/admin_member_approval');
	}
	
	public function profile_photo()
	{
		$this->load->view('admin/profile_photo_approval');
	}
	
	public function profile_gallary()
	{
		$this->load->view('admin/gallary');
	}
	
	public function membership_plan()
	{
		$data['membership_plan'] = $this->admin_model->getMembership_plan();
		$this->load->view('admin/membership_plan',$data);
		
	}
	
	public function city()
	{
		$data['city'] = $this->admin_model->getCity();
		$data['country'] = $this->admin_model->getCountry();
		$this->load->view('admin/add_city',$data);
	}
	
	public function state()
	{
		$data['state'] = $this->admin_model->getState1();
		$data['country'] = $this->admin_model->getCountry();
		$this->load->view('admin/add_state',$data);
	}
	
	public function country()
	{
		$data['country'] = $this->admin_model->getCountry();
		$this->load->view('admin/add_country',$data);
	}
	
	public function religion()
	{
		$data['religion'] = $this->admin_model->getReligion();
		$this->load->view('admin/add_religion',$data);
	}
		
	public function caste()
	{
		$data['caste'] = $this->admin_model->getCaste1();
		$data['religion'] = $this->admin_model->getReligion();
		$this->load->view('admin/add_caste',$data);
	}
		
	public function sub_caste()
	{	
		$data['sub_caste'] = $this->admin_model->getSub_caste();
		$data['religion'] = $this->admin_model->getReligion();
		$this->load->view('admin/add_sub_caste',$data);
	}
	
	public function add_fields()
	{
		$this->load->view('admin/add_field');
	}
	
	public function pages()
	{
		$this->load->view('admin/pages');
	}
	
	public function match_mail()
	{
		$this->load->view('admin/send_my_match_mail');
	}
	
	public function user_info()
	{
		$this->load->view('admin/user_info');
	}
	
	public function featured_user()
	{
		$this->load->view('admin/featured_user');
	}
	public function visitor_members()
	{
		$res['visitor'] = $this->db->query('SELECT * FROM `visitor` ')->result_array();
		$this->load->view('admin/visitor_member',$res);
	}
	public function register_members()
	{
		$res['regi_details'] = $this->db->query('SELECT *,(SELECT user_country.country_name FROM user_country WHERE user_country.country_id=user_registration.country)c_name FROM `user_registration`,`user_country` where user_registration.country=user_country.country_id')->result_array();
		$this->load->view('admin/register_member',$res);
	}
	public function paid_members()
	{
		$this->load->view('admin/paid_member');
	}
	
	public function approval_profile_description()
	{
		$this->load->view('admin/approval_profile_description');
	}
	
	public function approval_family_description()
	{
		$this->load->view('admin/approval_family_description');
	}
	
	public function approval_story_description()
	{
		$this->load->view('admin/approval_story_description');
	}
	public function block_members() //desboard details
	{	
		$res['block_details'] = $this->db->query('SELECT user_registration.*,user_upload.* FROM `user_registration`,`user_upload` WHERE
			user_registration.profile_id=user_upload.profile_id AND status = "block"')->result_array();
		$this->load->view('admin/block_member',$res);
	}
	public function admin_country() //desboard details
	{	
		$res['country_details'] = $this->db->query('SELECT * FROM `user_country`')->result_array();
		$this->load->view('admin/des_country',$res);
	}
	public function admin_state() //desboard details
	{	
		$res['state_details'] = $this->db->query('SELECT * FROM `user_state`')->result_array();
		$this->load->view('admin/des_state',$res);
	}
	public function admin_city() //desboard details
	{	
		$res['city_details'] = $this->db->query('SELECT * FROM `user_city`')->result_array();
		$this->load->view('admin/des_city',$res);
	}

	public function admin_religion() //desboard details
	{	
		$res['religion_details'] = $this->db->query('SELECT * FROM `user_religion`')->result_array();
		$this->load->view('admin/des_religion',$res);
	}
	public function admin_caste() //desboard details
	{	
		$res['caste_details'] = $this->db->query('SELECT * FROM `user_caste`')->result_array();
		$this->load->view('admin/des_caste',$res);
	}
	public function admin_subcaste() //desboard details
	{	
		$res['subcaste_details'] = $this->db->query('SELECT * FROM `user_sub_caste`')->result_array();
		$this->load->view('admin/des_subcaste',$res);
	}
	
	public function view_profile()
	{
		$this->load->view('admin/view_profile');
	}
	public function visitor_report()
	{
		$this->load->view('admin/visitor_report');
	}
	public function user_reports()
	{	
		
		$query['tot_reg_report'] = $this->db->query('SELECT * FROM `user_registration` ')->result_array();
		$query['tot_block_report'] = $this->db->query('SELECT * FROM `user_registration` where status="block" ')->result_array();
		$this->load->view('admin/user_report',$query);
	}


	// public function chart()
	// {
	// 	$this->load->view('admin/chart');
	// }
		
}
