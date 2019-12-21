# *Web aplikacija - Bolnica Hospital Plus*

Projekat predstavlja Web aplikaciju za bolnicu Hospital Plus koja radnicima omogućava lakši pristup informacijama o pacijentima kao i osnovne operacije manipulacije podacima.
Aplikacija je realizovana tako da korisnici sistema: admin, asistent i lekar mogu da kreiraju, ažuriraju i brišu informacije u skladu sa svojim privilegama.
Učesnici u ovom sistemu su admin i korisnik sistema. Korisnik može biti asistent ili lekar.
Admin je predefinisani korisnik koji je kreiran, direktno u bazi podataka, i ima sva prava nad podacima i delovima aplikacije. Da bi se pristupilo aplikaciji potrebno je da se korisnik prijavi.
Nakon što korisnik prođe proces autentifikacije i autorizacije odobrava mu se pristup podacima za koje ima dozvolu.
Podatke o kredencijalima korisnika (*password*) se čuvaju u *SHA1 hash* formatu radi bezbednosti podataka kao i sigurnosti same aplikacije.
Korisnici aplikacija imaju tri role:
- **Admin**  - korisnik koji ima jedinstvene funkcije i prava.
- **Asistent**  - redovni korisnik, zaposleni u bolnici.
- **Lekar**  - korisnik koji ima dodatne funkcije i prava.
Prava korisnika su hijerarhijski postavljena.
Aplikacija obuhvata informacije o korisnicima, pacijentima, dijagnozama, lekovima.
**Admin** može da kreira, ažurira i briše korisničke naloge i profile.  On definiše njihove uloge a time i privilegije na aplikaciji.
**Asistent**  može da kreira, ažurira i briše evidencije o pacijentima, bolestima i lekovima.  On dodaje novog pacijenta i dodeljuje mu lekara koji će ga lečiti.  Takođe, vrši kontrolu zaliha lekova i dopunjuje ih po potrebi.
**Lekar** može da kreira ili pregleda kartone pacijenata, koji se leče kod njega, dodaje dijagnozu bolesti sa kratkim opisom i propiše lekove u skladu sa dijagnozom.  On, takođe, može da kreira, ažurira i briše kartone pacijenata, bolesti i lekove. Web aplikacija - Bolnica HospitalPlus

## SLUČAJEVI KORIŠĆENJA
Mogu se uočiti sledeći slučajevi korišćenja:
1. Unos/izmena/pregled/brisanje podataka o korisnicima sistema (admin)
2. Unos/izmena/pregled/brisanje podataka o pacijentima (asistent)
3. Unos/izmena/pregled/brisanje podataka o lekovima (asistent, lekar)
4. Unos/izmena/pregled/brisanje podataka o bolestima (asistent, lekar)
5. Unos/izmena/pregled/brisanje kartona pacijenata (asistent, lekar)
6. Unos/izmena/pregled/brisanje podataka o zalihama lekova (asistent)

## Prijava korisnika na aplikaciju
Preduslovi: Korisnički nalog za korisnika je kreiran od strane admin-a.
Unos:
- Korisničko ime
- Lozinka
Akcija:
- Ukoliko su uneti podaci tačni, zapamtiti ko je prijavljen
- Ukoliko uneti podaci tačni, prikazati odgovarajuću poruku i ponoviti prijavu
Izlaz:
- Prikaz početne stranice
Server:
- Čuvati informacije o prijavljenom korisniku

## Početna strana
Na početnoj stranici prikazana je svrha aplikacije, naziv bolnice, radno vreme, kontakt podatke, kao i Lokaciju, datum, tačno vreme i trenutnu temperaturu.
Glavni meni treba da sadrži sledeće opcije:
- Korisnici
- Pacijenti
- Kartoni
- Bolesti
- Lekovi
**Admin**  ima pristup opciji.
- Korisnici
**Asistent**  ima pristup opcijama
- Pacijenti
- Kartoni
- Bolesti
- Lekovi
**Lekar**  ima pristup
- Kartoni pacijenata koji se kod njega leče
- Bolesti
- Lekovi
Akcija:
- Korisnik bira stranicu kojoj želi da pristupi
Izlaz:
- Ukoliko ima pravo pristupa, prikazati izabranu stranicu
- Ukoliko nema prava pristupa, prikazati odgovarajuću poruku
## Admin
Nakon uspešnog logovanja **adminu**  se prikazuje početna stranica .
Nakon izbora opcije: Korisnici prikazuje se stranica za listom svih korisnika sistena
Admin ima pravo:
- Uvida u listu korisnika, filtriranje i pretraživanje
- Kreiranja novog korisnika
- Izmene podataka o korisniku
- Brisanje korisnika
## Asistent
Nakon uspešnog logovanja Asistentu se prikazuje početna stranica na kojoj može da izabere četiri opcije: Pacijenti, Kartoni, Bolesti, Lekovi.
Izborom svake od ovih opcija prikazuje se odgovarajuća strana.
Asistent ima pravo manipulacije sledećim grupama podataka:
Pacijenti:
- Uvid u listu svih pacijenata, filtriranje i pretraživanje
- Kreiranja novog pacijenta
- Izmene podataka o pacijentu
- Brisanje pacijenta
Kartoni:
 -Uvid u listu kartona, filtriranje i pretraživanje
- Kreiranje kartona pacijenta
- Izmene podataka u kartonu pacijenta
- Brisanje kartona pacijenta
Bolesti:
- Uvida u listu svih evidentiranih bolesti, filtriranje i pretraživanje
- Dodavanje nove bolesti
- Izmene podataka o bolesti
- Brisanje podataka o bolesti
Lekovi:
- Uvida u listu svih evidentiranih lekova, filtriranje i pretraživanje
- Dodavanje novog leka
- Izmene podataka o leku
- Brisanje podataka o leku
Stanje zaliha lekova:
- Uvida u listu svih lekova na stanju, filtriranje i pretraživanje
- Dodavanje nove količine
- Izmene podataka količini leka na stanju
## Lekar
Lekar ima pravo:
- Uvida u listu kartona svojih pacijenata, filtriranje i pretraživanje
- Kreiranja novog kartona
- Izmene podataka u kartonu (unos dijagnoze, unos prepisanih lekova)
- Brisanje kartona
- Uvid u listu svih bolesti, filtriranje i pretraživanje
- Uvid u listu svih lekova, filtriranje i pretraživanje
-Uvid u stanje lekova na zalihama

## Tehnologije izrade

Za izradu korisničkog interfejsa (UI) korišćen je primarno [bootstrap](https://getbootstrap.com/), kao i custom CSS za određene delove UI-a.
Za samu Front End funkcionalnost aplikacije korišćen je HTML i react [React framework](https://reactjs.org/).
Za funkcionalnost Back End dela koriščen je PHP jezik unutar [Laravel razvojnog okruženja](https://laravel.com/). Laravel je obuhvatio glavni deo aplikacije, ceo admin deo, sve kontrolne panale, njihovu funkcionalnost, validaciju podataka. Ceo frontend, prethodno naveden, je na kraju integrisan u okviru Laravela.

## Šema baze

![Šema baze](https://github.com/dmitic/HospitalPlus/blob/master/baza.png)

## Članovi tima
U izradi ove aplikacije, učestvovala je mala ekipa, od sedam članova, PHP 2 grupe, u sastavu: Dragan Mitić, Ivana Milosavljević, Bojan Matejević, Gordana Radović-Tripinović, Jovana Matijević, Stevan Osećanski, Bojan Mačinković.

