<!DOCTYPE html>
<html>
<?= form_open_multipart('welcome/do_upload'); ?>
<input type="file" name="userfile" accept='image/*'>
<input type="submit" value="upload">
</form>
	<?php	
        if(isset($file_ext)){
            echo $file_ext;
        }
	?>
</html>