	<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function login_data($username,$password)
	{
		$res = $this->db->get_where('admin_login',array('admin_user_name'=>$username,'admin_password'=>$password));
		
		if(count($res->result_array())>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function add_country($data)
	{
		
		$res = $this->db->get_where('user_country',array('country_name'=>$data));
		
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$res = $this->db->insert('user_country',array('country_name'=>$data));
			return $res;
			
		}
	}
	
	public function getCountry() {
		$res = $this->db->query('SELECT *FROM user_country');
		
		return $res->result_array();
	}
	
	public function add_state($data)
	{
		
		$res = $this->db->get_where('user_state',array('state_name'=>$data['state_name']));
		
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			return $res = $this->db->insert('user_state',array('state_name'=>$data['state_name'],'country_id'=>$data['country']));
			
		}
	}
	
	public function add_plan($data)
	{
		$res = $this->db->get_where('membership_plan',array('plan_name'=>$data['plan_name']));
		
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			return $res = $this->db->insert('membership_plan',array('plan_name'=>$data['plan_name'],'plan_display_name'=>$data['plan_display_name'],			'plan_details'=>$data['plan_details'],'no_of_contacts'=>$data['no_of_contacts'],'plan_duration'=>$data['plan_duration'],'plan_amount'=> $data['plan_amount']));
			
		}
	}
	  public function getMembership_plan() 
	{
		$res = $this->db->query("SELECT *FROM membership_plan");
		
		return $res->result_array();
	}
	
	
	public function getstate($id)  /// get state by contry wise
	{
		$res=$this->db->query("SELECT state_id,state_name FROM user_state WHERE country_id=$id");
		return $res->result_array();	
	}
	
	public function getState1()
	{
	return $res = $this->db->query('select * from user_state')->result_array();
	
	}
	
	public function add_city($data) 
	{
	$res = $this->db->get_where('user_city',array('city_name'=>$data['city_name']));
	
		if(count($res->result_array())>=1)
		{
			return false;
		}	
		else
		{
			 $res= $this->db->insert('user_city',array('city_name'=>$data['city_name'],'state_id'=>$data['state']));
			 return $res;
		}
	}
	
	public function add_religion($data)
	{
		$res = $this->db->get_where('user_religion',array('religion_name'=>$data));
		
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$res = $this->db->insert('user_religion',array('religion_name'=>$data));
			return $res;
		}
	}
	public function getReligion()
	{
		$res=$this->db->query('select * from user_religion');
		return $res->result_array();
	}
	
	public function add_caste($data)
	{
		$res = $this->db->get_where('user_caste',array('caste_name'=>$data['caste_name']));
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$res = $this->db->insert('user_caste',array('caste_name'=>$data['caste_name'],'religion_id'=>$data['religion']));
			return $res;
		}
		
	}
	
	public function getcaste($id)  
	{
		$res=$this->db->query("SELECT caste_id,caste_name FROM user_caste WHERE religion_id=$id");
		return $res->result_array();	
	}
	
	public function getCaste1()
	{
	return $this->db->query('select * from user_caste')->result_array();
	
	}
	
	public function add_sub_caste($data)
	{
	$res = $this->db->get_where('user_sub_caste',array('sub_caste_name'=>$data['sub_caste_name']));
	
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$res = $this->db->insert('user_sub_caste',array('sub_caste_name'=>$data['sub_caste_name'],'caste_id'=>$data['caste']));
			return $res;
		}
	}
	public function get_tot_reg()
	{
	$res = $this->db->query('select * from user_registration');
		
	}
	public function getCity()
	{
	return $this->db->query('select * from user_city')->result_array();
	
	}
	
	public function getSub_caste()
	{
	return $this->db->query('select * from user_sub_caste')->result_array();
	
	}
	
	public function delete_country($id)
	{
		return $this->db->delete('user_country',array('country_id'=>$id)); 
	}
	
	public function delete_state($id)
	{
		return $this->db->delete('user_state',array('state_id'=>$id)); 
	}
	
	public function delete_city($id)
	{
		return $this->db->delete('user_city',array('city_id'=>$id)); 
	}
	
	public function delete_religion($id)
	{
		return $this->db->delete('user_religion',array('religion_id'=>$id)); 
	}
	
	public function delete_caste($id)
	{
		return $this->db->delete('user_caste',array('caste_id'=>$id)); 
	}
	
	public function delete_subcaste($id)
	{
		return $this->db->delete('user_sub_caste',array('sub_caste_id'=>$id)); 
	}
	public function delete_membership_plan($id)
	{
		return $this->db->delete('membership_plan',array('plan_id'=>$id)); 
	}

	public function delete_blockmember($id)
	{
		return $this->db->delete('user_registration',array('profile_id'=>$id)); 
	}

	public function edit_country($data) 
	{
		$res = $this->db->get_where('user_country',array('country_name'=>$data['country_name']));
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$this->db->set('country_name',$data['country_name']);
			$this->db->where('country_id',$data['id']);
			return $this->db->update('user_country');
		}
	}
	
	public function edit_state($data)
	{
		$res = $this->db->get_where('user_state',array('state_name'=>$data['state_name']));
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$this->db->set('state_name',$data['state_name']);
			$this->db->where('state_id',$data['id']);
			return $this->db->update('user_state');
		}
	}
	
	public function edit_city($data) 
	{
		$this->db->set('city_name',$data['city_name']);
		$this->db->where('city_id',$data['id']);
		return $this->db->update('user_city');
	}
	
	public function edit_religion($data) 
	{
		$res = $this->db->get_where('user_religion',array('religion_name'=>$data['religion_name']));
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$this->db->set('religion_name',$data['religion_name']);
			$this->db->where('religion_id',$data['id']);
			return $this->db->update('user_religion');
		}
	}
		public function edit_caste($data)
	{
		$res = $this->db->get_where('user_caste',array('caste_name'=>$data['caste_name']));
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$this->db->set('caste_name',$data['caste_name']);
			$this->db->where('caste_id',$data['id']);
			return $this->db->update('user_caste');
		}
	}
	public function edit_sub_caste($data)
	{
		$res = $this->db->get_where('user_sub_caste',array('sub_caste_name'=>$data['sub_caste_name']));
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			$this->db->set('sub_caste_name',$data['sub_caste_name']);
			$this->db->where('sub_caste_id',$data['id']);
			return $this->db->update('user_sub_caste');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function visitor()
    {
        return $this->db->query("select * from visitor")->result_array();
    }
    public function deletevisitor($id)
    {
        return $this->db->query("delete from visitor where visitor_id=$id");
    }

     public function deleteallvisitor()
    {
        return $this->db->query("delete from visitor");
    }











public function visitorcheck($ip,$date)
    {
        
        return $this->db->query("select* from visitor where ip_address='$ip' AND Date='$date'")->result_array();
    }

    public function countvisitor()
    {
        
        return $this->db->query("select * from visitor")->result_array();
    }







}

