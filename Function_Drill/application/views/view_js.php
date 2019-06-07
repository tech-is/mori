<!DOCTYPE html>
<html>
    <label>名前をアラート表示</label>
    <p><input type="text" id="name" placeholder="example) 田中太郎"></p>
    <p><button onclick="name_alert()">Click</button></p>
    <label>urlリダイレクト</label>
    <p><input type="text" id="url" placeholder="example) https://example.com"></p>
    <p><button onclick="redirect()">Click</button></p>
    <label>セレクトボックスをアラート出力</label>
    <p><select id="select">
        <option value="A">A型</option>
        <option value="B">B型</option>
        <option value="O">O型</option>
        <option value="AB">AB型</option>
        </select>
    </p>
    <p><button onclick="select()">Click</button></p>
    <p><label>小窓</label></p>
    <p><button onclick="windowopen()">Click</button></p>
    <p>任意の場所に文字表示</p>
    <p><a href="javascript:change_text()">おいっすー！</a></p>
    <p><div id="text"></p>
<script>
    function name_alert()
    {
        var target = document.getElementById("name").value;
        alert(target);
    }

    function redirect()
    {
        var target = document.getElementById("url").value;
        open(target, "_blank");
    }

    function select()
    {
        var target = document.getElementById("select").value;
        alert(target + "型を選びましたね");
    }

    function windowopen()
    {
        window.open('http://localhost/function_drill/', 'mywindow1', 'width=400, height=300, menubar=no, toolbar=no, scrollbars=yes')
    }

    function change_text()
    {
        document.getElementById("text").innerHTML = "ヤバいですね！";
    }
</script>
</html>