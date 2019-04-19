<div class ="form-group">
	<label for="<?php echo $val[0]; ?>"><?php echo $val[1]; ?></label>
    <input type="text" class="form-control"
        name="<?php echo $val[0]; ?>"
        id="<?php echo $val[0]; ?>"
        value="<?php 
        if(isset($_POST[$val[0]])){
            echo $_POST[$val[0]];
        } 
        ?>">
</div>