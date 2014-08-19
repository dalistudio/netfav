<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 数据表操作类
 */

include 'session.php';
include 'conn.php';

class NetFav{
	function User_Add($Name,$Pwd,$Level,$Father){
		global $mysqli;
		$sql  = "INSERT INTO user SET ";
		$sql .= "user_name='".$Name."',";
		$sql .= "user_pwd='".$Pwd."',";
		$sql .= "user_level='".$Level."',";
		$sql .= "user_father='".$Father."'";
		
		$result = $mysqli->query($sql);
		if($result){
			return "Ok";
		}
		else {
			if($mysqli->errno=="1062")
				return "Rename";
			else
				return "Error";
		}
	}
	
	function User_Del($Id){
		global $mysqli;
		$sql = "DELETE FROM user WHERE user_id='".$Id."';";
		$result = $mysqli->query($sql);
	}
	
	function User_Edit($Id,$Name,$Pwd,$Level,$Father){
		global $mysqli;
		$sql  = "UPDATE user SET ";
		if(!strcmp($Level,'')==0)$sql .= "user_level='".$Level."',";
		if(!strcmp($Father,'')==0)$sql .= "user_father='".$Father."',";
		$sql .= "user_name='".$Name."',";
		$sql .= "user_pwd='".$Pwd."'";
		$sql .= " WHERE ";
		$sql .= "user_id='".$Id."';";
		
		$result = $mysqli->query($sql);
	}
	
	function Fav_Add($User_Id,$Name,$Desc,$Desc,$Desc_Url,$Level,
			$Url1,$Url1_Name,$Url1_Tip,
			$Url2,$Url2_Name,$Url2_Tip,
			$Url3,$Url3_Name,$Url3_Tip,
			$Url4,$Url4_Name,$Url4_Tip,
			$Url5,$Url5_Name,$Url5_Tip
	){
		global $mysqli;
		$sql  = "INSERT INTO fav SET ";
		$sql .= "user_id='".$User_Id."',";
		$sql .= "fav_name='".$Name."',";
		$sql .= "fav_desc='".$Desc."',";
		$sql .= "fav_desc_url='".$Desc_Url."',";
		$sql .= "fav_level='".$Level."',";
		
		$sql .= "fav_url1='".$Url1."',";
		$sql .= "fav_url1_name='".$Url1_Name."',";
		$sql .= "fav_url1_tip='".$Url1_Tip."',";
		
		$sql .= "fav_url2='".$Url2."',";
		$sql .= "fav_url2_name='".$Url2_Name."',";
		$sql .= "fav_url2_tip='".$Url2_Tip."',";
		
		$sql .= "fav_url3='".$Url3."',";
		$sql .= "fav_url3_name='".$Url3_Name."',";
		$sql .= "fav_url3_tip='".$Url3_Tip."',";
		
		$sql .= "fav_url4='".$Url4."',";
		$sql .= "fav_url4_name='".$Url4_Name."',";
		$sql .= "fav_url4_tip='".$Url4_Tip."',";
		
		$sql .= "fav_url5='".$Url5."',";
		$sql .= "fav_url5_name='".$Url5_Name."',";
		$sql .= "fav_url5_tip='".$Url5_Tip."'";
		
		$result = $mysqli->query($sql);
	}
	
	function Fav_Del($Id,$User_Id){
		global $mysqli;
		$sql  = "DELETE FROM fav WHERE ";
		if(!strcmp($User_Id,'')==0)$sql .= "user_id=".$User_Id." and ";
		$sql .= "fav_id='".$Id."';";
		$result = $mysqli->query($sql);
	}
	
	function Fav_Edit($Id,$User_Id,$Name,$Desc,$Desc,$Desc_Url,$Level,
			$Url1,$Url1_Name,$Url1_Tip,
			$Url2,$Url2_Name,$Url2_Tip,
			$Url3,$Url3_Name,$Url3_Tip,
			$Url4,$Url4_Name,$Url4_Tip,
			$Url5,$Url5_Name,$Url5_Tip
	){
		global $mysqli;
		$sql  = "UPDATE fav SET ";
		$sql .= "user_id='".$User_Id."',";
		$sql .= "fav_name='".$Name."',";
		$sql .= "fav_desc='".$Desc."',";
		$sql .= "fav_desc_url='".$Desc_Url."',";
		$sql .= "fav_level='".$Level."',";
		
		$sql .= "fav_url1='".$Url1."',";
		$sql .= "fav_url1_name='".$Url1_Name."',";
		$sql .= "fav_url1_tip='".$Url1_Tip."',";
		
		$sql .= "fav_url2='".$Url2."',";
		$sql .= "fav_url2_name='".$Url2_Name."',";
		$sql .= "fav_url2_tip='".$Url2_Tip."',";
		
		$sql .= "fav_url3='".$Url3."',";
		$sql .= "fav_url3_name='".$Url3_Name."',";
		$sql .= "fav_url3_tip='".$Url3_Tip."',";
		
		$sql .= "fav_url4='".$Url4."',";
		$sql .= "fav_url4_name='".$Url4_Name."',";
		$sql .= "fav_url4_tip='".$Url4_Tip."',";
		
		$sql .= "fav_url5='".$Url5."',";
		$sql .= "fav_url5_name='".$Url5_Name."',";
		$sql .= "fav_url5_tip='".$Url5_Tip."'";
		
		$sql .= " WHERE ";
		$sql .= "fav_id='".$Id."';";
		
		$result = $mysqli->query($sql);
	}
	
	function Msg_Add($Writer,$Reader,$Text,$Date_Write,$Date_Read,$Status,$Type){
		global $mysqli;
		$sql  = "INSERT INTO msg SET ";
		$sql .= "msg_writer='".$Writer."',";
		$sql .= "msg_reader='".$Reader."',";
		$sql .= "msg_text='".$Text."',";
		$sql .= "msg_date_write='".$Date_Write."',";
		if(!strcmp($Date_Read,'')==0)$sql .= "msg_date_read='".$Date_Read."',";
		$sql .= "msg_status='".$Status."',";
		$sql .= "msg_type='".$Type."'";
		
		$result = $mysqli->query($sql);
	}
	
	function Msg_Del($Id,$User_Id){
		global $mysqli;
		$sql  = "DELETE FROM msg WHERE ";
		if(!strcmp($User_Id,'')==0)$sql .= "msg_writer=".$User_Id." and ";
		$sql .= "msg_id='".$Id."';";
		$result = $mysqli->query($sql);
	}
	
	function Msg_Edit($Id,$Writer,$Reader,$Text,$Date_Write,$Date_Read,$Status,$Type){
		global $mysqli;
		$sql  = "UPDATE msg SET ";
		$sql .= "msg_writer='".$Writer."',";
		$sql .= "msg_reader='".$Reader."',";
		$sql .= "msg_text='".$Text."',";
		$sql .= "msg_date_write='".$Date_Write."',";
		$sql .= "msg_date_read='".$Date_Read."',";
		$sql .= "msg_status='".$Status."',";
		$sql .= "msg_type='".$Type."'";
		
		$sql .= " WHERE ";
		$sql .= "msg_id='".$Id."';";
		
		$result = $mysqli->query($sql);
	}
}