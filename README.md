# Bravi Test PHP

## Test 1

Foi criado os teste utilizando o PHPUnit, e feito a implementação para que os testes passe.

Executar
```
cd test1
composer install
./vendor/bin/phpunit
```

## Test 2

Criado API REST com framework Laravel, possuindo os seguintes recursos:

|   |   |   |
|---|---|---|
| GET | /person | recuperar todos os registros |
| GET | /person/:id | recuperar registro específico |
| POST | /person | criar novo registro |
| PUT | /person/:id | atualizar registro existente |
| DELETE | /person/:id | remover registro existente |

Executar
```
cd test2
composer install
php artisan serve --port 8000
```

# Test 3

Criado aplicação front-end para consumir a API criado no test 2

Executar
```
cd test3
yarn
yarn serve
```