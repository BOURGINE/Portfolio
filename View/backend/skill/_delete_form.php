<form method="POST" action="index.php?ent=skill&tsk=delete">
    <input type="hidden" name="id" value="<?= $skill->getId();?>"/>
    <button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
</form>