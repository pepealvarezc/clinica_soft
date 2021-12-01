<?php
require_once '../models/PacienteIngreso.php';
require_once '../models/ContactosPaciente.php';
require_once '../config/db.php';
if (isset($_GET['idI']) && isset($_GET['idP'])) {
    $paciente_id = $_GET['idP'] ? filter_var($_GET['idP'], FILTER_VALIDATE_INT) : false;
    $ingreso_id = $_GET['idI'] ? filter_var($_GET['idI'], FILTER_VALIDATE_INT) : false;
    $paciente = new PacienteIngreso();
    $paciente->setId($ingreso_id);
    $paciente->setPacienteId($paciente_id);
    $data = $paciente->getAll();

    //Contactos del paciente
    $contactos = new ContactosPaciente();
    $contactos->setPacienteId($paciente_id);
    $contactos->setIngresoId($ingreso_id);
    $obj = $contactos->getAll();
    $arr = array();
    while ($d = $obj->fetch_assoc()) {
        $arr[] = $d;
    }
}
?>

<style type="text/css">
    p {
        line-height: 18px;
        text-align: justify;
    }

    .subtitle {
        text-align: center;
        font-weight: bold;
    }

    .subtitles-b {
        font-weight: bold;
    }

    th {
        text-align: center;
        font-weight: normal;
    }

    th p {
        text-align: center;
    }

    .firma-d {
        text-align: center;
        margin-top: -12px;
    }

    .firma-line {
        margin-top: 50px;
    }

    .txt-top {
        margin-top: -15px;
    }

    .subtitle-c {
        font-size: 18px;
    }

    .txt-th {
        font-size: 10px;
    }

    .txt-none {
        color: #fff;
    }

</style>

<!-- PAGINA 1 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Contrato y Condiciones de Admisión</h3>
    </page_header>
    <page_footer>
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px">
                                    Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                    B.C. México
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 11px">MX +52 (664) 630.9935 » USA 1.800.664.625</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px; text-align: right; width: 230px;">
                                    Pag. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">Jun 4, 2021 1:26:43 PM</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">amarc</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    <p>
        Contrato de Prestación de Servicios Profesionales que celebran por una parte Clinica Nuevo Ser A.C., en lo
        sucesivo “Clinica Nuevo Ser”, y por la otra carlos alberto aldana diaz, en lo sucesivo “El Paciente”, al
        tenor
        de las siguientes declaraciones y clausulas:
    </p>
    <p class="subtitle">DECLARACIONES</p>
    <p class="subtitles-b">I. Declara Clinica Nuevo Ser</p>
    <p>
        a) Ser una empresa Legalmente constituida de acuerdo a la legislación vigente en la República Mexicana,
        con domicilio en Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana, B.C.
        México.
    </p>

    b) Que dentro de su objeto social, se encuentra el brindar tratamiento profesional para las adicciones y la
    salud mental.
    <p>
        c) Que cuenta con las facultades para brindar dichos servicios de forma profesional.
    </p>

    <p class="subtitles-b">II. Declara El Paciente</p>
    <p>
        a) Ser una persona física de 41 años de edad, Soltero, nacido en leon , y que es su voluntad celebrar el
        presente contrato y recibir los servicios profesionales de Clinica Nuevo Ser.
    <p>
        b) Que se encuentra representado por la persona que firma al calce, y que autoriza a Clinica Nuevo Ser a
        iniciar el tratamiento por Alcoholismo, Drogadiccion, Ludopatia, Depresion, Transtorno alimenticio,
        Transtorno
        Mental aceptando en este acto que el paciente participe en todas y cada una de las actividades que se
        consideren necesarias para su tratamiento, inclusive aquellas que se lleven a cabo fuera de las
        instalaciones.
    </p>
    </p>

    <p class="subtitle">CLAUSULAS</p>
    <p>
        1. El paciente, familiar responsable y/o el representante legal se obliga a pagar a Clinica Nuevo Ser como
        contraprestación por los servicios profesionales recibidos la cantidad de: $ MXP ()
    <p>
        2.- El tratamiento tendrá una duración de semanas.
    </p>
    3.- Al ingresar el paciente se deberá entregar la cantidad de $ MXP () cantidad que no será reembolsable si
    el paciente por cualquier razón abandonara el tratamiento antes del tiempo estipulado.
    <p>
        4.- El saldo pendiente por liquidar es de: $ MXP que deberá ser cubierto de la siguiente manera:
    </p>
    </p>
    <p>
        5.- Tendra un costo adicional al valor del tratamiento lo siguiente:
    <p>
        a.- Interconsultas medicas especializadas como psiquiatricas, neurologicas,
        dentales y otras.
    </p>
    b.- Medicamentos que el paciente requiera durante su estancia.
    </p>
</page>

<!-- PAGINA 2 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
    </page_header>

    <page_footer>
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px">
                                    Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                    B.C. México
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 11px">MX +52 (664) 630.9935 » USA 1.800.664.625</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px; text-align: right; width: 230px;">
                                    Pag. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">Jun 4, 2021 1:26:43 PM</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">amarc</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    c.- Estudios psicometricos, electroencefalogramas y otros.
    <P>
        d.- Consumo de articulos de aseo personal y gastos de tiendita.
    </P>
    6.- Para lo antes mencionado es necesario dejar un deposito de $ MXP ().
    <p>
        7.- En caso de presentarse alguna emergencia médica, el paciente será trasladado al Hospital que el médico
        en turno considere conveniente, en cuyo caso los gastos ocasionados serán cubiertos por cuenta del familiar
        responsable.
    </p>
    8.- El tratamiento incluye cuidados médicos las 24 horas del día, , análisis de laboratorio, alimentación
    adecuada en cantidad y calidad, servicios de atención psicológica individualizada y psicoterapia de grupo
    que el paciente requiera durante su estancia, así como el tratamiento familiar.
    <p>
        9.- Nos reservamos el derecho de admisión y aclaramos que no serán aceptadas como pacientes aquellas
        personas que padezcan alguna enfermedad infecto contagiosa o aquellas personas con trastornos mentales
        agudos o crónicos graves.
    <P>
        10.- No nos hacemos responsables de la pérdida o daños en las propiedades personales que el paciente
        retenga durante su estancia en este lugar; ni de los daños físicos que se ocasione por conductas
        autodestructivas o riñas en las que se pudiera ver involucrado.
    </P>
    11.- Los daños materiales que el paciente provoque en nuestras instalaciones, así como a terceros correrán
    por cuenta del familiar responsable.
    <p>
        12.- Esta institución no se hace responsable de mantener al paciente dentro de la misma, ya que el
        tratamiento es 100% voluntario quedando exenta de cualquier responsabilidad sobre la vida y pertenencias
        del paciente si este abandona nuestras instalaciones por cualquier motivo.
    <p>
        13.- El familiar y/o tutor aceptan los reglamentos que la institución sugiere para la rehabilitación del
        paciente.
        La no observancia de estos causa la baja inmediata. Las llamadas telefónicas y las visitas familiares
        solamente serán autorizadas por acuerdo del equipo terapéutico.
    </p>
    14.- Los abajo firmantes certifican que han leído y aceptado todo lo anterior, se identifican como paciente,
    familiar del paciente y/o apoderado del paciente debida y legalmente autorizados declarando no tener
    ninguna relación con la producción, distribución o venta de drogas ilegales, ni estar en persecución por estos
    delitos.
    </p>
    </p>

    <div>
    </div>

    <table>
        <thead>
        <tr>
            <th>
                PACIENTE
                <p>
                    <?= $data->nombre_ip ?> <?= $data->apellido_paterno_ip ?> <?= $data->apellido_materno_ip ?>
                </p>
            </th>
            <th>
                FAMILIAR DEL PACIENTE
            </th>
            <th>
                APODERADO O TUTOR
            </th>
            <th>
                CLINICA NUEVO SER A.C.
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Firma</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Firma</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Nombre y Firma</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Nombre y Firma</p>
            </td>
        </tr>
        </tbody>
    </table>

</page>

<!-- PAGINA 3 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Hoja de Eximision de Responsabilidades</h3>
    </page_header>
    <page_footer>
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px">
                                    Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                    B.C. México
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 11px">MX +52 (664) 630.9935 » USA 1.800.664.625</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px; text-align: right; width: 230px;">
                                    Pag. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">Jun 4, 2021 1:26:43 PM</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">amarc</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    <P class="subtitle-c">
        Clínica NuevoSer A.C.
    </p>
    <p class="txt-top subtitle-c">
        Unidad de internamiento.
    </p>
    <p>
        ElSr.(a)
        <?= $data->resp_legal ?>
    <p>
        Responsable Legal del
        paciente <?= $data->nombre_ip ?> <?= $data->apellido_paterno_ip ?> <?= $data->apellido_materno_ip ?> que ingresa
        a la unidad de
        internamiento, el día <?= $data->fecha_alta_ing ?> en punto de las <?= $data->hora_alta_ig ?> está de acuerdo
        con
        lo siguiente:
    </p>
    <p>
        Esta Institución (Clinica Nuevo Ser A.C.) no es responsable de causas directas o indirectas
        del estado de salud causado por el abuso de drogas y/o alcohol que pudiesen ocasionar el
        fallecimiento del paciente, la fuga del mismo así como las lesiones sufridas (a éste y/o por
        éste).
    <P>
    </p>
    Tijuana B.C. a <?php echo date("d/m/y") ?>
    </P>
    </p>

    <div>
    </div>

    <table>
        <thead>
        <tr>
            <th>
                Responsable Legal
            </th>
            <th>
                Testigo
            </th>
            <th>
                Clinica Nuevo SER A.C.
                <p>
                    Director General
                </p>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p class="firma-line">______________________________</p>
                <p class="firma-d">Firma</p>
            </td>
            <td>
                <p class="firma-line">______________________________</p>
                <p class="firma-d">Nombre y Firma</p>
            </td>
            <td>
                <p class="firma-line">______________________________</p>
                <p class="firma-d">Firma</p>
            </td>
        </tr>
        </tbody>
    </table>

</page>

<!-- PAGINA 4 !-->
<page pageset='new' backtop="10mm" backbottom="" backleft="" backright="">
    <page_header class="header">
        <h3>Hoja de Eximision de Responsabilidades</h3>
    </page_header>
    <page_footer>
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px">
                                    Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                    B.C. México
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 11px">MX +52 (664) 630.9935 » USA 1.800.664.625</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px; text-align: right; width: 230px;">
                                    Pag. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">Jun 4, 2021 1:26:43 PM</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">amarc</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    <p>
        Yo C. Juana Perez solicito a la Unidad Hospitalaria y de tratamiento “Clinica Nuevo Ser A.C.” el internamiento
        involuntario de mi familiar o representado legal; así mismo solicito el apoyo en caso de ser necesario a las
        autoridades correspondientes para llevar a cabo el traslado a esta institución. También autorizo al personal
        médico
        paramédico y de asistencia de la Unidad Hospitalaria “Clinica Nuevo Ser A.C.” Para que al citado paciente se le
        traslade a esta institución y le sean aplicados el o los estudios y tratamientos que se consideren necesarios.
    </p>
    <p>
        La Unidad Hospitalaria realiza el internamiento involuntario de C. carlos alberto aldana diaz de acuerdo a lo
        señalado en el Reglamento de la Ley General de Salud en Materia de Prestación de Servicios de Atención Médica en
        su artículo77: “Será involuntario el ingreso a los hospitales cuando por encontrarse el familiar, tutor o
        representante
        legal u otra persona que en caso de urgencia solicita el servicio y siempre que exista previamente indicación al
        respecto por parte del médico tratante”.
    </p>
    <p>
        Estoy informado (a) y de acuerdo, que debido a las características de este hospital existe el riesgo de que el o
        la
        paciente egrese sin consentimiento médico.
    </p>
    <p>
        Además se requiere la certificación escrita de dos médicos. Uno de los cuales debe ser Psiquiatra y tener a
        cargo la
        admisión de enfermos en la Institución.
    </p>
    <div>
    </div>
    <table>
        <thead>
        <tr>
            <th>
                Nombre del responsable del paciente:
            </th>
            <th>
                <?= $data->resp_legal ?>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p class="">Parentesco:</p>
                <p class="">Domicilio:</p>
                <p class="">Teléfonos:</p>
            </td>
            <td>
                <p class="">______________________________</p>
                <p class="">______________________________</p>
                <p class="">______________________________</p>
            </td>
        </tr>
        </tbody>
    </table>
    <div></div>
    <p>Tijuana, B.C. a <?php setlocale(LC_ALL, "es_ES");
        echo strftime("%A %d de %B del %Y"); ?> </p>
    <div></div>
    <div></div>
    <table>
        <thead>
        <tr>
            <th class="txt-th">
                RESPONSABLE LEGAL DEL PACIENTE
                <p><?= $data->resp_legal ?></p>
            </th>
            <th class="txt-th">
                MEDICO #1 QUE INDICA EL TRATAMIENTO
            </th>
            <th class="txt-th">
                MEDICO #2 QUE INDICA EL TRATAMIENTO
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p class="firma-line txt-none">________________________________</p>
                <p class="firma-d txt-none">Nombre y Firma</p>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Firma</p>
            </td>
            <td>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Nombre y Firma</p>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Cédula Profesional</p>
            </td>
            <td>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Nombre y Firma</p>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Cédula Profesional</p>
            </td>
        </tr>
        </tbody>
    </table>

</page>

<!-- PAGINA 5 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="30">
    <page_header class="header">
        <h3>Carta de Consentimiento Informado</h3>
        <p style="margin-top: -12px">
            NOM-168-SSA1-1998
        </p>
        <p>
            Clinica Nuevo Ser A.C., en apego a la Norma Oficial Mexicana NOM-168-SSA1-1998, hace de su
            conocimiento los beneficios y riesgos pertinentes a la naturaleza del servicio que esta institución ofrece
            en el tratamiento de (Sr.) (Sra.) (Joven) carlos alberto aldana diaz.
        </p>
        <h3 style="font-weight: bold;">
            Beneficios de nuestro Programa:
        </h3>
        <ul>
            <li>Atención del Área Médica las 24 hrs.</li>
            <li>Valoración médica y estudios de laboratorio clínico al ingreso.</li>
            <li>Procedimiento médico para desintoxicación (exceptuando los casos de pacientes no intoxicados).</li>
            <li>Seguimiento del estado de salud del paciente y recomendaciones al mismo o a su familia, según el caso.
            </li>
            <li>Psicoterapia grupal cuatro horas diarias de lunes a sábado.</li>
            <li>Sesiones de terapia individual.</li>
            <li>Consultoría en el Programa de Doce Pasos.</li>
            <li>Sesiones diarias de Acondicionamiento físico.</li>
            <li>Alimentos saludables y agradables al paladar.</li>
            <li>Juntas diarias de A. A. o N. A.</li>
            <li>Sesiones de Estudio de Pasos.</li>
            <li>Visita familiar y sesiones de Terapia Multifamiliar semanal.</li>
            <li>Encuentros familiares terapéuticos programados.</li>
            <li>Asesoría y Consultoría familiar.</li>
        </ul>
        <h3 style="font-weight: bold;">
            Que es lo que NO esta incluido en el tratamiento:
        </h3>
        <ul>
            <li>Alimentación que requiera el paciente distinta a nuestro menú.</li>
            <li>Artículos de aseo personal como jabón para rasurar, rastrillos, shampoo etc.</li>
            <li>Compra de artículos o alimentos que se venden en la tienda de la Clínica (chocolates, galletas, dulces
                entre otros).
            </li>
            <li>Medicamentos, interconsultas medicas como psiquiatra, pruebas psicologias, dentista radiologia.</li>
            <li>Danos ocasionados por vandalismo de el paciente o familiares..</li>
        </ul>
        <h3 style="font-weight: bold;">
            Riesgos:
        </h3>
        <ul>
            <li>Reacción alérgica a medicamentos o alimentos que reciba y que no hubiesen sido reportados a su ingreso
                debido a desconocimiento de ello.
            </li>
            <li>Hipotensión inducida por alteraciones hemodinámicas producto del consumo de sustancias y deterioro
                general del paciente.
            </li>
        </ul>
    </page_header>
    <page_footer>
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px">
                                    Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                    B.C. México
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 11px">MX +52 (664) 630.9935 » USA 1.800.664.625</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px; text-align: right; width: 230px;">
                                    Pag. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">Jun 4, 2021 1:26:43 PM</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">amarc</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
</page>

<!-- PAGINA 6 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
    </page_header>
    <page_footer>
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px">
                                    Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                    B.C. México
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 11px">MX +52 (664) 630.9935 » USA 1.800.664.625</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px; text-align: right; width: 230px;">
                                    Pag. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">Jun 4, 2021 1:26:43 PM</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">amarc</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    <ul>
        <li>Auto agresiones debido a exacerbación de estados emocionales.</li>
        <li>Accidentes provocados por la sedación inducida por medicamento.</li>
        <li>Procesos infecciosos virales debido a su ya afectado sistema inmunológico.</li>
        <li>Manifestación de sintomatología enmascarada anteriormente por el consumo de sustancias.</li>
        <li>Enfrentamientos con otros compañeros o miembros del equipo terapéutico.</li>
        <li>Fuga.</li>
        <li>Actitud de resistencia al tratamiento.</li>
        <li>En caso de presentarse alguna emergencia médica, el paciente será trasladado al hospital que
            el médico en turno considere conveniente, en cuyo caso los gastos ocasionados serán
            cubiertos por cuenta del familiar responsable.
        </li>
        <li>En caso de presentar positivo a COVID-19 SAAR-2 se canalizara el paciente junto con sus familiares a un
            aislamiento minimo de 14 dias por lo tanto no podra permanecer en esta insitucion.
        </li>
    </ul>
    <div></div>
    <div></div>
    <div></div>
    <table>
        <thead>
        <tr>
            <th class="txt-th">
                EL PACIENTE
                <p><?= $data->nombre_ip ?> <?= $data->apellido_paterno_ip ?> <?= $data->apellido_materno_ip ?></p>
            </th>
            <th class="txt-th">
                RESPONSABLE LEGAL DEL PACIENTE
                <?= $data->resp_legal ?>
            </th>
            <th class="txt-th">
                TESTIGO
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Firma</p>
            </td>
            <td>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Firma</p>
            </td>
            <td>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Nombre y Firma</p>
            </td>
        </tr>
        <tr style="margin-top: 25px;">
            <td></td>
            <td>
                <p class="txt-th" style="text-align: center">EL DIRECTOR DE</p>
                <p class="txt-th" style="text-align: center; margin-top: -15px">CLINICA NUEVO SER A.C.</p>
                <p class="firma-line">________________________________</p>
                <p class="firma-d">Nombre y Firma</p>
            </td>
            <td>
            </td>
        </tr>
        </tbody>
    </table>
</page>

<!-- PAGINA 7 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Ficha de Identificación</h3>
    </page_header>
    <page_footer>
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px">
                                    Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                    B.C. México
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 11px">MX +52 (664) 630.9935 » USA 1.800.664.625</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px; text-align: right; width: 230px;">
                                    Pag. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">Jun 4, 2021 1:26:43 PM</td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"
                                ">amarc</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>

    <table>
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p>Fecha y hora de ingreso:</p>
            </td>
            <td>
                <p style="margin-left: 5px; font-weight: bold;"><?= $data->fecha_alta_ing ?></p>
            </td>
            <td>
                <p style="font-weight: bold;"><?= $data->hora_alta_ig ?></p>
            </td>
            <td>
                <p style="margin-left: 300px; float: right; font-weight: bold;"> Clave: C1098</p>
            </td>
        </tr>
        </tbody>
    </table>

    <div style="background: #000011; margin-top: 5px; margin-bottom: 5px;">
        <h3 style="text-align: center; color: #fff"><span
                    style="font-weight: normal;">Nombre:</span> <?= $data->nombre_ip ?>
            <?= $data->apellido_paterno_ip ?> <?= $data->apellido_materno_ip ?>
        </h3>
    </div>
    <table>
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="padding-right: 10px">
                Edad:
                <span style="font-weight: bold; margin-left: 3px;"><?= $data->edad_pa ?></span>
            </td>
            <td style="padding-right: 10px">
                Estado Civil:
                <span style="font-weight: bold; margin-left: 3px;">
                     <?= $data->estado_civil_ip ?>
                </span>
            </td>
            <td style="padding-right: 10px">
                Hijos:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->hijos_ip ?>
                </span>
            </td>
            <td style="padding-right: 10px">
                Edades:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->edades_hijos_ip ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Fecha y lugar de nacimiento:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->fecha_nacimineto_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->lugar_nacimiento_ip ?>
                </span>
            </td>
        </tr>

        <tr>
            <td style="padding-right: 10px">
                Domicilio:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->calle_vive_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->codigo_postal_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                     <?= $data->colonia_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->ciudad_vive_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->estado_vive_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->pais_vive_ip ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Escolaridad y ocupación:
                <span style="font-weight: bold; margin-left: 5px;">
                   <?= $data->escolaridad_ip ?> / <?= $data->ocupacion_ip ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Drogas que usa:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->adicion_tratamiento ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Acompañado por:
                <span style="font-weight: bold; margin-left: 5px;">
                     <?= $data->resp_legal ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Estado y actitud al ingresar:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->estado_actitud ?>
                </span>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>

    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($arr)) : ?>
            <?php for ($i = 0; $i < count($arr); $i++) : ?>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td style="border-bottom: solid 1px #000011; width: 250px;">
                        <span style="margin-left: 5px;"><?php echo $arr[$i]['nombre_contacto'] ?></span>
                    </td>
                    <td style="padding-left: 10px">Parentesco:</td>
                    <td style="border-bottom: solid 1px #000011; width: 250px;">
                        <span style="margin-left: 5px;"><?php echo $arr[$i]['parentesco_cp'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td style="border-bottom: solid 1px #000011; width: 250px;">
                        <span style="margin-left: 5px;"><?php echo $arr[$i]['telefono_cp'] ?></span>
                    </td>
                    <td style="padding-left: 10px">Correo:</td>
                    <td style="border-bottom: solid 1px #000011; width: 250px;">
                        <span style="margin-left: 5px;"><?php echo $arr[$i]['correo_cp'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 10px"></td>
                </tr>
            <?php endfor; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <br>

    <p>Medio por el cual se entero: <span
                style="font-weight: bold; margin-left: 5px;"><?= $data->modo_se_entero ?></span></p>

</page>

<!-- PAGINA 8 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Ficha de Ingreso</h3>
    </page_header>
    <page_footer>
    </page_footer>

    <table>
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>
                <p>Fecha y hora de ingreso:</p>
            </td>
            <td>
                <p style="margin-left: 5px; font-weight: bold;"><?= $data->fecha_alta_ing ?></p>
            </td>
            <td>
                <p style="font-weight: bold;"><?= $data->hora_alta_ig ?></p>
            </td>
            <td>
                <p style="margin-left: 300px; float: right; font-weight: bold;"> Clave: C1098</p>
            </td>
        </tr>
        </tbody>
    </table>

    <div style="background: #000011; margin-top: 5px; margin-bottom: 5px;">
        <h3 style="text-align: center; color: #fff"><span
                    style="font-weight: normal;">Nombre:</span> <?= $data->nombre_ip ?>
            <?= $data->apellido_paterno_ip ?> <?= $data->apellido_materno_ip ?>
        </h3>
    </div>

    <table>
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="padding-right: 10px">
                Edad:
                <span style="font-weight: bold; margin-left: 3px;"><?= $data->edad_pa ?></span>
            </td>
            <td style="padding-right: 10px">
                Estado Civil:
                <span style="font-weight: bold; margin-left: 3px;">
                     <?= $data->estado_civil_ip ?>
                </span>
            </td>
            <td style="padding-right: 10px">
                Hijos:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->hijos_ip ?>
                </span>
            </td>
            <td style="padding-right: 10px">
                Edades:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->edades_hijos_ip ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Fecha y lugar de nacimiento:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->fecha_nacimineto_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->lugar_nacimiento_ip ?>
                </span>
            </td>
        </tr>

        <tr>
            <td style="padding-right: 10px">
                Domicilio:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->calle_vive_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->codigo_postal_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                     <?= $data->colonia_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->ciudad_vive_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->estado_vive_ip ?>
                </span>
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->pais_vive_ip ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Escolaridad y ocupación:
                <span style="font-weight: bold; margin-left: 5px;">
                   <?= $data->escolaridad_ip ?> / <?= $data->ocupacion_ip ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Drogas que usa:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->adicion_tratamiento ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Acompañado por:
                <span style="font-weight: bold; margin-left: 5px;">
                     <?= $data->resp_legal ?>
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px">
                Estado y actitud al ingresar:
                <span style="font-weight: bold; margin-left: 5px;">
                    <?= $data->estado_actitud ?>
                </span>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($arr)) : ?>
            <?php for ($i = 0; $i < count($arr); $i++) : ?>
                <tr>
                    <td>
                        Nombre: <span
                                style="font-weight: bold; margin-left: 5px;"><?php echo $arr[$i]['nombre_contacto'] ?></span>
                    </td>
                    <td>
                        Parentesco: <span
                                style="font-weight: bold; margin-left: 5px;"><?php echo $arr[$i]['parentesco_cp'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tel: <span
                                style="font-weight: bold; margin-left: 5px;"><?php echo $arr[$i]['telefono_cp'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Correo: <span
                                style="font-weight: bold; margin-left: 5px;"><?php echo $arr[$i]['correo_cp'] ?></span>
                    </td>
                </tr>
            <?php endfor; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <p>Medio por el cual se entero: <span
                style="font-weight: bold; margin-left: 5px;"><?= $data->modo_se_entero ?></span></p>

</page>

