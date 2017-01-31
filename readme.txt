

//register page
 Jeżeli taki email jest, to przekierować znowu do
strony tworzenia użytkownika i wyświetlić komunikat o zajętym adresie email.

OK




//tweet ma id


// ALA MA KOTA = 1 , PARENT = 0
      KOT MA ALE = 2, PARENT = 1

   MICHAL RZADZI = 3, PARENT =0;
      TOMEK TEZ =4, PARENT 3;


//strona glowna

1. Nad nimi ma być widoczny formularz do stworzenia nowego wpisu.
2. Strona wyświetlająca wszystkie Tweety jakie znajdują się w systemie (od najnowszego do najstarszego). //SORD ORDER BY date - bez uwzgledniania parentow

//
//strona wyswietlajaca konkretnego tweeta
tweet.php?id=15
select * from tweets where ID = $_GET['id'];

Ta strona ma wyświetlać:
 post,
 //autora postu,
 //wszystkie komentarze do każdego z postów.  Formularz do tworzenia nowego komentarza
przypisanego do tego postu


//strona uzytkownika
//zalogowany jako Michal = (id = 2)

//id=1 -> TOMEK


user.php?id=1


//insert into MSG
sender=$_SESSION['ID']
recipment = $_GET['id']
DATE = NOW();

formularz z wysylka wiadomosci do danego uzytkownika
