<?php
function removeAccents($string) {
    $table = array(
        'á' => 'a', 'à' => 'a', 'â' => 'a', 'ä' => 'a', 'ã' => 'a', 'å' => 'a', 'ā' => 'a',
        'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e', 'ē' => 'e', 'ė' => 'e', 'ę' => 'e',
        'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i', 'į' => 'i', 'ĩ' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'ö' => 'o', 'ō' => 'o', 'ø' => 'o', 'õ' => 'o',
        'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u', 'ū' => 'u', 'ų' => 'u', 'ũ' => 'u',
        'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
        'ž' => 'z', 'ź' => 'z', 'ż' => 'z', 'š' => 's', 'ś' => 's', 'ş' => 's', 'ß' => 'ss',
        'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŋ' => 'n', 'ħ' => 'h', 'đ' => 'd',
        'Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ä' => 'A', 'Ã' => 'A', 'Å' => 'A', 'Ā' => 'A',
        'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ė' => 'E', 'Ę' => 'E',
        'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ī' => 'I', 'Į' => 'I', 'Ĩ' => 'I',
        'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Ö' => 'O', 'Ō' => 'O', 'Ø' => 'O', 'Õ' => 'O',
        'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ū' => 'U', 'Ų' => 'U', 'Ũ' => 'U',
        'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C',
        'Ž' => 'Z', 'Ź' => 'Z', 'Ż' => 'Z', 'Š' => 'S', 'Ś' => 'S', 'Ş' => 'S',
        'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N', 'Ņ' => 'N', 'Ŋ' => 'N', 'Ħ' => 'H', 'Đ' => 'D',
    );

    return strtr($string, $table);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    
    // Si el campo empresa está vacío, usar el campo nombre
    $empresa = empty($_POST["empresa"]) ? $nombre : $_POST["empresa"];
    //remover acentos
    $empresa = removeAccents($empresa);
    // Sustituir espacios en blanco por guiones bajos en el nombre de la empresa
    $empresa = str_replace(" ", "_", $empresa);

    $calle = $_POST["calle"];
    $colonia = $_POST["colonia"];
    $cp = $_POST["cp"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    $mail = $_POST["mail"];
    $telefono = $_POST["telefono"];

    $factura = isset($_POST["factura"]) ? true : false;
   

    if ($factura) {
        $rfc = $_POST["rfc"];
        $calleFiscal = $_POST["calle_fiscal"];
        $coloniaFiscal = $_POST["colonia_fiscal"];
        $cpFiscal = $_POST["cp_fiscal"];
        $ciudadFiscal = $_POST["ciudad_fiscal"];
        $estadoFiscal = $_POST["estado_fiscal"];
    }

    // Definiciones iniciales para las variables que causan warnings
    $fecha = isset($_POST['fecha_tucalcetin']) ? $_POST['fecha_tucalcetin'] : "";
    $conceptos = isset($_POST['concepto_tucalcetin']) ? $_POST['concepto_tucalcetin'] : array();
    $cantidades = isset($_POST['cantidad_tucalcetin']) ? $_POST['cantidad_tucalcetin'] : array();
    $costos = isset($_POST['costo_tucalcetin']) ? $_POST['costo_tucalcetin'] : array();
    $tiempoProduccionEntrega = isset($_POST['tiempo_produccion_entrega_tucalcetin']) ? $_POST['tiempo_produccion_entrega_tucalcetin'] : "";
    $notasAdicionales = isset($_POST['adicionales_tucalcetin']) ? $_POST['adicionales_tucalcetin'] : "";
    $minimosDeOrden = isset($_POST['minimos_de_orden']) ? $_POST['minimos_de_orden'] : "";
    $rfc = isset($_POST['rfc']) ? $_POST['rfc'] : "";
    $calleFiscal = isset($_POST['calle_fiscal']) ? $_POST['calle_fiscal'] : "";
    $ColoniaFiscal = isset($_POST['colonia_fiscal']) ? $_POST['colonia_fiscal'] : "";
    $cpFiscal = isset($_POST['cp_fiscal']) ? $_POST['cp_fiscal'] : "";
    $ciudadFiscal = isset($_POST['ciudad_fiscal']) ? $_POST['ciudad_fiscal'] : "";
    $estadoFiscal = isset($_POST['estado_fiscal']) ? $_POST['estado_fiscal'] : "";

    // Crear la carpeta si no existe
    if (!file_exists($empresa)) {
        mkdir($empresa, 0777, true);
    }

    $filename = $empresa . "/" . "infoCliente" . ".php";
    $data = [
        'empresa' => $empresa,
        'nombre' => $nombre,
        'calle' => $calle,
        'colonia' => $colonia,
        'cp' => $cp,
        'ciudad' => $ciudad,
        'estado' => $estado,
        'mail' => $mail,
        'telefono' => $telefono
    ];
    
    if ($factura) {
        $data['rfc'] = $rfc;
        $data['calleFiscal'] = $calleFiscal;
        $data['coloniaFiscal'] = $coloniaFiscal;
        $data['cpFiscal'] = $cpFiscal;
        $data['ciudadFiscal'] = $ciudadFiscal;
        $data['estadoFiscal'] = $estadoFiscal;
    }
    
    $content = "<?php\nreturn " . var_export($data, true) . ";\n";

    file_put_contents($filename, $content);
    // ... el código que guarda la información en infoCliente.php ...

   

    // Generar formulario formulariotucalcetin.php
    $filenameFormulario = $empresa . "/formulariotucalcetin.php";
    $contentFormulario = file_get_contents('formularioTuCalcetin/contentFormulario.html');

    file_put_contents($filenameFormulario, $contentFormulario);

    echo "Información guardada en $filename y formulario generado en $filenameFormulario";

//mandar por correo el enlace al formulario de tucalcetin
    $to = "edelamora90@gmail.com";
    $subject = "Completar contrato de $empresa";
    $message = "Hola,\n\nSe ha creado un nuevo contrato. Puedes completar el contrato en el siguiente enlace:\n\n";
    $message .= "https://tucalcetin.pinole.io/pdf2/$empresa/datosTuCalcetin.php"; // Asegúrate de reemplazar "tudominio.com" con tu dominio real

    $headers = "From: contrato@tucalcetin.pinole.io\r\n"; // Cambia "tudominio.com" por tu dominio real

    if(mail($to, $subject, $message, $headers)) {
        echo "Correo enviado con éxito!";
    } else {
        echo "Error al enviar el correo.";
    }
////Fin correo

$rutaArchivo = $empresa . "/guardarDatosTuCalcetin.php";

$contenido = file_get_contents('formularioTuCalcetin/datosgenerados.php');

$agregarpdf = file_get_contents('guardarCliente/agregarpdf.php');

$contenidoCompleto = $contenido . $agregarpdf;
file_put_contents($rutaArchivo, $contenidoCompleto);
}
?>
