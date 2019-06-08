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
$mail_form = [
    ['mail_template_subject', 'タイトル'],
    ['mail_template_subject', '本文'],
    ['追加添付1'],
    ['追加添付2'],
    ['追加添付3']
];
$pdf_td_array = ['品名', '数量', '単価', '金額', '詳細', '月表示'];
$pdf_tableform_array = ["<textarea name='item_name'></textarea>",
                        "<input type='num' name='item_amount'>",
                        "<input type='num' name='price'>",
                        "<input type='num' name='total_price'>",
                        "<textarea name='detail'></textarea>"
                       ]; 
?>
<div class='container'>
<div class='nav_2'>
    <h2>PDF作成</h2>
</div>
<p><strong>取引先情報</strong></p>
<form method='POST' action=''>
<table border='1'>
<?php foreach($form_array as $val): ?>
<?php switch($val[0]):
    case('mail'): ?>
        <tr>
            <td>
                <?= $val[1] ?>
            </td>
            <td>
                <?= isset($_POST[$val[2]])? $_POST[$val[2]] : false; ?>
                <?= isset($_POST[$val[3]])? '(、' . $_POST[$val[3]] : false; ?>
                <?= isset($_POST[$val[4]])? '、' .$_POST[$val[4]]. ')' : (isset($_POST[$val[3]]) ? ')' : false) ; ?>
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
</form>
<?php ?>
<form method='POST' action=''>
<h3>メール文</h3>
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
</form>

<h4>PDF作成時</h4>
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
    <tr>
        <td>
            <input type='hidden' name='pdf_id' value='<?= $i ?>'>
        </td>
        <?php foreach($pdf_tableform_array as $val) : ?>
        <td>
            <?= $val ?>
        </td>
        <?php endforeach; ?>
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
<button>PDFを作成する</button>　<button>リセット</button>
</div>
