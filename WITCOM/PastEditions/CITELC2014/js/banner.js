// JavaScript Document
//creo array de imágenes 
//array_imagen = new Array(4) 
// array_imagen[0] = new Image(725,118) 
// array_imagen[0].src = "images/img01.jpg" 
array_imagen = new Image(3231,709) 
array_imagen.src = "images/banner1.png" 
// array_imagen[1] = new Image(725,118) 
// array_imagen[1].src = "images/img01a.jpg" 
// array_imagen[2] = new Image(725,118) 
// array_imagen[2].src = "images/img01b.jpg" 
// array_imagen[3] = new Image(725,118) 
// array_imagen[3].src = "images/img01c.jpg" 
// array_imagen[3] = new Image(725,118) 
// array_imagen[3].src = "images/img01d.jpg" 
// array_imagen[3] = new Image(725,118) 
// array_imagen[3].src = "images/img01e.jpg" 

//variable para llevar la cuenta de la imagen siguiente 
// contador = 0 

//función para rotar el banner 
function alternar_banner(){ 
   	// window.document["banner_images"].src = array_imagen[contador].src 
	window.document["banner_images"].src = array_imagen.src 
   	// contador ++ 
   	// contador = contador % array_imagen.length 
   	// setTimeout("alternar_banner()",5000) 
} 