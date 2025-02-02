# WDPAI

Aplikacja ma za zadanie tworzenia galerii zdjęć, do których mogą dołączać osoby za pomocą kodu galerii. <br>
którm dzielą się za pośrednictwem platform zewnętrznych.

Aplikacja ma możliwość logowania, rejestracji, tworzenia galerii, dołączania galerii oraz dodawania zdjęć do nich.

Aby stworzyć lub dołączyć do galerii należy wybrać przycisk 'Add' z głównego widoku.<br>
Aby zobaczyć kod zaproszeniowy należy nacisnąć przycisk 'Code' z widoku galerii.<br>
Aby ustawić zdjęcie jako główne zdjęcie galerii pokazujące się na ekranie głównym użytkownika, należy
Wybrać zdjęcie, a następnie wybrać przycisk pod zdjęciem podczas widoku wybranego zdjęcia.

Do aplikacji jest dołączony plik 'ProjektAplikacji' ze zdjęciami pierwotnego projektu aplikacji utworzonego na początku zajęć.

Aplikacja będzie do momentu otrzymania oceny hostowana za pomocom Azure<br>
Link do strony: http://20.206.250.86:8080/<br>
Link do pgadmin: http://20.206.250.86:5050/

Za pomocą pgadmin można otrzymać wgląd do bazy danych<br>
Aby go otrzymać należy się zalogować<br>
email: admin@admin.pl<br>
hasło: admin<br>

Następnie wybrać bazę danych z listy o nazwie 'wdpai'

Jeśli poprosi o hasło należy podać: docker

W przypadku uruchomienia aplikacji na localhost:

Komenda do uruchomienia z poziomu katalogu aplikacji:

docker compose up

Utworzy to cztery kontenery odpowiedzialne za:

hosting - nginx<br>
obsługę requestów - php<br>
baza danych - pgsql<br>
dostęp administratora do bazy danych - pgadmin

Po uruchominiu programu za pierwszym razem należy załadować bazę danych przez pgadmin

Ten sam email i hasło co wcześniej<br>
Następnie trzeba wybrać: 'Add new server'<br>
name: dowolne<br>
Następnie w connections:<br>
host name: db<br>
Username: docker<br>
Hasło: docker<br>
Zatwierdzić, następnie w tools > storage manager<br>
Dodać plik sqldump znajdujący się w głównym katalogu<br>
Następnie wybrać bazę danych db i  wybrać tools > restore<br>
Wybrać plik sqldump i potwierdzić restore.

Po załadowaniu bazy będzie możliwe korzystać z aplikacji.

Istnieją przygotowani użytkownicy:<br>
Username: docker<br>
Hasło: docker<br>
Username: docker1<br>
Hasło: docker<br>
Ze stworzoną galerią.
