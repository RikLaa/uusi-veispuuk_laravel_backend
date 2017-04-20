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

<p align="center"><img src="http://student.labranet.jamk.fi/~K2346/graafi.jpg"></p>

## Backend

Sovelluksen backend toimii Ubuntu 16.04.02 LTS palvelimen päällä, hyödyntäen MySql sekä Laravel (php) -tekniikoita.

### Tekniikat

#### Laravel

##### REST API dokumentaatio

Jokaisessa sovelluksen URL-polussa on alkuliite "api/".

<pre>
+----------------------+-----------------------------------+
| Otsikko              | Hae kaikki/uusimmat postaukset    |
+----------------------+-----------------------------------+
| URL                  | /posts                            |
+----------------------+-----------------------------------+
| Metodi               | GET                               |
+----------------------+-----------------------------------+
| URL Parametrit       |                                   |
+----------------------+-----------------------------------+
| Data Parametrit      |                                   |
+----------------------+-----------------------------------+
| Onnistunut Vastaus   | {                                 |
|                      |    {                              |
|                      |                                   |
|                      |     postID: 1                     |
|                      |     userID: 1,                    |
|                      |     title: Eka postaus!,          |
|                      |     content: Aika jännää!!        |
|                      |     comments: [                   |
|                      |         {                         |
|                      |           commentID: 1,           |
|                      |           userID: 3,              |
|                      |           content: Mielestäni...  |
|                      |         },                        |
|                      |         {...}                     |
|                      |       ]                           |
|                      |     },                            |
|                      |     {...},                        |
|                      |     {...}                         |
|                      | }                                 |
+----------------------+-----------------------------------+
| Virheellinen Vastaus | Internal server error: 500        |
+----------------------+-----------------------------------+
| Esimerkkikutsu       | axios.get('/api/posts')           |
|                      |     .then( (response) => {        |
|                      |         this.setState({           |
|                      |             posts: response.data, |
|                      |             loading: 1            |
|                      |         })                        |
|                      |     })                            |
|                      |                                   |
+----------------------+-----------------------------------+
| Muuta                |                                   |
+----------------------+-----------------------------------+
</pre>

<pre>
+----------------------+-----------------------------------+
| Otsikko              | Kuvapostauksen lisääminen         |
+----------------------+-----------------------------------+
| URL                  | /posts/image                      |
+----------------------+-----------------------------------+
| Metodi               | POST                              |
+----------------------+-----------------------------------+
| URL Parametrit       |                                   |
+----------------------+-----------------------------------+
| Data Parametrit      | image, tag                        |
+----------------------+-----------------------------------+
| Onnistunut Vastaus   |  []                               |
+----------------------+-----------------------------------+
| Virheellinen Vastaus | Internal server error: 500        |
+----------------------+-----------------------------------+
| Esimerkkikutsu       |  $.ajax({                         |
|                      |   method: 'post',                 |
|                      |   url: '/api/posts/image',        |
|                      |   data: {                         |
|                      |           image: image,           |
|                      |           tag: tag                |
|                      |         }                         |
|                      |     })                            |
|                      |                                   |
+----------------------+-----------------------------------+
| Muuta                |                                   |
+----------------------+-----------------------------------+
</pre>

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

Comments

<pre>
+------------+------------------+------+-----+-------------------+----------------+
| Field      | Type             | Null | Key | Default           | Extra          |
+------------+------------------+------+-----+-------------------+----------------+
| commentID  | int(10) unsigned | NO   | PRI | NULL              | auto_increment |
+------------+------------------+------+-----+-------------------+----------------+
| postID     | int(10) unsigned | NO   | MUL | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
| userID     | int(10) unsigned | NO   | MUL | NULL              |                |
+------------+------------------+------+-----+-------------------+----------------+
| content    | varchar(3000)    | NO   |     |                   |                |
+------------+------------------+------+-----+-------------------+----------------+
| created_at | timestamp        | NO   |     | CURRENT_TIMESTAMP |                |
+------------+------------------+------+-----+-------------------+----------------+
| updated_at | timestamp        | NO   |     | CURRENT_TIMESTAMP |                |
+------------+------------------+------+-----+-------------------+----------------+
</pre>



## Frontend

Sovelluksen fronted toimii React -sekä bootstrap -tekniikoiden päällä. Frontendistä on tehty erillinen git-repositorio ja näin ollen se toimii siis kokonaan erillään tästä backend-repositoriosta.

<a href="https://github.com/RikLaa/uusi-veispuuk_version_control">Frontend -repositorio</a>

### Tekniikat
#### React
#### Bootstrap
#### jQuery
### Axios

## Production/Development

Sovelluksen julkaistu versio on näkyvillä osoitteessa: <a href="http://95.85.60.165">Uusi Veispuuk</a>
Julkaistu versio pyörii Digital Oceanin dropletissa, joka on itse configuroitu manuaalisesti meidän sovelluksen tarpeisiin.

Kehittämiseen käytettiin Virtualboxissa pyörivää virtuaalikonetta (ubuntu server 16.04.02 LTS). Tämä virtuaalikone on myös konfiguroitu melkein identtisesti vastamaan meidän production -serveriämme. Näin ollen, pystyimme päivittämään myös production serverin pelkällä "git pull" komennolla, koska development- sekä production ympäristöt olivat melkein identtiset.

GIT:tiä (CLI ja GUI) käytettiin versionhallintaan, GitHub toimi remote repositoryna. Yhteys virtuaalikoneeseen otettiin SSH:n avulla joko Putty:lla tai suoraan komentoriviltä. MySql -tietokannan hallinnointiin käytettiin pääasiassa CLI-sovellusta. 

Virtuaalikoneessa käytettiin komentorivin käytön apuna tmux (terminal multiplexer) apuohjelmaa, jolla voidaan luoda virtuaalisia päätteitä komentoriviltä.


## Resurssit


## Tehtävät
Koska projektin frontend puoli oli pääasiassa toteutettu jo syksyllä, keskityttiin nyt backend puoleen. Jokaiselle kehittäjälle jaettiin oma vastuualue,
jonka parissa työskennellä. 
* Borhan Amini
  * Back-end
    * registration
      * RegistrationController
    * authenticatation
      * Login
      * Logout
    * authenticatation control
      * middleware
      * session
      * routes
  * front-end
    * retriving user's relevant data into profile page based on the current session
    * fetching user's relevant posts from database based on the current session
* Jenni Rohunen
* Riku Laajala
## Itsearvio
### Borhan Amini

### Jenni Rohunen
Projekti onnistui mielestäni kokonaisuudessaan hyvin. Saimme toteutettua kaikki haluamamme toiminnot ja missään vaiheessa projektin tekemisessä ei tullut kiire. Toki sovellukseen jäi vielä paljon muuta tekemistä ja toiveissa onkin kehittää se vielä joskus kokonaan valmiiksi.Olin aina paikalla projekti tunneilla ja tein oman osuuteni mielestäni kiitettävästi. Opin todella paljon uutta ja sain ymmärrystä erilaisiin tekniikoihin. Olen tyytyväinen siihen, että käytimme projektissamme paljon tekniikoita joista on varmasti hyötyä työelämässä. Arvosanaksi itselleni antaisin 4.


### Riku Laajala



