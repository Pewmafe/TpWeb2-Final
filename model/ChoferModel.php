<?php


class ChoferModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerProformas()
    {
        $sql = "SELECT p.id, c.nombre, c.apellido
                FROM proforma as p JOIN cliente as c 
                                    ON c.cuit = p.cliente_cuit
                                   JOIN viaje as v
                                    ON v.id = p.viaje_id
                GROUP BY p.id, c.nombre, c.apellido";
        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaProforma[] = $fila;
        }
        return $tablaProforma;
    }

    public function obtenerViajePorEstadoYChofer($estado, $idChofer)
    {

        $sql = "select  ep.descripcion as 'estado',
                        pd.descripcion as 'destino', 
                        pp.descripcion as 'partida',
                        j.eta, 
                        j.etd,
                        p.id as 'id_proforma'
                    from proforma p
                        join viaje j on p.viaje_id = j.id
                        join direccion dp on j.partida_id = dp.id
                        join direccion dd on j.destino_id = dd.id
                        join localidad lp on lp.id = dp.localidad
                        join localidad ld on ld.id = dd.localidad
                        join provincia pp on pp.id = lp.provincia_id
                        join provincia pd on pd.id = ld.provincia_id
                        join estado_proforma ep on ep.id = p.estado
                            where j.chofer_id =" . $idChofer . "
                            and p.estado = " . $estado;

        $resultado = $this->bd->query($sql);

        $resultado1 = $this->bd->query($sql);
        $verificacion = $resultado1->fetch_assoc();
        if ($verificacion == null) {
            $tablaDeViajes = null;
        } else {
            while ($fila = $resultado->fetch_assoc()) {

                $dateETA = new DateTime($fila["eta"]);
                $dateETD = new DateTime($fila["etd"]);

                if ((($dateETA->getTimestamp() - $dateETD->getTimestamp()) / 60 / 60) > 24) {
                    $diff = (($dateETA->getTimestamp() - $dateETD->getTimestamp()) / 60 / 60 / 24) . " Dias";
                } else {
                    $diff = (($dateETA->getTimestamp() - $dateETD->getTimestamp()) / 60 / 60) . " Horas";
                }

                $fila["tiempo_estimado"] = $diff;
                $tablaDeViajes[] = $fila;
            }
        }
        return $tablaDeViajes;
    }

    public function obtenerTodosLosDatosDeLaProformaSegunIDChofer($idChofer, $idProforma)
    {
        $sql = "select p.fechaCreacion as 'fecha_proforma',p.estado as 'estado_proforma', ep.descripcion as 'estado_descripcion_Proforma', p.id as 'proforma_id', c.nombre as 'nombre_cliente',
                c.apellido as 'apellido_cliente', c.cuit as 'cuit_cliente', dc.calle as 'calle_cliente',dc.altura as 'altura_cliente',
                lc.descripcion as 'localidad_cliente', pc.descripcion as 'provincia_cliente', c.denominacion as 'denominacion_cliente',
                c.email as 'email_cliente' , c.telefono as 'tel_cliente' , Uch.nombre as 'nombre_chofer', Uch.apellido as 'apellido_chofer',
                UCh.dni as 'dni_chofer', UCh.fecha_nacimiento as 'nacimiento_chofer', v.eta ,v.etd , dp.altura as 'partida_altura',
                dp.calle as 'partida_calle', lp.descripcion as 'partida_localidad', pp.descripcion as 'partida_provincia', dd.altura as 'destino_altura', 
                dd.calle as 'destino_calle', ld.descripcion as 'destino_localidad',  pd.descripcion 'destino_provincia',
				ve.patente as 'vehiculo_patente', ve.nro_chasis as 'vehiculo_nro_chasis', ve.nro_motor as 'vehiculo_nro_motor',
				ve.kilometraje as 'vehiculo_kilometraje', ve.fabricacion as 'vehiculo_fabricacion', ve.marca as 'vehiculo_marca', 
                ve.modelo as 'vehiculo_modelo', ve.calendario_service as 'vehiculo_service', a.patente as 'acoplado_patente',
                a.chasis as 'acoplado_chasis', ta.descripcion as 'acoplado_tipo_desc',ca.peso_neto as 'peso_neto_carga',
                tc.descripcion as 'tipo_carga_desc', IC.descripcion as 'imo_class', ISC.descripcion as 'imo_sub_class',
				rf.temperatura as 'reefer_temperatura'
                    from proforma p 
                    join cliente c on p.cliente_cuit = c.cuit 
                    join viaje v on v.id = p.viaje_id 
                    join carga ca on ca.id = v.carga_id 
                    join acoplado a on a.patente = v.acoplado_patente 
                    join vehiculo ve on ve.patente = v.vehiculo_patente 
                    join direccion dp on v.partida_id = dp.id 
                    join direccion dd on v.destino_id = dd.id 
                    join localidad lp on dp.localidad = lp.id 
                    join localidad ld on dd.localidad = ld.id 
                    join provincia pp on pp.id = lp.provincia_id 
                    join provincia pd on pd.id = ld.provincia_id 
                    join tipo_carga tc on tc.id_tipo_carga = ca.tipo 
                    join tipo_acoplado ta on ta.id = a.tipo
                    join estado_proforma ep on ep.id = p.estado
                    join direccion dc on dc.id = c.direccion
                    join localidad lc on dc.localidad = lc.id
                    join provincia pc on pc.id = lc.provincia_id
                    join empleado ECh on ECh.id = v.chofer_id
                    join usuario UCh on Uch.dni = ECh.dni_usuario
                    join hazard hz on hz.id = ca.hazard_id
                    join imo_sub_class ISC on ISC.id = hz.imo_sub_class_id
                    join imo_class IC on IC.id = ISC.imo_class_id
                    join reefer rf on rf.id_reefer = ca.reefer_id

                        where v.chofer_id = " . $idChofer . "
                        and p.id = " . $idProforma . ";";
        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaProformaSegunIdChofer[] = $fila;
        }

        return $tablaProformaSegunIdChofer;
    }
    public function obtenerViajePorEstado($estado)
    {

        $sql = "select 	ep.descripcion as 'TodosEstado',
                pd.descripcion as 'destino_todos', 
                pp.descripcion as 'partida_todos',
                p.id as 'id_proforma_todos',
                v.chofer_id as 'chofer_id_todos',
                Uch.nombre as 'nombre_chofer',
                Uch.apellido as 'apellido_chofer',
                cl.denominacion as 'denominacion_cliente'
                    from proforma p
                        join viaje v on p.viaje_id = v.id
                        join direccion dp on v.partida_id = dp.id
                        join direccion dd on v.destino_id = dd.id
                        join localidad lp on lp.id = dp.localidad
                        join localidad ld on ld.id = dd.localidad
                        join provincia pp on pp.id = lp.provincia_id
                        join provincia pd on pd.id = ld.provincia_id
                        join estado_proforma ep on ep.id = p.estado
                        join empleado ECh on ECh.id = v.chofer_id
                        join usuario UCh on UCh.dni = ECh.dni_usuario
                        join cliente cl on p.cliente_cuit = cl.cuit  

                            where p.estado = " . $estado;

        $resultado = $this->bd->query($sql);

        $resultado1 = $this->bd->query($sql);
        $verificacion = $resultado1->fetch_assoc();
        if ($verificacion == null) {
            $tablaDeViajes = null;
        } else {
            while ($fila = $resultado->fetch_assoc()) {

                $tablaDeViajes[] = $fila;
            }
        }

        return $tablaDeViajes;
    }
}
