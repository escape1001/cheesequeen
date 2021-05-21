<?php
	include "00_conn.php";
	
	#변수받은것 저장
	$no = $_GET['no'];
	$pass = $_POST['pass'];

	//echo "정보확인<br/> 입력비번: ".$pass."<br/>no : ".$no;

	#02. 해당 no 비번 가져오기
	$sqlP = "SELECT pass FROM freeboard WHERE no='$no'";
	$resultP = MYSQLI_QUERY($conn, $sqlP);
	$row = MYSQLI_FETCH_ARRAY($resultP);
	//echo "해당no 비번 : ".$row[0]."<br/>";
	
	#03. 비번 서로 일치하면 삭제, 아니라면 경고문 띄운 뒤 이전페이지
	if($pass==$row[0]){
		#echo "<p style='text-align:center; color:green;'>성공적으로 삭제되었습니다.</p>";
		$sql = "DELETE FROM freeboard WHERE no='$no'";
		MYSQLI_QUERY($conn, $sql);
	}
	else{
		//echo "아녀!";
		echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.go(-1);</script>";
	}

	MYSQLI_CLOSE($conn);
	echo "<meta http-equiv='Refresh' content='1; ../biz.php'/>";
?>