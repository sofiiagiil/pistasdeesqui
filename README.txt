⛷️ CRUD Gestión de Alquileres: Estación de Esquí
Aplicación web desarrollada en PHP puro y MySQL para la gestión de alquileres de material en una estación de esquí. Este proyecto forma parte del trabajo práctico evaluable del módulo de Bases de Datos.

📝 Descripción
El sistema permite realizar operaciones CRUD (Create, Read, Update, Delete) sobre una relación de "muchos a muchos". Específicamente, gestiona la tabla alquiler, que actúa como puente entre las entidades esquiador y material.

El listado principal (index.php) ejecuta un script que muestra una consulta con las tres tablas enlazadas (JOIN), permitiendo visualizar de forma clara:

ID del alquiler y fechas (inicio/fin).

Nombre y apellidos del esquiador.

Tipo y talla del material alquilado.

🛠️ Requisitos
Servidor web con soporte PHP (ej. XAMPP).

Base de datos MySQL.

El script de creación y poblado de la base de datos se encuentra adjunto en el repositorio (archivo BASEDEDATOS.SQL).

👤 Autor
Sofia Gil Del Rosario | 1º ASIR