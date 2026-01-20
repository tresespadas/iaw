# Apuntes sobre el cuestionario

## ¿Cómo se instala Wordpress?
Antes de instalar Wordpress son necesarios unos paquetes:
- Servidor HTTP Apache2
- MariaDB o MySQL
- PHP

Una vez instalada la paquetería necesaria para Wordpress, la descarga del mismo se puede realizar a través de su página web en https://wordpress.org/latest. Esto descagará un comprimido tar.gz. Dicho comprimido será descomprimido en la ruta /var/www/wordpress/

El siguiente paso corresponde a la creación de una base de datos para nuestro sitio web. Para ello, empleando MariaDB o MySQL se crearía dicha base de datos, un usuario con una contraseña y privilegios totales sobre dicha base de datos.

Como preferencia personal, utilizo la herramienta de consola wp-cli para el resto de la instalación. Es decir, la configuración de wp-config (wp config create), la propia instalación de wordpress (wp core install), y actualizar las urls del wordpress mediante wp option.

A modo de resumen:
```
wp config create
```
Crea /var/www/wordpress/wp-config.php con las credenciales de la base de datos
```
wp core install
```
Instala Wordpress en la base de datos usando ese archivo
```
wp option update
```
Modifica los valores en la tabla wp-options de la DB, leyendo las credenciales desde wp-config.wp

Finalmente, tan sólo quedaría estabalecer un VirtualHost para apache2 y habilitarlo.
