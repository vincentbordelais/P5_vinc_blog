# P5_vinc_blog
OC P5 Blog

Tout le monde peut laisser un message
Seul l'admin peut créer un post
Seul un utilisateur connecté peut écrire un commentaire

Fait:
 + Posts: afficher en plus la date de mise à jour si différent de la date de création.
 + Ajouter en Bdd un champs validation dans la table comments de type ENUM Yes/No, avec comme valeur par défaut No.  
+ Si l'Admin est connecté, sur la page post, pour chaque commentaire ajouter une checkbox "Validation" (Oui/Non) et l'écrire en base.
    
 A faire:
 + Mettre en place les vérifications liées à la saisie des formulaires. Dans Connexion, si email inconnu, mdp incorrect.
+ Si un utilisateur est connecté, masquer dans la navbar "Inscription/Connexion" et afficher son username (pour l'instant c'est son email via $_SESSION['LOGGED_USER']).
+ Modifier l'ajout de commentaire pour ne plus dépendre de user_id mais de username (via session[USERNAME_LOGGED_USER] ou en chageant la requête).
+ sur la page posts, afficher un lien "Articles plus anciens" à partir du 6e post.
+ Ajouter le process d'envoi du CV.
+ Ajouter en Bdd une table contacts, créer le model et le controller.

