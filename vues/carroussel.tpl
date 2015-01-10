<div class="row" id='carroussel'>
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            {loop="allphotos"}
                {if="$key==0"}<div class="item active">{else}<div class="item">{/if}<img class="col-xs-12" src="{$value->path}" alt="{$value->id}"/></div>
            {/loop}
        </div>
    </div>
</div>