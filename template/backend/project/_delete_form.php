<form method="POST" action="index.php?ent=project&tsk=delete">
    <input type="hidden" name="id" value="<?= $project->getId();?>"/>
    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
</form>