<?php if(!class_exists('raintpl')){exit;}?><div class="row" id='carroussel'>
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $counter1=-1; if( isset($allphotos) && is_array($allphotos) && sizeof($allphotos) ) foreach( $allphotos as $key1 => $value1 ){ $counter1++; ?>

                <?php if( $key1==0 ){ ?><div class="item active"><?php }else{ ?><div class="item"><?php } ?><img class="col-xs-12" src="<?php echo $value1->path;?>" alt="<?php echo $value1->id;?>"/></div>
            <?php } ?>

        </div>
    </div>
</div>