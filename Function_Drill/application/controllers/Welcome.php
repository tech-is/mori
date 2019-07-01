<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() 
	{
	parent::__construct();
	$this->load->helper('url');  // redirect
    }
	
/**
 * * * * * * * 
 * 関数ドリル *
 * * * * * * *
 */
	public function index()
	{
		$this->date_answer();
	}
/**
 * * * * * * * 
 * 繰り返し系 *
 * * * * * * *
 */
	public function loop()
	{
		echo " 4 + 5 = 9を変数で表示<br>";
		$i=4;
		$r=5;
		echo $i+$r. "<br><br>";
		//100まで出力
		echo "100まで出力<br>";
		for($i=1; $i<=100; $i++)
		{
			$i%10 == 0 ? print $i."<br>": print $i."\n" ;
		}
		
		//10まで出力
		echo "<br>10まで出力<br>";

		for($i=1; $i<=100; $i++)
		{
			if($i == 10){ 
				echo $i."<br>\n"; 
				break; 
			}	echo $i."\n";
		}

		//10だけ飛ばす
		echo "<br>10だけ飛ばす<br>";

		for($i=1; $i<=100; $i++)
		{
			$i == 10 ? print "<br>": print $i."\n" ;
		}

		//3,15,16,55だけ飛ばす
		echo "<br><br>3,15,16,55だけ飛ばす<br>";

		for($i=1; $i<=100; $i++)
		{
			switch($i)
			{	
				case $i%10 ==0:
					echo $i."<br>\n";
					break;
				case 3:
					echo "\n";
					break;
				case 15:
					echo "\n";
					break;
				case 16:
					echo "\n";
					break;
				case 55: 
					echo "\n";
					break;
				default:
					echo $i."\n";
					break;		
			}
		}

		//偶数だけ出力
		echo "<br>偶数だけ出力<br>";

		for($i=1; $i<=100; $i++)
		{
			$i%2==0 ? print $i."\n" : print "";
		}

		//九九を出力
		echo "<br><br>九九を出力<br>";

		for($i=1; $i<=9; $i++)
		{
			for($r=1; $r<=9; $r++)
			{
				$r==9 ? print $i*$r."<br>\n" : print $i*$r."\n"; 
			}
		}

		//1から100を足していき出力//
		echo "<br><br>1から100を足していくプログラムを出力<br>";

		$r = 0;
		for($i=1; $i<=100; $i++)
		{
			$r += $i;
			echo $r."\n";
		}
	}

/**
 * * * * *    
 * 文字系 *
 * * * * * 
 */
	public function strings()
	{
		//@があれば@を削除する
		echo "・@があれば@の前を表示する<br>";
		echo $string = "example@example.com<br>";
		$delete = strpos($string, "@"); 
		if($delete){
			echo substr($string, 0, $delete);
		}

		//すき家の牛丼を吉野家が乗っ取る
		echo "<br><br>・すき家の牛丼を吉野家が乗っ取る<br>";
		$shop = "すき家の牛丼";
		echo $shop."<br>";
		$new_shop = str_replace("すき家", "吉野家", $shop);
		echo $new_shop."<br><br>";

		//すき家の牛丼の文字数を出力
		$shop = "すき家の牛丼";
		echo "・".$shop."の文字数を出力<br>";
		echo $shop."<br>";
		echo "文字数:".mb_strlen($shop);
	}
/**
 * * * * *    
 * 配列系 *
 * * * * * 
 */
	public function array()
	{
	$this->benchmark->mark('code_start');
		$horse = [
			"ディープインパクト" => [
				"牝馬",
				"サンデーサイレンス",
				"ウインドインハーヘア"
			],

			"トウカイテイオー" => [
				"牡馬",
				"シンボリルドルフ",
				"トウカイナチュラル"
			],

			"スペシャルウィーク"  => [
				"牡馬",
				"サンデーサイレンス",
				"キャンペンガール"
			],

			"スーパークリーク" => [
				"牡馬",
				"ノーアテンション",
				"ナイスデイ"
			],

			"メジロマックイーン" => [
				"牝馬",
				"メジロティターン",
				"メジロオーロラ"
			],

			"ダイユウサク" => [
				"牡馬",
				"ノノアルコ",
				"クニノキヨコ"
			],

			"オグリキャップ" => [	
				"牡馬",
				"ダンシングキャップ",
				"ホワイトナルビー"
			],

			"ウオッカ" => [
				"牡馬",
				"タニノギムレット",
				"タニノシスター"
			],

			"ダイワスカーレット" => [
				"牡馬",
				"アグネスタキオン",
				"スカーレットブーケ"
			]
		];

		foreach($horse as $key => $value) {
			echo $key."<br>";
			echo $value[0]. "<br>";
			echo "父:" . $value[1]. "<br>";
			echo "母:" .$value[2]. "<br><br>";
		}
		$this->benchmark->mark('code_end');
		echo $this->benchmark->elapsed_time('code_start', 'code_end');
	}
/**
 * * * * * * * *    
 * ファイル操作 *
 * * * * * * * *
 */
	//現在のフォルダのファイル名を取得し出力
	public function file_name()
	{
		$CurrentPath = __FILE__; 
		echo pathinfo($CurrentPath, PATHINFO_BASENAME);
	}
/**
 * * * * * *     
 * 画像操作 *
 * * * * * * 
 */
	public function upload()
	{
		$this->load->helper('form');
		$this->load->view('upload');
	}

	public function do_upload()
	{
		$config['upload_path'] = './tmp/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload()) {
			echo "ヤバいですね！<br>";
			$image_data = $this->upload->data();
			$config['source_image'] = $image_data["full_path"];
			$config['maintain_ration'] = true; // リサイズされるときや、固定の値を指定したとき、もとの画像のアスペクト比を維持するかどうかを指定する
			$config['new_image'] = './tmp/thumbs';
			$config['width'] = 100;
			$config['height'] = 100;
			$this->load->library("image_lib", $config);
			$this->image_lib->resize();
			echo $this->upload->file_ext;
		} else {
			echo "アップロードできませんでしたぁ！";
			echo __FILE__."<br>";
			print_r(array('error' => $this->upload->display_errors()));
		}
	}
/**
 * * * * * * *    
 * javascript *
 * * * * * * *
 */
	public function javascript()
	{
		$this->load->view('view_js');
	}
/**
 * * * * * * *
 * じゃんけん *
 * * * * * * *
 */
	public function Janken()
	{
		$this->load->view('janken');
	}
/**
 * * * *
 * 電卓 *
 * * * *
 */
	public function keydam()
	{
		$this->load->view('keydam');
	}

	public function keydam_result()
	{
		$keydam = $this->input->get('keydam');
		echo eval ($keydam);
	}

/**
 * NGフィルター
 */

	public function text()
	{
		$text = "君の名はうんこアイヌ系森ちんこです";
		$this->ng_unko($text);
	}

	public function ng_unko($text)
	{
		$url = "csv/ngword.csv";
		$unko = file_get_contents($url);
		$unko = mb_convert_encoding($unko, 'UTF-8', 'SJIS');
		$unko = trim($unko);
		$nglist = explode("\r\n", $unko);
		array_shift($nglist);
		$clean = str_replace($nglist, "", $text);
		echo $clean; 
	}

/**
 * 日付 
 */

	public function date_answer()
	{
		$this->load->view("date_answer");
	}
}
