<?php
include('parts/header_parts.php'); 
$form_array = [
    ['name', '取引先'],
    ['manager', '担当者名'],
    ['mail', 'メールアドレス', 'mail_addr_1', 'mail_addr_2', 'mail_addr_3'],
    ['send_date', '送信日 <span style = "color: red">必須</span>'],
    ['seeds', '種別'],
    ['memo', '管理メモ']
];
isset($_POST['mail_template_subject'])? $mail_subject = $_POST['mail_template_subject']: $mail_subject = "";
isset($_POST['mail_template_body'])? $mail_body = $_POST['mail_template_body']: $mail_body = "";
$pdf_td_array = ['品名', '数量', '単価', '金額', '詳細', '月表示'];
?>
<div class='container'>
<div class='nav_2'>
    <h2>メール送信(PDF確認)</h2>
</div>
<p><strong>取引先情報</strong></p>
<form method='POST' action='send_mail.php'>
<table border='1'>
<?php foreach($form_array as $val): ?>
<?php switch($val[0]):
    case('mail'): ?>
        <tr>
            <td>
                <?= $val[1] ?>
            </td>
            <td>
                <input type='mail' name='mail' value='
                <?= isset($_POST[$val[2]])? $_POST[$val[2]] : false; ?>
                <?= isset($_POST[$val[3]])? '(、' . $_POST[$val[3]] : false; ?>
                <?= isset($_POST[$val[4]])? '、' .$_POST[$val[4]]. ')' : (isset($_POST[$val[3]]) ? ')' : false) ; ?>'>
            </td>
        </tr>
    <?php break; ?>
    <?php case('seeds'): ?>
    <tr>
        <td>
            <?= $val[1]; ?>
        </td>
        <td>
            <input type='radio' name='<?= $val[0] ?>'>見積書
            <input type='radio' name='<?= $val[0] ?>'>請求書
        </td>
    </tr>
<?php break; ?>
<?php default: ?>
    <tr>
        <td>
            <?= $val[1]; ?>
        </td>
        <td>
            <input type='text' name='<?= $val[0] ?>' value='<?= isset($_POST[$val[0]])? $_POST[$val[0]]: false; ?>'>
        </td>
    </tr>
<?php break; ?>
<?php endswitch; ?> 
<?php endforeach; ?>
</table>

<?php ?>
<form method='POST' action=''>
<p><strong>メール文<strong></p>
<table border='1'>
<tr>
    <td>
        タイトル
    </td>
    <td>
        <input type='text' name='mail_template_subject' value='<?= $mail_subject ?>'>
    </td>
</tr>
<tr>
    <td>
        本文
    </td>
    <td>
        <textarea name='mail_template_subject'></textarea>
    </td>
</tr>
</table>

<p><strong>PDF作成時</strong></p>
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
</form>
<button type="submit">PDFを作成する</button>　<button>リセット</button>
</div>
