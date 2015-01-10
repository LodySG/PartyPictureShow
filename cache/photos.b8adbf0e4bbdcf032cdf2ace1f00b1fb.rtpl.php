<?php if(!class_exists('raintpl')){exit;}?>

    <div id="erreur"><?php echo $erreur;?></div>
    <?php $counter1=-1; if( isset($photos) && is_array($photos) && sizeof($photos) ) foreach( $photos as $key1 => $value1 ){ $counter1++; ?>

    <div class="row">    
        <img class="col-xs-offset-1 col-xs-10 img-responsive" src="<?php echo $value1->path;?>" alt="<?php echo $value1->id;?>"/>
    </div>
    <?php } ?>