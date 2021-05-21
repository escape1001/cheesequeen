<?php
	header("content-type:text/html; charset=utf-8");

	/* [정리]
		로그아웃엔 DB정보, 테이블의 정보 필요없음!
		네트워크에 있는 SESSION 정보만 삭제하기
	*/

	#01. 세션 시작하기
	session_start();

	#02. 세션 삭제하기 (셋업을 풀겠다는 의미)
	session_unset();

	#03. 세션 파기하기
	session_destroy();

	#echo "<p style='text-align:center; color:blue'>로그아웃 되었습니다.</p>";

	echo "<meta http-equiv='Refresh' content='1; url=../../index.php'/>";
?>