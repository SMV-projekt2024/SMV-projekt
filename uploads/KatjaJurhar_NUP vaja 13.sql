CREATE DATABASE Evidenca


CREATE TABLE Ucitelji(
id_ucitelj int PRIMARY KEY IDENTITY(1, 1),
ime nvarchar(50) NOT NULL,
priimek nvarchar(50) NOT NULL,
spol char DEFAULT 'm' CHECK(spol = 'm' OR spol ='z'),
datum_zaposlitve date  CHECK(datum_zaposlitve LIKE("[0-3][0-9].[0-1][0-9].[0-9][0-9][0-9][0-9]"))
)

CREATE TABLE Razredi(
id_razred int PRIMARY KEY IDENTITY(1, 1),
naziv nvarchar(3) CHECK (naziv LIKE('_[0-4]_')) NOT NULL
st_ucencev int CHECK (st_ucencev <> 0) NOT NULL,
prostor nvarchar CHECK (prostor LIKE('_%')) NOT NULL,
id_ucitelj int FOREIGN KEY REFERENCES Ucitelji(id_ucitelj),
)

CREATE TABLE Dijaki(
id_dijak int PRIMARY KEY IDENTITY(1,1),
ime nvarchar(50) NOT NULL,
priimek nvarchar(50) NOT NULL,
spol char DEFAULT 'm' CHECK(spol = 'm' OR spol ='z'),
starost int CHECK(starost IN(15, 16, 17, 18, 19, 20)),
id_razred int FOREIGN KEY REFERENCES Razredi(id_razred)
)

CREATE TABLE Urnik(
id_urnik int PRIMARY KEY IDENTITY(1, 1),
id_razred int FOREIGN KEY REFERENCES Razredi(id_razred),
st_ur_tedensko int CHECK (st_ur_tedensko <> 0) NOT NULL,
dan int CHECK (dan BETWEEN 1 AND 7),
letnik int CHECK(letnik BETWEEN 1 AND 4)
)

CREATE TABLE Predmet(
id_predmet int PRIMARY KEY IDENTITY(1, 1),
naziv nvarchar NOT NULL,
id_ucitelj int FOREIGN KEY REFERENCES Ucitelji(id_ucitelj),
id_razred int FOREIGN KEY REFERENCES Razredi(id_razred),
id_dijak int FOREIGN KEY REFERENCES Dijaki(id_dijak),
trajanje_min int CHECK(trajanje_min IN(45, 60, 120))
)

CREATE TABLE Ocene(
id_ocena int PRIMARY KEY IDENTITY(1, 1),
id_dijak int FOREIGN KEY REFERENCES Dijaki(id_dijak),
id_ucitelj int FOREIGN KEY REFERENCES Ucitelji(id_ucitelj),
id_razred int FOREIGN KEY REFERENCES Razredi(id_razred)
ocena int CHECK(ocena BETWEEN 1 AND 5),
datum date CHECK(datum_zaposlitve LIKE('[0-3][0-9].[0-1][0-9].[0-9][0-9][0-9][0-9]'))
)

ALTER TABLE Dijaki
ADD(letnik int NOT NULL)
AFTER starost

ALTER TABLE Dijaki
ALTER starost
SET DEFAULT 1

ALTER TABLE Dijaki
DROP starost

INSERT INTO Ucitelji (ime, priimek, spol, datum_zaposlitve)
VALUES
    ('Ana', 'Kovač', 'z', '1.1.1998'),
    ('Janez', 'Novak', 'm', '20.10.2005'),
    ('Maja', 'Horvat', 'z', '8.3.2010'),
    ('Marko', 'Lah', 'm', '12.7.2008'),
    ('Sara', 'Kotnik', 'z', '25.9.2015'),
    ('Miha', 'Bizjak', 'm', '30.12.2012'),
    ('Katarina', 'Hribar', 'z', '18.2.2019'),
    ('Luka', 'Zupan', 'm', '5.11.2017'),
    ('Nina', 'Kovačič', 'z', '23.6.2014'),
    ('Matej', 'Vidmar', 'm', '10.8.2016'),
    ('Tina', 'Kos', 'z', '17.4.2011'),
    ('Žiga', 'Pavlin', 'm', '22.1.2018'),
    ('Eva', 'Cerar', 'z', '1.9.2009'),
    ('Jurij', 'Novak', 'm', '14.7.2013'),
    ('Petra', 'Oblak', 'z', '5.3.2007'),
    ('Andrej', 'Korošec', 'm', '2.12.2006'),
    ('Tjaša', 'Mlakar', 'z', '29.8.2004'),
    ('Aljaž', 'Jereb', 'm', '18.11.2002'),
    ('Maja', 'Vidic', 'z', '7.10.2003'),
    ('Boris', 'Hrovat', 'm', '14.2.2001');

    INSERT INTO Razredi (naziv, st_ucencev, prostor, id_ucitelj)
VALUES
    ('R1A', 25, 'A101', 2),
    ('R2B', 22, 'B102', 5),
    ('R3C', 20, 'C103', 8),
    ('R4D', 28, 'D104', 11),
    ('R1B', 24, 'A105', 14),
    ('R2C', 23, 'B106', 17),
    ('R3A', 21, 'C107', 20),
    ('R4B', 27, 'D108', 1),
    ('R1C', 26, 'A109', 4),
    ('R2D', 22, 'B110', 7),
    ('R3B', 20, 'C111', 10),
    ('R4A', 28, 'D112', 13),
    ('R1D', 24, 'A113', 16),
    ('R2A', 23, 'B114', 19),
    ('R3D', 21, 'C115', 3),
    ('R4C', 27, 'D116', 6),
    ('R1A', 26, 'A117', 9),
    ('R2B', 22, 'B118', 12),
    ('R3C', 20, 'C119', 15),
    ('R4D', 28, 'D120', 18);

INSERT INTO Dijaki (ime, priimek, spol, starost, id_razred)
VALUES
    ('Ana', 'Kovač', 'z', 16, 1),
    ('Janez', 'Novak', 'm', 17, 2),
    ('Maja', 'Horvat', 'z', 16, 3),
    ('Marko', 'Lah', 'm', 17, 4),
    ('Sara', 'Kotnik', 'z', 18, 5),
    ('Miha', 'Bizjak', 'm', 16, 6),
    ('Katarina', 'Hribar', 'z', 17, 7),
    ('Luka', 'Zupan', 'm', 18, 8),
    ('Nina', 'Kovačič', 'z', 15, 9),
    ('Matej', 'Vidmar', 'm', 16, 10),
    ('Tina', 'Kos', 'z', 17, 11),
    ('Žiga', 'Pavlin', 'm', 18, 12),
    ('Eva', 'Cerar', 'z', 15, 13),
    ('Jurij', 'Novak', 'm', 16, 14),
    ('Petra', 'Oblak', 'z', 17, 15),
    ('Andrej', 'Korošec', 'm', 18, 16),
    ('Tjaša', 'Mlakar', 'z', 15, 17),
    ('Aljaž', 'Jereb', 'm', 16, 18),
    ('Maja', 'Vidic', 'z', 17, 19),
    ('Boris', 'Hrovat', 'm', 18, 20);

INSERT INTO Urnik (id_razred, st_ur_tedensko, dan, letnik)
VALUES
    (1, 25, 1, 1),
    (2, 22, 2, 2),
    (3, 20, 3, 3),
    (4, 28, 4, 4),
    (5, 24, 5, 1),
    (6, 23, 6, 2),
    (7, 21, 7, 3),
    (8, 27, 1, 4),
    (9, 26, 2, 1),
    (10, 22, 3, 2),
    (11, 20, 4, 3),
    (12, 28, 5, 4),
    (13, 24, 6, 1),
    (14, 23, 7, 2),
    (15, 21, 1, 3),
    (16, 27, 2, 4),
    (17, 26, 3, 1),
    (18, 22, 4, 2),
    (19, 20, 5, 3),
    (20, 28, 6, 4);

INSERT INTO Predmet (naziv, id_ucitelj, id_razred, id_dijak, trajanje_min)
VALUES
    ('Matematika', 1, 1, 1, 45),
    ('Slovenščina', 2, 2, 2, 60),
    ('Angleščina', 3, 3, 3, 120),
    ('Zgodovina', 4, 4, 4, 45),
    ('Geografija', 5, 5, 5, 60),
    ('Biologija', 6, 1, 6, 120),
    ('Fizika', 7, 2, 7, 45),
    ('Kemija', 8, 3, 8, 60),
    ('Likovna umetnost', 9, 4, 9, 120),
    ('Glasba', 10, 5, 10, 45),
    ('Šport', 11, 1, 11, 60),
    ('Računalništvo', 12, 2, 12, 120),
    ('Matematika', 13, 3, 13, 45),
    ('Slovenščina', 14, 4, 14, 60),
    ('Angleščina', 15, 5, 15, 120),
    ('Zgodovina', 16, 1, 16, 45),
    ('Geografija', 17, 2, 17, 60),
    ('Biologija', 18, 3, 18, 120),
    ('Fizika', 19, 4, 19, 45),
    ('Kemija', 20, 5, 20, 60);

INSERT INTO Ocene (id_dijak, id_ucitelj, id_razred, ocena, datum)
VALUES
    (1, 1, 1, 4, '15.1.2023'),
    (2, 2, 2, 5, '20.2.2023'),
    (3, 3, 3, 3, '8.3.2023'),
    (4, 4, 4, 2, '12.4.2023'),
    (5, 5, 5, 4, '25.5.2023'),
    (6, 6, 1, 5, '30.6.2023'),
    (7, 7, 2, 3, '18.7.2023'),
    (8, 8, 3, 4, '5.8.2023'),
    (9, 9, 4, 2, '22.9.2023'),
    (10, 10, 5, 5, '17.10.2023'),
    (11, 11, 1, 3, '1.11.2023'),
    (12, 12, 2, 4, '14.12.2023'),
    (13, 13, 3, 5, '3.1.2023'),
    (14, 14, 4, 2, '9.2.2023'),
    (15, 15, 5, 3, '25.3.2023'),
    (16, 16, 1, 4, '19.4.2023'),
    (17, 17, 2, 5, '7.5.2023'),
    (18, 18, 3, 3, '11.6.2023'),
    (19, 19, 4, 4, '29.7.2023'),
    (20, 20, 5, 5, '24.8.2023');



-- POZVEDBE --

SELECT *
FROM Dijaki

SELECT *
FROM Dijaki
WHERE id_dijak < 3

SELECT *
FROM Dijaki
WHERE ime = 'Luka'

SELECT ime, priimek
FROM Dijaki
WHERE spol = 'z'

SELECT naziv
FROM Predmet

SELECT *
FROM Ocene
WHERE id_ucitelj > 6

SELECT *
FROM Razredi
WHERE prostor = 'B12'

SELECT ime, priimek
FROM Ucitelji
WHERE spol = 'z'

SELECT *
FROM Razredi
WHERE st_ucencev BETWEEN 25 AND 30

SELECT naziv
FROM Razredi


-- inner JOIN --
SELECT *
FROM Razredi JOIN Ucitelji
ON Razredi.id_ucitelj = Ucitelji.id_ucitelj

SELECT naziv
FROM Razredi JOIN Ucitelji
ON Razredi.id_ucitelj = Ucitelji.id_ucitelj
WHERE priimek = 'Kotnik'

SELECT ime, priimek
FROM Razredi JOIN Ucitelji
ON Razredi.id_ucitelj = Ucitelji.id_ucitelj
WHERE naziv = "R3B"

SELECT *
FROM Ocene JOIN Dijaki
ON Razredi.id_dijak = Dijaki.id_dijak

SELECT ime, priimek
FROM Ocene JOIN Dijaki
ON Ocene.id_dijak = Dijaki.id_dijak
WHERE id_ocena = 1

SELECT ocena
FROM Ocene JOIN Dijaki
ON Ocene.id_dijak = Dijaki.id_dijak
WHERE ocena = 5

SELECT *
FROM Predmet JOIN Dijaki
ON Predmet.id_dijak = Dijaki.id_dijak JOIN Razredi
ON Dijaki.id_razred = Razredi.id_razred
WHERE ime = 'Tjaša'
AND priimek = 'Mlakar'

SELECT p.naziv
FROM Predmet p JOIN Dijaki
ON Predmet.id_dijak = Dijaki.id_dijak JOIN Razredi
ON Dijaki.id_razred = Razredi.id_razred
WHERE Razredi.naziv = 'R3B'

SELECT ocena
FROM Dijaki JOIN Ocene
ON Dijaki.id_dijak = Ocene.id_dijak JOIN Ucitelji
ON Ocene.id_ucitelj = Ucitelji.id_ucitelj
WHERE Ucitelji.ime = "Tina"

SELECT datum
FROM Dijaki JOIN Ocene
ON Dijaki.id_dijak = Ocene.id_dijak JOIN Ucitelji
ON Ocene.id_ucitelj = Ucitelji.id_ucitelj
WHERE id_dijak = 3


-- outer JOIN --

SELECT datum
FROM Dijaki FULL JOIN Ocene
ON Dijaki.id_dijak = Ocene.id_dijak

SELECT ocena
FROM Dijaki RIGHT JOIN Ocene
ON Dijaki.id_dijak = Ocene.id_dijak

SELECT p.naziv
FROM Predmet p JOIN Dijaki
ON Predmet.id_dijak = Dijaki.id_dijak
WHERE Razredi.naziv = 'R3B'

SELECT *
FROM Predmet FULL JOIN Dijaki
ON Predmet.id_dijak = Dijaki.id_dijak 

SELECT naziv
FROM Predmet RIGHT JOIN Dijaki
ON Predmet.id_dijak = Dijaki.id_dijak 

SELECT *
FROM Razredi LEFT JOIN Ucitelji
ON Razredi.id_ucitelj = Ucitelji.id_ucitelj
WHERE id_razred = 2

SELECT ime, priimek
FROM Ocene JOIN Dijaki
ON Ocene.id_dijak = Dijaki.id_dijak
WHERE ime = 'Luka'

SELECT st_ucencev
FROM Razredi LEFT JOIN Ucitelji
ON Razredi.id_ucitelj = Ucitelji.id_ucitelj

SELECT *
FROM Predmet FULL JOIN Dijaki
ON Predmet.id_dijak = Dijaki.id_dijak 

SELECT ime, priimek, starost
FROM Ocene RIGHT JOIN Dijaki
on Ocene.id_dijak = Dijaki.id_dijak
WHERE datum = '15.2.2024'