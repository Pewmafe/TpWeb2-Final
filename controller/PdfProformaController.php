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
                $IdChofer = $_GET["idChofer"];
                $idProforma = $_GET["proformaID"];
                $tablaDatosProforma = $this->choferModel->obtenerTodosLosDatosDeLaProformaSegunIDChofer($IdChofer, $idProforma);


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

                $estado = $tablaDatosProforma[0]["estado_proforma"];
                $pdf->SetTextColor($this->devolverValorUnoSegunEstado($estado), $this->devolverValorDosSegunEstado($estado), $this->devolverValorTresSegunEstado($estado));
                $pdf->Cell(34, 5, $tablaDatosProforma[0]["estado_descripcion_Proforma"], 0, 1);//end of line
                $pdf->SetTextColor(0, 0, 0);

                $pdf->Cell(130, 5, ' San Justo, Provincia de Buenos Aires', 0, 0);
                $pdf->Cell(25, 5, 'Fecha', 0, 0);
                $pdf->Cell(34, 5, $tablaDatosProforma[0]["fecha_proforma"], 0, 1);//end of line

                $pdf->Cell(130, 5, ' Telefono: +44808900', 0, 0);
                $pdf->Cell(25, 5, 'Proforma ID', 0, 0);
                $pdf->Cell(34, 5, $tablaDatosProforma[0]["proforma_id"], 0, 1);//end of line

                $pdf->Cell(130, 5, ' CUIL: 12-34567890-1', 0, 0);
                $pdf->Cell(25, 5, 'Cuit Cliente:', 0, 0);
                $pdf->Cell(34, 5, $tablaDatosProforma[0]["cuit_cliente"], 0, 1);//end of line

                $pdf->Cell(189, 10, '', 0, 1);//end of line

                $pdf->SetFont('Arial', 'B', 14);
                $pdf->Cell(100, 5, 'Datos del cliente', 0, 1);//end of line
                $pdf->SetFont('Arial', '', 12);


                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, $tablaDatosProforma[0]["nombre_cliente"]." ".$tablaDatosProforma[0]["apellido_cliente"], 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, "Email: ".$tablaDatosProforma[0]["email_cliente"], 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, "Tel: ".$tablaDatosProforma[0]["tel_cliente"], 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, utf8_decode($tablaDatosProforma[0]["calle_cliente"])." ".$tablaDatosProforma[0]["altura_cliente"].", ".utf8_decode($tablaDatosProforma[0]["localidad_cliente"]).", ".utf8_decode($tablaDatosProforma[0]["provincia_cliente"]), 0, 1);

                $pdf->Cell(10, 5, '', 0, 0);
                $pdf->Cell(90, 5, "Denominacion: '".utf8_decode($tablaDatosProforma[0]["denominacion_cliente"])."'", 0, 1);

                $pdf->Image('public/qr/temp/test.png', 140, 50, -220);
                $pdf->Cell(189, 10, '', 0, 1);//end of line


                $pdf->SetFont('Arial', 'B', 14);

                $pdf->Cell(189, 8, 'Datos Del Viaje', 0, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line

                //Chofer a cargo
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos del Chofer", 1, 1);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Nombre: '.utf8_decode($tablaDatosProforma[0]["nombre_chofer"]), 1, 0);
                $pdf->Cell(95, 6, 'Apellido:'.utf8_decode($tablaDatosProforma[0]["apellido_chofer"]), 1, 1);
                $pdf->Cell(94, 6, 'Dni:'.utf8_decode($tablaDatosProforma[0]["dni_chofer"]), 1, 0);
                $pdf->Cell(95, 6, 'Fecha de Nacimiento:'.utf8_decode($tablaDatosProforma[0]["nacimiento_chofer"]), 1, 1);

                $pdf->Cell(189, 2, '', 0, 1);//end of line


                //Destino y partida
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(93, 6, ' Partida ', 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(94, 6, ' Destino', 1, 1);


                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(93, 6, "Direccion: ".utf8_decode($tablaDatosProforma[0]["partida_calle"])." ".utf8_decode($tablaDatosProforma[0]["partida_altura"]), 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(94, 6, "Direccion: ".utf8_decode($tablaDatosProforma[0]["destino_calle"])." ".utf8_decode($tablaDatosProforma[0]["destino_altura"]), 1, 1);
                $pdf->Cell(46, 6, "Lugar: ".utf8_decode($tablaDatosProforma[0]["partida_localidad"]), 1, 0);
                $pdf->Cell(47, 6, "Provincia:".utf8_decode($tablaDatosProforma[0]["partida_provincia"]), 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(47, 6, "Lugar: ".utf8_decode($tablaDatosProforma[0]["destino_localidad"]), 1, 0);
                $pdf->Cell(47, 6, "Provincia: ".utf8_decode($tablaDatosProforma[0]["destino_provincia"]), 1, 1);
                $pdf->Cell(93, 6, "ETD: ".utf8_decode($tablaDatosProforma[0]["etd"]), 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(94, 6, "ETA: ".utf8_decode($tablaDatosProforma[0]["eta"]), 1, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line


                //Vehiculo
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos del Vehiculo que realiza el viaje", 1, 1);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Patente: '.utf8_decode($tablaDatosProforma[0]["vehiculo_patente"]), 1, 0);
                $pdf->Cell(95, 6, 'Nro Chasis: '.utf8_decode($tablaDatosProforma[0]["vehiculo_nro_chasis"]), 1, 1);
                $pdf->Cell(94, 6, 'Nro Motor: '.utf8_decode($tablaDatosProforma[0]["vehiculo_nro_motor"]), 1, 0);
                $pdf->Cell(95, 6, 'Kilometraje: '.utf8_decode($tablaDatosProforma[0]["vehiculo_kilometraje"]), 1, 1);
                $pdf->Cell(94, 6, 'Fabricacion: '.utf8_decode($tablaDatosProforma[0]["vehiculo_fabricacion"]), 1, 0);
                $pdf->Cell(95, 6, 'Marca: '.utf8_decode($tablaDatosProforma[0]["vehiculo_marca"]), 1, 1);
                $pdf->Cell(94, 6, 'Modelo: '.utf8_decode($tablaDatosProforma[0]["vehiculo_modelo"]), 1, 0);
                $pdf->Cell(95, 6, 'Ultimo Service: '.utf8_decode($tablaDatosProforma[0]["vehiculo_service"]), 1, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line


                //Acoplado
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos del Acoplado", 1, 1);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Patente: '.utf8_decode($tablaDatosProforma[0]["acoplado_patente"]), 1, 0);
                $pdf->Cell(95, 6, 'Nro Chasis: '.utf8_decode($tablaDatosProforma[0]["acoplado_chasis"]), 1, 1);
                $pdf->Cell(189, 6, "Tipo de Acoplado: ".utf8_decode($tablaDatosProforma[0]["acoplado_tipo_desc"]), 1, 1);
                $pdf->Cell(189, 2, '', 0, 1);//end of line

                //Carga
                $pdf->SetFont('Times', 'B', 13);
                $pdf->Cell(189, 6, "Datos de la Carga", 1, 1);
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(94, 6, 'Peso Neto: '.utf8_decode($tablaDatosProforma[0]["peso_neto_carga"]), 1, 0);
                $pdf->Cell(95, 6, 'Tipo de Carga: '.utf8_decode($tablaDatosProforma[0]["tipo_carga_desc"]), 1, 1);

                $pdf->SetFont('Times', 'B', 12);

                $pdf->Cell(1, 6, "", 0, 0);
                $pdf->Cell(92, 6, 'Hazard ', 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(93, 6, 'Reefer', 1, 1);

                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(1, 6, "", 0, 0);
                $pdf->Cell(92, 6, 'Imo Class: '.utf8_decode($tablaDatosProforma[0]["imo_class"]), 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(93, 6, 'Temperatura: '.utf8_decode($tablaDatosProforma[0]["reefer_temperatura"]), 1, 1);
                $pdf->Cell(1, 6, "", 0, 0);
                $pdf->Cell(92, 6, 'Imo Sub Class: '.utf8_decode($tablaDatosProforma[0]["imo_sub_class"]), 1, 0);
                $pdf->Cell(2, 6, "", 0, 0);
                $pdf->Cell(93, 6, ' - ', 1, 1, "C");
                $pdf->Cell(1, 6, "", 0, 0);

                $pdf->Cell(2, 6, "", 0, 0);


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
            case 1:
                $valor = 0;
                break;

            case 2:
                $valor = 155;
                break;

            case 3:
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
            case 1:
                $valor = 142;
                break;

            case 2:
                $valor = 155;
                break;

            case 3:
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
            case 1:
                $valor = 57;
                break;

            case 2:
                $valor = 155;
                break;

            case 3:
                $valor = 0;
                break;

            default:
                $valor = 0;
                break;
        }
        return $valor;
    }
}