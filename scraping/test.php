<?php
    function ehime()
    {
        require_once("phpQuery-onefile.php");
        $html = file_get_contents("https://www.jma.go.jp/jp/yoho/342.html");
        return phpQuery::newDocument($html)->find("#forecasttablefont");
    }
?>
<!DOCTYPE html>
<head>
    <style>
        .fortemplete {
            WIDTH: 600px; TEXT-ALIGN: right
        }
        TABLE.forecast {
            BORDER-RIGHT: #aaaaaa 1px solid; BORDER-TOP: #aaaaaa 1px solid; BORDER-LEFT: #aaaaaa 1px solid; WIDTH: 600px; BORDER-BOTTOM: #aaaaaa 1px solid; BORDER-COLLAPSE: collapse
        }
        TABLE.forecast TH {
            BORDER-RIGHT: #aaaaaa 1px solid; BORDER-TOP: #aaaaaa 1px solid; BORDER-LEFT: #aaaaaa 1px solid; BORDER-BOTTOM: #aaaaaa 1px solid
        }
        TABLE.forecast TD {
            BORDER-RIGHT: #aaaaaa 1px solid; BORDER-TOP: #aaaaaa 1px solid; BORDER-LEFT: #aaaaaa 1px solid; BORDER-BOTTOM: #aaaaaa 1px solid
        }
        TABLE.forecast TH.th-area {
            TEXT-ALIGN: left
        }
        TABLE.forecast TH.th-rain {
            
        }
        TABLE.forecast TH.th-temp {
            
        }
        TABLE.forecast TH.weather {
            VERTICAL-ALIGN: middle; WIDTH: 100px; TEXT-ALIGN: center
        }
        TABLE.forecast TD.info {
            PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; VERTICAL-ALIGN: top; WIDTH: 210px; PADDING-TOP: 5px; TEXT-ALIGN: left
        }
        TABLE.forecast TD.rain {
            VERTICAL-ALIGN: middle; WIDTH: 90px
        }
        TABLE.forecast TD.temp {
            VERTICAL-ALIGN: top; WIDTH: 210px; TEXT-ALIGN: center
        }
        DIV.font-size-clear {
            FONT-SIZE: medium
        }
        TABLE.forecast TABLE.rain {
            BORDER-RIGHT: #aaaaaa 0px solid; BORDER-TOP: #aaaaaa 0px solid; BORDER-LEFT: #aaaaaa 0px solid; WIDTH: 100%; BORDER-BOTTOM: #aaaaaa 0px solid
        }
        TABLE.forecast TABLE.rain TD {
            BORDER-RIGHT: #aaaaaa 0px solid; BORDER-TOP: #aaaaaa 0px solid; FONT-SIZE: 90%; BORDER-LEFT: #aaaaaa 0px solid; BORDER-BOTTOM: #aaaaaa 0px solid
        }
        TABLE.forecast TABLE.rain TD.right {
            TEXT-ALIGN: right
        }
        TABLE.forecast TABLE.rain TD.left {
            TEXT-ALIGN: left
        }
        TABLE.forecast TABLE.temp {
            BORDER-RIGHT: #aaaaaa 0px solid; BORDER-TOP: #aaaaaa 0px solid; BORDER-LEFT: #aaaaaa 0px solid; WIDTH: 100%; BORDER-BOTTOM: #aaaaaa 0px solid
        }
        TABLE.forecast TABLE.temp TH {
            BORDER-RIGHT: #aaaaaa 0px solid; BORDER-TOP: #aaaaaa 0px solid; FONT-SIZE: 80%; BORDER-LEFT: #aaaaaa 0px solid; BORDER-BOTTOM: #aaaaaa 0px solid
        }
        TABLE.forecast TABLE.temp TD {
            BORDER-RIGHT: #aaaaaa 0px solid; BORDER-TOP: #aaaaaa 0px solid; FONT-SIZE: 90%; BORDER-LEFT: #aaaaaa 0px solid; BORDER-BOTTOM: #aaaaaa 0px solid
        }
        TABLE.forecast TABLE.temp TD.city {
            WIDTH: 40%; TEXT-ALIGN: left
        }
        TABLE.forecast TABLE.temp TD.min {
            WIDTH: 30%; COLOR: blue; TEXT-ALIGN: center
        }
        TABLE.forecast TABLE.temp TD.max {
            WIDTH: 30%; COLOR: red; TEXT-ALIGN: center
        }
    </style>
</head>
<body>
<?= ehime(); ?>
</body>
</html>