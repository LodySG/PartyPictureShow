<?php if(!class_exists('raintpl')){exit;}?><div class="row">
    <div class="col-xs-6" id="titre_connect">Les connectes</div>
</div>

<?php $counter1=-1; if( isset($usersonline) && is_array($usersonline) && sizeof($usersonline) ) foreach( $usersonline as $key1 => $value1 ){ $counter1++; ?>

    <div class="row">
        <a class="col-xs-6" href="?page=photo&action=sesphotos&otheruser=<?php echo $value1->id;?>" alt="<?php echo $value1->pseudo;?>"><?php echo $value1->pseudo;?></a>
    </div>
<?php } ?>

