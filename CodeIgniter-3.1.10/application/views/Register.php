<?php
//array["name"] = 名前
$array=array("UserID"=>"UserID", "name"=>"名前", "kana"=>"カナ", "tel"=>"電話番号");
?>
<html>
<div class="form-group">
<?php foreach($array as $key => $val): ?>
<input type=text name=<?=$key?> placeholder=<?=$value?>>
<?php endforeach; ?>
</div>

</html>
