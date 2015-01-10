<?php if(!class_exists('raintpl')){exit;}?><form method="POST">
    <fieldset>
        <div><?php echo $erreurs;?></div>
        <input type="hidden" name="macadress" value="<?php echo $macadress;?>">
        <input type="text" name="pseudo">
        <input type="submit" value="Ceci est mon nom">
    </fieldset>
</form>
 