<form method="POST" action="index.php?ent=user&tsk=delete">
    <input type="hidden" name="id" value="<?= $user->getId();?>"/>
    <button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
</form>