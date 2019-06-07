<html>
<head>
<style>
    button {
        width: 50px;
        height: 50px;
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container" style="text-align: center;">
    <input type="num" id="keydam" value="" style="margin: 20px;">
    <p>
        <button class="num" value=7>7</button>
        <button class="num" value=8>8</button>
        <button class="num" value=9>9</button>
        <button class="sign" value="/">÷</button>
        <button class="ac">ac</button>
    </p>
    <p>
        <button class="num" value=4>4</button>
        <button class="num" value=5>5</button>
        <button class="num" value=6>6</button>
        <button class="sign" value="*">×</button>
        <button class="bc">bc</button>
    </p>
    <p>
        <button class="num" value=1>1</button>
        <button class="num" value=2>2</button>
        <button class="num" value=3>3</button>
        <button class="sign" value="-">-</button>
        <button class="del">del</button>
    </p>
    <p>
        <button class="sign" value=".">.</button>
        <button class="num" value="0">0</button>
        <button class="enter" value="=">=</button>
        <button class="sign" value="+">+</button>
        <button class="bc">a</button>
    </p>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    $(function () {
        $('button.ac').on('click', function () {
            $('#keydam').val("");
        })

        $('button.bc').on('click', function () {
            var bc = $('#keydam').val().slice(0, -1);
            $('#keydam').val(bc);
        })

        $('button.del').on('click', function () {
            var del = $('#keydam').val().slice(1);
            $('#keydam').val(del);
        })

        $('button.num').on('click', function () {
            var num = $(this).val();
            var screen = $('#keydam').val();
            if(screen == ""){
                $('#keydam').val(num);
            }else{
                $('#keydam').val(screen + num);
            }
        })
        $('button.sign').on('click', function () {
            var sign = $(this).val();
            var screen = $('#keydam').val();
            if($.isNumeric(screen.slice(-1)) === true) {
                $('#keydam').val(screen + sign);
            }else{
                return false;
            }
        });
        $('button.enter').on('click', function () {
            $.ajax({
                url:'http://localhost/Function_Drill/index.php/controller_keydam/keydam_result',
                type:'get',
                data:{
                    'keydam': $('#keydam').val()
                },
                success: function(data){
                    $('#keydam').val(data);
                },
            })
        })
    });
</script>

</html>