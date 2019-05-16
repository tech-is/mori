<?php
    require_once("./core/core.php");
    $browser = new browser();
    $browser_info = $browser->get_info();
    // print_r($browser_info);
    if(isset($_POST['submit'])){
        Create();
        header ('Location: index.php');
    exit;
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>一言掲示板</title>
    <?php CSS(); ?>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>一言掲示板</h1>
    <br>
    <?php
    foreach($browser_info as $key => $value ){
        echo $key.":".$value."<br>";
    }
    ?>
    <script type="text/javascript"> 
    function Check(form){
        var fd1 = form.name.value.trim();
        var fd2 = form.text.value.trim();
        if(fd1 == "" || fd2 == ""){
            document.getElementById("error").innerHTML = "名前と本文を入力してください";
            return false;
        }
        return true;
    }
    </script>
    <div id="error" class="error"></div>
    <form action="" method="post" onSubmit="return Check(this)">
        <p><label for="name" class="control-label">名前</label>
        <input type="text" class="form-control" name="name" maxlength="30" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];} ?>"></p> 
        <p><label for="text" class="control-label">本文</label>
        <textarea name="text"
                  class="form-control"
                  maxlength="100"
                  ><?php if(isset($_POST['text'])){
                            echo $_POST['text'];}
                  ?></textarea></p>
        <input type="submit" class="btn btn-primary" name="submit" value="書き込み">
    </form>
    <br>
    <h2><i class="fa fa-users" aria-hidden="true"></i>書き込みログ</h2>
    <br>
    <?php Load_BBS(); ?>
    </div> <!-- <div class="container"> -->
</body>
</html>