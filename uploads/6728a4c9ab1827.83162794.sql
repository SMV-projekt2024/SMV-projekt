-- 01 VSE O CDJIH
SELECT * FROM CD;

-- 02 VSE ZVRSTI
SELECT DISTINCT zvrst FROM CD
ORDER BY zvrst DESC;

-- 03 DIJAKI IZ CELJA
SELECT * FROM Dijak
WHERE kraj = 'Celje';

-- 04 ŽENSKI DIJAKI IZ CELJA
SELECT ime, priimek, telefon FROM Dijak
WHERE kraj = 'Celje' 
AND spol = 'Z'
ORDER BY priimek;

-- 05 DIJAKI IZ ŽALCA ALI CELJA
SELECT ime, priimek, kraj, telefon FROM Dijak
WHERE kraj IN ('Celje', 'Žalec')
ORDER BY kraj DESC, priimek ASC;

-- 06 ŽENSKI DIJAKI
SELECT ime, priimek, kraj, telefon FROM Dijak
WHERE kraj IN ('Celje', 'Žalec') 
AND spol = 'Z'
ORDER BY priimek;

-- 07 DIJAKI ROJENI 1990
SELECT ime, priimek, datum_rojstva FROM Dijak
WHERE datum_rojstva BETWEEN '1990-01-01' '1990-12-31'
ORDER BY datum_rojstva DESC;

-- 08 DIJAKI NECELJANI ROJENI PO 1/1/1990
SELECT ime, priimek, datum_rojstva FROM Dijak
WHERE datum_rojstva > '1990-01-01' 
AND kraj <> 'Celje';

-- 09 DIJAKI NA J
SELECT ime, priimek FROM Dijak
WHERE ime LIKE 'J%';

-- 10 DIJAKI, KI NA DRUGEM MESTU PRIIMKA NIMAJO A, E ALI O
SELECT * FROM Dijak
WHERE LIKE "_[^aeo]%";

-- 10 ZALOŽBE S POP CDJI
SELECT DISTINCT zalozba FROM CDji
WHERE zvrst = 'Pop';

-- 11 izvajalci in naslovi neklasičnih cdjev izpred leta 2000
SELECT izvajalec, naslov, zvrst FROM CDji
WHERE letnica < 2000 
AND zvrst <> 'Klasika'
ORDER BY zvrst, izvajalec;

-- 12 POP IN ROCK CDJI IZDANI MED LETOMA 1995 IN 2003
SELECT izvajalec, naslov, letnica, zalozba FROM CDji
WHERE letnica BETWEEN 1995 AND 2003
AND zvrst IN ('Pop', 'Rock')
ORDER BY izvajalec;

-- 13 POP IN ROCK CDJI IZDANI MED LETOMA 1990 IN 2000 KATERIH IZVAJALCI SE ZAČNEJO NA SAMOGLASNIK
SELECT * FROM CD
WHERE letnica BETWEEN 1990 AND 2000
AND zvrst <> 'Pop'
AND  izvajalec LIKE "[aeiou]%"
ORDER BY datum_pridobitve ASC;

-- 14 ŠIFRE NASLOVI IN IZVAJALCI NEDVOJNIH CDJEV Z ZALOŽBO NA A ALI DRUGO ČRKO V NALOVU A
SELECT sifra, naslov, izvajalec FROM CDji
WHERE založba LIKE '%a%' 
OR naslov LIKE "_a%"
AND st_cdejev <> 2;

-- 15 ŠIFRE NASLOVI IN IZVAJALCI NEDVOJNIH CDJEV Z ZALOŽBO NA A DO 5 IN SOGLASNIKOM NA DRUGEM MESTU
SELECT sifra, naslov, izvajalec FROM CDji
WHERE zalozba LIKE "[a-p][^aeiou]%"

-- 16 IZPOSOJE 1 3 5
SELECT * FROM Izposoja
WHERE sifra_izposoje IN (1, 3, 5);

-- 17 IZPOSOJE KI NIMAJO ŠIFRE 1 3 5
SELECT * FROM Izposoja
WHERE sifra_izposoje NOT IN (1, 3, 5)
ORDER BY datum_izposoje;

-- 18 DIJAKI S ŠIFRO MED 1 IN 4 ALI S ŠIFRO 6 8 9
SELECT ime, priimek FROM Dijak
WHERE sifra IN (1, 4, 6, 8, 9)
ORDER BY priimek DESC, ime DESC;
