# プログラム概要
カレンダーをphpファイル単体だけで出力するタイプと  
ajaxでphpファイルを読み込むタイプで作りました
## ファイルツリー

- `index_api.html`
- `index_calender.php`
- CSS/
    - `calender.css`
- api/
    - `calender_api.php`

# callener_api.php 取り扱い
```
//カレンダー読み込み
$.ajax({
    url: "./api/calender_api.php",
})

//カレンダー月送り実装
$.ajax({
    url: "./api/calender_api.php",
    type: "get",
    data: {
    "month": month
    }
}
```
# テーブル概要
先月と来月の日付に  
```
class="not_current"  
```
今日の日付に
```  
class="today"  
```
を割り当てています。  
必要に応じてCSSを変更してください。