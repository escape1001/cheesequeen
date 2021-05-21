<?php
	#1. 초기화 링크걸기
	include "00_conn.php";

	#2. 아이디, 비밀번호, 이름, 이메일, 전화번호 넘겨받고 변수저장하기
	$userid = $_POST['userid'];
	$userpw0 = $_POST['userpw0'];
	$username = $_POST['username'];
	$useremail = $_POST['useremail'];
	$userphone = $_POST['userphone'];

	#3. 우편번호 주소 조합하기
	# address필드는 하나밖에 없음. 조합하기
	# 12345 무슨동 아파트

	$useradd0 = $_POST['useradd0'];
	$useradd1 = $_POST['useradd1'];
	$address = $useradd0." ".$useradd1;

	#echo "아이디 : ".$userid." / 비번 : ".$userpw0." / 이름 : ".$username." / 메일 : ".$useremail." / 전번 : ".$userphone." / 주소 : ".$address;

	#4. 회원가입하기
	/*
		1. 넘겨받은 정보들이 빈칸이 아닐 경우 필드에 맞춰서 members테이블에 저장되도록 만들기

		2. shell || phpMyAdmin에서 확인하며 작업하기

		[빈 칸 표현 방법]
		$post3 == "" , 빈칸과 같을 경우
		$post3 !="", 빈칸이 아닌 경우

		empty($post3) && empty($add1) : 담고있는 값이 비어있을 경우
		!empty($post3) && !empty($add1) : 담고있는 값이 비어있지 않을 경우

		3. 회원가입이 되면 회원가입에 성공했습니다. 문구띄우기
		아니라면 회원가입에 실패했습니다. 문구 띄우기
	*/

	if($userid!="" && $userpw0!="" && $username!="" && $useremail!="" && $userphone!="" && $useradd0!="" && $useradd1!=""){
		$dblSql = "SELECT userid FROM members WHERE userid='$userid'";
		$dblResult = MYSQLI_QUERY($conn, $dblSql);
		$dblRow = MYSQLI_FETCH_ARRAY($dblResult);
		//echo $dblRow[0];

		if(empty($dblRow)){
			$sql = "INSERT INTO members
				(userid, userpass, username, useremail, userphone, address)
				values
				('$userid','$userpw0','$username','$useremail','$userphone','$address')";

			MYSQLI_QUERY($conn, $sql);

			echo "<script>alert('".$username."님 환영합니다!');</script>";
			
			echo "<meta http-equiv='Refresh' content='1; url=../login.html'/>";
		}
		else{echo "<script>alert('중복된 아이디입니다. 회원가입이 불가합니다.'); history.go(-1);</script>";}	
	}
	else{echo "<p style='color:gold;'>회원가입에 실패했습니다.</p>";}
?>