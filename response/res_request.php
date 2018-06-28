<?php

require_once ('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');


if(empty($_POST['phone'])){
    AlertMsgAndRedirectTo('./index.php', '전화번호가 누락되었습니다.');
    exit;
}

$phone=getDataByPost('phone');
$space=getDataByPost('space');
$addr=getDataByPost('addr');
$comment=getDataByPost('comment');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$insert_query =
    "insert into `cms_customer_req` (`tel`,`addr`,`comment`,`space`) values (:phone, :addr, :comment, :space);";
$value = array(
    ':phone'=>$phone,
    ':addr'=>$addr,
    ':comment'=>$comment,
    ':space'=>$space
);
$insertId = $db->insert($insert_query, $value);
$db=null;

AlertMsgAndRedirectTo(ROOT . 'index.php', '무료견적문의가 접수되었습니다.');

?>