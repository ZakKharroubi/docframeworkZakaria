<p>coucou je suis home</p>

<h3><?php echo $message ?></h3>

<h5><?php echo $messageChangeable?></h5>

<form action="index.php?controller=home&task=index" method="post">

<div class="form-group">

    <input type="text" name="messageChangeable" placeholder="Votre message">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-success">Changer</button></div>
</form>

<ul>

    <h3>I. Connexion à la base de données</h3>
    <li>Pour commencer à travailler, il faut se connecter à la base de données. Dans le dossier <strong>core,</strong> le fichier <strong>Database.php</strong> contient la méthode de connexion, qui contient les informations nécessaires à la connexion (hébergeur, nom, user, mdp...). A nous de mettre les infos de notre BDD.
    <br>
    Une fois que c'est fait, <strong>pas besoin d'instancier la classe Database à chaque requête ! </strong> Sa méthode étant statique, elle s'appelle donc dans d'autres classes. 
    </li>

<h3>II. La classe App </h3>
    <li>La classe App, <strong>qui se trouve dans le dossier core et le fichier App.php,</strong> dispose d'une méthode process, qui est appelée <strong>UNIQUEMENT</strong>  dans index.php. Cette méthode <strong>permet d'appeler un controller et une de ses tâches par le biais de la variable GET</strong> (donc ça se passe dans l'URL). </li>

<h3>III. L'autoload</h3>

    <li>L'autoload se trouve dans le fichier <strong>autoloading.php,</strong>  situé dans le dossier <strong>core.</strong>  Le but de l'autoload est d'effectuer le cablage avec la classe (donc le require_once) dès son instanciation. </li>

<h3>IV. Les redirections</h3>

    <li>Pour rediriger l'utilisateur d'une page à une autre, on a à disposition une classe Http dans le fichier <strong> Http.php (toujours dans core)</strong>. Sa méthode redirect permet d'envoyer l'utilisateur vers la page spécifiée dans le paramètre URL de cette méthode. </li>

<h3>V. L'affichage </h3>

    <li>L'affichage est géré par le fichier <strong>Rendering.php (tjrs dans core)</strong>. La classe Rendering porte une fonction render, qui fait deux choses : <br>
        1. Elle construit le chemin du template qu'on cherche à afficher, et colle ce template au template général <strong>layout.html.php</strong>. <br>
        2. Elle transmet au template qu'on cherche à afficher les données qu'on passe en argument (par le biais de compact, qui stocke les données, et d'extract, qui les redonne au template) 
    </li>
</ul>