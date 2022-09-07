# P5_vinc_blog
OC P5 Blog

Tout le monde peut laisser un message
Seul l'admin peut créer un post
Seul un utilisateur connecté peut écrire un commentaire

A faire:
+ Session et terminer Inscription/Connexion
+ Modifier l'ajout de commentaire pour ne plus dépendre de user_id mais de username via session[username].
+ Si l'Admin est connecté:
    - affichage en gras du titre "Administration" et d'un bouton "Rédiger un article".
    - créer une page add_post avec son formulaire de saisie d'un nouveau post.
    - sur la page posts, pour chaque post ajouter un lien supprimer et un lien modifier qui redirige vers la page add_post en rechargeant le post à modifier dans le formulaire.
    - sur la page post, pour chaque commentaire ajouter une checkbox "Validation" (Oui/Non).
+ Ajouter en Bdd un champs validation dans la table comments de type ENUM Yes/No, avec comme valeur par défaut No.
+ Ajouter le process d'envoi du CV.
+ Ajouter en Bdd une table contacts, créer le model et le controller.
