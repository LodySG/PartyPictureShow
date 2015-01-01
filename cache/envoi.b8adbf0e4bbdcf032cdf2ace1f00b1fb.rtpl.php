<?php if(!class_exists('raintpl')){exit;}?><form method="POST" enctype="multipart/form-data">
    <fieldset>
        <div><?php echo $erreurs;?></div>
        <input type="file" name="photo" accept="image/*">
        <input type="textarea" name="comments">
        <input type="submit" value="Tiens !!!">
    </fieldset>
</form>