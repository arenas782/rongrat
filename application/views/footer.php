      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, Desarrollado por N&A Technology
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>  
  
  <script src="<?=base_url('assets/js/core/jquery.min.js');?>"></script>  
  <script src="<?=base_url('assets/js/core/bootstrap.min.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/moment.min.js');?>"></script>
  <script src="<?=base_url('assets/js/plugins/bootstrap-datetimepicker.js');?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

  <script src="<?=base_url('assets/js/paper-dashboard.min790f.js?v=2.0.1');?>" type="text/javascript"></script>    
  <script src="<?=base_url('assets/demo/demo.js');?>" type="text/javascript"></script>    

  <script src="https://code.highcharts.com/highcharts.js"></script>


    <script>

        $(document).ready(function() {  


          $('#desdeinput').datetimepicker();
        $('#hastainput').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#desdeinput").on("dp.change", function (e) {
          console.log(e.date);
            $('#hastainput').data("DateTimePicker").minDate(e.date);
        });
        $("#hastainput").on("dp.change", function (e) {
            $('#desdeinput').data("DateTimePicker").maxDate(e.date);
        });
        $('.datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY'  });

          $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY HH:mm:ss',  
            
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }
      });

          $("#cantidad").on("keypress keyup blur",function (event) {
            
            $(this).val($(this).val().replace(/[^0-9\.]/g,''));            
            $('#total').val('');
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();                
            }

            var monto=$('#monto').val();
            var total=$('#total');
            var cantidad=$('#cantidad');
            var stock_actual=$('#stock_actual');
            var stock_restante=$('#stock_restante');
            var tipo_operacion=$('#tipo_operacion').val();

            
            switch (tipo_operacion){
                case 'e':
                  var aux=parseFloat(cantidad.val())+parseFloat(stock_actual.val());
                  stock_restante.val(aux);            
                break;
              case 's':
                var aux=parseFloat(stock_actual.val())-parseFloat(cantidad.val());
                if  (aux<0){
                  swal.fire(
                    'Atención',
                    'No puede poner una cantidad de salida mayor al stock de almacén',
                    'error'
                    );                  
                    stock_restante.val("");
                    cantidad.val("");
                    total.val("");
                } 
                else{
                  stock_restante.val(aux);
                }             
                break;
            }
            var aux=monto*$(this).val();
            total.val(aux).trigger('input');
            

        });


           $('#datatable').DataTable({
            language: {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
            }
          });


           $('#producto').select2({
            placeholder: 'Seleccione un producto'
           });

           $('#tipo_operacion').select2({
            placeholder: 'Seleccione tipo de operación',
            
           });
        
           $( "#producto" ).change(function() {


            $('#tipo_operacion').val('').trigger('change');
            $('#total').val('');
            $('#stock_actual').val('');
            $('#stock_restante').val('');
          });
          $( "#tipo_operacion" ).change(function() {
            
            $('#total').val('');
            $('#cantidad').val('');
            $('#stock_restante').val('');
            
          });


          $( "#tipo_operacion" ).change(function() {
            var tipo_op=$(this).val();
            var total=$('#total');
            if(tipo_op!=""){
              var id=$('#producto').val();
              var monto=$('#monto');
              var valor=$('#valor');
              var url="<?=base_url('inventario/info_producto/');?>"+id;
              $.ajax({                   
                    type:"GET",
                    url:url,
                    success: function(result){                        
                        var myObj = JSON.parse(result);                                                                            
                        $('#stock_actual').val(myObj.stock);
                        switch (tipo_op){
                            case 'e':
                              monto.val(myObj.costo); 
                              valor.val(myObj.valor);                           
                              break;
                            case 's':
                              monto.val(myObj.precio);
                              valor.val(myObj.valor);                           
                              break;
                        }
                        
                    }
            });                        
            }
            
          });
        });
    </script>
</body>

</html>
