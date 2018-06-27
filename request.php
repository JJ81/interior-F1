<!DOCTYPE html>
<html>
<head>
    <?php require_once ('./inc/head.php');?>
    <title>인테리어 F1, 무료 견적 문의하기</title>
</head>

<body>

    <?php require_once ('./inc/header.php');?>

    <hr />

    <div id="contents" style="margin-top: 50px;">
        <h2 class="page-header">무료견적 의뢰하기</h2>
        <div class="request-area">
            <form action="/response/res_request.php" method="post">
                <div class="form-group">
                    <input type="radio" name="space" id="commercial" value="C" checked />
                    <label for="commercial">상업공간</label>
                    &nbsp;&nbsp;
                    <input type="radio" name="space" id="home" value="H" />
                    <label for="home">주거공간</label>
                </div>
                <div class="form-group">
                    <input type="text" name="addr" class="form-control" placeholder="공사지역 간략주소 (OO시 OO동까지)" required />
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="전화번호" required />
                </div>
                <div class="form-group">
                    <textarea name="comment" class="form-control" cols="30" rows="10" placeholder="기타 요청 사항"></textarea>
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary">신청하기</button>
                </div>
            </form>
        </div>
    </div>

    <hr />

    <?php require_once ('./inc/footer.php');?>
    <?php require_once ('./inc/tail.php');?>

</body>
</html>