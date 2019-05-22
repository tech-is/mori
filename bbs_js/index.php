<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            padding-top: 80px;
        }
    </style>
    <meta charset="utf-8">
    <!-- Bootstrap4.3.1 -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div id="content"></div>
        <div id="form"></div>
        <script type="text/javascript" charset="UTF-8">
            function output_th(){
                var th_name_array = ["ID","名前","本文"];
                var output = "<tr>";
                for(var i = 0;i < th_name_array.length;i++){
                    output += "<th>"+th_name_array[i]+"</th>"
                }
                return output+"</tr>";
            }
            function output_td(data){
                var output = "";
                for(var i = 0;i < data.length;i++){
                    output += "<tr>";
                    output += "<td>"+ data[i]["id"] +"</td>";
                    output += "<td>"+ data[i]["text"] +"</td>";
                    output += "<td>"+ data[i]["name"] +"</td>";
                    output += "</tr>";
                }
                return output;
            }
            $.ajax({
                url:'./db_class_api.php?count=5',
                type:'GET',
                dataType: 'json',
            })
            .done((data) => {
                $("#content").html("<table><thead>"+output_th()+"</thead><tbody>"+output_td(data["bbs"])+"</tbody></table>");
            });
            
            // $('#form_id').submit(function() {
            //     $.ajax({
            //     url:'./bbs.php?count=5',
            //     type:'POST',
            //     dataType: 'json',
            // })
            // }
             /*
            // API読み込み
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'http://localhost/bbs.php?count=5');
            xhr.responseType = 'json';
            xhr.onload = function (e) {
                var res = xhr.response;
                // table出力
                var table = $("<table>")
                var thead = $("<thead>")
                var tbody = $("<tbody>")
                table.addClass("table-striped")
                thead.append("<tr><td>ID</td><td>名前</td><td>本文</td></tr>")
                thead.append("</thead>")
                table.append(thead)
                $.each(res["bbs"], function (key, row) {
                    tbody.append("<tr><td>" + row["id"] + "</td>")
                    tbody.append("<td>" + row["name"] + "</td>")
                    tbody.append("<td>" + row["text"] + "</td></tr>")
                });
                tbody.append("</tbody>")
                table.append(tbody)
                table.append("</table>")

                // var html = "<table>";
                // res["bbs"].forEach(function (row) {
                //     html += "<tr>";
                //     html += "<td>" + row["name"] + "</td>";
                //     html += "<td>" + row["text"] + "</td>";
                //     html += "</tr>";
                // });
                // html += "</table>";

                $("#content").append(table)
                // var content = document.getElementById("content");
                // content.innerHTML = table;
            }
            xhr.send();*/
        </script>       
    </div>
</body>
</html>