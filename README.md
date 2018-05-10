# Tresenraya PHP + REACT

Este juego esta dividido en el backend realizado en php y un cliente para el frontend hecho con react.js.

## FOLDERS

"api" => aqui se encuentran los endpoint que permiten recibir transacciones AJAX.
"model" => aqui se encuentra un modelo de muestra
"objects" => aqui estan todos los objetos del juego (player, game, board (tablero), score).
"static" => carpeta con los recursos usados en el Front.

### Prerequisites

a web server like apache2, php and some sql server.

### Installing

Debes editar el archivo config.php para agregar los valores respectivos a tu configuracion de base de datos de tu sistema.

private $DB_host = "localhost"; # Este tambien debes cambiarlo por el nombre del host de tu DB.
private $DB_user = "XXXXX";
private $DB_pass = "XXXXX";
private $DB_name = "XXXXX";

Cambiar estos valores "XXXXX" por sus respectivos y luego importar el dump.sql con tu gestor favorito para empezar a jugar partidas locales desde localhost al correr el servidor.

Al abrir el juego tendras la pantalla inicial con el boton "NUEVO JUEGO" al hacer click alli podras crear los jugadores participantes y asignarles una marca favorita ("O" o "X") podran jugar de manera emocionante mientras el servidor calcula luego de cada jugada quien puede ganar la partida al lograr las 3 marcas seguidas ya sean horizontal, vertical o diagonal.

ONLINE CLIENT AT: http://transporte2016.16mb.com/

## Author

* **Manuel Perera** - *Initial work* - [manuelpereiralds](https://github.com/ManuelPereira2016)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
