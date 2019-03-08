# csv-mail

## symfony 2.8

#### HOW TO... Step by step...

---

##### Instalacja symfony:
###### $ php symfony new csv-mail 2.8.3

##### konfiguracja połączenia:
* ###### --->root\app\config\parameters.yml

##### Utworzenie bazy:
* ###### $ php app/console doctrine:database:create --env=dev

##### Tworzenie Encji
* ###### $ php app/console doctrine:generate:entity
 

##### Aktualizacja schematu bazy
*  ###### $ php app/console doctrine:schema:update --force

##### Tworzenie testowej komendy konsolowej
* ###### --->root\src\AppBundle\Command\DataImportCommand.php

##### Sprawdzanie czy jest zainstlowany league/CSV reader 
* ###### $ composer show -i league/csv
###### jeśli nie instalujemy
* ###### $ composer require league/csv:^8.0

##### Edycja komendy konsolowej
* ###### --->root\src\AppBundle\Command\DataImportCommand.php

---
Jak się bawić...
---

##### Gdzie umieścić plik?
 * ###### root\src\AppBundle\Data (wygenerowane przeze mnie pliki umieściłem w ./sample/)
 
##### Jak odpalić program?
* ######  $ php app/console import nazwa_pliku.csv

##### Co to da?

* ###### w lokalizacji root\src\AppBundle\Data utworzą się trzy pliki:
    * ###### csv z poprawnymi adresami mail
    * ###### csv z nieprawidłowymi adresami mail
    * ###### txt z podsumowaniem
    
* ###### Do bazy danych zostaną zapisane poprawde adresy mailowe (tylko w przypadku jeśli podany mail nie jest jeszcze zapisany w tabeli)

* ###### w konsoli zostaną wypisane stosowne informacje o zapisie/istnieniu maila w bazie

##  ENJOY!!

<a href="http://www.wtfpl.net/">
    <img src="http://www.wtfpl.net/wp-content/uploads/2012/12/wtfpl-badge-4.png" width="80" height="15" alt="WTFPL" />
</a>

###### © 2019 WTFPL 
   
       
