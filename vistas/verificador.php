<script>
     function showSeconds(){
       console.log("verificador de estados de minutas ");
       var r=document.getElementById("rolHidden").value;
       console.log("actualizacion de estados en  "+r);
       var url =r+".php";
        $.ajax({
          url:   url,
          type:  'post',
          beforeSend: function () {},
          success:  function (response) {$("#contenido").html(response);}});
     }
     setInterval(showSeconds,60000);
</script>
