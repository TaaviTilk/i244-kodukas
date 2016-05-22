-- loo tabel
CREATE TABLE 
ttilk__loomaaed 
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nimi VARCHAR(100),
  vanus INTEGER,
  liik VARCHAR(100),
  puur INTEGER
);

-- Täida tabel andmetega

INSERT INTO 

ttilk__loomaaed

(nimi, vanus, liik, puur) 

VALUES 

("muri", 10, "koer", 1),
("miisu", 3, "kass", 2),
("muki", 2, "koer", 3),
("tom", 5, "koer", 1),
("kitti", 3, "kass", 2);


--PÄRINGUD
-- 1. Hankida kõigi mingis ühes kindlas puuris elavate loomade nimi ja puuri number
SELECT nimi, puur FROM ttilk__loomaaed WHERE puur = 1;

-- 2. Hankida vanima ja noorima looma vanused
SELECT
MAX(vanus) AS vanim,
MIN(vanus) AS noorim
FROM ttilk__loomaaed;

-- 3. hankida puuri number koos selles elavate loomade arvuga (vihjeks: group by ja count )
SELECT puur, COUNT(*) 
FROM ttilk__loomaaed GROUP BY liik;

-- 4. suurendada kõiki tabelis olevaid vanuseid 1 aasta võrra
UPDATE ttilk__loomaaed SET vanus = vanus + 1;