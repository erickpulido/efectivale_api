<p align="center" style="background-color:red; padding: 20px;"><a href="https://www.efectivale.com.mx" target="_blank"><img src="https://www.efectivale.com.mx/static/website/img/home/logo.png" width="400" alt="Efectivale Logo"></a></p>

## Requisitos de instalación

- Ubuntu 22
- PHP 8.2
- Apache 2.4
- MySQL 8
- Usuario con privilegios de superusuario

## Instalación

### Virtual Host

Crear archivo de configuración

```console
sudo nano /etc/apache2/sites-available/efectivale-api.conf
```

En el editor pegar lo siguiente y guardar los cambios:

~~~
<VirtualHost *:80>
    ServerName efectivale-api.local
    DocumentRoot /var/www/efectivale_api/public
    <Directory /var/www/efectivale_api/public>
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
~~~

Habilitar sitio

```console
sudo a2ensite efectivale-api
```

Recargar apache

```
sudo systemctl restart apache2
```
### Host

Abrir archivo hosts

```
sudo nano /etc/hosts
```

Añadir la siguiente línea y guardar los cambios

```
127.0.0.1 efectivale-api.local
```
### Instalación del proyecto

Cambiar de directorio

```
cd /var/www
```

Clonado de repositorio

```
sudo git clone https://github.com/erickpulido/efectivale_api.git
```



Permisos de carpetas
```
sudo chmod -R 777 efectivale_api
```

Instalación de dependencias

```
cd efectivale_api
sudo mkdir vendor
composer install
```

Copiar .env.example

```
cp /var/www/efectivale_api/.env.example /var/www/efectivale_api/.env
```

En el archivo .env recién creado actualizar o añadir las siguientes constantes: 

```
APP_URL=http://efectivale-api.local
FRONTEND_URL=http://efectivale-api.local
SANCTUM_STATEFUL_DOMAINS=efectivale-api.local

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=efectivale_api
DB_USERNAME=<TU_USUARIO>
DB_PASSWORD=<TU_PASSWORD>

SESSION_DOMAIN=.efectivale-api.local

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=9d77700ccce403
MAIL_PASSWORD=4b6a1060b0f57c
MAIL_FROM_ADDRESS="not_responding@efectivale.admin.com"

```
Generación de application key
```
php artisan key:generate
```

Ejecutar las migraciones para crear la base de datos, las tablas y precargar los datos del sistema.

Las migraciones incluyen un usuario administrador con las siguientes credenciales:

email: christian.sanchez@corpay.com<br>
password: pass

```
php artisan migrate
```
```
php artisan db:seed
```
```
php artisan db:seed --seeder=StatusSeeder
```
```
php artisan db:seed --seeder=RoleSeeder
```

Ingresar al sistema con la URL:

```
http://efectivale-api.local
```