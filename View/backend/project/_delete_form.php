<form method="POST" action="index.php?ent=project&tsk=delete">
    <input type="hidden" name="id" value="<?= $project->getId();?>"/>
    <button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
</form>