USE SOFTSEG;
CREATE TABLE USER (
  USERID VARCHAR(20) PRIMARY KEY,
  USERNAME VARCHAR(20),
  PASSWORD VARCHAR(60),
  NIVEL INT);

CREATE TABLE STUDENT (
  ID INT(15) PRIMARY KEY,
  NAME VARCHAR(50),
  PROGRAM VARCHAR(50));

CREATE TABLE AUDIT_STUDENT (
  ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  PREVIOUS_NAME VARCHAR(50) NULL, 
  NEW_NAME VARCHAR(50),
  PREVIOUS_PROGRAM VARCHAR(50) NULL,
  NEW_PROGRAM VARCHAR(50),
  USERID VARCHAR(20),
  MODIFY DATETIME,
  PROCESS VARCHAR(20),
  ID_STUDENT INT(20),
  FOREIGN KEY (ID_STUDENT) REFERENCES STUDENT(ID)
  );
