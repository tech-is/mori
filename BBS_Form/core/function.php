<?php
function CSS(){
    require_once("./parts/CSS.php");
}

function Create(){
    try{
        $pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "root", "");
        $sql = 'INSERT INTO BBS (NAME, TEXT) VALUES(:name, :text)';
        $stmt = $pdo->prepare($sql);
        $stmt -> bindValue('name', $_POST['name']);
        $stmt -> bindValue('text', $_POST['text']);
        $stmt -> execute();
    }catch(PDOException $e){
    //エラー出力
        echo "<script>alert('書き込みに失敗しました');</script>";
     }
}

function Load_BBS(){
    try{
        $pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "root", "");
        $sql = 'SELECT * FROM BBS';
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
        require_once('./parts/bbs_table_parts.php');
    }catch(PDOException $e){
    //エラー出力
        echo "接続に失敗しました";
    }
}

class browser{
  
  function get_info(){
    
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $browser_name = $browser_version = $webkit_version = $platform = NULL;
    $is_webkit = false;
    
    //Browser
    if(preg_match('/Edge/i', $ua)){
      
      $browser_name = 'Edge';
      
      if(preg_match('/Edge\/([0-9.]*/', $ua, $match)){
      
        $browser_version = $match[1]; 
      }
      
    }elseif(preg_match('/(MSIE|Trident)/i', $ua)){
      
      $browser_name = 'IE';
      
      if(preg_match('/MSIE\s([0-9.]*)/', $ua, $match)){
        
        $browser_version = $match[1];
      
      }elseif(preg_match('/Trident\/7/', $ua, $match)){
        
        $browser_version = 11;
      }
    
    }elseif(preg_match('/Presto|OPR|OPiOS/i', $ua)){
      
      $browser_name = 'Opera';
      
      if(preg_match('/(Opera|OPR|OPiOS)\/([0-9.]*)/', $ua, $match)) $browser_version = $match[2];
      
    }elseif(preg_match('/Firefox/i', $ua)){
      
      $browser_name = 'Firefox';
      
      if(preg_match('/Firefox\/([0-9.]*)/', $ua, $match)) $browser_version = $match[1];
      
    }elseif(preg_match('/Chrome|CriOS/i', $ua)){
      
      $browser_name = 'Chrome';
      
      if(preg_match('/(Chrome|CriOS)\/([0-9.]*)/', $ua, $match)) $browser_version = $match[2];
      
    }elseif(preg_match('/Safari/i', $ua)){
      
      $browser_name = 'Safari';
      
      if(preg_match('/Version\/([0-9.]*)/', $ua, $match)) $browser_version = $match[1];
    }
    
    //Webkit
    if(preg_match('/AppleWebkit/i', $ua)){
      
      $is_webkit = true;
      
      if(preg_match('/AppleWebKit\/([0-9.]*)/', $ua, $match)) $webkit_version = $match[1];
    }
    
    //Platform
    if(preg_match('/ipod/i', $ua)){
      
      $platform = 'iPod';
      
    }elseif(preg_match('/iphone/i', $ua)){
      
      $platform = 'iPhone';
      
    }elseif(preg_match('/ipad/i', $ua)){
      
      $platform = 'iPad';
      
    }elseif(preg_match('/android/i', $ua)){
      
      $platform = 'Android';
      
    }elseif(preg_match('/windows phone/i', $ua)){
      
      $platform = 'Windows Phone';
      
    }elseif(preg_match('/linux/i', $ua)){
      
      $platform = 'Linux';
      
    }elseif(preg_match('/macintosh|mac os/i', $ua)) {
      
      $platform = 'Mac';
      
    }elseif(preg_match('/windows/i', $ua)){
      
      $platform = 'Windows';
    }
    
    return array(
      
      'ua' => $ua,
      'browser_name' => $browser_name,
      'browser_version' => intval($browser_version),
      'is_webkit' => $is_webkit,
      'webkit_version' => intval($webkit_version),
      'platform' => $platform
    );
  }//get_info()
};
 
$browser = new browser();
$browser_info = $browser->get_info();
?>