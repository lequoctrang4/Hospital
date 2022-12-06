CREATE TABLE PATIENT
(	
    Patient_ID	INT	GENERATED ALWAYS as IDENTITY(START with 1 INCREMENT by 1) PRIMARY KEY,
    fname		VARCHAR(50)	    NOT NULL,
	lname		VARCHAR(15)	    NOT NULL,
	bdate		DATE            NOT NULL,
	address		VARCHAR(200)    NOT NULL,
	sex			VARCHAR(5)      NOT NULL,
	phone_number VARCHAR(15)    NOT NULL,
    H_I_N VARCHAR(20) --Số bảo hiểm xã hội
);



CREATE TABLE DOCTOR
(
    fname		VARCHAR(50)	    NOT NULL,
	lname		VARCHAR(15)	    NOT NULL,
    S_ID        VARCHAR(15) PRIMARY KEY,
    bdate		DATE            NOT NULL,
	address		VARCHAR(200)     NOT NULL,
	sex			VARCHAR(5)      NOT NULL,
    Email       VARCHAR(50)     NOT NULL,
    Phone_number VARCHAR(15)    NOT NULL,
    Salary      INT             NOT NULL,
    Start_date  Date            NOT NULL,
    Experience_job INT          NOT NULL
);

CREATE TABLE TREAT
(
    Docu_ID     INT GENERATED ALWAYS as IDENTITY(START with 1 INCREMENT by 1) PRIMARY KEY,
    Patient_ID	INT             NOT NULL,
    S_ID        VARCHAR(15)     NOT NULL,
    Disease     VARCHAR(100)    NOT NULL,
    Date_Treat  DATE            NOT NULL,
    Price       INT             NOT NULL,
    Diagnostic       VARCHAR(300)     NOT NULL,
    CONSTRAINT fk_treat_Patient FOREIGN KEY (Patient_ID) REFERENCES PATIENT(Patient_ID),
    CONSTRAINT fk_treat_S_ID FOREIGN KEY (S_ID) REFERENCES DOCTOR(S_ID)
);

CREATE TABLE PHARMACIST
(
    fname		VARCHAR(50)	    NOT NULL,
	lname		VARCHAR(15)	    NOT NULL,
    S_ID        VARCHAR(15) PRIMARY KEY,
    bdate		DATE            NOT NULL,
	address		VARCHAR(200)     NOT NULL,
	sex			VARCHAR(5)      NOT NULL,
    Email       VARCHAR(50)     NOT NULL,
    Phone_number VARCHAR(15)    NOT NULL,
    Salary      INT             NOT NULL,
    Start_date  Date            NOT NULL
);

CREATE TABLE NURSE
(
    fname		VARCHAR(50)	    NOT NULL,
	lname		VARCHAR(15)	    NOT NULL,
    S_ID        VARCHAR(15) PRIMARY KEY,
    bdate		DATE            NOT NULL,
	address		VARCHAR(200)     NOT NULL,
	sex			VARCHAR(5)      NOT NULL,
    Email       VARCHAR(30)     NOT NULL,
    Phone_number VARCHAR(15)    NOT NULL,
    Salary      INT             NOT NULL,
    Start_date  Date            NOT NULL,
    Expertise    VARCHAR(50)    NOT NULL
);

CREATE TABLE FACULTY
(
    F_ID INT PRIMARY KEY,
    F_Name VARCHAR(50)          NOT NULL,
    Dean VARCHAR(15)            NOT NULL,
    Start_date DATE             NOT NULL,
    CONSTRAINT fk_Faculty_Dean FOREIGN KEY (Dean) REFERENCES DOCTOR(S_ID) ON DELETE SET NULL
);


ALTER TABLE DOCTOR ADD Faculty INT NOT NULL;
ALTER TABLE DOCTOR ADD CONSTRAINT fk_Doctor_Facul FOREIGN KEY (Faculty) REFERENCES FACULTY(F_ID) ON DELETE SET NULL;

CREATE TABLE CLINIC
(
    Buil_ID     VARCHAR(5)      NOT NULL,
    ROOM_ID     VARCHAR(5)      NOT NULL,
    Cli_Name    VARCHAR(50)     NOT NULL,
    PRIMARY KEY (Buil_ID, ROOM_ID)
);

ALTER TABLE DOCTOR ADD Buil_ID VARCHAR(5);
ALTER TABLE DOCTOR ADD ROOM_ID VARCHAR(5);
ALTER TABLE DOCTOR ADD CONSTRAINT fk_Doctor_Pos FOREIGN KEY (Buil_ID, ROOM_ID) REFERENCES CLINIC(Buil_ID, ROOM_ID) ON DELETE SET NULL;

CREATE TABLE Inpatient_room
(
    Buil_ID     VARCHAR(5)      NOT NULL,
    ROOM_ID     VARCHAR(5)      NOT NULL,
    PRIMARY KEY (Buil_ID, ROOM_ID)
);

CREATE TABLE Nurse_M_Room
(
    STT         INT PRIMARY KEY,
    Buil_ID     VARCHAR(5)      NOT NULL,
    ROOM_ID     VARCHAR(5)      NOT NULL,
    S_ID        VARCHAR(15)     NOT NULL,
    CONSTRAINT fk_NMR_Pos FOREIGN KEY (Buil_ID, ROOM_ID) REFERENCES Inpatient_room(Buil_ID, ROOM_ID) ON DELETE SET NULL,
    CONSTRAINT fk_NMR_Nurse FOREIGN KEY (S_ID) REFERENCES NURSE(S_ID) ON DELETE SET NULL
);

CREATE TABLE SERVICE 
(
    S_ID VARCHAR(10)            PRIMARY KEY,
    S_Name VARCHAR(50)          NOT NULL,
    Price INT                   NOT NULL
);

CREATE TABLE HIRE_SERVICE(
    P_ID INT                    NOT NULL,
    S_ID VARCHAR(10)            NOT NULL,
    Amount INT                  NOT NULL,
    Date_hire DATE              NOT NULL,
    PRIMARY KEY (P_ID, S_ID),
    CONSTRAINT fk_HS_P FOREIGN KEY (P_ID) REFERENCES PATIENT(Patient_ID) ON DELETE SET NULL,
    CONSTRAINT fk_HS_S FOREIGN KEY (S_ID) REFERENCES SERVICE(S_ID) ON DELETE SET NULL
);

CREATE TABLE PROTECTOR
(
    P_ID INT                    NOT NULL,
    FullName VARCHAR(50)        NOT NULL,
    Address VARCHAR(200)         NOT NULL,
    Phone_Number VARCHAR(15)    NOT NULL,
    CONSTRAINT fk_pro_P FOREIGN KEY (P_ID) REFERENCES PATIENT(Patient_ID) ON DELETE SET NULL
);

ALTER TABLE PROTECTOR ADD PRIMARY KEY (P_ID, FullName);

CREATE TABLE DRUG(
	Dr_ID VARCHAR(10) PRIMARY KEY,
	Name VARCHAR(50)            NOT NULL,
	Disease VARCHAR(50)         NOT NULL,
	DateOfManufacture Date      NOT NULL,
	Expiry Date                 NOT NULL,
	Alter_ID VARCHAR(10)        NOT NULL,
	CONSTRAINT fk_drug_alter FOREIGN KEY (Alter_ID) REFERENCES DRUG(Dr_ID) ON DELETE SET NULL
); 

CREATE TABLE TAKES_DRUG(
    P_ID INT                    NOT NULL,
    Dr_ID VARCHAR(10)           NOT NULL,
    Amount INT                  NOT NULL,
    Pharmacist VARCHAR(15)      NOT NULL,
    PRIMARY KEY (P_ID, Dr_ID),
    CONSTRAINT fk_takeDrug_P FOREIGN KEY (P_ID) REFERENCES PATIENT(Patient_ID),
    CONSTRAINT fk_takeDrug_Dr FOREIGN KEY (Dr_ID) REFERENCES DRUG(Dr_ID),
    CONSTRAINT fk_takeDrug_Phar FOREIGN KEY (Pharmacist) REFERENCES Pharmacist(S_ID)
);

ALTER TABLE TAKES_DRUG ADD Date_take DATE NOT NULL;

CREATE TABLE INPATIENT(
    Patient_Id INT NOT NULL,
    Date_start DATE NOT NULL,
    CONSTRAINT fk_inpatient FOREIGN KEY (Patient_Id) REFERENCES Patient(Patient_id) ON DELETE SET NULL
);

ALTER TABLE INPATIENT ADD Date_end DATE;

ALTER TABLE INPATIENT ADD Buil_ID VARCHAR(5) NOT NULL;
ALTER TABLE INPATIENT ADD Room_ID VARCHAR(5) NOT NULL;
ALTER TABLE INPATIENT ADD CONSTRAINT fk_inpatient_buil FOREIGN KEY (Buil_ID, Room_ID) REFERENCES Inpatient_room(Buil_ID, Room_ID) ON DELETE SET NULL;
