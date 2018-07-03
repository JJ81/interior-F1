<?php

require_once ('../../autoload.php');
require_once('../../commons/config.php');
require_once('../../commons/utils.php');
require_once('../../commons/session.php');
define('PAGE','CUSTOMER');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo(ROOT.'index.php', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query='select * from `cms_customer_req` order by `registered_dt` desc;';
$rows = $db->query($query);
$db=null;

?>


<?php require_once ('../inc/head.php');?>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <?php require_once ('../inc/header.php');?>
    <?php require_once ('../inc/leftmenu.php');?>

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">문의관리</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">문의관리</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->

        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title clearfix">
                            <h4>문의관리</h4>
                        </div>
                        <div class="card-body">
                            <!-- table lib -->
                            <div class="table-responsive">
                                <table id="customer-list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>TARGET</th>
                                        <th>TEL</th>
                                        <th>Address</th>
                                        <th>Comment</th>
                                        <th>Registered_dt</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#ID</th>
                                        <th>TARGET</th>
                                        <th>TEL</th>
                                        <th>Address</th>
                                        <th>Comment</th>
                                        <th>Registered_dt</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php for($i=0,$size=count($rows);$i<$size;$i++){ ?>
                                    <tr>
                                        <td><?php echo $rows[$i]['id']; ?></td>
                                        <td>
                                            <?php
                                                if($rows[$i]['space'] == 'H'){
                                                    echo '주거';
                                                }else{
                                                    echo '상업';
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $rows[$i]['tel']; ?></td>
                                        <td>
                                            <?php
                                                if($rows[$i]['addr'] == ''){
                                                    echo '-';
                                                }else{
                                                    echo $rows[$i]['addr'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($rows[$i]['comment'] == ''){
                                                    echo '-';
                                                }else{
                                                    echo $rows[$i]['comment'];
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $rows[$i]['registered_dt']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- // table -->
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
            </div>
            <!-- /# row -->
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->

        <?php require_once ('../inc/footer.php'); ?>
        <?php require_once ('../modal/modal_modify_pass.php'); ?>
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->

<?php require_once ('../inc/foot.php'); ?>

</body>
</html>