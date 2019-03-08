# To do...

* #### Sparsować plik XML z załącznika i dodać dane do bazy danych.  Może być kilka produktów.

* #### Uwzględnić opcje pobierania zdjęć.

* #### Rozwiązać zadania w postaci skryptu/skryptów PHP wraz z bazą danych.
* #### Baza danych dowolna.

# DONE :-)

####

* #### plik xmlParser pobiera dane z xml i zapisuje dane do bazy danych (jeśli rekord o danym prod_symbol nie istnieje - ustawione UNIQUE w bazie).

* #### Pobieranie zdjęć na dysk umożliwia plik imagesParser - zaimplementowany w xmlParser(jego funkcjonalność zakomentowana, pobrane zdjęcia z cterech pierwszych produktów w `.images/prod_symbol/date`). W bazie zapisane jedynie adresy , z których zostały pobrane(w formacie JSON).

* #### Kwarendy, którymi utworzyłem bazę oraz tabele w pliku `queries.md`.

* #### Konfiguracja bazy danych w `database/config.php`.

* #### załączam bazę danych w pliku `withoutPicture.sql`.