--TRIGGER Giới tính phải là nam hoặc nữ:
CREATE OR REPLACE TRIGGER PATIENT_SEX
    BEFORE
    INSERT OR UPDATE OF SEX
    ON PATIENT
    FOR EACH ROW
DECLARE
BEGIN
    IF :NEW.sex NOT IN('Nam', 'Nữ') THEN
        raise_application_error(-20001,'Giới tính chỉ có thể là nam hoặc nữ!');
    END IF;
END PATIENT_SEX;
/


CREATE OR REPLACE TRIGGER NURSE_SEX
    BEFORE
    INSERT OR UPDATE OF SEX
    ON NURSE
    FOR EACH ROW
DECLARE
BEGIN
    IF :NEW.sex NOT IN('Nam', 'Nữ') THEN
        raise_application_error(-20001,'Giới tính chỉ có thể là nam hoặc nữ!');
    END IF;
END NURSE_SEX;
/


CREATE OR REPLACE TRIGGER DOCTOR_SEX
    BEFORE
    INSERT OR UPDATE OF SEX
    ON DOCTOR
    FOR EACH ROW
DECLARE
BEGIN
    IF :NEW.sex NOT IN('Nam', 'Nữ') THEN
        raise_application_error(-20001,'Giới tính chỉ có thể là nam hoặc nữ!');
    END IF;
END DOCTOR_SEX;
/


CREATE OR REPLACE TRIGGER PHARMACIST_SEX
    BEFORE
    INSERT OR UPDATE OF SEX
    ON PHARMACIST
    FOR EACH ROW
DECLARE
BEGIN
    IF :NEW.sex NOT IN('Nam', 'Nữ') THEN
        raise_application_error(-20001,'Giới tính chỉ có thể là nam hoặc nữ!');
    END IF;
END PHARMACIST_SEX;
/




-------------------------------------
--Nhân viên phải trên 18 tuổi
CREATE OR REPLACE TRIGGER NURSE_Age
    BEFORE
    INSERT OR UPDATE OF BDATE
    ON NURSE
    FOR EACH ROW
DECLARE
    age INT;
BEGIN
    age := TRUNC(months_between(sysdate, :NEW.BDATE)/12);
    IF age < 18 THEN
        raise_application_error(-20002,'Nhân viên phải trên 18 tuổi!');
    END IF;
END NURSE_Age;
/


CREATE OR REPLACE TRIGGER DOCTOR_Age
    BEFORE
    INSERT OR UPDATE OF BDATE
    ON DOCTOR
    FOR EACH ROW
DECLARE
    age INT;
BEGIN
    age := TRUNC(months_between(sysdate, :NEW.BDATE)/12);
    IF age < 18 THEN
        raise_application_error(-20002,'Nhân viên phải trên 18 tuổi!');
    END IF;
END DOCTOR_Age;
/


CREATE OR REPLACE TRIGGER PHARMACIST_Age
    BEFORE
    INSERT OR UPDATE OF BDATE
    ON PHARMACIST
    FOR EACH ROW
DECLARE
    age INT;
BEGIN
    age := TRUNC(months_between(sysdate, :NEW.BDATE)/12);
    IF age < 18 THEN
        raise_application_error(-20002,'Nhân viên phải trên 18 tuổi!');
    END IF;
END PHARMACIST_Age;
/




--Số năm kinh nghiệm phải nhỏ hơn năm hiện tại trừ ngày sinh
CREATE OR REPLACE TRIGGER DOCTOR_Experience
    BEFORE
    INSERT OR UPDATE OF EXPERIENCE_JOB
    ON DOCTOR
    FOR EACH ROW
DECLARE
    age INT;
BEGIN
    age := TRUNC(months_between(sysdate, :NEW.BDATE)/12);
    IF (:NEW.Experience_job > (age - 18)) THEN
        raise_application_error(-20003,'Số năm kinh nghiệm phải nhỏ hơn Age - 18!');
    END IF;
END DOCTOR_Experience;
/


--S_ID phải có 12 số:

CREATE OR REPLACE TRIGGER DOCTOR_S_ID
    BEFORE
    INSERT OR UPDATE OF S_ID
    ON DOCTOR
    FOR EACH ROW
BEGIN
    IF (LENGTH(:NEW.S_ID) != 12) THEN
        raise_application_error(-20004,'S_ID phải đủ 12 số!');
    END IF;
END DOCTOR_S_ID;
/


CREATE OR REPLACE TRIGGER NURSE_S_ID
    BEFORE
    INSERT OR UPDATE OF S_ID
    ON NURSE
    FOR EACH ROW
BEGIN
    IF (LENGTH(:NEW.S_ID) != 12) THEN
        raise_application_error(-20004,'S_ID phải đủ 12 số!');
    END IF;
END NURSE_S_ID;
/


CREATE OR REPLACE TRIGGER PHARMACIST_S_ID
    BEFORE
    INSERT OR UPDATE OF S_ID
    ON PHARMACIST
    FOR EACH ROW
BEGIN
    IF (LENGTH(:NEW.S_ID) != 12) THEN
        raise_application_error(-20004,'S_ID phải đủ 12 số!');
    END IF;
END PHARMACIST_S_ID;
/


--Ngày nhập viện phải nhỏ hơn ngày xuất viện:

CREATE OR REPLACE TRIGGER INPATIENT_Date
    BEFORE
    INSERT OR UPDATE OF DATE_END
    ON INPATIENT
    FOR EACH ROW
BEGIN
    IF (months_between(:New.DATE_END, :NEW.Date_start) < 0) THEN
        raise_application_error(-20004,'Ngày xuất viện phải nhỏ hơn ngày nhập viện!');
    END IF;
END INPATIENT_Date;
/

--Ngày sinh bệnh nhân phải nhỏ hơn hoặc bằng ngày hiện tại
CREATE OR REPLACE TRIGGER INPATIENT_BDate
    BEFORE
    INSERT OR UPDATE OF BDATE
    ON PATIENT
    FOR EACH ROW
BEGIN
    IF (months_between(sysdate, :New.BDATE) < 0) THEN
        raise_application_error(-20005,'Nhập ngày sinh sai!');
    END IF;
END INPATIENT_BDate;
/