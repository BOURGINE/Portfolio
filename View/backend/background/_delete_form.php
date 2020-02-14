<form method="POST" action="index.php?ent=background&tsk=delete">
    <input type="hidden" name="id" value="<?= $background->getId();?>"/>
    <button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
</form>