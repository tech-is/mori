<div class ="form-group">
	<label for="<?php echo $key; ?>"><?php echo $val; ?></label>
    <input type="text" class="form-control"
        name="<?php echo $key; ?>"
        id="<?php echo $key; ?>"
        value="<?php 
        if(isset($_POST[$key])){
            echo $_POST[$key];} 
        ?>">
</div>