<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Solucion

Primero que disponemos de pocos request entonces necesitamos adquirir la mayor data posible.

Estoy guardando la info en campos Json que son soportador por mysql. Debido a que cumple bien con lo pedido por los endpoints.

He creado un provider en el cual me registra junto con el facade Football, el cual trae mis metodos para obtener de la api de football data, este mismo trae la implementacion de Guzzle, el cual se esta usando para acceder a la api de football data.

He creado los diferente endpoints para lo que se requiere:

Primer endpoint: /competitions Aqui adquiero los registros que estan en mi bd de competiciones.

Segundo endpoint: /competitions/{id} de Competiciones, si es que no existe en bd la competicion llamo al endpoint de football data y envio esos datos. Si es que existe envio lo de mi bd. Aqui hago una llamada adicional a los equipos de esta competicion para asi registrarlos y no consumir un request en football data.

Tercer endpoint: /team Muestro todos los teams almacenados actualmente.

Cuarto: /team/{id} Si es que no existe en bd llamo al endpoint. y si es que si existe mando de mi bd. De igual forma este endpoint d footbal data me trae squad y aprovecho con el request llenar los jugadores.

Quinto : /players muestro todo lo guardado en bd basado en el endpoint de teams.
