<?php

class user_mo extends CI_Model {

	public function register($data)
	{
		if($this->db->insert("user_registration",$data))
		{
			
			$this->db->query("INSERT INTO chat_user(name, mail, password, roles) VALUES ('".$data['name']."','".$data['user_name']."',
				'".sha1($data['user_password'])."','OPERATOR')");	
			return $this->db->insert_id();
		}
		else
		{
			return 0;
		}
	}

	public function chkemail($data)
	{
		$res = $this->db->get_where('user_registration',array('user_name'=>$data['email']));	
		if(count($res->result_array())>=1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function chkid($id)
	{
		$res = $this->db->get_where('user_basic_infor',array('profile_id'=>$id));
		$res1 = $this->db->get_where('user_upload',array('profile_id'=>$id));	
		if(count($res->result_array())>=1 && count($res1->result_array())>=1)
		{
			return true;
		}
		else
		{
			$this->db->query("delete from user_basic_infor where profile_id='".$id."'");
			$this->db->query("delete from user_discription where profile_id='".$id."'");
			$this->db->query("delete from user_education_info where profile_id='".$id."'");
			$this->db->query("delete from user_lifestyle where profile_id='".$id."'");
			$this->db->query("delete from user_family_detail where profile_id='".$id."'");
			return false;
		}
	}
	
	public function login_data($user_name,$user_password)
	{
		$res = $this->db->get_where('user_registration',array('user_name'=>$user_name,'user_password'=>$user_password,'status'=>'active'));
		
		if(count($res->result_array())>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function uploadpic($id,$profile)
	{
		
		$this->db->query("insert into user_upload(`profile_id`,`upload_type`,`file_name`) values($id,0,'$profile')");
		
	}
	
	public function getprofileid($email)
	{
		
		return $this->db->query("select profile_id from user_registration where user_name='".$email['username']."'")->result_array();
	}
	
	public function add_user_data($data,$data1,$data2,$data3,$data4)
	{
		
		if($this->db->insert("user_basic_infor",$data) && $this->db->insert("user_education_info",$data1) && $this->db->insert("user_lifestyle",$data2) && $this->db->insert("user_discription",$data3) && $this->db->insert("user_family_detail",$data4))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function record_count() 
	{
        return $this->db->count_all("user_registration");
    }

    public function record_count1() 
	{
        return $this->db->count_all("who_view_profile");
    }

    public function fetch_user($limit, $start) 
    {
        $this->db->limit($limit, $start);
        
        $email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
			$query = $this->db->select('*')
							  ->FROM('user_registration','user_upload','user_education_info','user_basic_infor','user_lifestyle')
							  ->join('user_upload','user_registration.profile_id=user_upload.profile_id')
							  ->join('user_education_info','user_registration.profile_id=user_education_info.profile_id')
							  ->join('user_lifestyle','user_registration.profile_id=user_lifestyle.profile_id')
							  ->join('user_basic_infor','user_registration.profile_id=user_basic_infor.profile_id')
							  ->WHERE('user_registration.user_name!=".$email[username]."')
							  ->where('user_registration.user_name!=".$email1[username]."')
							  ->where('user_registration.gender = "Female"')
							  ->where('upload_type=0')
							  ->group_by('user_registration.profile_id')
							  ->get();
			// $query = $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0
			// 	group by user_registration.profile_id");
		}
		else
		{
			$query = $this->db->select('*')
							  ->FROM('user_registration','user_upload','user_education_info','user_basic_infor','user_lifestyle')
							  ->join('user_upload','user_registration.profile_id=user_upload.profile_id')
							  ->join('user_education_info','user_registration.profile_id=user_education_info.profile_id')
							  ->join('user_lifestyle','user_registration.profile_id=user_lifestyle.profile_id')
							  ->join('user_basic_infor','user_registration.profile_id=user_basic_infor.profile_id')
							  ->where('user_registration.user_name!=".$email[username]."')
							  ->where('user_registration.user_name!=".$email1[username]."')
							  ->where('user_registration.gender = "Male"')
							  ->where('upload_type=0')
							  ->group_by('user_registration.profile_id')
							  ->get();
			// $query = $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 
			// 	group by user_registration.profile_id");
			
		}
  //      $query = $this->db->get("user_registration");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


	public function getuserdata()
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 group by user_registration.profile_id")->result_array();
			
		}
	}
	
	public function getcrdata($id)
	{
		return $this->db->query("select country,religion from user_registration where profile_id='".$id."'")->result_array();
	}
	public function getstatebyid($countryid)
	{
		return $this->db->query("select * from user_state where country_id=$countryid[couname]")->result_array();
	}
	
	public function getcity($id)  /// get city by state wise
	{
		$res=$this->db->query("SELECT city_id,city_name FROM user_city WHERE state_id=$id");
		return $res->result_array();	
	}
	
	public function getcastebyid($religionid)
	{
		return $this->db->query("select * from user_caste where religion_id=$religionid[relname]")->result_array();
		
	}
	
	public function getsubcaste($id)  /// get city by state wise
	{
		$res=$this->db->query("SELECT sub_caste_id,sub_caste_name FROM user_sub_caste WHERE caste_id=$id");
		return $res->result_array();	
	}
	
	public function forgot_email($data) {
	 
		$res = $this->db->get_where('user_registration',array('user_name' =>$data));
		if(count($res->result_array())>=1) {
			return true;
		}  else {
			return false;
		}
	}
	
	public function reset_password($temp_password,$email) {

		if( $this->db->query("UPDATE user_registration SET tmp_password='$temp_password' WHERE user_name='$email'")) {
			return true;
		} else {
			return false;
		}
	}
	
	public function featureuser() 	
	{
		return $this->db->query("select user_registration.*,user_upload.* from user_registration,user_upload 
			                     where user_registration.profile_id = user_upload.profile_id And upload_type=0")->result_array();
	}
	
	public function change_pwd($data)
	{
		if($data['token'] != 'NULL')
		{		
			if($this->db->query("UPDATE user_registration SET user_password = '".md5($data[new_pwd])."' WHERE tmp_password = '$data[token]'"))
			{
				$this->db->query("UPDATE user_registration SET tmp_password ='NULL'  WHERE user_password = '".md5($data[new_pwd])."'");
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			$email = $this->session->userdata('username');
			$email1 = $this->session->userdata('userinfo');
			if($email)
			{
				print_r($email);
			}
			else
			{
				print_r($email1);
			}
		/*	if($this->db->query("UPDATE user_registration SET user_password = '".md5($data[new_pwd])."' WHERE tmp_password = 'NULL'"))
			{
				return true;
			}
			else
			{
				return false;
			}*/
		}
	}
	
	public function updatemobile($mobile)
	{
		$email = $this->session->userdata('username');
//		print_r($email);
		$pro = $this->db->query("SELECT profile_id FROM user_registration WHERE user_name='".$email['username']."'")->result_array();
//		print_r($pro);
		if($this->db->query("update user_lifestyle set mobile='".$mobile."' where profile_id='".$pro[0]['profile_id']."'"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function get_mobile()
	{
		$email = $this->session->userdata('username');
		$pro = $this->db->query("SELECT profile_id FROM user_registration WHERE user_name='".$email['username']."'")->result_array();
		$mbarr = $this->db->query("SELECT mobile FROM user_lifestyle WHERE profile_id='".$pro[0]['profile_id']."'")->result_array();
		$mb = $mbarr[0]['mobile'];
		return $mb;
	}
	
	public function getuserpro($id)
	{
		$email = $this->session->userdata('username');
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_discription.*,user_family_detail.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_discription,user_family_detail,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_discription.profile_id=user_registration.profile_id AND user_family_detail.profile_id=user_registration.profile_id AND user_lifestyle.profile_id=user_registration.profile_id AND user_registration.profile_id='".$id."' AND upload_type=0 group by user_registration.profile_id")->result_array();
	}
	
	public function getdetail($con,$st,$ci,$reg,$cast,$sub)
	{
		return $this->db->query("select user_country.country_name,user_state.state_name,user_city.city_name,user_religion.religion_name,user_caste.caste_name,user_sub_caste.sub_caste_name from user_country,user_state,user_city,user_religion,user_caste,user_sub_caste where user_country.country_id='".$con."' AND user_state.state_id='".$st."' AND user_city.city_id='".$ci."' AND user_religion.religion_id='".$reg."' AND user_caste.caste_id='".$cast."' AND user_sub_caste.sub_caste_id='".$sub."'")->result_array();
	}
	
	public function getreguserdata()
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_discription.*,user_family_detail.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_discription,user_family_detail,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_discription.profile_id=user_registration.profile_id AND user_family_detail.profile_id=user_registration.profile_id AND user_lifestyle.profile_id=user_registration.profile_id AND user_registration.user_name='".$email['username']."' OR user_registration.user_name='".$email1['username']."' AND upload_type=0 group by user_registration.profile_id")->result_array();
		
	}
	
	public function getcr($con,$reg)
	{
		return $this->db->query("select user_country.country_name,user_religion.religion_name from user_country,user_religion where user_country.country_id='".$con."' AND user_religion.religion_id='".$reg."'")->result_array();
	}
	
	public function getR($id)
	{
		return $this->db->query("select * from user_religion where religion_id='".$id."'")->result_array();
	}
	
	public function who_viewed($userpro,$pro_id)
	{
		$res=$this->db->query("select * from who_view_profile where profile_id='".$userpro."' AND who_view='".$pro_id."'")->result_array();

		if(count($res)>=1)
		{
			return false;
		}	
		else
		{
			$this->db->query("insert into who_view_profile values('".$userpro."','".$pro_id."')");
		}
	}
	
	public function getwhoviewed()
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		
		if($email)
		{
			$em = $email;
		}
		else
		{
			$em = $email1;
		}
		
		$pro = $this->getprofileid($em);
	
		return $this->db->query("select * from who_view_profile where profile_id='".$pro[0]['profile_id']."'")->result_array();
	}

	public function getsimi($data,$id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		
		if($email)
		{
			$em = $email;
		}
		else
		{
			$em = $email1;
		}

		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_discription.*,user_family_detail.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_discription,user_family_detail,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_discription.profile_id=user_registration.profile_id AND user_family_detail.profile_id=user_registration.profile_id AND user_lifestyle.profile_id=user_registration.profile_id AND
		    user_name != '".$em['username']."' AND user_registration.profile_id != '".$id."' AND marital_status='".$data."' AND upload_type=0 
		    group by user_registration.profile_id limit 2")->result_array();
	}
	
	public function getviewedpro($id)
	{
		return $this->db->query("select profile_id from who_view_profile where who_view='".$id."' limit 3")->result_array();
	}
	
	public function viewedprofile()
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		
		if($email)
		{
			$em = $email;
		}
		else
		{
			$em = $email1;
		}
		
		$pro = $this->getprofileid($em);

		return $this->db->query("select profile_id from who_view_profile where who_view='".$pro[0]['profile_id']."'")->result_array();
	}
	
	public function update_info($data,$data1,$data2,$data3)
	{
		if($data3['ps'] == 'abnormal')
		{
			$dis = 1;
		}
		else
		{
			$dis = 0;
		}
		
		if($this->db->query("UPDATE user_registration SET name = '".$data['name']."',mother_tongue='".$data['mt']."' where profile_id='".$data['pro']."'") &&
			$this->db->query("UPDATE user_basic_infor SET marital_status = '".$data1['ms']."' where profile_id='".$data['pro']."'") &&
			$this->db->query("UPDATE user_lifestyle SET diet = '".$data2['diet']."',smoke='".$data2['smoke']."',drink='".$data2['drink']."',height='".$data2['height']."',
			body_type='".$data2['bt']."',body_tone='".$data2['com']."' where profile_id='".$data['pro']."'") &&
			$this->db->query("UPDATE user_discription SET disability = '".$dis."' where profile_id='".$data['pro']."'"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function update_info1($data)
	{
		if($this->db->query("UPDATE user_family_detail SET father_status = '".$data['fo']."',mother_status='".$data['mo']."',no_of_brothers='".$data['nob']."',
		no_of_merried_brother='".$data['nmb']."',no_of_sister='".$data['nos']."',no_of_merried_sister='".$data['nms']."',affluence_level='".$data['al']."'
		 where profile_id='".$data['pro']."'"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function update_info2($data)
	{
		if($this->db->query("UPDATE user_education_info SET education_level = '".$data['el']."',education_field='".$data['ef']."',employee_in='".$data['ei']."',
		post='".$data['des']."',annual_income='".$data['ai']."' where profile_id='".$data['pro']."'"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function whoviewedmypro($id)
	{
		return $this->db->query("select who_view from who_view_profile where profile_id='".$id."' limit 6")->result_array();
	}
	
	//marital status wise data display use in advance search
	public function statuswise($id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and marital_status='$id' group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and marital_status='$id' group by user_registration.profile_id ")->result_array();
			
		}
	}

	public function mtwise($id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and mother_tongue='$id' group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and mother_tongue='$id' group by user_registration.profile_id ")->result_array();
			
		}
	}
	
	public function eduwise($id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and education_level='$id' group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and education_level='$id' group by user_registration.profile_id ")->result_array();
			
		}
	}

	public function couwise($id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		$couid = $this->db->query("select country_id from user_country where country_name = '".$id."'")->result_array();
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and country ='".$couid[0]['country_id']."' group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and 
				country ='".$couid[0]['country_id']."' group by user_registration.profile_id ")->result_array();
			
		}
	}

	public function regwise($id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		$regid = $this->db->query("select religion_id from user_religion where religion_name = '".$id."'")->result_array();
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and religion ='".$regid[0]['religion_id']."' group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and 
				religion ='".$regid[0]['religion_id']."' group by user_registration.profile_id ")->result_array();
			
		}
	}

	public function pswise($id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and disability='$id' group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and disability='$id' group by user_registration.profile_id ")->result_array();
			
		}
	}

	public function eatwise($id)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and diet='$id' group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and diet='$id' group by user_registration.profile_id ")->result_array();
			
		}
	}

	public function cnt()
	{
		return $this->db->query("SELECT profile_id, COUNT(profile_id) as total FROM who_view_profile GROUP BY profile_id ORDER BY total DESC limit 6")->result_array();
	}

	public function getsearchall()
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 group by user_registration.profile_id")->result_array();
			
		}
	}

	public function get_search($data)
	{
		$email = $this->session->userdata('username');
		$email1 = $this->session->userdata('userinfo');
		$chkgen = $this->db->query("select gender from user_registration where user_name = '".$email['username']."' OR user_name = '".$email1['username']."' ")->result_array();
	//	print_r($chkgen);
		if($chkgen[0]['gender'] == "Male")
		{
		return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Female' AND upload_type=0 and (marital_status = '".$data['ms']."' or country = '".$data['country']."' or state = '".$data['state']."' or city = '".$data['city']."' or religion = '".$data['reli']."' or community = '".$data['Caste']."' or education_level = '".$data['edu']."' or mother_tongue = '".$data['mt']."' ) group by user_registration.profile_id")->result_array();
		}
		else
		{
			return $this->db->query("select user_registration.*,user_upload.*,user_education_info.*,user_basic_infor.*,user_lifestyle.* from user_registration,user_upload,user_education_info,user_basic_infor,user_lifestyle where user_registration.profile_id=user_upload.profile_id AND user_registration.profile_id=user_education_info.profile_id AND user_registration.profile_id=user_lifestyle.profile_id AND user_registration.profile_id=user_basic_infor.profile_id AND user_registration.user_name!='".$email['username']."' AND user_registration.user_name!='".$email1['username']."' AND user_registration.gender = 'Male' AND upload_type=0 and (marital_status = '".$data['ms']."' or country = '".$data['country']."' or state = '".$data['state']."' or city = '".$data['city']."' or religion = '".$data['reli']."' or community = '".$data['Caste']."' or education_level = '".$data['edu']."' or mother_tongue = '".$data['mt']."' ) group by user_registration.profile_id")->result_array();
			
		}
	}		
}
?>