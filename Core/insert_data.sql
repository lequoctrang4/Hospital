
DROP TABLE CLINIC CASCADE CONSTRAINTS;
DROP TABLE DOCTOR CASCADE CONSTRAINTS;
DROP TABLE PATIENT CASCADE CONSTRAINTS;
DROP TABLE TREAT CASCADE CONSTRAINTS;
DROP TABLE PHARMACIST CASCADE CONSTRAINTS;
DROP TABLE NURSE CASCADE CONSTRAINTS;
DROP TABLE FACULTY CASCADE CONSTRAINTS;
DROP TABLE Inpatient_room CASCADE CONSTRAINTS;
DROP TABLE Nurse_M_Room CASCADE CONSTRAINTS;
DROP TABLE SERVICE CASCADE CONSTRAINTS;
DROP TABLE HIRE_SERVICE CASCADE CONSTRAINTS;
DROP TABLE PROTECTOR CASCADE CONSTRAINTS;
DROP TABLE TAKES_DRUG CASCADE CONSTRAINTS;
DROP TABLE INPATIENT CASCADE CONSTRAINTS;


ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD';
ALTER SESSION SET NLS_DATE_FORMAT = 'DD-MM-YYYY';

--Note
ALTER TABLE FACULTY
DISABLE CONSTRAINT fk_Faculty_Dean;

ALTER TABLE DOCTOR
DISABLE CONSTRAINT fk_Doctor_Pos;

INSERT INTO FACULTY VALUES(1, 'Khoa Điều Dưỡng', '000000000001', '12-02-2009');
INSERT INTO FACULTY VALUES(2, 'Khoa Dinh Dưỡng', '000000000002', '10-07-2019');
INSERT INTO FACULTY VALUES(3, 'Khoa Chẩn Đoán', '000000000003', '04-02-2020');
INSERT INTO FACULTY VALUES(4, 'Khoa Nhi', '000000000004', '14-06-2018');
INSERT INTO FACULTY VALUES(5, 'Khoa Hiếm muộn vô sinh', '000000000005', '09-07-2018');
INSERT INTO FACULTY VALUES(6, 'Khoa Phụ - KHHGD', '000000000006', '12-02-2015');
INSERT INTO FACULTY VALUES(7, 'Khoa Sanh', '000000000007', '12-02-2014');
INSERT INTO FACULTY VALUES(8, 'Khoa Hậu sản - Hậu phẫu', '000000000008', '12-02-2013');

--Bác sĩ
INSERT INTO DOCTOR VALUES('Võ Thị', 'Luận', '000000000001', '12-02-1980', 'Thomas Edison, Đông Hoà, Dĩ An, Bình Dương, Việt Nam', 'Nữ', 'vothiluan@gmail.com', '0386416018', 15000000, '12-02-2006', 20, 1, 'H1', '101');
INSERT INTO DOCTOR VALUES('Trương Thị Băng', 'Tâm', '000000000002', '10-07-1991', '13, Long Bình, Quận 9, Thành phố Hồ Chí Minh, Việt Nam', 'Nữ', 'truongbang@gmail.com', '0964278782', 17000000, '12-04-2010', 10, 2, 'H1', '107');
INSERT INTO DOCTOR VALUES('Đoàn Thị', 'Yến', '000000000003', '26-03-1987', 'Thomas Edison, Tân Phú, Quận 9, Thành phố Hồ Chí Minh, Việt Nam', 'Nữ', 'haana@gmail.com', '0974136700', 15000000, '12-07-2010', 15, 3, 'H2', '101');
INSERT INTO DOCTOR VALUES('Trần Minh', 'Tâm', '000000000004', '27-04-1986', 'Đường 11, Tân Phú, Quận 9, Thành phố Hồ Chí Minh, Việt Nam', 'Nam', 'tamtran@gmail.com', '0964278782', 16000000, '12-07-2009', 14, 4, 'H2', '107');
INSERT INTO DOCTOR VALUES('Trần Anh', 'Tuấn', '000000000005', '22-11-1979', 'Đường 12, Tân Phú, Quận 9, Thành phố Hồ Chí Minh, Việt Nam', 'Nam', 'tuantran@gmail.com', '0964278732', 16000000, '11-07-2000', 25, 5, 'H3', '101');
INSERT INTO DOCTOR VALUES('Lê Minh', 'Thành', '000000000006', '27-01-1985', 'Đường 15, Tân Phú, Quận 9, Thành phố Hồ Chí Minh, Việt Nam', 'Nam', 'thanhle@gmail.com', '0964248782', 16000000, '12-07-2006', 15, 6, 'H3', '107');
INSERT INTO DOCTOR VALUES('Lê Quốc', 'Duy', '000000000007', '26-01-1983', 'Đường 5, Tân Phú, Quận 9, Thành phố Hồ Chí Minh, Việt Nam', 'Nam', 'duyle@gmail.com', '0962248782', 16000000, '12-08-2008', 16, 7, 'H4', '101');
INSERT INTO DOCTOR VALUES('Lê Thị Phương', 'Ly', '000000000008', '26-02-1986', 'Đường 2, Tân Phú, Quận 9, Thành phố Hồ Chí Minh, Việt Nam', 'Nữ', 'phuongly@gmail.com', '0362248782', 16000000, '12-08-2008', 18, 8, 'H4', '107');

--Clinic
INSERT INTO CLINIC VALUES('H1', '101', 'Phòng khám 1');
INSERT INTO CLINIC VALUES('H1', '107', 'Phòng khám 2');
INSERT INTO CLINIC VALUES('H2', '101', 'Phòng khám 3');
INSERT INTO CLINIC VALUES('H2', '107', 'Phòng khám 4');
INSERT INTO CLINIC VALUES('H3', '101', 'Phòng khám 5');
INSERT INTO CLINIC VALUES('H3', '107', 'Phòng khám 6');
INSERT INTO CLINIC VALUES('H4', '101', 'Phòng khám 7');
INSERT INTO CLINIC VALUES('H4', '107', 'Phòng khám 8');


--NURSE
INSERT INTO NURSE VALUES('Hồ Thị Ngọc', 'Anh', '000000000009', '12-04-1995', 'Ho Chi Minh', 'Nữ', 'anhho@gmail.com', '0326029014', 7000000, '02-02-2020', 'Khám bệnh');
INSERT INTO NURSE VALUES('Nguyễn Thị Ngọc', 'Trinh', '000000000010', '12-06-1992', 'Ho Chi Minh', 'Nữ', 'trinhnguyen@gmail.com', '0326049014', 7000000, '02-02-2020', 'Khám bệnh');
INSERT INTO NURSE VALUES('Trần Ngọc', 'Vy', '000000000011', '12-04-1989', 'Ho Chi Minh', 'Nữ', 'vytran12@gmail.com', '0326429014', 7000000, '02-02-2019', 'Chăm sóc bệnh nhân');
INSERT INTO NURSE VALUES('Trần Khánh', 'Vy', '000000000012', '11-09-1993', 'Ho Chi Minh', 'Nữ', 'vytran@gmail.com', '0323029014', 7000000, '02-02-2020', 'Chăm sóc bệnh nhân');
INSERT INTO NURSE VALUES('Lê Thị Ngọc', 'Liên', '000000000013', '04-02-1997', 'Ho Chi Minh', 'Nữ', 'lienlee@gmail.com', '0326099014', 7000000, '01-01-2020', 'Chăm sóc bệnh nhân');
INSERT INTO NURSE VALUES('Hồ Ngọc', 'Hà', '000000000014', '12-04-1998', 'Ho Chi Minh', 'Nữ', 'haho@gmail.com', '0336029014', 7000000, '02-02-2020', 'Chăm sóc bệnh nhân');
INSERT INTO NURSE VALUES('Trần Ngọc Bảo', 'Anh', '000000000015', '19-05-1999', 'Ho Chi Minh', 'Nữ', 'baoanh@gmail.com', '0326129014', 7000000, '02-02-2020', 'Chăm sóc bệnh nhân');
INSERT INTO NURSE VALUES('Nguyễn Phương', 'Uyên', '000000000016', '06-12-1997', 'Ho Chi Minh', 'Nữ', 'uyennguyen@gmail.com', '0326929014', 7000000, '02-02-2020', 'Chăm sóc bệnh nhân');

--InPatientRoom

ALTER TABLE FACULTY
ENABLE CONSTRAINT fk_Faculty_Dean;

ALTER TABLE DOCTOR
ENABLE CONSTRAINT fk_Doctor_Pos;

--Bệnh nhân:
INSERT INTO PATIENT(fname, lname, bdate, ADDRESS, sex, PHONE_NUMBER, H_I_N) VALUES('Trần Thị', 'Hiền', '26-11-2002', 'Hồ Chí Minh', 'Nữ', '0326034567', 'HC4010110169971');
INSERT INTO PATIENT(fname, lname, bdate, ADDRESS, sex, PHONE_NUMBER, H_I_N) VALUES('Lê', 'Trạng', '26-03-2002', 'Bình Dương', 'Nam', '0399609015', '1');

SELECT F_ID, F_NAME, FNAME || ' ' || LNAME, FACULTY.START_DATE FROM FACULTY INNER JOIN DOCTOR ON DOCTOR.S_ID = DEAN FETCH FIRST 100 ROWS ONLY;




