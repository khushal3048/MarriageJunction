<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Operation extends CI_Controller {

	public function user_login()
	{
		$user_name = $this->input->post('username');
		$user_password = md5($this->input->post('password'));
		
		if($this->user_mo->login_data($user_name,$user_password))
		{
			$email['username'] = $user_name;
			$id = $this->user_mo->getprofileid($email);
			if($this->user_mo->chkid($id[0]['profile_id']))
			{
				$data = array('username'=>$user_name);
				$this->session->set_userdata('userinfo',$data);
				echo json_encode(array('status'=>1));
			}
			else
			{
				$data = array('username'=>$user_name);
				$data2 = array('pro_id' => $id[0]['profile_id']);
				$this->session->set_userdata('userinfo',$data);
				$this->session->set_userdata('userid',$data2);
				echo json_encode(array('status'=>2));	
			}		
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}
	
	public function user_signout()
	{
		$this->session->unset_userdata('userinfo');
		$this->session->sess_destroy();
		redirect(base_url());
	}
	


	public function ins_visitor()
	{

		$ip='139.5.20.92';
		$date=date("d-m-Y"); 
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

	}

	public function chkemail()
	{
		$data = $this->input->post();
		if($this->user_mo->chkemail($data))
		{
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}

	public function add_()
	{
		$data =  $this->input->post();
		//print_r($data);
		$sessioncou = array('couname'=>$data['live'],'relname'=>$data['religion']);
		$this->session->set_userdata('couname',$sessioncou);
		$date = $data['b_year']."-".$data['b_month']."-".$data['b_date'];
		$dataedit  = array('user_name' => $data['user_email'],'user_password' => md5($data['user_password']),'create_profile_for' => $data['user_profile_for'],
		'gender' => $data['gender'],'name' => $data['first_name']." ".$data['last_name'],'date_of_birth' => $date,'religion' => $data['religion'],
		'mother_tongue' => $data['mother_tongue'],'country' => $data['live']);
		$sessiondata = array('username'=>$data['user_email']);
		
		 //$this->load->model('user_mo'); 
		 $res = $this->user_mo->register($dataedit);
		
	 	if($res) 
		 {
		 	$this->session->set_userdata('username',$sessiondata);
		 	echo json_encode(array('status'=>1));
		 } if($res == 0) {
		 	echo json_encode(array('status'=>0));
		 } 
	}
	
	public function add_user_data()
	{
		$data = $this->input->post();
		$email1 = $this->session->userdata('userinfo'); 
		$email = $this->session->userdata('username');
		if($email)
		{
			$profileid = $this->user_mo->getprofileid($email);
		}
		else
		{
			$profileid = $this->user_mo->getprofileid($email1);
		}
		foreach($profileid as $value) {
			 $profileid=$value['profile_id'];	 
		}
		//print_r($email);
		$basicdata = array('profile_id'=>$profileid,'state'=>$data['state'],'city'=>$data['city'],'marital_status'=>$data['mt_status'],'no_of_child'=>$data['any_ch'],'community'=>       					$data['your_comm'],'sub-community'=>$data['sub_comm'],'regional_site'=>$data['reg']);
		
		$edudata = array('profile_id'=>$profileid,'education_level'=>$data['ed_level'],'education_field'=>$data['ed_filed'],'employee_in'=>$data['work_with'],'post'=>$data['as'],         	 			'annual_income'=>$data['income']);
		
		$lifestyle = array('profile_id'=>$profileid,'diet'=>$data['ed_diet'],'smoke'=>$data['smoke'],'drink'=>$data['drink'],'height'=>$data['height'],
						'body_type'=>$data['body_type'],'body_tone'=>$data['skin_tone'],'mobile'=>$data['mobile']);
		$userdesc = array('profile_id'=>$profileid,'about_user'=>$data['about'],'disability'=>$data['dis']);
		$userfamily = array('profile_id'=>$profileid,'father_status'=>$data['father_st'],'mother_status'=>$data['mother_st'],'no_of_brothers'=>$data['no_bro'],'no_of_merried_brother'=>$data['mar_bro'],'no_of_sister'=>$data['no_sis'],'no_of_merried_sister'=>$data['mar_sis'],'affluence_level'=>$data['aff_lev']);
		$res = $this->user_mo->add_user_data($basicdata,$edudata,$lifestyle,$userdesc,$userfamily);
		
	 	if($res == 1) 
		 {
		 	if($this->sendSMS($data['mobile']))
			{
		 	//echo json_encode(array('status'=>1));
			}
		 } else {
		 	//echo json_encode(array('status'=>0));
		 }
	}	
	
   public function getcity() { /// get City list bases on state 
   		$id = $this->input->post('s_id');
   		$res = $this->user_mo->getcity($id);
		 
		echo json_encode($res);
   }
   
    public function getsubcaste() { /// get subcaste list bases on caste 
   		$id = $this->input->post('c_id');
   		$res = $this->user_mo->getsubcaste($id);
		 
		echo json_encode($res);
   }
	
	public function forgot()
	{
		$email = $this->input->post('ls_email');
	 
		if($this->user_mo->forgot_email($email))
		{
			$random_pass = $this->randomPassword(10);
			if($this->user_mo->reset_password($random_pass,$email))
			{
				$msg ="http://localhost/marriagejunction/user/changepwd/".$random_pass;
			  
				$this->load->library('email');
				
				$confing =array(
				'protocol'=>'smtp', 
		        'smtp_host'=>"smtp.gmail.com",
		        'smtp_port'=>465,
		        'smtp_user'=>"marriagejunction.info@gmail.com",
		        'smtp_pass'=>"krinfotech",
		        'smtp_crypto'=>'ssl',               
		        'mailtype'=>'text');
				
				$this->email->initialize($confing);
				$this->email->set_newline("\r\n");
				$this->email->from('marriagejunction.info@gmail.com');
				$this->email->to($email);
				$this->email->subject('To Change Your Password Click On That Link : ');
				$this->email->message($msg);

				if(!$this->email->send())
				{
					show_error($this->email->print_debugger());
				}
				else
				{
					echo json_encode(array('status'=>1));
				}
			}
			else
			{
				
			}
			
		}
		else
		{
		echo json_encode(array('status'=>0));
		}
	}
	
	function randomPassword($length)
	{
		$chars  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$password = substr(str_shuffle( $chars),0,$length);
		return $password;
	}
	
	public function change_pwd()
	{
		$data = $this->input->post();
		if($data['new_pwd'] == "" || $data['confirm_pwd'] == "")
		{
			$this->session->set_flashdata('error1','Plz Enter The New Password..');
			redirect(base_url().'user/changepwd/'.$data['token']);
		}
		else
		{
			if($data['new_pwd'] == $data['confirm_pwd'])
			{	
				if($this->user_mo->change_pwd($data))
				{
					$this->session->sess_destroy();
					redirect(base_url().'user/login');
				}
				else
				{
					$this->session->set_flashdata('error1','New Paasword Can\'t Be Updated....');
					redirect(base_url().'user/changepwd/'.$data['token']);
				}
			}
			else
			{
				$this->session->set_flashdata('error2','Both Password Must Be Same....');
				redirect(base_url().'user/changepwd/'.$data['token']);
			}
		}
	}
	
	public function updatemobile()
	{
		$mobile = $this->input->post('new_mb');
		//print_r($mobile);
		if($this->user_mo->updatemobile($mobile))
		{
			$this->sendSMS($mobile);
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}
	
	public function resendPIN()
	{
		$mobile = $this->input->post('new_mb');
		//print_r($mobile);
		if($this->sendSMS($mobile))
		{
			return true;			
		}
		else
		{
			return false;
		}
	}

	public function verifyPIN()
	{
		$data = $this->input->post('userpin');
//		print_r($data);
		$pin = $this->session->userdata('usrpin');
//		print_r($pin);
		if($data == $pin['otp'])
		{
			$this->session->unset_userdata('usrpin');
			echo json_encode(array('status'=>1));
			
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}
	
	public function sendSMS($mobile) {
				
				$pin = $this->randomPin(4);
				$usrpin = array('otp'=>$pin);
				$this->session->set_userdata('usrpin',$usrpin);
			 $url="http://www.smszone.in/sendsms.asp?page=SendSmsBulk&username=918758613901&password=96B0&number=$mobile&message=".$pin;
			 $ch = curl_init($url);
			 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		   	 $output = curl_exec($ch);
			  if(curl_errno($ch)) {
        			echo 'error:' . curl_error($ch);
    			}
    			curl_close($ch);
    			//echo $output;
			//	echo json_encode(array('status'=>$output));
	}
	
	function randomPin($length)
	{
		$chars  = "1234567890";
		$pin = substr(str_shuffle( $chars),0,$length);
		return $pin;
	}
	
	  
	   public function imageupload($file) {
        $config['upload_path']   = './assets/images/user_profile';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($file)  )
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            $this->session->set_flashdata('success', $error);

        } else {
            $dataup =  $this->upload->data();
           // print_r($dataup);
            return $dataup['file_name'];
        }
    }
	 public function uploadpic()
    {
        $data=$this->input->post();
       $email1=$this->session->userdata('username');
       $email=$this->session->userdata('userinfo');
       if($email1)
       {
       		$var = $email1;
       }
       else
       {
       		$var = $email;
       }
       
      $proid=$this->user_mo->getprofileid($var);
	  $id = $proid[0]['profile_id'];
	  print_r($id);
       if($profile = $this->imageupload('userfile')) {
           $res=$this->user_mo->uploadpic($id,$profile);
            redirect(base_url('user/profile'));
        }
    }
	
	public function search_id()
	  {
	  	$data = $this->input->post();
		$res = $this->db->get_where('user_registration',array('profile_id'=>$data['id']));
		if(count($res->result_array())==1)
		{
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	  }
	  
	public function update_info()
	{
		$data = $this->input->post();
		print_r($data);
		$dataup = array('pro'=>$data['pro'],'name'=>$data['name'],'mt'=>$data['mt']);
		$dataup1 = array('ms'=>$data['ms']);
		$dataup2 = array('diet'=>$data['diet'],'smoke'=>$data['smoke'],'drink'=>$data['drink'],'bt'=>$data['bt'],'com'=>$data['com'],'height'=>$data['height']);
		$dataup3 = array('ps'=>$data['ps']);
		
		if($this->user_mo->update_info($dataup,$dataup1,$dataup2,$dataup3))
		{
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}
	
	public function update_info1()
	{
		$data = $this->input->post();
		print_r($data);
		
		if($this->user_mo->update_info1($data))
		{
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}
	
	public function update_info2()
	{
		$data = $this->input->post();
		print_r($data);
		
		if($this->user_mo->update_info2($data))
		{
			echo json_encode(array('status'=>1));
		}
		else
		{
			echo json_encode(array('status'=>0));
		}
	}

	public function getsearch()
	{
		$data = $this->input->post();
		if($data['ms'] == "-1" && $data['country'] == "-1" && $data['state'] == "" && $data['city'] == "" && $data['reli'] == "-1" && $data['Caste'] == "" && 
			$data['subcaste'] == "" && $data['edu'] == "-1" && $data['mt'] == "-1" && $data['from'] == "-1" && $data['to'] == "-1")
		{
			$res['userdata'] = $this->user_mo->getsearchall();
			if($res)
			{
				$this->load->view('search_result',$res);
			}
		}
		else
		{
			$res['userdata'] = $this->user_mo->get_search($data);
			if($res)
			{
				$this->load->view('search_result',$res);
			}	
		}
	}

}
?>