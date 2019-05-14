<div class ="form-group">
	<!-- <label for="<?php echo $val[0]; ?>"><?php echo $val[1]; ?></label> -->
    <div id="error-<?php echo $val[0] ?>" class="error"></div>
    <input type="text" class="form-control"
        name="<?php echo $val[0]; ?>"
        id="<?php echo $val[0]; ?>"
        placeholder="<?php echo $val[1] ?>"
        maxlength="30">
</div>
<br>