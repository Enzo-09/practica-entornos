2) En el codigo del enunciado del ejercicio 2, podemos observar que hace referencia al id de cada elemento para ir modificandolos.
--En el primer selector, lo que hace es tomar los elementos cuyo id sea normal y luego:
Les agrega un tipo de letra distinto (arial, helvetica), dependiendo de cual acepte el navegador/sistema operativo.
Le cambia el tamaño de la letra, a 11 pixeles
Y con el bold, pone la letra en negrita.
--luego en el segundo selector, agarra la tabla con id destacado, y le cambia:
El estilo del borde(borde solido), el color del borde y el tamaño del borde (ancho de 2 pixeles)
--en el ultimo selector, al parrafo con el id distinto, le agrega un color al fondo y un color a la letra.
Dentro de las reglas hay una que no se cumple que es la unicidad del id debido a que las etiquetas con #destacado se le aplican estos estilos a dos etiquetas de distinto tipo <p> y <table>, y aunque funciona, esto viola el estandar HTML.