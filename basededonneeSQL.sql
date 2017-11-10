#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        idClient      int (11) Auto_increment  NOT NULL ,
        nomClient     Varchar (32) ,
        prenomClient  Varchar (25) ,
        adresseClient Varchar (25) ,
        mailClient    Varchar (25) ,
        mdpClient     Varchar (64) ,
        estAdmin      int ,
        PRIMARY KEY (idClient ) ,
        UNIQUE (mailClient )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Sejour
#------------------------------------------------------------

CREATE TABLE Sejour(
        idSejour             int (11) Auto_increment  NOT NULL ,
        dateDebutSejour      Date ,
        dateFinSejour        Date ,
        nbPlaceSejour        Int ,
        villeDepartSejour    Varchar (25) ,
        villeArriveeSejour   Varchar (25) ,
        hotelSejour          Varchar (25) ,
        prixSejour           Double ,
        descriptionDetail    Varchar (500) ,
        descriptionActivite  Varchar (500) ,
        descriptionFormalite Varchar (500) ,
        descriptionTransport Varchar (500) ,
        illustrationSejour   Varchar (64) ,
        typeSejour           Varchar (25) ,
        idAgence             Int ,
        PRIMARY KEY (idSejour )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Agence
#------------------------------------------------------------

CREATE TABLE Agence(
        idAgence      int (11) Auto_increment  NOT NULL ,
        nomAgence     Varchar (25) ,
        mdpAgence     Varchar (25) ,
        adresseAgence Varchar (25) ,
        numeroAgence  Int ,
        telAgence     Int ,
        PRIMARY KEY (idAgence ) ,
        UNIQUE (numeroAgence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Facture
#------------------------------------------------------------

CREATE TABLE Facture(
        idFacture     int (11) NOT NULL ,
        idClient      int (11) NOT NULL ,
        idReservation int (11) NOT NULL ,
        idSejour      int (11) NOT NULL ,
        reglementFait int ,
        idClient_1    Int ,
        idSejour_2    Int ,
        idAgence      Int ,
        PRIMARY KEY (idFacture )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reserver
#------------------------------------------------------------

CREATE TABLE reserver(
        accompte Double ,
        idClient Int NOT NULL ,
        idSejour Int NOT NULL ,
        PRIMARY KEY (idClient ,idSejour )
)ENGINE=InnoDB;

ALTER TABLE Sejour ADD CONSTRAINT FK_Sejour_idAgence FOREIGN KEY (idAgence) REFERENCES Agence(idAgence);
ALTER TABLE Facture ADD CONSTRAINT FK_Facture_idClient_1 FOREIGN KEY (idClient_1) REFERENCES Client(idClient);
ALTER TABLE Facture ADD CONSTRAINT FK_Facture_idSejour_2 FOREIGN KEY (idSejour_2) REFERENCES Sejour(idSejour);
ALTER TABLE Facture ADD CONSTRAINT FK_Facture_idAgence FOREIGN KEY (idAgence) REFERENCES Agence(idAgence);
ALTER TABLE reserver ADD CONSTRAINT FK_reserver_idClient FOREIGN KEY (idClient) REFERENCES Client(idClient);
ALTER TABLE reserver ADD CONSTRAINT FK_reserver_idSejour FOREIGN KEY (idSejour) REFERENCES Sejour(idSejour);
