Sta je trebalo biti uradjeno:

Cetvrta spirala
a) Napravite MySQL bazu sa min tri povezane tabele (1 bod) 
+ Dodajte nove forme po potrebi
b) Napraviti PHP skriptu koja ce sve podatke iz XML prebaciti u bazu podataka, 
neka se ova skripta poziva na klik dugmeta kojeg može vidjeti samo administrator,
ova skripta treba da ubaci samo podatke iz XML-a koji se ne nalaze u bazi (2 boda)
c) Prepravite vaše PHP skripte tako da se podaci cuvaju i kupe iz baze podataka umjesto iz XML-a (3 boda)
d) Napravite hosting vaše stranice na OpenShift, link na stranicu navedite u ReadMe fajlu (2 boda)
e) Napravite jednu metodu REST web servisa koja vraca podatke u obliku JSON-a (1 bod)
f) Testirajte web servis koristeci POSTMAN i priložite odgovarajuci izvještaj (screenshot 3-4 razlicita slucaja upotreba) (1 bod)





Sta je uradjeno:
a) Kreirana baza sa 3 povezane tabele. Tabele su:
    - images (FK na users)
    - users
    - votes (FK na users i images)
   Dump baze se nalazi u fajlu diydb.sql
b) Stare podatke koji su bili snimljeni u XML-u je moguce importovati. Kada se korisnik loguje u meniju mu se pojavi opcija "IMPORT XML". 
   XML file se nalazi na serveru i nije ga potrebno uploadovati. Ako se komanda izvrši više puta, dupli podaci se nece importovati.
c) Umjesto u XML fajlovima, svi podaci se cuvaju u MySQL bazi podataka. 
   Prilikom slanja upita na bazu i snimanja podataka vodila sam racuna o SQL injectionima i XSS rajivostima, koristeci mysqli_real_escape_string() i htmlspecialchars() funkcije.
d) Stranica je hostana na OpenShift-u, adresa je http://diy-ajla-route-diy-ajla.44fs.preview.openshiftapps.com/
e) Rest metoda se nalazi na adresi http://diy-ajla-route-diy-ajla.44fs.preview.openshiftapps.com/api.php
   Metoda vraca listu svih slika u bazi. Podatke je moguce filtrirati po slijedecim kriterijima:
    - Text sadrzan u naslovu (titleContains)
    - Text sadrzan u opisu (descriptionContains)
    - Minimalni broj glasova (moreVotesThan)
f) Screenshot-i poziva apija se nalaze u folderu postman

Korisnički podaci za logovanje:
User: ajla
Pass: sarajevo

 
Fajlovi koji su izmijenjeni u spirali 4:
- api.php
- best.php
- config.php
- delete.php
- download_csv.php
- download_pdf.php
- edit_gallery.php
- edit_gallery_form.php
- home.php
- import_xml.php
- index.php
- login.php
- projects.php
- save_new_gallery.php
- Skripta.js
- table.php
- vote.php
