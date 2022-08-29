# frontend-challenge

## Requerimientos:

* Docker
* Docker compose

## Despliegue:

1) Clonar repositorio

2) Iniciar bash dentro de repositorio y luego ejecutar:

### `docker-compose build`

### `docker-compose up`

3) Iniciar bash a parte y ejecutar seeds:

### docker-compose exec app php artisan db:seed --class=owners

### docker-compose exec app php artisan db:seed --class=services

### docker-compose exec app php artisan db:seed --class=boardings_types

Ingresar a [http://localhost](http://localhost)