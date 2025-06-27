# String_oasis
 eshop
 
 wtech project github xdieska + xlaticova

zdroje: Bootstrap Dokumentácia https://getbootstrap.com/docs/5.3/getting-started/introduction/
        W3schools https://www.w3schools.com/html
        W3schools https://www.w3schools.com/css/default.asp
        W3schools https://www.w3schools.com/js/default.asp

fotky: “Designed by Freepik” https://www.freepik.com
ikony: https://fontawesome.com

fotky z figmy: ->project->Wireframe

UML diagram: ->project->diagram_StringOasis.png

Používateľská príručka: 
1.	Stiahnuť PHPStorm alebo iné prostredie, ktoré podporuje php
2.	Stiahnuť PHP + composer, nastaviť php.ini
3.	Stiahnuť node.js na https://nodejs.org kvôli vite
4.	Pullnuť z githubu všetky súbory do svojho zariadenia
5.	V príkazovom riadku cd project, composer install
6.	V PgAdmin vytvoriť databázu s názvom a heslom, ktorý je v .env
7.	Skopírovať celý priečinok public/images do storage/app/public - vznikne priečinok  storage/app/public/images s fotkami
8.	V storage/app/public/ vytvoriť prázdny priečinok trash
9.	php artisan migrate:fresh –seed
10.	npm install, npm run build
11.	php artisan storage:link
12.	php artisan key:generate
13.	php artisan serve



[✔️] zobrazenie prehľadu všetkých produktov z vybratej kategórie používateľom

[✔️] základné filtrovanie (aspoň podľa 3 atribútov, napr. rozsah cena od-do, značka, farba)

[✔️] stránkovanie

[✔️] preusporiadanie produktov (napr. podľa ceny vzostupne/zostupne)

[✔️] zobrazenie konkrétneho produktu - detail produktu

[✔️] pridanie produktu do košíka (ľubovolné množstvo)

[✔️] plnotextové vyhľadávanie nad katalógom produktov

[✔️] zobrazenie nákupného košíka

[✔️] zmena množstva pre daný produkt

[✔️] odobratie produktu

[✔️] výber dopravy

[✔️] výber platby

[✔️] zadanie dodacích údajov s validáciou

[✔️] dokončenie objednávky

[✔️] umožnenie nákupu bez prihlásenia

[✔️] prenositeľnosť nákupného košíka v prípade prihláseného používateľa

[✔️] registrácia používateľa/zákazníka

[✔️] prihlásenie používateľa/zákazníka

[✔️] odhlásenie zákazníka
