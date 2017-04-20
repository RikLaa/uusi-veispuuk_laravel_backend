<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Uusi veispuuk, projektidokumentaatio (TTMS-0700)

## Yleistä

### Linkkejä
<a href="http://95.85.60.165:3000/">Uusi Veispuuk</a><br>
<a href="https://docs.google.com/spreadsheets/d/1c-QAy97tZpHoKPR0I1-kBhpYYMcJx3SPVtewuVP4whU/edit?usp=sharing">Resurssitaulukko</a><br>
<a href="https://github.com/RikLaa/uusi-veispuuk_version_control">Frontend -repositorio</a>

#### Tekijät 

Miikka Sipilä, Borhan Amini, Riku Laajala ja Jenni Rohunen.

#### Päivämäärä

18.4.2017

### Kuvaus

Projektin tarkoituksena oli luoda Facebookin alkuperäisen vision mukainen ohjelma, jolla voidaan koulun eri kampusten välillä pitää yhteyttä. Käyttäjät voivat rekisteröityä ohjelmaan käyttämällä jamk.fi tai student.jamk.fi- loppuista sähköpostiosoitetta. 

Käyttäjät voivat luoda palveluun oman profiilin, josta näkyy heidän oma koulutusalansa, sekä nimensä ja profiilikuvansa. Käyttäjät voivat luoda palveluun postauksia, sekä lähettää omia kuviaan. Kuvat ja tekstiketjut ”tägätään” erilaisilla tunnisteilla, joita voidaan hyödyntää viestien lajittelussa. Muut käyttäjät voivat kommentoida toisten käyttäjien tekemiä postauksia, sekä kuvia. 

Käyttäjä voi lajitella ja järjestää etusivulla olevia postauksia annettujen parametrien mukaan. 

Ryhmän jokaisella jäsenellä on kehitysvaiheessa oma virtuaalikone, jolla olevalla palvelimella sovellus pyörii. Jokaiselle kehittäjällä on myös oma tietokanta. Projektin lopuksi koko projekti siirretään toimimaan Digital Ocean- palveluun, jossa se on julkisesti kaikkien nähtävillä.

<p align="center"><img src="http://student.labranet.jamk.fi/~K2346/graafi.jpg"></p>
![kuva](http://student.labranet.jamk.fi/~K2346/graafi.jpg)

## Backend

Sovelluksen backend toimii REST API:na Ubuntu 16.04.02 LTS palvelimen päällä, hyödyntäen MySql sekä Laravel (php) -tekniikoita.

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
Ylläoleva tiedostoissa: 
<a href="https://github.com/RikLaa/uusi-veispuuk_laravel_backend/blob/master/app/Http/Controllers/PostsController.php">Backend -tiedosto</a>, 
<a href="https://github.com/RikLaa/uusi-veispuuk_version_control/blob/master/uusi-veispuuk-react-app/src/scene/Home/Container.jsx">Frontend -tiedosto</a>

<br>
<br>

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
Ylläoleva tiedostoissa: 
<a href="https://github.com/RikLaa/uusi-veispuuk_laravel_backend/blob/master/app/Http/Controllers/PostsController.php">Backend -tiedosto</a>, 
<a href="https://github.com/RikLaa/uusi-veispuuk_version_control/blob/master/uusi-veispuuk-react-app/src/scene/Home/NavBarModals/AddPictureModal.jsx">Frontend -tiedosto</a>

<br>
<br>

#### MySql

Käytimme tietokantojen luomiseen Laravelin artisan työkalua. (php artisan migrate).
<br>
<a href="https://github.com/RikLaa/uusi-veispuuk_laravel_backend/tree/master/database/migrations">Migraatiotiedostot</a>

Tietokannan rakenne

**User**
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

**Posts**

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

**Comments**

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

Frontend-sovellus tekee ajax-kutsuja backendille (kuten ylläolevassa api-dokumentaatiossa on kuvattu).

<a href="https://github.com/RikLaa/uusi-veispuuk_version_control">Frontend -repositorio</a>

### Tekniikat
- React
- Bootstrap
- jQuery
- Axios

## Production/Development

Sovelluksen julkaistu versio on näkyvillä osoitteessa: <a href="http://95.85.60.165">Uusi Veispuuk</a>
Julkaistu versio pyörii Digital Oceanin dropletissa, joka on itse configuroitu manuaalisesti meidän sovelluksen tarpeisiin.

Kehittämiseen käytettiin Virtualboxissa pyörivää virtuaalikonetta (ubuntu server 16.04.02 LTS). Tämä virtuaalikone on myös konfiguroitu melkein identtisesti vastamaan meidän production -serveriämme. Näin ollen, pystyimme päivittämään myös production serverin pelkällä "git pull" komennolla, koska development- sekä production ympäristöt olivat melkein identtiset.

GIT:tiä (CLI ja GUI) käytettiin versionhallintaan, GitHub toimi remote repositoryna. Yhteys virtuaalikoneeseen otettiin SSH:n avulla joko Putty:lla tai suoraan komentoriviltä. MySql -tietokannan hallinnointiin käytettiin pääasiassa CLI-sovellusta. 

Virtuaalikoneessa käytettiin komentorivin käytön apuna tmux (terminal multiplexer) apuohjelmaa, jolla voidaan luoda virtuaalisia päätteitä komentoriviltä.


## Resurssit
<a href="https://docs.google.com/spreadsheets/d/1c-QAy97tZpHoKPR0I1-kBhpYYMcJx3SPVtewuVP4whU/edit?usp=sharing">Resurssitaulukko</a><br>

## Tehtävät
Koska projektin frontend puoli oli pääasiassa toteutettu jo syksyllä, keskityttiin nyt backend puoleen. Jokaiselle kehittäjälle jaettiin oma vastuualue,
jonka parissa työskennellä. 
### Borhan Amini
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
 
### Jenni Rohunen
### Riku Laajala
  * server
	   * Dropletin luominen DigitalOceaniin
    * Dropletin sekä virtuaalikoneen konfigurointi
    * Sovellusrakenteen luominen
  * back-end
    * Postauksien hakeminen
      * PostsController.php (index- funktio kaikkien postauksien hakemiseen)
    * Kommenttien hakeminen/lisääminen
      * CommentsController.php
    * Haku
      * SearchController.php
    * Autentikointi			
      * SessionController.php (login/logout toiminnallisuuden tekeminen)
       * CheckLogin.php -middleware
  * front-end
    * Kaikkien postauksien hakeminen
      * Container.jsx
    * Haku- toiminnon toteutus
      * Navbar.jsx 
    * Kommenttien lisääminen
      * Post.jsx	
    * Autentikointi
      * Login.jsx
    * Rekisteröinti
      * Registration.jsx


## Itsearvio
### Borhan Amini
Vaikka alussa tuntui raskaalta oppia uusi framework ja jouduin ensimmäistä kaksi viikkoa lukemaan ja oppimaan laravelin mutta nyt olen aivan tyytyväinen
ja olen varma että tästä on tulevaisuudessa hyötyä työelämässä.  
Laravelin rinnalla opin myös git(versio hallinta) ja react.  
Ahkerasti ja innokaasti yritin saada toteuttua minulle määritellyt tehtävät.  
Meillä on paljon hienoja ajatuksia miten voisimme vielä kehittää projektiamme.  
Ryhmätyö onnistui erittäin hyvin.  
Arvosanaksi itselleni antaisin 4

### Jenni Rohunen
Projekti onnistui mielestäni kokonaisuudessaan hyvin. Saimme toteutettua kaikki haluamamme toiminnot ja missään vaiheessa projektin tekemisessä ei tullut kiire. Toki sovellukseen jäi vielä paljon muuta tekemistä ja toiveissa onkin kehittää se vielä joskus kokonaan valmiiksi.Olin aina paikalla projekti tunneilla ja tein oman osuuteni mielestäni kiitettävästi. Opin todella paljon uutta ja sain ymmärrystä erilaisiin tekniikoihin. Olen tyytyväinen siihen, että käytimme projektissamme paljon tekniikoita joista on varmasti hyötyä työelämässä. Arvosanaksi itselleni antaisin 4.


### Riku Laajala
Olen hyvin tyytyväinen ryhmään sekä projektiin. Saimme oikeastaan kaikki tärkeimmät toiminnot toteutettua eikä meillä tullut edes kiire loppua kohden. 
Aikaa meni aluksi tosi paljon uusien asioiden opetteluun sekä testaamiseen mutta mitä enemmän aikaa kului, sitä nopeammaksi kehitystyö tuli. Veikkaisin että jos aikaa
olisi ollut pari viikkoa enemmän, olisi sovellus paljon kokonaisempi. Hauskinta oli oppia uutta sekä tutustua uusiin tapoihin rakentaa tällaisia web-sovelluksia. 

Mitä enemmän oppii asioita, sitä enemmän alkaa huomata että miten paljon on vielä opittavaa.
Vaikeinta oli löytää miten eri tekniikat toimivat yhdessä sekä millainen rakenne tällaisella "isommalla" 
sovelluksella tulisi olla. Tämän takia aikaa kului paljon myös palvelimen/virtuaalikoneen konfigurointiin mutta nyt ainakin koen komentorivillä työskentelyn nopeaksi sekä aika mielekkääksi.
Arvosanaksi itselleni antaisin 4-5.


