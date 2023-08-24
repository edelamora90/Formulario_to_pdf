<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Formulario de Cliente</title>
</head>
<body>
<div class= "logoTitle">
    <img src="img/LOGO_CIRCULO_mini.png" alt="Logo de la empresa" class="logo">
    <h2>Formulario de Cliente</h2>
</div>
    <form method="post" action="guardarCliente.php">
      
    <div class="input-group">
        <label for="nombre">Nombre del cliente:</label>
        <input type="text" name="nombre" required><br><br>
      </div> 

    <div class="input-group">
        <label for="empresa">Empresa:</label>
        <input type="text" name="empresa"><br><br>
      </div>
        
      <div class="input-group">
        <label for="calle">Domicilio:</label>
        <input type="text" name="calle" placeholder = "calle, número, interior" required><br><br>
      </div>
      <div class="input-group">
        <label for="colonia">Colonia Cliente:</label>
        <input type="text" name="colonia" required><br><br>
      </div>
      <div class="input-group">
        <label for="cp">CP Cliente:</label>
        <input type="text" name="cp" required><br><br>
      </div>
      <div class="input-group">
        <label for="ciudad">Ciudad Cliente:</label>
        <input type="text" name="ciudad" required><br><br>
      </div>
      <div class="input-group">
        <label for="estado">Estado Cliente:</label>
        <input type="text" name="estado" required><br><br>
      </div>
      <div class="input-group">
        <label for="mail">Correo Electrónico Cliente:</label>
        <input type="email" name="mail"><br><br>
      </div>
      <div class="input-group">
        <label for="telefono">Teléfono Cliente:</label>
        <input type="tel" name="telefono" required><br><br>
      </div>
      <div class="input-group">
        <label for="factura">¿Desea Factura?</label>
        <input type="checkbox" name="factura" id="factura" value="yes"><br><br>
      </div>
      <div id="campos-factura" style="display:none;">
              
          <div class="input-group">
            <label for="rfc">RFC Cliente:</label>
            <input type="text" name="rfc"><br><br>
          </div>
          <div class="input-group">
            <label for="calle_fiscal">Calle Fiscal:</label>
            <input type="text" name="calle_fiscal"><br><br>
          </div>
          <div class="input-group">
            <label for="colonia_fiscal">Colonia Fiscal:</label>
            <input type="text" name="colonia_fiscal"><br><br>
          </div>
          <div class="input-group">
            <label for="cp_fiscal">CP Fiscal:</label>
            <input type="text" name="cp_fiscal"><br><br>
          </div>
          <div class="input-group">
            <label for="ciudad_fiscal">Ciudad Fiscal:</label>
            <input type="text" name="ciudad_fiscal"><br><br>
          </div>
          <div class="input-group">
            <label for="estado_fiscal">Estado Fiscal:</label>
            <input type="text" name="estado_fiscal"><br><br>
          </div>
      </div>

          <input type="submit" value="Guardar">
    </form>

    <script>
        const facturaCheckbox = document.getElementById('factura');
        const camposFactura = document.getElementById('campos-factura');

        facturaCheckbox.addEventListener('change', function() {
            camposFactura.style.display = this.checked ? 'block' : 'none';
        });
    </script>
</body>
</html>
