-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-04-11 17:36
-- 서버 버전: 10.4.13-MariaDB
-- PHP 버전: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `inboard`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `no` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `wdate` datetime NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`no`, `name`, `title`, `content`, `wdate`, `view`) VALUES
(1, '치즈퀸', '[필독] 배송정보 오류시 환불이 불가능합니다!', '주문 시 배송정보를 꼭!! 정확하게 기입해주세요!\r\n\r\n주소, 혹은 연락처를 적지 않거나 잘못 적어주시는 경우,\r\n현관 비밀번호가 있는데 기사님의 연락을 받지 않으시는 경우,\r\n부재중인데 기사님의 연락을 받지 않으시는 경우 등의 상황에서는\r\n택배가 반송됩니다.\r\n\r\n반송된 택배를 고객요청으로 재발송할 때에는 왕복배송비를 추가로 부담하셔야 합니다.\r\n회수 후 7일이 지나면 폐기하므로 환불도, 재발송도 불가능하니 유의해주세요.\r\n\r\n주소와 전화번호를 꼭 정확하게 기입해주시고\r\n택배기사님의 연락을 잘 받아주세요!\r\n감사합니다.', '2021-04-11 22:35:24', 0),
(2, '치즈퀸', '[공지] 고객센터 통화가 되지 않을 때는? ', '치즈퀸 고객센터(02-2226-6950)는 언제나 고객님들을 환영합니다!\r\n\r\n오전 11시부터 오후 5시까지, 어떤 문의사항이든 편하게 전화주세요.\r\n\r\n친절하게 상담해 드립니다.\r\n\r\n\r\n\r\n그런데 간혹 다른 고객님과 통화중인 경우에는 전화연결이 어려울 수 있습니다.\r\n\r\n그럴 때는 편리한 카톡 상담을 이용하시거나 (카톡 아이디 : 치즈퀸)\r\n\r\n고객센터 게시판에 글을 남겨주세요.\r\n\r\n문의사항 확인 후 최대한 빨리 연락드리겠습니다.\r\n\r\n\r\n\r\n감사합니다!', '2021-04-11 22:35:46', 0),
(3, '치즈퀸', '[배송] 2021 삼일절 연휴 배송안내 ', '변함없이 치즈퀸을 이용해주셔서 감사드립니다.\r\n\r\n2021년 삼일절 택배발송에 대한 일정안내입니다.\r\n\r\n\r\n2월 26일(금) 오후 4시전 주문건까지 당일발송합니다. \r\n\r\n2월 26일(금) 오후 4시 이후 ~ 3월 1일(월) 주문건은\r\n\r\n3월 2일 ~ 3월 3일에 순차발송합니다. \r\n\r\n2월 27일 ~ 3월 1일 고객센터 휴무입니다.\r\n\r\n결품, 통관 지연건이 발생하면 미리 연락드립니다.\r\n\r\n제주, 도서지역은 2월 25일이 마지막 발송입니다.\r\n\r\n감사합니다!', '2021-04-11 22:36:41', 0),
(4, '치즈퀸', '[배송] 2021 설날연휴 배송안내', '변함없이 치즈퀸을 이용해주셔서 감사드립니다.\r\n\r\n2021년 설날 택배발송에 대한 일정안내입니다.\r\n\r\n\r\n2월 8일(월) 오후 4시전 주문건까지 당일발송합니다. \r\n\r\n2월 8일(월) 오후 4시 이후 ~ 2월 14일(일) 주문건은\r\n\r\n2월 15일 ~ 2월 17일에 순차발송합니다. \r\n\r\n2월 9일 ~2월 14일 고객센터 휴무입니다.\r\n\r\n결품, 통관 지연건이 발생하면 미리 연락드립니다.\r\n\r\n제주, 도서지역은 2월 4일이 마지막 발송입니다.\r\n\r\n감사합니다!\r\n새해 복 많이 받으세요!', '2021-04-11 22:37:22', 0),
(5, '치즈퀸', '[배송] 코로나와 폭설로 인한 배송안내', '폭설과 코로나와 관련한 치즈퀸 배송안내\r\n\r\n현재 치즈퀸에서 나가는 \"발송\"은 정상적으로 이루어지고 있습니다.\r\n(일부 배송불가 지역은 개별연락)\r\n\r\n다만, 지역상황에 따라 \"배송\"에 하루이상 소요될 수 있습니다.\r\n필요하신 일정보다 미리 주문해주세요~\r\n\r\n\r\n냉장고보다 낮은 영하의 기온이 계속 되는 동안 배송이 하루이틀 늦어져도 제품에는 문제가 없을 것으로 생각됩니다.\r\n혹시 기온이 높은 곳에서 보관될 가능성도 고려하여 적당량의 아이스팩을 함께 넣어보냅니다.\r\n만약 제품 변질 등의 문제가 생겼다면, 환불, 재발송 등으로 해결해드리겠습니다.\r\n\r\n문의사항은 치즈퀸 1:1게시판 또는 카카오톡 치즈퀸 에 남겨주시면 안내해드리겠습니다.\r\n택배의 정확한 현재위치, 정확한 배송시각 등은 저희도 알 수 없는 경우가 많으니 양해부탁드립니다.\r\n\r\n\r\n택배기사님들께서는 정말로 최선을 다하고 계시답니다. 조금씩만 여유를 갖고 기다려주세요. :D\r\n모두 따뜻하고 안전한 겨울보내세요~!', '2021-04-11 22:38:41', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`no`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
