<form method="POST" action="index.php?ent=skill&tsk=delete">
    <input type="hidden" name="id" value="<?= $skill->getId();?>"/>
    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
</form>