<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * メールアドレスのデバック用オブジェクト
 * 使用する際はmail/indexで
 * @param	$this->email->from($string , $string) 第一引数:使用するメールアドレス
 * @param	$this->email->to($string) 送り先のメールアドレス
 * @param	$this->email->subject
 * @param	$this->email->message
 *
 * @return
 */

class Mail extends CI_Controller
{
    public function index()
    {
        //Emailライブラリを読み込む。メールタイプをHTMLに設定
        $this->load->library("email");
        //送信元の情報
        $this->email->from("info@niji-desk.work", "送信元");
        $this->email->set_newline("\r\n");
        //送信先の設定
        $this->email->to("cipher_galm01@outlook.jp");
        $this->email->subject("This is an email test");
        $this->email->message("it it working:)");
        if ($this->email->send()) {
            echo "Your email was sent.";
        } else {
            show_error($this->email->print_debugger());	//エラー表示用のデバッガーを起動する
        }
    }
}
