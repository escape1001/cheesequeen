<?php
	include "00_conn.php";
	
	#01. 넘어오는 데이터 확인하기
	$q = $_REQUEST['q'];

	/*	
		+ GET, POST
		+ REQUEST : 슈퍼전역변수
			GET, POST 역할을 모두 담당함. 앞에서 넘겨주는 정보가
			GET, POST 어떤 것도 전부 받아줄 수 있음

			: ajax파트에서 사용
	*/
	
	#02. members테이블에서 일치하는 id가 있는지 확인하기
	# 요청할 sql문 작성하기
	# 로그인이 되어있다면 sql문 작성하기

	$sql = "SELECT * FROM members WHERE useremail='$q'";
	$result = MYSQLI_QUERY($conn, $sql);
	
	#03. 해당하는 데이터 한줄씩 요청하기
	$row = MYSQLI_FETCH_ARRAY($result);

	#04. row['userid']의 정보가 $q와 일치하는지 확인하기
	# 만약 일치한다면 '중복된 아이디, 사용불가' 넘겨주기
	# 불일치한다면 '사용가능한 아이디입니다.' 넘겨주기
	/* [문제발생]
		Notice : Trying to access array offset on calue of type null

		[해결] NULL값 처리하기
		1. if문을 간단히 확인하는 방법
			::  대상의 값이 비어있는지 아닌지 확인할 때 사용하는 방법

		2. isset(대상) : 해당하는 정보가 있는지 확인하고, 값이 있다면 데이터 넘기고 없다면 뒤의 값 no를 넘기게 되어있음
		
		isset($row['userid']) ? $row['userid'] : 'no';
		대상의 값을 확인하고		  ? 참이면 이거		: 거짓이면 이거
		
		!중요!
		아래의 문법은 상위버전에서 적용되거나 javascript에서 ajax로 넘길 때 null에 대한 문제가 생기면 해결하는 문법
	*/

	$row['useremail'] = isset($row['useremail']) ? $row['useremail'] : 'no';


	if($row['useremail']==$q){
		echo "중복된 이메일입니다.";
	}
	else{
		echo "사용가능한 이메일입니다.";
	}
?>