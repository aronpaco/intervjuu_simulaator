Haridustehnoloogia õppekava sisseastumisintervjuu simulaator.

![Pilt simulaatorist](simulaator.PNG)

Simulaatori eesmärk on sarnaneda päris sisseastumisintervjuuga ja aidata sisseastujatel valmistuda ning aru saada, mis neid ees ootab. Samuti annab simulaator õppejõududele ülevaate erinevatest inimestest, kes on huvitatud antud õppekavast ja harjutavad intervjuuks. Simulaator aitab vähendada sisseastujate ärevust ning ka tõsta tudengite kvaliteeti.

Projekt on loodud Informaatika õppekava suvepraktika raames Haridustehnoloogia õppekava jaoks, et aidata tulevastel sisseastujatel valmistuda päris sisseastumisintervjuuks ning vähendada nende ärevust.

Kasutatud tehnoloogiad: 
HTML5, 
PHP Version 8.0.13, 
MariaDB 10.5.16, 
phpmyadmin 5.2.0-1, 
Apache/2.4.51, 
Javascript1.5

Autorid: Merette Arula, Annabel Väljaots, Aron Paco Vunk, Rocco Kärson

Paigaldusjuhend: 
Andmebaasina kasutasime MariaDB-d.

Selleks, et simulaatorit paigaldada, tuleb kõigepealt leida sobiv veebimajutus, mis toetaks eelmainitud keeli. Veenduge, et teie valitud veebimajutusplatvorm toetab MySQL andmebaase.

Järgnevalt tuleks teha andmebaas. Andmebaasi lisamisel on vaja määrata serveri host, kasutajanimi, parool ja andmebaasi nimi. Määra endale kasutajanimi ja genereeri endale turvaline parool. Jäta kasutajanimi meelde ning kopeeri genereeritud parool endale turvalisse kohta. Andmebaasi nimeks määrake if22_Grupp1Tarkvaraarendus.

Nüüd lisage config.php nimeline fail juurkataloogi. Ava fail ning muuda $server_user_name ja $server_password väärtused vastavalt oma lisatud kasutajanimele ja genereeritud salasõnale. Kontrollige, et vajalikud autentimissõned oleksid korrektsed ja jutumärkides.

NB!: Juhul, kui määrasite andmebaasi nimeks midagi muud kui "if22_Grupp1Tarkvaraarendus" peate ka config.php failis muutma $dbname järel jutumärkidesse sisestatud nime oma määratud nime vastu.

Kui eelmainitud sammud on läbitud, tuleb järgmisena tekitada andmebaasi tabelid. Tabelite loomiseks vajalikud sql käsud on "MariaDB.txt" failis. Käsud saab kopeerida ning sisestada kasutades phpMyAdmin liidest, mis on saadaval enamus MySQL-i pakkuvatel veebimajutustel. Võimalus pääseda phpMyAdmin vaatele peaks olema leitav veebimajutusplatvormi juhtpaneelilt "Databases" või muu sarnase valiku alt. Sealt edasi leiate oma andmebaasi nime alt valiku "Impordi" (või "Import", sõltuvalt keelest). Valige või lohistage "MariaDB.txt" fail lehele. Ülejäänud sätteid pole vaja muuta. Vajutage "Impordi" nupule ning peaksite saama teate, et skripti käivitamine õnnestus.

Andmetabeleid ja nende relatsioone visualiseerib järgnev Vertabelo andmebaasimudel:

![](vertabelo.png)

Järgnevalt tuleks config.php failiga samasse kausta luua uus kaust nimega "public_html". Public_html kausta tuleb luua uus kataloog/kaust nimega intervjuu_simulaator. Sellesse kausta tehke veel 4 kausta, nimedega intervjuu, statistika, tagasiside ja videod. Kaustadesse lisage kõik githubi repo failid (php, css, js, png) vastavalt sellele, mis kaustas need on. Intervjuu_simulaator kausta lisage kysimused.csv ja max_score.txt failid. Kui küsimuste faili on vaja muuta, siis selle täpsem kirjeldus on kasutusjuhendis.



Kasutusjuhend: https://github.com/aronpaco/intervjuu_simulaator/blob/main/Kasutusjuhend.pdf


Simulaator loeb sisse küsimused CSV failist mis on paigutatud intervjuu_simulaator kausta faili kysimused.csv. Selles failis on küsimused mida simulaator kasutajale näitab. 
Täpsemad juhised, kuidas teha uut csv faili ja seda ülesse laadida on kasutusjuhendis. 

Litsents: https://github.com/aronpaco/intervjuu_simulaator/blob/main/LICENSE
Andmebaasi loomise käsud: https://github.com/aronpaco/intervjuu_simulaator/blob/main/Litsents.pdf
