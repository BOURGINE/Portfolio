<form method="POST" action="index.php?ent=post&tsk=delete">
    <input type="hidden" name="id" value="<?= $post->getId();?>"/>
    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
</form>