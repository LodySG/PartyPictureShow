<div class="row">
    <div class="col-xs-6" id="titre_connect">Les connectes</div>
</div>

{loop="usersonline"}
    <div class="row">
        <a class="col-xs-6" href="?page=photo&action=sesphotos&otheruser={$value->id}" alt="{$value->pseudo}">{$value->pseudo}</a>
    </div>
{/loop}
