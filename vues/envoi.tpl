<div class="row">
    <form method="POST" enctype="multipart/form-data" class="col-xs-offset-2 col-xs-8">
        <fieldset>
            <div>{$erreurs}</div>
            <label for="photo">Envoi moi une foto ...</label>
            <input type="file" id="photo" name="photo" accept="image/*" class="form-control">
            <label for="comment">Commentes la ...</label>
            <input class="form-control" type="textarea" name="comment" id="comment">
            <br>
            <input type="submit" value="Tiens !!!" class="btn btn-primary">
        </fieldset>
    </form>
</div>