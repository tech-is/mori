<?php
include('parts/header_parts.php'); 
$form_array =[
    ['name', '取引先名'],
    ['mail_addr_1', 'メールアドレス1'], 
    ['mail_addr_2', 'メールアドレス2'], 
    ['mail_addr_3', 'メールアドレス3'],
    ['tel', '電話番号'],
    ['manager', '担当者名'],
    ['hurikomi_name', '振込人名義']
];
$pdf_td_array = ['品名', '数量', '単価', '金額', '詳細', '月表示'];
?>
<div class='container'>
<div class='nav_2'>
    <h2>取引先編集</h2>
</div>
<p><strong>基本情報</strong></p>
<form method='POST' action=''>
<table border='1'>
<?php foreach($form_array as $val): ?>
    <tr>
        <td>
            <?= $val[1] ?>
        </td>
        <td>
            <input type='text' name='<?= $val[0] ?>'>
        </td>
    </tr>
<?php endforeach; ?>
<tr>
    <td>
        一括送信対象フラグ
    </td>
    <td>
        <input type='radio' name='auto_send'>対象
        <input type='radio' name='auto_send'>非対称
    </td>
</tr>
<tr>
    <td>
        状態フラグ
    </td>
    <td>
        <input type='radio' name='state'>取引中
        <input type='radio' name='state'>停止中
        <input type='radio' name='state'>削除
    </td>
</tr>
</table>
<?php ?>
<h3>メールテンプレート</h3>
<table border='1'>
<tr>
    <td>
        <label for ='mail_template_subject'>タイトル</label>
    </td>
    <td>
        <input type='text' name='mail_template_subject'>
    </td>
</tr>
<tr>
    <td>
        <label for ='mail_template_subject'>本文</label>
    </td>
    <td>
        <textarea name='mail_template_subject'></textarea>
    </td>
</tr>
</table>


<h4>PDF作成時の初期テンプレート、品名設定</h4>
<?php for($a=1; $a<=5; $a++): ?>
    <table border='1'>
    <tr>
        <td>
            ◆ PDF<?=$a?>
        </td>
        <td>
            <input type='hidden' name='pdf_id' value='$a'>
            <input type='text' name='pdf_name'>
        </td>
    </tr>
    <tr>
        <?php foreach($pdf_td_array as $val): ?>
            <td><?= $val?></td>
        <?php endforeach; ?>
    </tr>
    <?php for($i=1; $i<=7; $i++): ?>
    <input type='hidden' name='pdf_id' value='<?= $i ?>'>
    <tr>
        <td>
            <textarea name='item_name'></textarea>
        </td>
        <td>
            <input type='num' name='item_amount'>
        </td>
        <td>
            <input type='num' name='price'>
        </td>
        <td>
            <input type='num' name='total_price'>
        <td>
            <textarea name='detail'></textarea>
        </td>
        <td>
            <input type='radio' name='show_month'>非表示
            <input type='radio' name='show_month'>当月
            <input type='radio' name='show_month'>次月
        </td>
    </tr>
    <?php endfor; ?>
    <br>
    </table>
<?php endfor; ?>
<button>更新する</button>　<button>リセット</button>
</form>
</div>
