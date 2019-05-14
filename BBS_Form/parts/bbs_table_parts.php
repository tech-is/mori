<!-- 取得したデータを表示する -->
<table class="table table-striped">
        <tr>
                <th>名前</th>
                <th>本文</th>
        </tr>
    <?php while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {      
                
    ?>
        <tr>
                <td><?= htmlspecialchars($row["NAME"], ENT_QUOTES, "UTF-8"); ?></td>
                <td><?= htmlspecialchars($row["TEXT"], ENT_QUOTES, "UTF-8"); ?></td>
        </tr>
    <?php } ?>
</table>