<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Uusi veispuuk, projektidokumentaatio (TTMS-0700)

## Yleistä

### Linkkejä
<a href="http://95.85.60.165:3000/">Uusi Veispuuk</a><br>
<a href="https://docs.google.com/spreadsheets/d/1c-QAy97tZpHoKPR0I1-kBhpYYMcJx3SPVtewuVP4whU/edit?usp=sharing">Resurssitaulukko</a><br>
<a href="https://github.com/RikLaa/uusi-veispuuk_version_control">Frontend -repositorio</a>


### Kuvaus

Projektin tarkoituksena oli luoda Facebookin alkuperäisen vision mukainen ohjelma, jolla voidaan koulun eri kampusten välillä pitää yhteyttä. Käyttäjät voivat rekisteröityä ohjelmaan käyttämällä jamk.fi tai student.jamk.fi- loppuista sähköpostiosoitetta. 

Käyttäjät voivat luoda palveluun oman profiilin, josta näkyy heidän oma koulutusalansa, sekä nimensä ja profiilikuvansa. Käyttäjät voivat luoda palveluun postauksia, sekä lähettää omia kuviaan. Kuvat ja tekstiketjut ”tägätään” erilaisilla tunnisteilla, joita voidaan hyödyntää viestien lajittelussa. Muut käyttäjät voivat kommentoida toisten käyttäjien tekemiä postauksia, sekä kuvia. 

Käyttäjä voi lajitella ja järjestää etusivulla olevia postauksia annettujen parametrien mukaan. 

Ryhmän jokaisella jäsenellä on kehitysvaiheessa oma virtuaalikone, jolla olevalla palvelimella sovellus pyörii. Jokaiselle kehittäjällä on myös oma tietokanta. Projektin lopuksi koko projekti siirretään toimimaan Digital Ocean- palveluun, jossa se on julkisesti kaikkien nähtävillä.




#### Tekijät 

Miikka Sipilä, Borhan Amini, Riku Laajala ja Jenni Rohunen.

#### Päivämäärä

18.4.2017



## Backend

Sovelluksen backend toimii Ubuntu 16.04.02 LTS palvelimen päällä, hyödyntäen MySql sekä Laravel (php) -tekniikoita.

### Tekniikat

#### Laravel
#### PHP
#### MySql

Tietokannan rakenne

Users
<pre>
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| userID     | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
+------------+------------------+------+-----+---------+----------------+
| userRole   | int(11)          | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
| firstName  | varchar(50)      | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
| lastName   | varchar(60)      | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
| password   | varchar(512)     | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
| email      | varchar(60)      | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
| field      | varchar(45)      | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
| campus     | varchar(45)      | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
| pictureURL | longblob         | YES  |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
</pre>

Posts

<pre>
+------------+------------------+------+-----+-------------------+----------------+
| Field      | Type             | Null | Key | Default           | Extra          |
+------------+------------------+------+-----+-------------------+----------------+
| postID     | int(10) unsigned | NO   | PRI | NULL              | auto_increment |
+------------+------------------+------+-----+-------------------+----------------+
| userID     | int(10) unsigned | NO   | MUL | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
| postType   | int(11)          | NO   |     | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
| tag        | varchar(45)      | NO   |     | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
| title      | varchar(800)     | NO   |     | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
| content    | varchar(3000)    | NO   |     | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
| created_at | timestamp        | NO   |     | CURRENT_TIMESTAMP |                |
+------------+------------------+------+-----+-------------------+----------------+
| updated_at | timestamp        | NO   |     | CURRENT_TIMESTAMP |                |
+------------+------------------+------+-----+-------------------+----------------+
| pictureURL | longblob         | YES  |     | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
</pre>



## Frontend

Sovelluksen fronted toimii React -sekä bootstrap -tekniikoiden päällä. Frontendistä on tehty erillinen git-repositorio ja näin ollen se toimii siis kokonaan erillään tästä backend-repositoriosta.

<a href="https://github.com/RikLaa/uusi-veispuuk_version_control">Frontend -repositorio</a>

### Tekniikat
#### React
#### Bootstrap
#### jQuery




