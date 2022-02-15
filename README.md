### Uruchamianie projektu
Pobierz lub sklonuj repozytorium na swój komputer, na przykład przy użyciu
polecenia `git clone https://github.com/GlobeGroupSA/recruitment-task.git`.
Następnie, korzystając z PHP8 i Composera, zainstaluj zależności komendą
`composer install`. Skopiuj plik .env do pliku .env.local i uzupełnij plik
.env.local o dane swojej bazy danych (pod kluczem DATABASE_URL).

Po skonfigurowaniu aplikacji w ten sposób możesz uruchomić ją poleceniem
`php -S 127.0.0.1:8000 -t public`. Aplikacja będzie wtedy dostępna pod adresem
127.0.0.1, na porcie 8000.

Należy ustawić `MAILER_DSN` w pliku App\.env na poprawny
```dotenv
 MAILER_DSN=gmail://user:password@default
```
Oraz w `App/src/Service/MailerService.php`  `->from('user@something.com')`
```php 
->from('user@something.com')
```

Dokumentacja Encji Message

GET /messages
```json
{
  "total_count": 1,
  "page": 1,
  "page_count": 1,
  "items": [
    {
      "id": 1,
      "title": "Awesome Title",
      "content": "Very interesting message content",
      "created_at": "2022-02-15T10:50:53+01:00"
    }
  ]
}
```

POST /messages

```json
{
  "title": "New message",
  "content": "Content for new message"
}
```

resultat:

```json
{
  "id": 2,
  "title": "New message",
  "content": "Content for new message",
  "created_at": "2022-02-15T16:53:50+01:00"
}
```