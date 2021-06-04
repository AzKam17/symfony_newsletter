# Instruction de mise en place

Ouvrir le fichier `.env`

Editer la ligne _`DATABASE_URL`_ avec les informations de sa base de données

Editer la ligne _`MAILER_DSN`_ avec les infos du serveur SMTP

Créer sa base de données et exécuter les commandes suivantes : 

`php bin/console m:m --no-interaction`

`php bin/console d:m:m --no-interaction`

`php bin/console d:f:l --no-interaction`

`php bin/console messenger:consume -vv`

**Le service est prêt.**

Les templates se trouvent dans le dossier templates

Pour ajouter un nouveau template éditer le fichier **_`src/DataFixtures/MailTemplates.php`_**

et exécuter la commande `php bin/console d:f:l --no-interaction`.

L'exécution de cette commande vide la base de données, donc faire une sauvegarde avant l'exécution.
