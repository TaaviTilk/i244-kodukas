-- https://echo360.e-ope.ee/ess/echo/presentation/7f8a3226-f6c9-4a07-836a-6661a2a68943?ec=true

-- lisame kategooriad
INSERT IN TO 
ttilk__kategooriad
(NIMETUS)
VALUES
("Tööriistad"),
("Kodumasinad"),
("Kontoritarbed")


-- otsime kõik kategooriad ja järjestame A-Z
SELECT 
NIMETUS
FROM
ttilk__kategooriad
WHERE 1
ORDER BY NIMETUS ASC; -- DESC Z-A

-- otsime nimetus ja kategooriat
SELECT 
NIMETUS, KOGUS
FROM
ttilk__kaubad
WHERE KATEGOORIAD = 2 AND KOGUS != 0;

-- 
SELECT 
ttilk__kaubad.NIMETUS AS tooriistanimetus,
ttilk__kaubad.KOGUS AS tooriistadekogus,
ttilk__kategooriad.NIMETUS AS Tooriistadenimetus
FROM ttilk__kaubad
LEFT JOIN ttilk__kategooriad ON ttilk__kategooriad.ID = ttilk__kaubad.KATEGOORIA;


-- uuenda kogust 5 ühiku võrra
UPDATE 
ttilk__kaubad
SET
KOGUS = KOGUS + 5
WHERE ID = 2;


-- kustuta rida 2 külmkapp
UPDATE 
ttilk__kaubad
SET
KOGUS = KOGUS + 5
WHERE ID = 2;
