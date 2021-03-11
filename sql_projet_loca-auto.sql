#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE DATABASE if NOT EXISTS `projet_loca-auto` CHARACTER SET 'utf8';
USE `projet_loca-auto`;
#------------------------------------------------------------
# Table: Customer
#------------------------------------------------------------

CREATE TABLE Customer(
        `id`           Int  Auto_increment  NOT NULL ,
        `firstname`    Varchar (50) NOT NULL ,
        `lastname`     Varchar (50) NOT NULL ,
        `phone_number` Varchar (12) NOT NULL ,
        `email_cust`   Varchar (320) NOT NULL ,
        `pswd_cust`    Varchar (320) NOT NULL ,
        `birth_date`   Date NOT NULL ,
        `license`     Bool NOT NULL
	,CONSTRAINT Customer_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE Admin(
        `id`         Int  Auto_increment  NOT NULL ,
        `email_a`    Varchar (320) NOT NULL ,
        `password_a` Varchar (320) NOT NULL
	,CONSTRAINT Admin_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Parking
#------------------------------------------------------------

CREATE TABLE Parking(
        `id`      Int  Auto_increment  NOT NULL ,
        `location` Varchar (320) NOT NULL ,
        `capacity` Int NOT NULL
	,CONSTRAINT Parking_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Mark
#------------------------------------------------------------

CREATE TABLE Mark(
        `id`  Int  Auto_increment  NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT Mark_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Vehicle
#------------------------------------------------------------

CREATE TABLE Vehicle(
        `id`                  Int  Auto_increment  NOT NULL ,
        `vehicle_model`       Varchar (50) NOT NULL ,
        `vehicle_type`        Varchar (50) NOT NULL ,
        `vehicle_description` Varchar (255) NOT NULL ,
        `nb_seat`             Int NOT NULL ,
        `nb_vehicle_dispo`    Int NOT NULL ,
        `price_day`           Int NOT NULL ,
        `url_image`           Varchar (255) NOT NULL ,
        `id_Mark`             Int NOT NULL ,
        `id_Parking`          Int NOT NULL
	,CONSTRAINT Vehicle_PK PRIMARY KEY (`id`)

	,CONSTRAINT Vehicle_Mark_FK FOREIGN KEY (`id_Mark`) REFERENCES Mark(`id`)
	,CONSTRAINT Vehicle_Parking0_FK FOREIGN KEY (`id_Parking`) REFERENCES Parking(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Rent
#------------------------------------------------------------

CREATE TABLE Rent(
        `id`             Int  Auto_increment  NOT NULL ,
        `cost`           Float NOT NULL ,
        `start_date`     Date NOT NULL ,
        `end_date`       Date NOT NULL ,
        `id_start_park`  Int NOT NULL ,
        `id_finish_park` Int NOT NULL ,
        `validated`      Bool NOT NULL,
        `id_Customer`    Int NOT NULL ,
        `id_Vehicle`     Int NOT NULL
	,CONSTRAINT Rent_PK PRIMARY KEY (`id`)

	,CONSTRAINT Rent_Customer_FK FOREIGN KEY (`id_Customer`) REFERENCES Customer(`id`)
	,CONSTRAINT Rent_Vehicle0_FK FOREIGN KEY (`id_Vehicle`) REFERENCES Vehicle(`id`)
	,CONSTRAINT Rent_Vehicle_AK UNIQUE (`id_Vehicle`)
)ENGINE=InnoDB;





INSERT INTO `customer` ( `firstname` , `lastname`, `phone_number` , `email_cust` ,`pswd_cust`,`birth_date`,`license`)
VALUES  ('lee','darmon','0619345751','lee@live.fr','lee8','1999-09-24','0'),
        ('clem','bradechard','0788481834','clem@live.fr','clem8','2001-03-18','1'),
        ('Brendan','Huff','0545511907','Donec@aliquetmolestietellus.edu','3671','2020-09-21','0'),
        ('Gage','Mccall','0179763689','aliquet@vitae.ca','3257','2021-07-16','0'),
        ('Keegan','Ramos','0142703727','felis.ullamcorper.viverra@nonjusto.org','7342','2020-12-17','1'),
        ('Forrest','Ramirez','0182302308','habitant@nasceturridiculus.org','8046','2022-01-09','0'),
        ('Kieran','Winters','0864877214','sed.pede.nec@vel.net','1760','2021-10-05','1'),
        ('Aquila','Aguilar','0828273560','nisi@arcuetpede.co.uk','1881','2021-04-11','1'),
        ('Talon','Higgins','0535009665','imperdiet.nec.leo@mattisornarelectus.com','4671','2021-09-11','1'),
        ('Marsden','George','0617786294','velit.Aliquam.nisl@mollis.org','3844','2021-07-13','0'),
        ('Rafael','Mccray','0366038444','Duis@In.net','1347','2022-03-01','1'),
        ('Jermaine','Chapman','0989329979','fermentum.risus.at@vitae.edu','7017','2020-10-15','0'),
        ('Zachery','Barrett','0194060518','nostra@velmauris.co.uk','3190','2021-06-25','1');

INSERT INTO `Mark` ( `name` )
VALUES  ('Renault'), /*id 1 */
        ('Citroen'), /*id 2 */
        ('Kia'),     /*id 3 */
        ('Dacia'),   /*id 4 */
        ('Volkswagen'),  /*id 5 */
        ('Fiat'),      /*id 6 */
        ('Audi'),     /*id 7 */
        ('Peugeot'),   /*id 8 */
        ('Mercedes'),   /*id 9 */
        ('Opel'),    /*id 10 */
        ('Nissan'),  /*id 11 */
        ('BMW'),  /*id 12 */
        ('Toyota'),   /*id 13 */
        ('Ford');  /*id 14 */

INSERT INTO `Admin` (`email_a`,`password_a`)
VALUES  ('admin@live.fr','12345');

INSERT INTO `Parking` (`location`,`capacity`)
VALUES  ('Amiens','400'), 
        ('Paris','800'), 
        ('Nice','300');

INSERT INTO `Vehicle` ( `vehicle_model` , `vehicle_type`, `vehicle_description` , `nb_seat` ,`nb_vehicle_dispo`,`price_day`,`url_image`,`id_Mark`,`id_Parking`)
VALUES  ('208','Berline', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.', '5','5','69','1.jpg', '8', '1'),
        ('Twingo III','Citadine','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.', '4','5','53','2.jpg', '1', '2'),
        ('Auris','Moyenne berline','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','5','5','115', '3.jpg', '13', '3'),
        ('Sandero','Citadine','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','5','5','51', '4.jpg', '4', '1'),
        ('Jumper','Utilitaire','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','3','5','90', '5.jpg', '2', '2'),
        ('SERIE 5','Grande berline','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','5','5','110', '6.jpg', '12', '3'),
        ('Polo','Citadine','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','5','5','58', '7.jpg', '5', '1'),
        ('Picanto','Citadine','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','4','5','50', '8.jpg', '3', '2'),
        ('COMBO','Utilitaire','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','2','5','66', '9.jpg', '10', '3'),
        ('A5','Coupé','Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id ipsam doloremque quaerat fugit! Perferendis minima officiis obcaecati dignissimos unde, rem sed delectus repellendus cupiditate eum? Atque esse aperiam dolorum voluptatem.','4','5','65', '10.jpg', '7', '1'),
        ('WIND','Cabriolet','La principale particularité du Wind, c’est bien évidemment son toit rotatif. Un système mis au point par le carrossier italien Fioravanti qui se distingue surtout par sa cinématique très originale mais aussi par sa rapidité d’exécution.','2','5','24','11.jpg','1','2'),
        ('TRANSIT VI','Utilitaire','Camion 10m3 longueur, mécanique et cabine impeccable , parcours toute distance, intérieur bois, direction assistée, rétro électrique, clim manuelle, Carrosserie un peu bosselée, vehicule exclusivement non fumeur longueur 2m95','3','5','58','12.jpg','14','1'),
        ('DUCATO','Minibus',"Véhicule très spacieux et pratique avec ses 8 places. Entretenu régulièrement, la voiture est très propre. Consommation très raisonnable. Elle dispose d'un attelage si besoin.",'8','5','67','13.jpg','6','3'),
        ('SERIE 5','berline','GPS PRO, cuir chauffant, attelage électrique , xénons, boîte auto 8 vitesses avec palettes au volant, coffre Immense','5','5','110','14.jpg','12','2'),
        ('CLIO 2','Citadine','Pratique et passe partout cette petite citadine sera votre meilleure amie pour vos trajets quotidients','5','5','26','15.jpg','1','3'),
        ('5008','Monospace','Spacieux et très pratique 5 places, cette Peugeot 5008 grand confort est bourré de rangement et avale les Km en toute fiabilité et économie (5.5L/100km).','5','5','48','16.jpg','8','1'),
        ('SPRINTER','Utilitaire','Véhicule fonctionnel et pratique. Avec son coté vintage il fera tourner les têtes','3','5','55','17.jpg','9','2'),
        ('JUKE II','4x4','Chaînes, dégivrant, raclette et lave-glace hiver. Climatisation, isofix ,siège enfant sur demande, vitres avant électriques','5','5','38','18.jpg','11','2'),
        ('500','Citadine','Une super petite voiture! Elle est propre, très facile à conduire, et son gabarit est idéal pour la ville! Elle est très efficace aussi pour de longs trajets sur autoroute.','4','5','30','19.jpg','6','1'),
        ('GOLF C','Cabriolet','Voiture très agréable pour visiter notre belle région été comme hiver, économique et spacieux','4','5','70','20.jpg','5','3');


