<?php

require_once("public/fpdf/fpdf.php");


class PdfProformaController
{
    private $render;
    private $choferModel;
    private $loginSession;

    public function __construct($render, $loginSession, $choferModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->choferModel = $choferModel;

    }

    public function ejecutar()
    {
        /*
         * A4 ancho = 219mm
         * defautl margin 10mm de cada lado
         * calculo: 219 - 10*2 = 189mm
         * 189 el ancho de la pagina en si
         */
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();

        if (!$logeado) {
            header("Location: /home");
            exit();
        } else {
            $data2 = $this->loginSession->verificarQueUsuarioRol();
            if (isset($data2["usuarioChofer"]) and $data2["usuarioChofer"]) {

                $pdf = new FPDF('P', 'mm', 'A4');
                $pdf->AddPage();

                $pdf->SetFont('Arial', 'B', 14);
                $pdf->SetFillColor(52, 58, 64);
                $pdf->Cell(189, 5, '', 0, 1, "", true);//end of line
                $pdf->SetFillColor(255, 255, 255);

                $pdf->Cell(189, 5, '', 0, 1);//end of line

                $pdf->Cell(130, 5, 'CAMIONARDO SRL', 0, 0);
                $pdf->Cell(59, 5, 'PROFORMA', 0, 1);//end of line
                $pdf->Image('public/img/logo.png', 87, 15, -340);

                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(130, 5, ' Florencio Varela 1903', 0, 0);
                $pdf->Cell(25, 5, 'Estado', 0, 0);

                $estado = "FINALIZADO";
                $pdf->SetTextColor($this->devolverValorUnoSegunEstado($estado), $this->devolverValorDosSegunEstado($estado), $this->devolverValorTresSegunEstado($estado));
                $pdf->Cell(34, 5, 'Activo', 0, 1);//end of line
                $pdf->SetTextColor(0, 0, 0);

                $pdf->Cell(130, 5, ' San Justo, Provincia de Buenos Aires', 0, 0);
                $pdf->Cell(25, 5, 'Fecha', 0, 0);
                $pdf->Cell(34, 5, 'dd/mm/yyyy', 0, 1);//end of line

                $pdf->Cell(130, 5, ' Telefono: +44808900', 0, 0);
                $pdf->Cell(25, 5, 'Proforma ID', 0, 0);
                $pdf->Cell(34, 5, '[1]', 0, 1);//end of line

                $pdf->Cell(130, 5, ' CUIL: 12-34567890-1', 0, 0);
                $pdf->Cell(25, 5, 'Cliente ID', 0, 0);
                $pdf->Cell(34, 5, '[1234567]', 0, 1);//end of line

                $pdf->Cell(189, 10, '', 0, 1);//end of line

                $pdf->SetFont('Arial', 'B', 14);
                $pdf->Cell(100, 5, 'Datos del cliente', 0, 1);//end of line
                $pdf->SetFont('Arial', '', 12);


                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, '[Nombre][Apellido]', 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, '[Cuit]', 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, '[Telefono]', 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, '[Direccion]', 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, '[Denomacion]', 0, 1);

                $pdf->Image('public/qr/temp/test.png', 140, 50, -220);
                $pdf->Cell(189, 10, '', 0, 1);//end of line


                $pdf->SetFont('Arial', 'B', 14);

                $pdf->Cell(189, 8, 'Datos Del Viaje', 0, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line

                //Chofer a cargo
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos del Chofer", 1, 1,);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Nombre:', 1, 0);
                $pdf->Cell(95, 6, 'Apellido:', 1, 1);
                $pdf->Cell(94, 6, 'Dni:', 1, 0);
                $pdf->Cell(95, 6, 'Fecha de Nacimiento:', 1, 1);

                $pdf->Cell(189, 2, '', 0, 1);//end of line


                //Destino y partida
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(93, 6, ' Partida ', 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(94, 6, ' Destino', 1, 1);


                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(93, 6, "Direccion:", 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(94, 6, "Direccion:", 1, 1);
                $pdf->Cell(46, 6, "Localidad:", 1, 0);
                $pdf->Cell(47, 6, "Provincia:", 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(47, 6, "Localidad:", 1, 0);
                $pdf->Cell(47, 6, "Provincia:", 1, 1);
                $pdf->Cell(93, 6, "ETD:", 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(94, 6, "ETA:", 1, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line


                //Vehiculo
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos del Vehiculo que realiza el viaje", 1, 1);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Patente:', 1, 0);
                $pdf->Cell(95, 6, 'Nro Chasis:', 1, 1);
                $pdf->Cell(94, 6, 'Nro Motor:', 1, 0);
                $pdf->Cell(95, 6, 'Kilometraje:', 1, 1);
                $pdf->Cell(94, 6, 'Fabricacion:', 1, 0);
                $pdf->Cell(95, 6, 'Marca:', 1, 1);
                $pdf->Cell(94, 6, 'Modelo:', 1, 0);
                $pdf->Cell(95, 6, 'Service:', 1, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line


                //Acoplado
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos del Acoplado", 1, 1);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Patente', 1, 0);
                $pdf->Cell(95, 6, 'Nro Chasis:', 1, 1);
                $pdf->Cell(189, 6, "Tipo de Acoplado:", 1, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line

                //Carga
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos de la Carga", 1, 1);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Peso Neto:', 1, 0);
                $pdf->Cell(95, 6, 'Tipo de Carga:', 1, 1);

                $pdf->SetFont('Times', 'B', 12);

                $pdf->Cell(1, 6, "", 0, 0);
                $pdf->Cell(92, 6, 'Hazard ', 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(93, 6, 'Reefer', 1, 1);

                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(1, 6, "", 0, 0);
                $pdf->Cell(92, 6, 'Imo Class ', 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(93, 6, 'Temperatura', 1, 1);
                $pdf->Cell(1, 6, "", 0, 0);
                $pdf->Cell(92, 6, 'Imo Sub Class ', 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(93, 6, ' - ', 1, 1, "C");
                $pdf->Cell(1, 6, "", 0, 0);
                $pdf->MultiCell(92, 6, 'Descripcion:  ', 1, "L");
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->SetXY(105, 233);
                $pdf->MultiCell(93, 6, ' - ', "LRB", "C");

                $pdf->SetXY(10, 266);
                $pdf->SetFillColor(52, 58, 64);
                $pdf->MultiCell(189, 10, '', 0, "", true);//end of line

                $pdf->Output();

            } else {
                header("Location: /home");
                exit();
            }
        }
    }

    public function devolverValorUnoSegunEstado($estado)
    {
        switch ($estado) {
            case "ACTIVO":
                $valor = 0;
                break;

            case "PENDIENTE":
                $valor = 155;
                break;

            case "FINALIZADO":
                $valor = 255;
                break;

            default:
                $valor = 0;
                break;
        }
        return $valor;
    }

    public function devolverValorDosSegunEstado($estado)
    {
        switch ($estado) {
            case "ACTIVO":
                $valor = 142;
                break;

            case "PENDIENTE":
                $valor = 155;
                break;

            case "FINALIZADO":
                $valor = 0;
                break;

            default:
                $valor = 0;
                break;
        }
        return $valor;
    }

    public function devolverValorTresSegunEstado($estado)
    {
        switch ($estado) {
            case "ACTIVO":
                $valor = 57;
                break;

            case "PENDIENTE":
                $valor = 155;
                break;

            case "FINALIZADO":
                $valor = 0;
                break;

            default:
                $valor = 0;
                break;
        }
        return $valor;
    }
}