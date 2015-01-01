<div class="row">
    <div id="erreur">{$erreur}</div>
    {loop="photos"}
        <img class="col-xs-12" src="{$value->path}" alt="{$value->id}"/>
    {/loop}
</div>