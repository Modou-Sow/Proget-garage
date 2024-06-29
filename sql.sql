+----------------------+
| Tables_in_ndongofall |
+----------------------+
| chauffeurs           |
| factures             |
| factures_lignes      |
| historique           |
| locations            |
| stock                |
| utilisateurs         |
| vhch                 |
+----------------------+


mysql> desc chauffeurs;
+----------+-------------+------+-----+---------+-------+
| Field    | Type        | Null | Key | Default | Extra |
+----------+-------------+------+-----+---------+-------+
| nom      | varchar(20) | YES  |     | NULL    |       |
| prenom   | varchar(20) | YES  |     | NULL    |       |
| contact  | varchar(20) | YES  |     | NULL    |       |
| addresse | varchar(20) | YES  |     | NULL    |       |
+----------+-------------+------+-----+---------+-------+
4 rows in set (0.01 sec)

mysql> desc factures;
+-----------------+-------------+------+-----+---------+----------------+
| Field           | Type        | Null | Key | Default | Extra          |
+-----------------+-------------+------+-----+---------+----------------+
| facture_id      | int         | NO   | PRI | NULL    | auto_increment |
| panne           | varchar(25) | NO   | UNI | NULL    |                |
| date_facture    | date        | NO   |     | NULL    |                |
| immatriculation | varchar(22) | YES  |     | NULL    |                |
| nom_chauffeur   | varchar(20) | YES  | MUL | NULL    |                |
+-----------------+-------------+------+-----+---------+----------------+
ALTER TABLE facturecompta
ADD COLUMN  statut VARCHAR(50) NOT NULL DEFAULT 'en attente';


mysql> desc factures_lignes;
+---------------+-------------+------+-----+---------+----------------+
| Field         | Type        | Null | Key | Default | Extra          |
+---------------+-------------+------+-----+---------+----------------+
| ligne_id      | int         | NO   | PRI | NULL    | auto_increment |
| facture_id    | int         | NO   | MUL | NULL    |                |
| produit       | varchar(25) | YES  |     | NULL    |                |
| quantite      | int         | NO   |     | NULL    |                |
| prix_unitaire | varchar(22) | YES  |     | NULL    |                |
| total_ligne   | varchar(22) | YES  |     | NULL    |                |
+---------------+-------------+------+-----+---------+----------------+
6 rows in set (0.00 sec)

mysql> desc historique;
+-----------------+-------------+------+-----+---------+----------------+
| Field           | Type        | Null | Key | Default | Extra          |
+-----------------+-------------+------+-----+---------+----------------+
| id              | int         | NO   | PRI | NULL    | auto_increment |
| date_facture    | varchar(20) | YES  |     | NULL    |                |
| nom_chauffeur   | varchar(20) | YES  |     | NULL    |                |
| immatriculation | varchar(20) | YES  |     | NULL    |                |
| panne           | varchar(20) | YES  |     | NULL    |                |
| produit         | varchar(20) | YES  |     | NULL    |                |
| total_ligne     | varchar(20) | YES  |     | NULL    |                |
+-----------------+-------------+------+-----+---------+----------------+
7 rows in set (0.00 sec)

mysql> desc locations;
+----------+-------------+------+-----+---------+-------+
| Field    | Type        | Null | Key | Default | Extra |
+----------+-------------+------+-----+---------+-------+
| username | varchar(20) | YES  |     | NULL    |       |
| addresse | varchar(20) | YES  |     | NULL    |       |
| numero   | varchar(20) | YES  |     | NULL    |       |
| prix     | varchar(20) | YES  |     | NULL    |       |
+----------+-------------+------+-----+---------+-------+
4 rows in set (0.00 sec)

mysql> desc stock;
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id       | int         | NO   | PRI | NULL    | auto_increment |
| produit  | varchar(20) | YES  |     | NULL    |                |
| quantite | varchar(20) | YES  |     | NULL    |                |
| prix     | varchar(20) | YES  |     | NULL    |                |
| modele   | varchar(20) | YES  |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
5 rows in set (0.00 sec)

mysql> desc utilisateurs;
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id       | int         | NO   | PRI | NULL    | auto_increment |
| username | varchar(20) | YES  |     | NULL    |                |
| password | varchar(20) | YES  |     | NULL    |                |
| email    | varchar(20) | YES  |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
4 rows in set (0.00 sec)

mysql> desc vhch; === Nb:Vehicule et chauffeurs
+-----------------+-------------+------+-----+---------+----------------+
| Field           | Type        | Null | Key | Default | Extra          |
+-----------------+-------------+------+-----+---------+----------------+
| id              | int         | NO   | PRI | NULL    | auto_increment |
| nom             | varchar(30) | YES  |     | NULL    |                |
| prenom          | varchar(30) | YES  |     | NULL    |                |
| adresse         | varchar(30) | YES  |     | NULL    |                |
| telephone       | varchar(30) | YES  |     | NULL    |                |
| email           | varchar(30) | YES  |     | NULL    |                |
| immatriculation | varchar(30) | YES  |     | NULL    |                |
| marque_voiture  | varchar(30) | YES  |     | NULL    |                |
+-----------------+-------------+------+-----+---------+----------------+
8 rows in set (0.00 sec)

MariaDB [ndongofall]> CREATE TABLE facturecompta ( id INT AUTO_INCREMENT PRIMARY KEY, date_facture DATE NOT NULL, total_ligne DECIMAL(10,2) NOT NULL,nom_chauffeur VARCHAR(100) NOT NULL, immatriculation VARCHAR(20) NOT NULL, produit VARCHAR(100) NOT NULL,  statut VARCHAR(50) NOT NULL DEFAULT 'en attente');