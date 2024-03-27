<?php include("cabecera.php"); ?>
<?php include("menu.php"); ?>
<?php require_once('conexion.php'); ?>
<?php if (isset($_POST['registrar']) && $_POST['registrar'] == "registrar") {

  $query = "INSERT INTO `registros` (`id`, `nombre`, `usuario`, `clave`, `correo`, `telefono`, `pais`, `direccion`) VALUES (NULL, '$_POST[nombre]', '$_POST[usuario]', '$_POST[clave]', '$_POST[correo]', '$_POST[telefono]', '$_POST[pais]', '$_POST[direccion]')";
  $conn->query($query);
}
?>

<div class="container">
  <div class="row col-md-6 mx-auto">
    <div class="card">
      <h2 class="text-center mt-3">Registro</h2>
      <form id="registro" name="registros" method="post">
        <div class="mb-3">
          <div class="card-body">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" placeholder="Ingrese su nombre" class="form-control border border-success" id="nombre" aria-describedby="nombre-descr" name="nombre">
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico:</label>
            <input type="email" placeholder="Ingrese su correo electrónico" class="form-control border border-success" id="correo" name="correo">
          </div>
          <div class="mb-0">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" placeholder="Ingrese su Teléfono" class="form-control border border-success" id="telefono" name="telefono">
          </div>
          <div class="mb-3">
            <label for="pais" class="form-label"></label>
            <?php
            $paises = array("Afganistán", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue"); ?>
            <div class="form-group mb-2 row">
              <div class="mb-3 col-md-6">
                <label for="pais" required>Pais:</label>
                <select id="pais" class="form-select border-success" aria-label="pais" name="pais">
                  <option value="">Selecciona un país</option>
                  <?php foreach ($paises as $pais) { ?>
                    <option value="<?php echo $pais; ?>"><?php echo $pais; ?></option>
                  <?php }; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <textarea class="form-control border border-success" id="direccion" rows="3" name="direccion"></textarea>
              </div>
              <div class="container">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" placeholder="" class="form-control border border-success" id="usuario" aria-describedby="emailHelp" name="usuario">
                  </div>
                  <div class="col-md-6">
                    <label for="clave" class="form-label">Clave</label>
                    <input type="password" id="clave" class="form-control border border-success" aria-labelledby="clave" name="clave">
                    <div id="passwordHelpBlock" class="form-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button name="registrar" value="registrar" type="submit" class="btn btn-success mb-4 w-100">Registrar</button>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
</form>

<?php include("pie.php"); ?>