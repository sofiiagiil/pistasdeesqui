# Gestión de Alquileres - Estación de Esquí

Proyecto de CRUD desarrollado en PHP nativo con base de datos MySQL. Este sistema permite la gestión integral de alquileres, facilitando el control de esquiadores, materiales y sus relaciones.

## Características
- **Listado dinámico (Read):** Visualización de alquileres mediante consultas SQL optimizadas (JOINs).
- **Gestión de registros (Create/Update):** Formularios intuitivos con selección de datos mediante menús desplegables.
- **Integridad de datos:** Cumplimiento de reglas de borrado y actualización en cascada.
- **Estructura N:M:** Gestión eficiente de la tabla pivote "Alquiler" entre esquiadores y materiales.

## Requisitos
- Servidor web con PHP (ej. XAMPP, WAMP o hosting compartido).
- Base de datos MySQL.

## Instrucciones de Instalación
1. **Base de Datos:**
   - Accede a tu gestor de base de datos (ej. phpMyAdmin).
   - Crea una nueva base de datos.
   - Importa el archivo `BASEDEDATOS.SQL` incluido en este repositorio.

2. **Configuración:**
   - Abre el archivo `config.php`.
   - Modifica las variables de conexión con los datos de tu servidor:
     $host = 'tu_servidor';
     $user = 'tu_usuario';
     $pass = 'tu_contraseña';
     $db = 'nombre_de_tu_base_de_datos';

3. **Despliegue:**
   - Copia todos los archivos `.php` a la carpeta raíz de tu servidor web (en XAMPP suele ser `htdocs`).
   - Abre tu navegador y accede a `index.php`.

## Autor
Sofia Gil Del Rosario - 1º ASIR