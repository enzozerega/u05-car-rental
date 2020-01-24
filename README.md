# Backendutveckling uppgift: Car rental

![](https://user-images.githubusercontent.com/42303378/73071146-5e92c800-3eb2-11ea-971d-4484e8920135.JPG)

Den här applikationen beskriver ett system föruthyrning av bilar och har skapats med hjälp av PHP, JavaScript och Twig. Den är baserad på MVC-modellen och kommunicerar via en router. Alla data har lagrats i en databas på Binero med hjälp av MySQL.

Filstrukturen är den följande:
1.	app
  a.	/vendor
  b.	composer.json
  c.	views.twig
  d.	Controllers.php
  e.	Request.php
  f.	Router.php
  g.	Model.php
  h.	Dbh.php
  i.	index.php
  
Databasen inkluderar de följande tabellerna:
1.	customers
2.	cars
3.	history
4.	makes
5.	colors

Filen *index.php* anropar *route()* funktionen från *Router* klassen. Denna funktion, beroende på variabeln *_SERVER[”REQUEST_URI”]* värde, omredigera användaren till den mest lämpliga sidan. På detta sätt, när användaren besöker enzo.zerega.chas.academy/u05-car-rental är redigerad till *home* sidan. Filen composer.json inkluderar den kod för att *autolader* kan fungera och anropningen av varje klass blir enklare.

Varje sidas *view* har varit skapad med hjälp av Twig så att det blir tydligare att skriva och läsa html koden, med hänsyn till för att få data från databasen det behövs en inte så tydlig php kod. Twig gör alt lättare. På *Customers* sida, kan man se alla personer som finns i databasen. Man kan redigera en person, radera den eller lägga till en ny person i databasen. *Cars* sidan visar alla bilar som finns i databasen. Här kan man också redigera, radera eller lägga till en ny bil i databasen. *Check out* sidan tillåter att hyra en bil och lägga till den aktuell tid i *history* tabellen i databasen.  *Check in* sidan tillåter att checka-in en bil och lägga till den i *history* tabellen i databasen. *History* visar historiken av alla uthyrda bilar och räckningen av totalkostnaden.

![](https://user-images.githubusercontent.com/42303378/73076970-876d8a00-3ebf-11ea-9bce-d4833f4b4b8a.JPG)
![](https://user-images.githubusercontent.com/42303378/73076984-89cfe400-3ebf-11ea-80e8-0275419bc8be.JPG)
![](https://user-images.githubusercontent.com/42303378/73076989-8b99a780-3ebf-11ea-8ac2-45424f6d41a1.JPG)
![](https://user-images.githubusercontent.com/42303378/73076992-8d636b00-3ebf-11ea-8445-1fdc01e586e8.JPG)
![](https://user-images.githubusercontent.com/42303378/73076996-8f2d2e80-3ebf-11ea-9697-dee5443134fa.JPG)

När en sida hämtar data från databasen, routern anropas metoderna från modellen. Till exempel, för att hämta alla personer som finns i tabellen *customers* i databasen, vid sidan laddning anropas routern metoden *getAllCustomers()* som har en *query* som tar alla personen i tabellen. Denna information sparats i en *Array* som kan sen användas i en *view* och kan visas på en sida.  Model.php är den endast filen som kan ansluta till databasen.

Här är de *queries* använts för att skapa alla tabeller i databasen: 

CREATE TABLE customers (
    person_number varchar(20) NOT NULL PRIMARY KEY,
    name varchar(256) NOT NULL,
    adress varchar(256) NOT NULL,
    postal_code int(5) NOT NULL,
    phone varchar(20) NOT NULL
);

CREATE TABLE cars (
    register_number varchar(10) NOT NULL PRIMARY KEY,
    make varchar(256) NOT NULL,
    color varchar(256) NOT NULL,
    year int(4) NOT NULL,
    price float(10,2) NOT NULL
);

CREATE TABLE history (
    id int(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    register_number varchar(10) NOT NULL,
    person_number varchar(20) NOT NULL,
    FOREIGN KEY (register_number) REFERENCES cars (register_number) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (person_number) REFERENCES customers (person_number) ON UPDATE CASCADE ON DELETE CASCADE,
    checked_in datetime,
    checked_out datetime
);

CREATE TABLE makes (
    id int(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    make varchar(20) NOT NULL
);

CREATE TABLE colors (
    id int(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    color varchar(20) NOT NULL
);


