# Utiliser TasteMyBeer

Vous pouvez utiliser l'application sans l'installer en local.
Pour cela aller à l'adresse [www.beer-tasting-env-production.herokuapp.com/](https://beer-tasting-env-production.herokuapp.com/).

# Installer TasteMyBeer en local

Ce document vous donne toutes les instructions pour installer TasteMyBeer avec toutes les dépendances nécessaires.

## Étapes

### 1. Installer Git

#### Utilisateur sous Linux

Voir ce [lien](http://git-scm.com/download/linux) pour avoir les différentes étapes en fonction de votre distribution Linux.

#### Utilisateur sous Windows

Télécharger la dernière version de Git à jour sur ce site : [Télécharger Git pour windows](http://git-scm.com/download/win)

### 2. Installer PHP, Apache et MySQL

#### Utilisateur sous Linux

Exécuter la commande suivante :

```
sudo apt install apache2 php libapache2-mod-php mysql-server php-mysql
```

#### Utilisateur sous Windows

Télécharger WampServer à l'adresse suivante :[Télécharger Wamp](https://www.wampserver.com/)

### 3. Créer un virtual host

#### Utilisateur sous Linux

1. Verifiez que vous travaillez sur le apache de votre serveur et utilisez tasteMyBeer comme nom de domaine partout.

2. Voir : [Créer un virtual host LAMP](http://elisabeth.pointal.org/doc/code/server/lamp/creer_des_virtualhosts).
   Remplacez bien le nom de domaine d'exemple par tastemybeer.

#### Utilisateur sous Windows

1. Ajoutez cette ligne dans votre fichier hosts (C:\Windows\System32\drivers\etc)

   ```
   127.0.0.1	tastemybeer
   ```

2. Depuis l'interface de Wamp, ouvrez le fichier httpd.conf d'Apache.
   Ajouter les lignes suivantes à la fin du fichier en prenant soin de modifier le chemin local vers votre site ainsi que le nom de domaine.

   ```
   <VirtualHost 127.0.0.1>
   DocumentRoot C:\wamp\www\tastemybeer
   ServerName monsite.dev
   </VirtualHost>
   ```

3.Rédémarrez ensuite Apache pour que les modifications soient prises en compte.

### 4. Cloner le projet

1. Déplacer vous à la racine de votre virtual host
2. Exécuter la commande suivante :

```
git clone https://gitlab.istic.univ-rennes1.fr/pdl-g4/beer-tasting-app.git
```

### 5. Créer la base de données

#### Création manuellement (Recommandé)

Importer le fichier `./database/init.sql` via PhpMyAdmin.

#### Création via le terminal

1. Ouvrez un terminal
2. Déplacer vous dans le dosier `./database` du projet
3. Executer la commande suivante:

##### Utilisateur sous Linux

```

mysql -u user -p < init.sql

```

##### Utilisateur sous Windows

```

sqlcmd -U myLogin -P myPassword -S MyServerName -d MyDatabaseName -i init.sql

```

### 6. Modifier les dernières lignes du fichier .htaccess pour pointer vers votre base de données configurée.

## Dépendences

Les librairies suivantes sont nécéssaires:

1. PhpMailer
