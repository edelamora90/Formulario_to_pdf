<?php
require '../tfpdf/tfpdf.php';  // Actualiza con la ruta correcta a fpdf.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$infoCliente = include 'infoCliente.php';
$datosTuCalcetin = include 'datosTuCalcetin.php';
$carpetaEmpresa = basename(dirname($_SERVER['SCRIPT_NAME']));  // Obtiene el nombre de la carpeta contenedora

$texto = "
GENERALES
El presente acuerdo tiene celebración entre TU CALCETÍN y [nombre_cliente], declarando ambas partes tener la capacidad de cumplir con las condiciones que se señalan más adelante, declarando que su domicilio fiscal para recibir y oír notificaciones por parte de Tu Calcetín que en los subsecuente será el prestador, se encuentra ubicado en AVENIDA GONZALO SANDOVAL 1245, INTERIOR 1, COLONIA LA ORIENTAL C.P 28046, COLIMA MÉXICO y que el domicilio [nombre_cliente] que en lo subsecuente será el cliente, se encuentra en [calle_cliente], [colonia_cliente], [cp_cliente], [ciudad_cliente], [estado_cliente] en el entendido que el representante legal del proveedor es RODRIGO URIBE ZAVALA y el responsable de la producción solicitada es [nombre_cliente] se acuerda lo siguiente.

MAQUILA
Ponemos nuestro equipo de trabajo a tu mando, podemos desarrollar productos personalizados al 100%, tenemos mínimos muy aceptables de trabajo, podemos inciar a personalizar tus pares desde 100 pares por diseño color o talla y los costos seguro te sorprenderan. 
Nos gusta ofrecer un servicio integral 360°, por lo que podemos auxiliarte no sólo con la maquila de tus productos, tenemos servicios adicionales, diseño, empaque, etiquetado, logística, fotografía y video. 
Sí eres un start up, o vas iniciando en el mundo del comercio en línea, seguro seremos tus aliados más fuertes.

CONDICIONES DEL SERVICIO
1. El costo acordado en la presente cotización esta condicionado a un [minimosDeOrden], en caso de futuras ordenes el mínimo para obtener el mismo precio será esta cantidad o se podrá hacer una nueva cotización por cantidades menores, entendiendo que el precio tendrá un incremento por operación o actualización en caso de aplicar, esta tarifa no incluye diseño ni insumos adicionales.

2. Para que se inicie con la producción se deberá hacer el anticipo del 50% de la producción  e insumos adicionales, misma cantidad que queda como garantía de cumplimiento total de  la orden.

3. En caso de una cancelación de orden o falta de respuesta por parte del cliente durante la candelarización de su proyecto por más de 14 días naturales, una vez realizado el anticipo, queda entendido que se perderá el anticipo así como los calcetines ya manufacturados en caso aplicar, los cuales en automático quedaran a disposición nuestra organización para ser comercializados con el fin de obtener la recuperación de los costos de operación y diseño.

4. Estos costos no incluyen flete, el traslado de la mercancía es a cuenta del cliente, en caso de requerir embolsado especial, tampoco esta incluido dentro de la cotización.

5. El etiquetado de cada calcetín es gratis siempre que se nos proporcione las etiquetas o en su caso decidan adquirirlas con nosotros, importante confirmar el etiquetado previo al pedido para ajustar tiempos de entrega.

6. Nuestra organización se compromete a la no reproducción de los diseños enviados, si autorización del cliente o solicitud de este, esta información será tratada como secreto industrial para beneficio de ambas partes, en caso de existir merma de producción se le dará derecho del tanto al cliente para adquirir las unidades sobrantes por el ciclo de producción.

TIEMPOS DE PRODUCCIÓN Y ENTREGA

1. El tiempo estimado una vez confirmadas muestras finales es de [tiempo_estimado_tucalcetin] días hábiles, el  proceso de muestras consta con dos etapas para realizar ajustes o cambios en diseño o  color, en caso de requerir etapas adicionales se deberá de cubrir un costo de $300 por etapa, en caso de requerir etiquetado o empaque los tiempos podrían variar, por causas de fuerza mayor las fechas podrían variar, siendo obligación del prestador notificar al cliente la situación.

2. Una vez realizada la producción se le notificará al cliente que su orden esta lista, anexando evidencia digital del pedido.

3. El cliente tendrá 5 días hábiles para liquidar el total del pedido para proceder a la cotización del envío.

4. En caso de que pasando los 5 días hábiles el cliente aun no efectúe la liquidación de la orden (50%) o bien los insumos, envío o gastos adicionales, se notificará que se dará inicio al cobro de almacenaje, teniendo un valor de $200 pesos por día, siendo posible almacenar 7 días naturales antes de declarar la orden como cancelada y se procederá de acuerdo con lo estipulado con la cláusula tercera del presente acuerdo.

5. La cotización del envío corre por cuenta de ambas partes, siendo posible que el cliente nos indique la paquetería o en su caso nos mande la guía de envío, el costo del envío lo liquidará el cliente una vez definido el servicio que mejor le convenga.

PAGO
1. Los pagos podrán realizarse por tarjeta de débito/crédito, PayPal, Mercado Pago, deposito o transferencia bancaria siendo únicamente las 3 primeras las que generarían una comisión adicional del 4%.

2. En caso de requerir factura debe de ser durante el mes corriente y se agregaría el costo del IVA de la producción solicitada, misma que se entregará una vez realizado el pago total del proyecto, siendo importante solicitarla dentro del mes corriente del último pago.

3. El presente documento se deberá remitir firmado y escaneado por el representante legal o la persona encargada de la producción, junto con las identificaciones oficiales vigentes y un comprobante de domicilio (no mayor a tres meses).

4. Al presentar este documento, tendrá una vigencia de 15 días hábiles.

ADICIONALES
[notasAdicionales]


";


// Reemplazamos cada marcador por su valor correspondiente
$texto = str_replace("[nombre_cliente]", $infoCliente['nombre'], $texto);
$texto = str_replace("[calle_cliente]", $infoCliente['calle'], $texto);
$texto = str_replace("[colonia_cliente]", $infoCliente['colonia'], $texto);
$texto = str_replace("[cp_cliente]", $infoCliente['cp'], $texto);
$texto = str_replace("[ciudad_cliente]", $infoCliente['ciudad'], $texto);
$texto = str_replace("[estado_cliente]", $infoCliente['estado'], $texto);
$texto = str_replace("[minimosDeOrden]", $datosTuCalcetin['minimosDeOrden'], $texto);
$texto = str_replace("[tiempo_estimado_tucalcetin]", $datosTuCalcetin['tiempo_estimado_tucalcetin'], $texto);
$texto = str_replace("[notasAdicionales]", $datosTuCalcetin['notasAdicionales'], $texto);

$titulos = ['GENERALES','MAQUILA','CONDICIONES DEL SERVICIO','TIEMPOS DE PRODUCCIÓN Y ENTREGA','PAGO','ADICIONALES'];
function escribirTextoConTitulosNegritas($pdf, $texto, $titulos) {
  // Dividimos el texto en líneas
  $lineas = explode("\n", $texto);

  foreach ($lineas as $linea) {
      // Si la línea es uno de los títulos, usamos negrita
      if (in_array(trim($linea), $titulos)) {
          $pdf->SetFont('MuseoSans_700', '', 14); // Ajusta según tu preferencia
      } else {
          $pdf->SetFont('MuseoSans_500', '', 12); // Ajusta según tu preferencia
      }

      $pdf->MultiCell(0, 10, $linea, 0, 'J');
      $pdf->Ln(2); // Añade un poco de espacio entre las líneas si es necesario
  }
}
function centerText($pdf, $text, $fontSize) {
  $widthOfPage = $pdf->GetPageWidth();
  $widthOfText = $pdf->GetStringWidth($text);
  $x = ($widthOfPage - $widthOfText) / 2;

  // establecer la fuente y tamaño que pasamos como argumento
  $pdf->SetFont('','',$fontSize);

  // coloca el texto en la posición calculada en X para que quede centrado
  $pdf->SetX($x);
  $pdf->Cell($widthOfText, 10, $text, 0, 2, 'C', false);
}
function drawCenteredLine($pdf, $y) {
  // Establecer el ancho deseado de la línea
  $lineWidth = 80; // por ejemplo, 80 mm

  // Obtener el ancho total de la página
  $pageWidth = $pdf->GetPageWidth();

  // Calcular las coordenadas iniciales y finales para la línea
  $startX = ($pageWidth - $lineWidth) / 2;
  $endX = $startX + $lineWidth;

  // Dibujar la línea
  $pdf->Line($startX, $y, $endX, $y);
}

function centerTextsub($pdf, $text, $y) {
  // Ancho total de la página
  $pageWidth = $pdf->GetPageWidth();
  
  // Ancho del texto
  $textWidth = $pdf->GetStringWidth($text);
  
  // Calcula la coordenada x para centrar el texto
  $x = ($pageWidth - $textWidth) / 2;

  // Establece las coordenadas x e y para comenzar a escribir
  $pdf->SetXY($x, $y);
  
  // Escribe el texto
  $pdf->MultiCell(0, 10, $text, 0, 'C');
}


$pdf = new TFPDF();
// Agrega la fuente
$pdf->AddFont('DejaVuSansCondensed', '','DejaVuSansCondensed.ttf',true);
$pdf->AddFont('MuseoSans-300', '','MuseoSans-300.ttf',true);
$pdf->AddFont('MuseoSans_500', '','MuseoSans_500.ttf',true);
$pdf->AddFont('MuseoSans_700', '','MuseoSans_700.ttf',true);

$pdf->AddPage();
$imagePath = '../img/contrato_FINAL.jpg';
$pdf->Image($imagePath, 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());

$pdf->AddPage();
$imagePath = '../img/contrato_FINAL2.jpg';
$pdf->Image($imagePath, 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());

$pdf->AddPage();
$imagePath = '../img/contrato_FINAL3.jpg';
$pdf->Image($imagePath, 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());

$pdf->AddPage();
// Establece la fuente
$pdf->SetFont('MuseoSans_500','',12);
// Prepara la información
$imagePath = '../img/LOGO_CIRCULO_mini.png';
$nombreEmpresaRaw = $carpetaEmpresa;
$nombreEmpresa = str_replace('_', ' ', $nombreEmpresaRaw);  // Reemplaza guiones bajos por espacios
$fecha = $datosTuCalcetin['fecha'];  // Asume que ya tienes la fecha en alguna variable

// Añade la imagen
$x = $pdf->GetX();  // Obtiene la posición actual en X
$y = $pdf->GetY();  // Obtiene la posición actual en Y
$w = 20;  // Ancho que quieres para la imagen en mm.
$h = 16;  // Altura que quieres para la imagen en mm.
$pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), $w, $h);

$espacioExtra = 10; // Espacio adicional después de la imagen en X. Ajusta según lo necesites.

// Calcula el inicio de la celda del nombre de la empresa
$xNombreEmpresa = $pdf->GetX() + $w + $espacioExtra; 
$yCentrado = $pdf->GetY() + ($h / 2) - (7 / 2); 

 // Mueve el cursor a esa posición
$pdf->SetXY($xNombreEmpresa, $yCentrado);

$pdf->SetFont('MuseoSans-300','',12);
$pdf->Cell(100, 7, 'COTIZACIÓN', 0);
$pdf->Ln(); 
$pdf->SetX($x +$w);
$pdf->SetFont('MuseoSans_700','',16);
$pdf->Cell(100, 7, $nombreEmpresa, 0);
$pdf->Cell(70, 7, 'Colima, Col. ' . $fecha, 0);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();



// Agregando información de $datosTuCalcetin al PDF:
    // Cabeceras de la tabla
    $pdf->Cell(100, 7, 'Concepto', 1);
    $pdf->Cell(30, 7, 'Cantidad', 1);
    $pdf->Cell(50, 7, 'Costo', 1);
    $pdf->Ln();  // Nueva línea
    
    // Asumimos que todos los arrays tienen el mismo tamaño
    for ($i = 0; $i < count($datosTuCalcetin['conceptos']); $i++) {
        $pdf->SetFont('MuseoSans-300','',12);
        $pdf->Cell(100, 7, $datosTuCalcetin['conceptos'][$i], 1);
        $pdf->SetFont('MuseoSans-300','',12);
        $pdf->Cell(30, 7, $datosTuCalcetin['cantidades'][$i], 1);
        $pdf->SetFont('MuseoSans-300','',12);
        $pdf->Cell(50, 7, '$' . number_format($datosTuCalcetin['costos'][$i], 2), 1);
        $pdf->Ln();  // Nueva línea
    }

$subtotal = isset($_POST['subtotal']) ? floatval($_POST['subtotal']) : 0;
$iva = isset($_POST['iva']) ? floatval($_POST['iva']) : 0;
$total = isset($_POST['total']) ? floatval($_POST['total']) : 0;

$pdf->Ln(10); // Espacio después de la tabla

// Mostramos el Subtotal
$pdf->SetFont('MuseoSans_700', '', 12);
$pdf->Cell(130, 7, 'Subtotal:', 0, 0, 'R');
$pdf->SetFont('MuseoSans-300','',12);
$pdf->Cell(50, 7, '$' . number_format($subtotal, 2), 0);
$pdf->Ln();


// Mostramos el IVA solo si se solicitó factura
if(isset($infoCliente['rfc'])) {
  $pdf->SetFont('MuseoSans_700', '', 12);
    $pdf->Cell(130, 7, 'IVA:', 0, 0, 'R');
    $pdf->SetFont('MuseoSans-300','',12);
    $pdf->Cell(50, 7, '$' . number_format($iva, 2), 0);
    $pdf->Ln();

    $pdf->SetFont('MuseoSans_700', '', 12);
    $pdf->Cell(130, 7, 'Total:', 0, 0, 'R');
    $pdf->SetFont('MuseoSans-300','',12);
    $pdf->Cell(50, 7, '$' . number_format($total, 2), 0);
    $pdf->Ln();
}else{
  // Mostramos el Total (aquí puedes decidir si el total incluye o no el IVA según si se solicitó factura)
    $pdf->SetFont('MuseoSans_700', '', 12);
    $pdf->Cell(130, 7, 'Total:', 0, 0, 'R');
    $pdf->SetFont('MuseoSans-300','',12);
    $pdf->Cell(50, 7, '$' . number_format($subtotal, 2), 0);
    $pdf->Ln();

}


// ... Añade más información de $infoCliente y $datosTuCalcetin al PDF como lo necesites ...
escribirTextoConTitulosNegritas($pdf, $texto, $titulos);
$pdf->SetFont('MuseoSans_700','',14); // Ajusta según la fuente y tamaño que estés usando
centerText($pdf, "ANEXOS DE FIRMAS E IDENTIFICACIONES OFICIALES", 10);
$pdf->Ln(5);  // Añade un espacio entre líneas
$pdf->SetFont('MuseoSans_500','',12);
centerText($pdf, "Al firmar este documento se entiende que esta de acuerdo con las", 10);
centerText($pdf, "condiciones del servicio, favor de hacer anexo de los documentos adicionales solicitados.", 10);
$pdf->Ln(10); // Añade un espacio mayor para la línea

// Dibuja una línea centrada
$yPositionForLine = $pdf->GetY() + 5; // El "+ 10" es para dejar un poco de espacio antes de la línea

drawCenteredLine($pdf, $yPositionForLine);

$pdf->Ln(5);  // Añade un espacio entre líneas
centerText($pdf, "TITULAR O REPRESENTANTE LEGAL", 10);
$pdf->Output();
?>