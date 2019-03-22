<?php $title = "Support" ; ?>
    <!DOCTYPE html>
    <html>
      <head>
        <title>Titre de la page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      </head>
      <body>
	  <div id="support">
        <h1>Contacter le webmaster</h1>
        <!-- Ceci est un commentaire HTML. Le code PHP devra remplacé cette ligne -->
        <form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
          <p>Votre nom et prénom: <input type="text" name="nom" size="30" /></p>
          <p>Votre email: <span style="color:#ff0000;">*</span>: <input type="text" name="email" size="30" /></p>
          <p>Message <span style="color:#ff0000;">*</span>:</p>
          <textarea name="message" cols="60" rows="10"></textarea>
          <!-- Ici pourra être ajouté un captcha anti-spam (plus tard) -->
          <p><input type="submit" name="submit" value="Envoyer" /></p>
        </form>
		</div>
      </body>
    </html>