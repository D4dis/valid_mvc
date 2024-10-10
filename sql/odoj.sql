#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: skills
#------------------------------------------------------------

CREATE TABLE skills(
        s_id    Int  Auto_increment  NOT NULL ,
        s_label Varchar (50) NOT NULL
	,CONSTRAINT skills_PK PRIMARY KEY (s_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        r_id    Int  Auto_increment  NOT NULL ,
        r_label Varchar (50) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (r_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        u_id   Int  Auto_increment  NOT NULL ,
        u_nom  Varchar (50) NOT NULL ,
        u_mail Varchar (50) NOT NULL ,
        u_mdp  Varchar (100) NOT NULL ,
        u_role Int NOT NULL ,
        r_id   Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (u_id)

	,CONSTRAINT user_role_FK FOREIGN KEY (r_id) REFERENCES role(r_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: offre
#------------------------------------------------------------

CREATE TABLE offre(
        o_id           Int  Auto_increment  NOT NULL ,
        o_titre        Varchar (100) NOT NULL ,
        o_salaire      Float NOT NULL ,
        o_description  Varchar (250) NOT NULL ,
        o_type_contrat Varchar (250) NOT NULL ,
        o_statut       Bool NOT NULL ,
        u_id           Int NOT NULL
	,CONSTRAINT offre_PK PRIMARY KEY (o_id)

	,CONSTRAINT offre_user_FK FOREIGN KEY (u_id) REFERENCES user(u_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: permission
#------------------------------------------------------------

CREATE TABLE permission(
        p_id    Int  Auto_increment  NOT NULL ,
        p_label Varchar (50) NOT NULL
	,CONSTRAINT permission_PK PRIMARY KEY (p_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: competences
#------------------------------------------------------------

CREATE TABLE competences(
        s_id Int NOT NULL ,
        u_id Int NOT NULL
	,CONSTRAINT competences_PK PRIMARY KEY (s_id,u_id)

	,CONSTRAINT competences_skills_FK FOREIGN KEY (s_id) REFERENCES skills(s_id)
	,CONSTRAINT competences_user0_FK FOREIGN KEY (u_id) REFERENCES user(u_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pouvoir
#------------------------------------------------------------

CREATE TABLE pouvoir(
        p_id Int NOT NULL ,
        r_id Int NOT NULL
	,CONSTRAINT pouvoir_PK PRIMARY KEY (p_id,r_id)

	,CONSTRAINT pouvoir_permission_FK FOREIGN KEY (p_id) REFERENCES permission(p_id)
	,CONSTRAINT pouvoir_role0_FK FOREIGN KEY (r_id) REFERENCES role(r_id)
)ENGINE=InnoDB;

