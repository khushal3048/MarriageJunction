<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class search extends CI_Controller {

public function statuswise()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->statuswise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}
	public function statuswisedi()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->statuswise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function statuswisewi()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->statuswise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function mtwiseguj()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->mtwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function mtwisehin()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->mtwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function mtwiseeng()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->mtwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function eduwisemas()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->eduwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function eduwisebac()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->eduwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function eduwisedoc()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->eduwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function couwisein()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->couwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function couwiseus()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->couwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function couwiseuk()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->couwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function regwisehi()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->regwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function regwisesikh()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->regwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function regwisejain()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->regwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function pswisenor()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->pswise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function pswiseabn()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->regwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function eatingveg()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->eatwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function eatingnonveg()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->eatwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

	public function eatingegg()
	{
		$id=$this->input->post('id');
		$res=$this->user_mo->eatwise($id);
		foreach ($res as $value) {
		
			$con = $value['country'];
			$reg = $value['religion'];
			$cr = $this->user_mo->getcr($con,$reg);  
			//			print_r($cr);
			echo "<div class='profile_top'>";
      echo "<h2>".$value['profile_id']." | ".$value['name']."</h2>";
	    echo "<div class='col-sm-3 profile_left-top'>";
	    	echo "<img src='". base_url(). "assets/images/" .$value['file_name'] ."' class='img-responsive' alt=''/>";
	  echo "</div>";
	   echo "<div class='col-sm-3'>";
	    echo "<ul class='login_details1'>";
		echo "<li><p>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.' More....</p></li>";
		 echo "</ul>";
	    echo "</div>";
	    echo "<div class='col-sm-6'>";
	    echo "<table class='table_working_hours'>";
	        	echo "<tbody>";
	        	echo "<tr class='opened_1'>";
						echo "<td class='day_label1'>Age / Height :</td>";
						echo "<td class='day_value'>28, " .$value['height']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
					echo "<td class='day_label1'>Date Of Birth :</td>";
					echo "<td class='day_value'>". $value['date_of_birth']."</td>";
					echo "</tr>";
					echo "<tr class='closed'>";
					echo "<td class='day_label1'>Education :</td>";
					echo "<td class='day_value closed'><span>". $value['education_field']."</span></td>";
					echo "</tr>";
					echo "<tr class='opened'>";
						echo "<td class='day_label1'>Marital Status :</td>";
						echo "<td class='day_value'>".$value['marital_status']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Religion :</td>";
						echo "<td class='day_value'>".$cr[0]['religion_name']."</td>";
					echo "</tr>";
				    echo "<tr class='opened'>";
						echo "<td class='day_label1'>Location :</td>";
						echo "<td class='day_value'>".$cr[0]['country_name']."</td>";
					echo "</tr>";
			    echo "</tbody>";
		  echo "</table>";
		   echo "<div class='buttons' style='margin-left:100px;'>";
			   echo "<a href='".base_url('user/view_profile/').$value['profile_id']."'><div class='vertical'>View Profile</div></a>";
			  echo "<a href='".base_url()."livechat/php/app.php/admin?user_id=".$value['profile_id']."'><div class='vertical'>Live Chat</div></a>";
		   echo "</div>";
	    echo "</div>";
	    echo "<div class='clearfix'> </div>";
echo "</div>";
		}
		//print_r($res[0]);
		//echo $id;
	}

}

?>