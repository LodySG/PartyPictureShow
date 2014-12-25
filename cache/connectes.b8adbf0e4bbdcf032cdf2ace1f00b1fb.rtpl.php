<?php if(!class_exists('raintpl')){exit;}?><div id="titre_connect">Les connectes</div>

<?php $counter1=-1; if( isset($usersonline) && is_array($usersonline) && sizeof($usersonline) ) foreach( $usersonline as $key1 => $value1 ){ $counter1++; ?>

    <a href="?page=photo&action=sesphotos&otheruser=<?php echo $value1->id;?>" alt="<?php echo $value1->pseudo;?>"><?php echo $value1->pseudo;?></a>
<?php } ?>