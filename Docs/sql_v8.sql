#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: agent
#------------------------------------------------------------

CREATE TABLE agent(
        id_agent  int (11) Auto_increment  NOT NULL ,
        nom       Varchar (40) NOT NULL ,
        prenom    Varchar (40) NOT NULL ,
        matricule Int NOT NULL ,
        login     Varchar (25) NOT NULL ,
        mdp       Varchar (25) NOT NULL ,
        id_type   Int ,
        PRIMARY KEY (id_agent )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: proprietaire
#------------------------------------------------------------

CREATE TABLE proprietaire(
        id_proprietaire int (11) Auto_increment  NOT NULL ,
        nom             Varchar (40) NOT NULL ,
        prenom          Varchar (40) NOT NULL ,
        date_naissance  Date NOT NULL ,
        lieu_naissance  Varchar (100) ,
        telephone       Varchar (40) ,
        gsm             Varchar (40) ,
        actif           Char (1) NOT NULL ,
        mail            Varchar (100) ,
        rue             Varchar (100) ,
        numero          Varchar (10) ,
        cp              Int ,
        ville           Varchar (100) ,
        pays            Varchar (25) ,
        periode_dispo   Varchar (100) ,
        autre_dispo     Varchar (25) ,
        id_agent        Int NOT NULL ,
        id_club         Int ,
        PRIMARY KEY (id_proprietaire )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: personne_de_contacte
#------------------------------------------------------------

CREATE TABLE personne_de_contacte(
        id_pdc          int (11) Auto_increment  NOT NULL ,
        nom             Varchar (40) NOT NULL ,
        prenom          Varchar (40) NOT NULL ,
        telephone       Varchar (40) NOT NULL ,
        gsm             Varchar (40) NOT NULL ,
        rue             Varchar (100) ,
        numero          Varchar (25) ,
        cp              Int ,
        ville           Varchar (100) ,
        pays            Varchar (25) ,
        id_proprietaire Int NOT NULL ,
        PRIMARY KEY (id_pdc )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: chien
#------------------------------------------------------------

CREATE TABLE chien(
        id_chien       int (11) Auto_increment  NOT NULL ,
        nom            Varchar (40) NOT NULL ,
        date_naissance Date NOT NULL ,
        num_puce       Varchar (10) NOT NULL ,
        sexe           Char (1) ,
        puce_dogs      Varchar (25) ,
        tatoo_dogs     Varchar (25) ,
        detention      Varchar (50) ,
        mordant        Varchar (1) ,
        actif          Char (1) ,
        remarque       Text ,
        dangereux      Char (1) ,
        id_race        Int ,
        id_veterinaire Int ,
        PRIMARY KEY (id_chien )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: race
#------------------------------------------------------------

CREATE TABLE race(
        id_race int (11) Auto_increment  NOT NULL ,
        race    Varchar (50) ,
        actif   Char (1) ,
        PRIMARY KEY (id_race )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: veterinaire
#------------------------------------------------------------

CREATE TABLE veterinaire(
        id_veterinaire int (11) Auto_increment  NOT NULL ,
        nom            Varchar (40) ,
        telephone      Varchar (25) NOT NULL ,
        gsm            Varchar (25) NOT NULL ,
        rue            Varchar (100) ,
        numero         Varchar (25) ,
        cp             Int ,
        ville          Varchar (50) ,
        pays           Varchar (25) ,
        PRIMARY KEY (id_veterinaire )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: club
#------------------------------------------------------------

CREATE TABLE club(
        id_club   int (11) Auto_increment  NOT NULL ,
        nom_club  Varchar (100) NOT NULL ,
        rue       Varchar (100) NOT NULL ,
        numero    Varchar (25) ,
        cp        Int ,
        ville     Varchar (100) ,
        pays      Varchar (100) ,
        telephone Varchar (100) ,
        PRIMARY KEY (id_club )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type
#------------------------------------------------------------

CREATE TABLE type(
        id_type int (11) Auto_increment  NOT NULL ,
        type    Varchar (25) ,
        PRIMARY KEY (id_type )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: posséder
#------------------------------------------------------------

CREATE TABLE posseder(
        date_debut      Date ,
        date_fin        Date ,
        id_proprietaire Int NOT NULL ,
        id_chien        Int NOT NULL ,
        PRIMARY KEY (id_proprietaire ,id_chien )
)ENGINE=InnoDB;

ALTER TABLE agent ADD CONSTRAINT FK_agent_id_type FOREIGN KEY (id_type) REFERENCES type(id_type);
ALTER TABLE proprietaire ADD CONSTRAINT FK_proprietaire_id_agent FOREIGN KEY (id_agent) REFERENCES agent(id_agent);
ALTER TABLE proprietaire ADD CONSTRAINT FK_proprietaire_id_club FOREIGN KEY (id_club) REFERENCES club(id_club);
ALTER TABLE personne_de_contacte ADD CONSTRAINT FK_personne_de_contacte_id_proprietaire FOREIGN KEY (id_proprietaire) REFERENCES proprietaire(id_proprietaire);
ALTER TABLE chien ADD CONSTRAINT FK_chien_id_race FOREIGN KEY (id_race) REFERENCES race(id_race);
ALTER TABLE chien ADD CONSTRAINT FK_chien_id_veterinaire FOREIGN KEY (id_veterinaire) REFERENCES veterinaire(id_veterinaire);
ALTER TABLE posseder ADD CONSTRAINT FK_posseder_id_proprietaire FOREIGN KEY (id_proprietaire) REFERENCES proprietaire(id_proprietaire);
ALTER TABLE posseder ADD CONSTRAINT FK_posseder_id_chien FOREIGN KEY (id_chien) REFERENCES chien(id_chien);
