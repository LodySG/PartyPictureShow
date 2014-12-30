<div class="row" id='carroussel'>
    {loop="allphotos"}
        <img class="col-xs-12" src="{$value->path}" alt="{$value->id}"/>
    {/loop}
</div>