<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Heinsolar</title>
  <meta content="Empresa dedicada a energia solar, instalación de paneles, cálculo y dimensionamiento de sistema solares" name="description">
  <meta content="paneles solares, generación solar, saltillo, monterrey, instalación de paneles, sustentabilidad" name="keywords">

  <?php include "inc/css.php" ?>
</head>

<body>
<?php include "inc/head.php" ?>
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center justify-content-center" style="height:75px">
    <div class="container" data-aos="fade-up">
    </div>
  </section><!-- End Hero -->
<main id="main">
    <section>
        <div class="container" data-aos="fade-up">
            <div class="row text-center mb-2">
                <h1>Cotiza tu sistema</h1>
                <h3>Llena la siguiente información par conocer el costo aproximado de tu sistema</h3>
            </div>  
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100" >
                        <div id="resultado">
                        <h3>Consulta tu cotización</h3>
                            <form id="busqueda">
                              <div class="mb-3">
                                <label for="" class="form-label">Email </label>
                                <input type="email" class="form-control" id="consulta_email" >
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">No cotización</label>
                                <input type="text" class="form-control" id="consulta_no_cot">
                              </div>
                              <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>
                        <div id="resultado2" class="d-none">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#Cot</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Paneles</th>
                                  <th scope="col">Total</th>
                                  <th scope="col">Acción</th>
                                </tr>
                              </thead>
                              <tbody id="cot_res">
                              </tbody>
                            </table>
                            
                        </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-lg-1 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
                <form id="form">
                    
                <div class="mb-2">
                    <h3>Datos cliente</h3>
                    <label for="nombre_cliente" class="form-label">Nombre </label>
                    <input class="form-control mb-1" id="d1" type="text" placeholder="Nombre de cliente" required>
                    <label for="nombre_cliente" class="form-label">Teléfono</label>
                    <input class="form-control mb-1" id="d2" type="text" placeholder="10 digitos" minlength="10" maxlength="10" required>
                    <label for="nombre_cliente" class="form-label">Correo</label>
                    <input class="form-control mb-1" id="d3" type="email" placeholder="ejemplo@hotmail.com" required>
                    <h3>Datos Recibo</h3>
                    <div id="radiohelp" class="form-text">Selecciona la frecuencia de pago de tu recibo</div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="mensual" id="form_r1" value="0" >
                            <label class="form-check-label" for="">
                                Mensual
                            </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="bimestral" id="form_r2" value="1" >
                            <label class="form-check-label" for="">
                                Bimestral
                            </label>
                        </div>
                        
                    </div>
                    <div class="mb-2 row" id="datos">
                        
                    </div>

                    <div class="mb-2" id="equipos">
                        <div>
                            <label class="form-label">Paneles</label>
                            <select class="form-select" aria-label="Paneles" id="panel" required>
                            <option value ="" selected>Potencia de panel solar</option>
                            <option value="370">370 W </option>
                            <option value="450">450 W</option>
                            <option value="540">540 W</option>
                            </select>

                            <label class="form-label">Tipo de Inversor</label>
                            <select class="form-select" aria-label="Tipo de inversor" id="inversor" required>
                            <option  value ="" selected>Inversor</option>
                            <option value="Microinversor">Microinversor </option>
                            <option value="Inversor Central">Inversor Central</option>
                            </select>
                        </div>
                       
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </form>
                </div>
            </div>

        </div>
    </section>
</main>

    <?php include "inc/foot.php" ?>
    <?php include "inc/script.php" ?>
    <script src="assets/js/jsPDF/jspdf.js"></script>
    <script type="text/javascript">
        var r1=$("#form_r1");
        var r2=$("#form_r2");
        r1.prop("checked",false)
        r2.prop("checked",false)
        r1.change(function(){
            if(r1.prop("checked")){
                r2.prop("checked",false)
            }
            else if(r2.prop("checked")){
                r1.prop("checked",false)
            }
            datos()
        })
        r2.change( function(){
            if(r2.prop("checked")){
                r1.prop("checked",false)
            }
            else if(r1.prop("checked")){
            r2.prop("checked",false)
            }
            datos()
        })

        function datos () { 
            if(r1.prop("checked")){
               var datos= $("#datos").empty();
               for (let i = 0; i < 12; i++) {
                   const e = '<div class="mb-1 col-6"><label class="form-label">Mes '+(i+1)+'</label><input type="text" oninput="sn(this)" class="form-control consumo"  placeholder="Energia en kW consumida" required></div>';
                   datos.append(e);
               }
            }
            else if(r2.prop("checked")){
                var datos= $("#datos").empty();
                for (let i = 0; i < 6; i++) {
                   const e = '<div class="mb-1 col-6"><label class="form-label">Bimestre '+(i+1)+'</label><input type="text" oninput="sn(this)" class="form-control consumo"  placeholder="Energia en kW consumida" required></div>';
                   datos.append(e);
               }  
            }
         }
        function sn(e){
            $(e).val($(e).val().replace(/[^0-9]/g, ''));
        } 

        let fd=new FormData();
       
        $("#form").submit(function(e){
            e.preventDefault();
            if(r1.prop("checked")||r2.prop("checked")){
               
                let total_consumo=0;

                for (let i = 0; i < $(".consumo").length; i++) {
                    const e = $(".consumo")[i];
                    //console.log(e)
                    total_consumo += parseFloat($(e).val())
                    
                }
                $("#resultado").empty()
                const fecha=Date.parse("today").toString("dd/MM/yyyy");
                const vencimiento  = Date.parse("today + 15 days").toString("dd/MM/yyyy")
                let panel=$("#panel").val();
                let inv=$("#inversor").val();
                let kw_dario=((total_consumo*1000)/365);
                let kw_panel=panel*5;
                let total_paneles=Math.ceil(kw_dario/kw_panel)
                let kw_d= (kw_dario/1000).toFixed(2)
                const nombre_c=$("#d1").val()
                const tel_c=$("#d2").val()
                const email_c=$("#d3").val()
                //alert(total_consumo);
                let potencia_instalada=total_paneles*panel;
                let total=0;
                if(potencia_instalada<=2160){
                    total=potencia_instalada*27.5;
                }else if(2160>potencia_instalada<=5400){
                    total=potencia_instalada*25.5;
                }else{
                    total=potencia_instalada*23.5;
                }
                let sub_total=total/1.16
                let iva =sub_total*.16
                const html0='Nombre de Cliente:'+nombre_c+'</br>'+'Teléfono de Cliente:'+tel_c+'</br>'+'Email de Cliente:'+email_c+'</br>';
                const html='Panel:'+panel+'W </br> Consumo diario: '+kw_d+'kW </br> Paneles: '+total_paneles+' paneles </br> Tipo de inversor: '+inv+'</br>'
                const html1='Sub total:'+sub_total+'</br>'+'IVA:'+iva+'</br>'+'Total:'+total+'</br>'
                const boton='<button onclick ="imprimir()" class="btn btn-primary">Imprimir</button>'
                //$("#resultado").append(html0)
                //$("#resultado").append(html)
                //$("#resultado").append(html1)
                fd.append("nombre_cliente",nombre_c)
                fd.append("tel_cliente",tel_c)
                fd.append("correo_cliente",email_c)
                fd.append("no_paneles",total_paneles)
                fd.append("inversor",inv)
                fd.append("potencia",panel)
                fd.append("total",total)
                fd.append("sub_total",sub_total)
                fd.append("iva",iva ),
                fd.append("fecha",fecha)
                fd.append("vencimiento",vencimiento)
                fd.append("consulta","datos_cot")

                const data2=new FormData()
                data2.append("consulta","no_c")
                let no_cot=$.ajax({
                    type: "POST",
                    url: "inc/conexion.php",
                    processData: false,
                    contentType: false,
                    async:false,
                    data:data2,                    
                    success: function (response) {
                      // console.log(response)
                        return (parseInt(response)).toString().padStart(4, '0')
                       //fd.append("no_cot",(response+1))
                    }
                });
                
                let no_cot1=(parseInt(no_cot.responseText)+1).toString().padStart(4, '0');
                //console.log(no_cot1)
                fd.append("no_cot", no_cot1);
                $.ajax({
                    type: "POST",
                    url: "cotizacion.php",
                    processData: false,
                    contentType: false,
                    data:fd,                    
                    success: function (response) {
                       // console.log(response)
                        $("#resultado").append(response)
                        
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "inc/conexion.php",
                    processData: false,
                    contentType: false,
                    data:fd,                    
                    success: function (response) {
                      // console.log(response)                        
                    }
                });
                $("#resultado2").append(boton)
                $("#form").trigger("reset")
                $("#datos").empty();

            }else{
                alert("Selecciona periodo de recibo")
            }
        });

        function imprimir(){
                var mywindow = window.open('', 'PRINT');
                mywindow.document.write(document.getElementById("resultado").innerHTML);
                 mywindow.document.close(); // necessary for IE >= 10
                 mywindow.focus(); // necessary for IE >= 10*/

                 mywindow.print();
                 mywindow.close();

                    return true;
            }

        $("#busqueda").submit(function(e){
            e.preventDefault();
            const fd1= new FormData();
            fd1.append("consulta","cot");
            fd1.append("no_cot",$("#consulta_no_cot").val());
            fd1.append("mail",$("#consulta_email").val());
            let cotizaciones= $.ajax({
                type: "POST",
                url: "inc/conexion.php",
                processData: false,
                contentType: false,
                data:fd1,           
                success: function (response) {
                    cargardatos(JSON.parse(response));          
                }
            });
            //console.log(cotizaciones);
        });

        function cargardatos(data){
            //console.log(data)
            if (data.length>0){
                for (let i = 0; i < data.length; i++) {
                const el = data[i];
                const a= el.no_cot.toString().padStart(4, '0')
                const b= el.nombre_cliente
                const c= el.no_paneles
                const d= currency( el.total)
                const e= '<button class="btn btn-primary" onclick="mostrar('+el.id+',this)">Mostrar</button>';
                const html='<tr><th scope="row">'+a+'</th> <td>'+b+'</td><td>'+c+'</td><td>'+d+'</td><td>'+e+'</td></tr>';

                $("#cot_res").append(html)
                $("#resultado2").removeClass("d-none");
                $("#busqueda").trigger("reset")
            }
            }else{
                const html='<tr><th scope="row" colspan="5">No se encontraron cotizaciones vigentes</th></tr>';
                $("#cot_res").append(html)
                $("#resultado2").removeClass("d-none");
                $("#busqueda").trigger("reset")
            }

        }
        function mostrar(e,t) { 
            $(t).prop("disabled",true)
            const fd1= new FormData();
            fd1.append("consulta","cot_id");
            fd1.append("id",e);
            let cotizaciones= $.ajax({
                type: "POST",
                url: "inc/conexion.php",
                processData: false,
                contentType: false,
                data:fd1,           
                success: function (response) {
                   //console.log(JSON.parse(response)[0])     
                   const ele= JSON.parse(response)[0];
                   mostrar_cot(ele)
                }
            });
         }

         function mostrar_cot(e){

                $("#resultado").empty()
                $("#resultado2").empty()
                fd.append("nombre_cliente",e.nombre_cliente)
                fd.append("tel_cliente",e.tel_cliente)
                fd.append("correo_cliente",e.correo_cliente)
                fd.append("no_paneles",e.no_paneles)
                fd.append("inversor",e.inversor)
                fd.append("potencia",e.potencia)
                fd.append("total",e.total)
                fd.append("sub_total",e.sub_total)
                fd.append("iva",e.iva ),
                fd.append("fecha",e.fecha)
                fd.append("vencimiento",e.vencimiento)
                fd.append("consulta","datos_cot")
                fd.append("no_cot", e.no_cot.toString().padStart(4, '0'));
                const boton='<button onclick ="imprimir()" class="btn btn-primary">Imprimir</button>'
                $.ajax({
                    type: "POST",
                    url: "cotizacion.php",
                    processData: false,
                    contentType: false,
                    data:fd,                    
                    success: function (response) {
                       // console.log(response)
                        $("#resultado").append(response)
                        
                    }
                });

                $("#resultado2").append(boton)
         }

    </script>
</body>

</html>