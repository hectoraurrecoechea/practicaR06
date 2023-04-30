USE geografia;

SELECT nombre from localidades;
SELECT poblacion from localidades;
SELECT nombre from localidades;
SELECT * from localidades;
SELECT * from provincias;

SELECT p.n_provincia,p.nombre as "nombre_p",id_localidad,l.nombre as "nombre_l",poblacion FROM provincias p
join localidades l using(n_provincia) where l.nombre like 'A%';

