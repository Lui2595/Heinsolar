 <!-- Vendor JS Files -->
 <script src="<?php if(isset($back)){echo $back;} ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php if(isset($back)){echo $back;} ?>assets/js/main.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/js/jquery.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/js/date.js"></script>
  <script src="<?php if(isset($back)){echo $back;} ?>assets/js/currency.js"></script>

  <script type="text/javascript">
      $("#newsletter").submit(function (e){
          e.preventDefault();
         const email= $("#news_email").val()
         $.ajax({
             type: "POST",
             url: "inc/conexion.php",
             data: {mail:email,consulta:"news"},
             dataType: "dataType",
             success: function (response) {
                 console.log(response)
             },
             error:function(a,s,s){
                 console.log(a);
             }
         });
         alert("Haz sido registrado al nuestras noticias")
         $("#newsletter").trigger("reset")
      })

  </script>