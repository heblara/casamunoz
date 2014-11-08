<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">   

   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
 
<style type="text/css">
    .messages{
        float: left;
        font-family: sans-serif;
        display: none;
    }
    .info{
        padding: 10px;
        border-radius: 10px;
        background: orange;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .before{
        padding: 10px;
        border-radius: 10px;
        background: blue;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .success{
        padding: 10px;
        border-radius: 10px;
        background: green;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .error{
        padding: 10px;
        border-radius: 10px;
        background: red;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
</style>
<script type="text/javascript">
     $(function() {
    $('#txtFechaRegistro').datepicker({
    dateFormat: 'yy-mm-dd', 
    changeMonth: true, 
    changeYear: true, 
    yearRange: '-40:+0'
    });
        });
</script>
<form name="hongkiat" id="hongkiat-form" method="post" class="formulario">
    <div id="wrapping" class="clearfix">
        <section id="aligned">
        <h2>REGISTRO DE IMAGENES</h2>
        <label>Imagen:</label>
        <input name="archivo" type="file" id="imagen" class="txtinput upload"/>
		<label>Fecha registro de servicio:</label>
        <input type="text" name="txtFechaRegistro" id="txtFechaRegistro" placeholder="Fecha de registro de producto" autocomplete="off" tabindex="1" class="txtinput calendar datepicker">  
        <br/>
        </section>
        <section id="aside" class="clearfix">
        </section>
    </div>
    <section id="buttons">
        <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">-->
        <input type="button"  name="submit" id="submitbtn"  class="submitbtn" tabindex="7" value="Guardar">
        <br style="clear:both;">
    </section>
</form>
    <!--div para visualizar mensajes-->
    <div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>
