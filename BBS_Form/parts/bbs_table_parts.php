<!-- 取得したデータを表示する -->
<table class="table table-striped">
    <tr>
        <th>名前</th>
        <th>本文</th>
        <th>変更ボタン</th>
        <th>削除ボタン</th>
    </tr>
    <?php
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {              
    ?>
    <tr>
        <td><?= htmlspecialchars($row["NAME"], ENT_QUOTES, "UTF-8"); ?></td>
        <td><?= htmlspecialchars($row["TEXT"], ENT_QUOTES, "UTF-8"); ?></td>
        <td><button type ="submit" name="change" value="$row['ID']">変更</button></td>
        <td><button type ="submit" name="delete" value="$row['ID']">削除</button></td>
    </tr>
    <?php 
        }
    ?>
</table>