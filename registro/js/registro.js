     var x;
     x = $(document);
     x.ready(inicializar);

     function inicializar() {
         var x = $("#nombre");
         x.focus(enfocar);
         x.blur(desenfocar);
         var x = $("#apellidoPat");
         x.focus(enfocar);
         x.blur(desenfocar);
         var x = $("#apellidoMat");
         x.focus(enfocar);
         x.blur(desenfocar);
         var x = $("#correo");
         x.focus(enfocar);
         x.blur(desenfocar);
         var x = $("#procedencia");
         x.focus(enfocar);
         x.blur(desenfocar);
     }

     function enfocar() {
         var x;
         x = $(this);
         x.attr("value", "");
     }

     function desenfocar() {
         var x;
         x = $(this);
         if (x.empty() || x.val(null)) {
             x.attr("value", "Campo obligatorio");
             x.addClass("CampoObligatorio");
         }

     }

