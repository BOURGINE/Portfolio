<form id="form_contact" method="POST" action="index.php?tsk=contact" class="bg-light p-4 p-md-5 contact-form" onsubmit="return verifForm(this)">
    <input type="hidden" id="recaptchaResponse" name="recaptcha-response">
    <div class="form-group">
        <input type="text" id="identity" name="identity" class="form-control" placeholder="Votre identité"/>
    </div>
    <div class="form-group">
        <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" />
    </div>
    <div class="form-group">
        <input type="text" name="subject" id="subject" class="form-control" placeholder="Sujet" />
    </div>
    <div class="form-group">
        <textarea name="content" id="content" cols="30" rows="7" class="form-control" placeholder="Votre Message"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Envoyer" class="btn btn-primary py-3 px-5"/>
    </div>
</form>