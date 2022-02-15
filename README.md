### Uruchamianie projektu
Pobierz lub sklonuj repozytorium na swój komputer, na przykład przy użyciu
polecenia `git clone https://github.com/GlobeGroupSA/recruitment-task.git`.
Następnie, korzystając z PHP8 i Composera, zainstaluj zależności komendą
`composer install`. Skopiuj plik .env do pliku .env.local i uzupełnij plik
.env.local o dane swojej bazy danych (pod kluczem DATABASE_URL).

Po skonfigurowaniu aplikacji w ten sposób możesz uruchomić ją poleceniem
`php -S 127.0.0.1:8000 -t public`. Aplikacja będzie wtedy dostępna pod adresem
127.0.0.1, na porcie 8000.

Żądania do aplikacji wysyłać możesz przy pomocy aplikacji takich jak Postman,
czy Insomnia. Dokumentacja API jest dostępna [pod tym adresem](https://documenter.getpostman.com/view/7692016/UVXokDCj).

### Zadanie
Zaprojektuj i utwórz nową encję o nazwie Message, która reprezentuje wiadomości
wysłane do administracji przez formularz kontaktowy. Następnie utwórz kontroler,
który pozwala na utworzenie nowej wiadomości oraz wyświetlenie listy wszystkich
wiadomości.

Utworzenie wiadomości powinno skutkować wysłaniem maila z systemu na adres
administratora (dowolny, jaki założysz).

Nie przesyłaj rozwiązania w formie pull requestu - wgraj je na własne repozytorium
lub prześlij je jako `.zip`.