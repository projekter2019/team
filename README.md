# team
Projekter egyetemi projekt
A Projekter egy egyszerű, könnyen kezelhető projekt és munkaidő-nyilvántartó szoftver. A fő funkciója az egyes feladatokra fordított munkaidő nyilvántartása. Cél, hogy a munkaidő kezelés a lehető legkevesebb adminisztrációs terhet rója a fejlesztőkre. 
Az idő rögzítése többféle módon történhet: munka közben stopperrel automatizálva rögzítve vagy utólag manuálisan berögzítve.  
Megvalósítani kívánt funkciók:
•	Fejlesztők kezelése
•	Megrendelők kezelése 
•	Projektek kezelése 
•	Munkaidő kezelése: rögzített, mérés 
•	Kimutatások
•	Bejelentkezés
•	Jogosultságok kezelése 

Adatmodell 
Fejlesztők:
•	azonosító
•	felhasználónév + jelszó 
•	név 
•	email cím
•	órabér 

Megrendelők:
•	azonosító
•	név 
•	cím (kitöltés opcionális) 
•	elérhetőségek (kitöltés opcionális) 

Projekt:
•	név 
•	leírás 
•	megrendelő 
•	határidő (kitöltés opcionális) 

Feladatok:
•	projekt 
•	feladat röviden 
•	felelős fejlesztő 
•	leírás 
•	készültségi állapot % (0 - 100)

Időbélyeg: az egyes feladatokra fordított idő
•	fejlesztő
•	feladat
•	kezdő időbélyeg
•	záró időbélyeg
•	megjegyzés
•	(ráfordított időtartam)
A feladatok kezelésénél lehet az időket rögzíteni. Amikor egy fejlesztő belép a feladatok kezelésbe automatikusan az a projekt és az a feladat van kijelölve amin legutóbb dolgozott, ha még nem 100% a készültségi állapota. 
A [START] gombbal indul az időmérés. Az időt egy digitális stopperrel méri a rendszer.
Mellette található egy [STOP] gomb, beviteli mező a készültségi állapotnak és a megjegyzésnek. A [STOP] hatására leáll az idő mérése és rögzíti az adatokat.
Van egy [PAUSE] gomb, amivel megállítható, újraindítható a stopper. 
