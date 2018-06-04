$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.

    console.log("##### init de Graph para Estadisticas de Robo #####");
    //Asigna eventos a formularios
    if ($('#demo-form').length) {
      $('#demo-form').on('submit', function(event){
        event.preventDefault();
        console.log("##### Peticion para Obtener Estadisticas ");
        peticionAjax($('#demo-form'));
        
      });
    }

    if ($('#mainb').length) {

      actualizarEstadisticas({'violencia':[],'sinViolencia':[],'noEspecificados':[],'ejex':[]})
    }



});

function peticionAjax(form){
	
	console.log("###################### Envia Peticion ###############");
      //if(msn != null)
      	//msn.html("<div id='msnClustering' class='alert-box alert radius' data-alert>Load ... <a onclick='cerrarMSNClustering()' class='close'>&times;</a></div>");


      $('#resultInversion').html("$ -");

      $.ajax({
        url : 'controller/getEstadisticasMensuales.php', // the endpoint
        type : "POST", // http method
        //data : { the_post : $('#post-form').val() }, // data sent with the post request
        data: form.serialize(),

        // handle a successful response
        success : function(json) {

          console.log("Respuesta de Peticion: ")
          
          console.log(json); // log the returned json to the console
          console.log("##########################################")

          if(json['consulta'] == 1){
            actualizarEstadisticas(json['data']);
          }
          


        },

        // handle a non-successful response
        error : function(xhr,errmsg,err) {

        	//if(msn != null)
        	//	msn.html("<div id='msnClustering' class='alert-box alert radius' data-alert>Intente Nuevamente<a onclick='cerrarMSNClustering()' class='close'>&times;</a></div>");
          
          console.log(xhr.status + ": " + xhr.responseText); // provide a bit more info about the error to the console
        }
      });
}
