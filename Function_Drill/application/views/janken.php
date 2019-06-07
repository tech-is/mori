<?php
    if(isset($_GET['hand'])){
		$user_hand = $_GET['hand'];
		$win = "あなたの勝利です！ヤバいですね！";
		$lose = "あなたの負けです！ヤバいですね！";
		$draw = "あいこです！ヤバいですね！";
		$hands = ["グー","チョキ","パー"];
		$key = array_rand($hands);
		$rand_hand = $hands[$key];
        echo "CPUの手: ".$rand_hand."<br>";
		if($user_hand === $rand_hand){
            echo $draw."<br>";
        }else{
            switch($user_hand)
                {
                    case "グー":
                        if($rand_hand === "チョキ"){
                            echo $win."<br>";	
                        }else{
                            echo $lose."<br>";
                        }
                    break;
                    case "チョキ":
                        if($rand_hand === "パー"){
                            echo $win."<br>";	
                        }else{
                            echo $lose."<br>";
                        }
                    break;
                    case "パー":
                        if($rand_hand === "グー"){
                            echo $win."<br>";	
                        }else{
                            echo $lose."<br>";
                        }
                    break;
                }
        }
    // echo anchor("/", "もう一回ですね！");
    }
?>
<!DOCTYPE html>
<html>
<h1>じゃんけん</h1>
<form action="" method="GET">
<input type="radio" name="hand" value="グー" checked>グー
<input type="radio" name="hand" value="チョキ">チョキ
<input type="radio" name="hand" value="パー">パー
<p><input type="submit" value="デュエル！"></p>
</html>

