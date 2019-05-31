<!DOCTYPE html>
<html>
    <input type="text" id="name">
    <button onclick="name()">Click</button>
    <input type="text" id="url">
    <button onclick="url()">Click</button>

<script>
    function name()
    {
        var target = document.getElementById("name").value;
        alert(target);
    }

    function redirect()
    {
        var target = document.getElementById("url").value;
        location.href = target;
    }

    // function
</script>
</html>