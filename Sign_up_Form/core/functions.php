<?php
//$array = [["name","slug"],["name","slug"]["name","slug"]];
function insert_parts($array){
	foreach($array as $key => $val){
		require("parts/form-parts.php");
	}
}
?>