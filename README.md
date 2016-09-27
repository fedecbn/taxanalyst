Taxa analyst est un simple outil de visualisation des données issus de TAXREF (suivi des différentes version).

# Installer l'outil
Il vous faut un serveur web et une base de données postgresql.

1. clonez l'outil
2. créez une base de données taxanalyst
3. utilisez le fichier sql/taxref_analyst.sql pour construire la base
4. téléchargez les différentes versions de taxref et taxref change et intégrez les dans la base (https://inpn.mnhn.fr/programme/referentiel-taxonomique-taxref)
5. paramétrez le fichiers de configuration connect.inc.php à partir de connect.inc.example.php pour accéder à cette base.

# Maintenance
Il est possible d'ajouter des nouvelles version de taxref. Dans ce cas :

1. Créez les tables et insérez les données nécessaire (ex/ taxref v9)
2. Modifiez le fichier "include/lookup_cd_nom.php" en fonction