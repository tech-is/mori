<?php
    require_once("./core/core.php");
    // $browser = new browser();
    // $browser_info = $browser->get_info();
    // print_r($browser_info);
    if(isset($_POST['submit'])){
        Insert_BBS();
        header ('Location: index.php');
    exit;
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>一言掲示板</title>
    <!-- CSS -->
    <style type=text/css>
        .error {
            color: red;
        }
	    .container-fluid {
            /* padding: 50px; */
            background-color: #efefef;
        }
        textarea {
            vertical-align: top;
        }
        .bbs_table {
            padding: 10px;
        }
</style>
<!-- Bootstrap4.3.1 -->
<link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
      crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h1 style="text-align: center; padding-top: 50px;">一言掲示板</h1>
        <div id="error" class="error"></div>
            <div style="display: inline-block; text-align: center">
                <h2>
                    <i class="fa fa-users" aria-hidden="true"></i>
                    書き込みログ
                </h2>
            </div>
        <div class="row">
            <div class="col-lg-6 col-ms-12">
                <form action="" method="POST">
                    <?php Load_BBS(); ?>
                </form>
            </div>
            <div class="col-lg-6 col-ms-12">
                <form action="" method="post" onSubmit="return Check(this)">
                    <p>
                        <label for="name" class="control-label">名前</label>
                        <input type="text" class="form-control" name="name" maxlength="30" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];} ?>">
                    </p> 
                    <p>
                        <label for="text" class="control-label">本文</label>
                        <textarea name="text" class="form-control" maxlength="100"><?php isset($_POST['text'])? print($_POST['text']): false; ?></textarea>
                    </p>
                    <p><input type="submit" class="btn btn-primary" name="submit" value="書き込み"></p>
                </form>
            </div>
        </div>
    </div> 
    <!-- <div class="container"> -->
    <script type="text/javascript"> 
        function Check(form) {
            var fd1 = form.name.value.trim();
            var fd2 = form.text.value.trim();
            if(fd1 == "" || fd2 == ""){
                document.getElementById("error").innerHTML = "名前と本文を入力してください";
                return false;
            }
        }
    </script>
</body>
</html>