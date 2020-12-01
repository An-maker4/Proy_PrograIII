USE mydb;

insert into mydb.persona (Usuario,Contrasena,Nombre,Apellido1,Apellido2,Correo,Fecha_Nacimiento,Direccion,Telefono1,Telefono2,Tipo_Usuario,Sexo)
			Value ("EliCL","123456","Elizabeth","Alvarado","Reyes","Eli2020@gmail.com","2000-03-03","Carmen,San Jose,San Jose","12345678","87654321",1,1);
insert into mydb.persona (Usuario,Contrasena,Nombre,Apellido1,Apellido2,Correo,Fecha_Nacimiento,Direccion,Telefono1,Telefono2,Tipo_Usuario,Sexo)
			Value ("AleAD","234567","Alejandro","Ramos","Bosa","Ale2020@gmail.com","1991-06-06","Catedral,San Jose,San Jose","88998899","66776677",2,2);

insert into mydb.tipo_avion (idTipo_Avion, Fecha, Modelo, Marca, Fila, Asiento_Fila)
			value (10001,1997,"AV-01","PILOT",3,3); 
insert into mydb.tipo_avion (idTipo_Avion, Fecha, Modelo, Marca, Fila, Asiento_Fila)
			value (10002,2010,"AV-02","PILOT",3,3); 
            
insert into mydb.ruta (idRuta,Trayecto,Duracion,Precio)
			Value (23,"Nueva York - San Jose", "01:00:00",110);
insert into mydb.ruta (idRuta,Trayecto,Duracion,Precio)
			Value (24,"Toronto - San Jose", "04:20:00",120);
insert into mydb.ruta (idRuta,Trayecto,Duracion,Precio)
			Value (25,"Santa Marta - San Jose", "03:25:00",220);
insert into mydb.ruta (idRuta,Trayecto,Duracion,Precio)
			Value (26,"Santiago - San Jose", "04:25:00",230);
insert into mydb.ruta (idRuta,Trayecto,Duracion,Precio)
			Value (27,"Venecia - San Jose", "04:00:00",330);
insert into mydb.ruta (idRuta,Trayecto,Duracion,Precio)
			Value (28,"Paris - San Jose", "03:30:00",340);
insert into mydb.ruta (idRuta,Trayecto,Duracion,Precio)
			Value (29,"Singapore - San Jose", "05:40:00",440);

insert into mydb.vuelo (id_Vuelo,Fecha_Hora,Ruta_idRuta,tipo_avion_idTipo_Aviones)
			Value (230,"2020-12-22 04:35:00",23,10001);
insert into mydb.vuelo (id_Vuelo,Fecha_Hora,Ruta_idRuta,tipo_avion_idTipo_Aviones)
			Value (240,"2021-03-01 01:00:00",24,10002);
insert into mydb.vuelo (id_Vuelo,Fecha_Hora,Ruta_idRuta,tipo_avion_idTipo_Aviones)
			Value (250,"2021-01-24 15:30:00",25,10002);
insert into mydb.vuelo (id_Vuelo,Fecha_Hora,Ruta_idRuta,tipo_avion_idTipo_Aviones)
			Value (260,"2021-02-15 17:25:00",26,10001);
insert into mydb.vuelo (id_Vuelo,Fecha_Hora,Ruta_idRuta,tipo_avion_idTipo_Aviones)
			Value (270,"2021-02-24 23:05:00",27,10002);
insert into mydb.vuelo (id_Vuelo,Fecha_Hora,Ruta_idRuta,tipo_avion_idTipo_Aviones)
			Value (280,"2021-03-14 14:17:00",28,10001);
insert into mydb.vuelo (id_Vuelo,Fecha_Hora,Ruta_idRuta,tipo_avion_idTipo_Aviones)
			Value (290,"2021-01-05 17:19:00",29,10001);

insert into mydb.reservacion(Numero_Fila,Numero_Asiento,Vuelo_id_Vuelo,Fecha_Reserva,Persona_Usuario1)
			value(7,"B",270,curdate(),"EliCL");
insert into mydb.reservacion(Numero_Fila,Numero_Asiento,Vuelo_id_Vuelo,Fecha_Reserva,Persona_Usuario1)
			value(8,"C",250,curdate(),"EliCL");

select * from mydb.reservacion;