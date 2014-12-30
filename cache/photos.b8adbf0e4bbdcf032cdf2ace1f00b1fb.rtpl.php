<?php if(!class_exists('raintpl')){exit;}?><div class="row">
<?php $counter1=-1; if( isset($photos) && is_array($photos) && sizeof($photos) ) foreach( $photos as $key1 => $value1 ){ $counter1++; ?>

    <img class="col-xs-12" src="<?php echo $value1->path;?>" alt="<?php echo $value1->id;?>"/>
<?php } ?>

</div>