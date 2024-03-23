#!/bin/bash

# Detener el servicio de MariaDB
service mysql stop

# Continuar con el proceso de detención del contenedor
exec "$@"
