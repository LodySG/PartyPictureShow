<div id="titre_connect">Les connectes</div>

{loop="usersonline"}
    <a href="?page=photo&action=sesphotos&otheruser={$value->id}" alt="{$value->pseudo}">{$value->pseudo}</a>
{/loop}