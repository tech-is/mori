# プログラム概要
カレンダーをphpファイル単体だけで出力するタイプと  
ajaxでphpファイルを読み込むタイプで作りました
## ファイルツリー

- `view_calender.php`
- CSS/
    - `calender.css`

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