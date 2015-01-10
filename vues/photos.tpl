
    <div id="erreur">{$erreur}</div>
    {loop="photos"}
    <div class="row">    
        <img class="col-xs-offset-1 col-xs-10 img-responsive" src="{$value->path}" alt="{$value->id}"/>
    </div>
    {/loop}