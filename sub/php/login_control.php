<?php
	#1. 초기화 링크걸기
	include "00_conn.php";

	#2. userid, userpass 변수 저장 후 잘 넘어오는지 echo 출력 받아보기
	$userid = $_POST['userid'];
	$userpass = $_POST['userpw'];

	#3. mysqli_query로 넘기기 전의 sql문 작성하기
	# 넘겨온 아이디와 비밀번호가 같은 정보 관련 sql문 작성하기
	$sql = "SELECT * FROM members WHERE userid='$userid' AND userpass='$userpass'";
	
	#4. 로그인이 잘되었다면 해당하는 sql문 요청하기
	$result = MYSQLI_QUERY($conn, $sql);
	$row = MYSQLI_FETCH_ARRAY($result);
	//echo $row['userpass'];
	
	if($row['userid']==$userid && $row['userpass']==$userpass){
		session_start();
		$_SESSION['userid'] = $userid;
		#echo "회원인증이 완료되었습니다";
	}
	else{echo "<script>alert('아이디 또는 비밀번호가 일치하지 않습니다.'); history.go(-1);</script>";}
	
	MYSQLI_CLOSE($conn);
	echo "<meta http-equiv='Refresh' content='1; url=../../index.php'/>";
?>