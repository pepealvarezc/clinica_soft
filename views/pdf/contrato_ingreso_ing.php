<?php
require_once '../models/PacienteIngreso.php';
require_once '../models/ContactosPaciente.php';
require_once '../config/db.php';
date_default_timezone_set("America/Tijuana");
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
    $todayDate = date('M d, Y h:i:s A');
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

    .padding-tr {
        padding-top: 8px;
        line-height: 20px;
    }

</style>

<!-- PAGINA 1 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Contract and Conditions of Admission</h3>
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
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page. 1
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?=
                                        $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>

    <P class="subtitle-c">
        Primary Treatment.
    </p>

    <table>
        <tr>
            <td>
                Provision of professional services that celebrates in one hand Clinica Nuevo Ser A.C., hereinafter
                “Clinica
                Nuevo Ser”, and in the other
                carlos alberto aldana diaz, hereinafter the “ patient ”, the wording of the following statements and
                clauses:
            </td>
        </tr>
        <tr>
            <td>
                <p class="subtitle">STATEMENTS</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="subtitles-b">I. Declares Clinica Nuevo Ser</p>
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                a) Being a company legally incorporated under the current legislation in Mexico, residing in London
                Street #
                3551, Section Costa Azul,
                Playas de Tijuana, C.P. 22506, Tijuana, B.C. Mexico
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                b) That within its corporate purpose is the provide professional treatment for addictions and mental
                health.
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                c) Which has the powers to provide such services in a professional manner.
            </td>
        </tr>
        <tr>
            <td>
                <p class="subtitles-b">II. Declares the Pacient</p>
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                a) Being a person of <?= $data->edad_pa ?> years old, <?= $data->estado_civil_ip ?>, born in <?= $data->lugar_nacimiento_ip ?> , and that is their will to enter into the
                present contract and receive professional
                services Clinica Nuevo Ser.
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                b) Which is represented by the person signing below, and authorizesClinica Nuevo Ser to start the
                primary treatment for <?= $data->adicion_tratamiento ?> hereby accepting the
                patient to participate in each and
                every one of the activities deemed necessary for rehabilitation, including those that take place outside
                the premises.
            </td>
        </tr>
        <tr>
            <td>
                <p class="subtitle">CLAUSES</p>
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                1. The patient is required to pay Clinica Nuevo Ser the amount of $<?= $data->precio_tratamiento_ip ?> <?= $data->moneda_ip ?>. as compensation for the
                professional services received.
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                2.- The treatment fill have a duration of <?= $data->duracion_ip ?> weeks
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                3.- Upon admission the patient will deliver the amount of $<?= $data->deposito_ip ?> <?= $data->moneda_ip ?> amount not refundable if the patient for
                any reason abandon treatment
                before the stipulated time.
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                4.- The outstanding balance of: <?= (float)$data->precio_tratamiento_ip  - (float)$data->deposito_ip ?> <?= $data->moneda_ip ?> that must be covered as follows:
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                5.- In case of inter-specialized medical consultations (radiology, dental, cardiovascular, etc.) they
                carry an additional charge. The
                patients personal expenses, as well as the additional medications that the patient needs during his stay
                shall be be charged additionally,
                for this a deposit is needed for the following amount: $ MXP.
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                Notes:_________________________________________________________________
                ___________________________________________________________________________________
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                6.- In the case where the therapeutic staff deems necessary to prolong the stay of the patient,the fee
                for the additional time will be
                determined after the original days of treatment.
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                7.- In case of any medical emergency, the patient will be transferred to the hospital the doctor on duty
                deems appropriate, in which case
                the expenses will be covered by the family of the patient
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                8.- In the case of under age patients, it is authorized that Clinica Nuevo Ser A.C. to act as considered
                necessary by the medical and therapeutic staff.
            </td>
        </tr>
    </table>

</page>

<!-- PAGINA 2 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <p></p>
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
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page 2
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?php
                                    $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>

    <table>
        <tr>
            <td class="padding-tr">
                9.- Treatment includes medical care 24 hours a day, lab work, adequate food in quantity and quality,
                individualized counseling services
                and group psychotherapy that the patient requires during their stay, as well as family therapy
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                10.- We reserve the right to refuse admission and clarified that patients will not be accepted as those
                suffering from any infectious or
                contagious disease or those with severe acute or chronic mental disorders.
            </td>
        </tr>
        <tr>
            <td>
                <p class="subtitles-b">I. Declares Clinica Nuevo Ser</p>
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                11.- We are not responsible for loss or damage to personal property that the patient maintains during
                their stay in this place; or physical
                damages incurred by self-destructive behavior or fights in which you could see involved
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                12.- The damage causes the patient at our facilities, as well as third parties shall be paid by the
                family member.
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                13.- This institution is not responsible for keeping the patient within it, since the treatment is 100%
                volunteer shall be exempt from any
                responsibility for the life and belongings of the patient if this leaves our facilities for any reason
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                14.- Family and / or guardian accept the regulations suggests by the institution for the rehabilitation
                of the patient. Disregard of these
                clause will cause immediate discharge. Telephone calls and family visits will only be authorized by
                agreement of the therapeutic team
            </td>
        </tr>
        <tr>
            <td class="padding-tr">
                15.- The undersigned certify that they have read and accepted the above, they are identified as a
                patient, relative of the patient and / or
                guardian of the patient properly and legally authorized claiming to have no connection with the
                production, distribution or sale of illegal
                drugs, or be in prosecution for these crimes.
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
        <thead>
        <tr>
            <th>
                Patient
                <p>
                    <?= $data->nombre_ip ?> <?= $data->apellido_paterno_ip ?> <?= $data->apellido_materno_ip ?>
                </p>
            </th>
            <th>
                Family Member
            </th>
            <th>
                Legal Guardian
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
                <p class="firma-d">Signature</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Signature</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Name and Signature</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Signature</p>
            </td>
        </tr>
        </tbody>
    </table>

</page>

<!-- PAGINA 3 !-->
<page pageset='new' backtop="10mm" backbottom="10mm" backleft="" backright="">
    <page_header class="header">
        <h3>Eximisiones Sheet of Liability</h3>
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
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page 3
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?php
                                    $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    <P class="subtitle-c">
        Primary Treatment
    </p>
    <P class="subtitle-c">
        Clínica Nuevo Ser A.C.
    </p>
    <p class="txt-top subtitle-c">
        Inpatient unit.
    </p>
    <p>
        ElSr.(a)
        <?= $data->resp_legal ?>
    <p>
        s the legal guardian for Mr.
        (Mrs.) <?= $data->nombre_ip ?> <?= $data->apellido_paterno_ip ?> <?= $data->apellido_materno_ip ?>
        who enters this inpacient
        unit on the day: <?= $data->fecha_alta_ing ?> <?= $data->hora_alta_ig ?> agree with the following:
    </p>
    <p>
        This institution is not responsible for direct or indirect health status caused by the
        abuse of drugs and / or alcohol that could cause the patient's death causes the leak
        and the injuries (to this and / or this).
    <P>
    </p>
    Tijuana B.C. a <?php echo date("d/m/y") ?>
    </P>
    </p>

    <div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <table>
        <thead>
        <tr>
            <th>
                Legal Guardia
                <p>
                    <?= $data->resp_legal ?>
                </p>
            </th>
            <th>
                Witness 1
            </th>
            <th>
                Witness 2
            </th>
            <th>
                CLINICA NUEVO SER A.C.
                <p>Director Genera</p>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Signature</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Name and Signature</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Name and Signature</p>
            </td>
            <td>
                <p class="firma-line">_______________________</p>
                <p class="firma-d">Signature</p>
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
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page 4
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?php
                                    $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
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
        <h3>LETTER OF INFORMED CONSENT</h3>
        <p style="margin-top: -12px">
            NOM-168-SSA1-1998
        </p>
        <p>
            Clinica Nuevo Ser A.C., in compliance with the Official Mexican Standard NOM-168-SSA1-1998, we
            inform the benefits and risks relevant to the nature of the service that the institution offers in the
            treatment
            of (Mr) (Mrs.) (Young) carlos alberto aldana diaz.
        </p>
        <h3 style="font-weight: bold;">
            Benefits of our program:
        </h3>
        <ul>
            <li>Medical Care 24 hrs.</li>
            <li>Medical evaluation and laboratory studies upon admission.</li>
            <li>Medical procedure for detoxification (except in cases where the patient is not intoxicated).</li>
            <li>Monitoring the health status of the patient recommendations, as appropriate.
            </li>
            <li>Group psychotherapy four hours a day from Monday to Saturday</li>
            <li>Individual therapy sessions.</li>
            <li>Consulting in Twelve Step Program.</li>
            <li>Daily fitness sessions.</li>
            <li>Healthy and palatable food.</li>
            <li>Daily sessions or N.A. and / or A.A.</li>
            <li>Sesiones de Estudio de Pasos.</li>
            <li>Family visit and multifamily weekly therapy sessions.</li>
            <li>Therapeutic family meetings.</li>
            <li>Family Member Counseling and Consulting.</li>
        </ul>
        <h3 style="font-weight: bold;">
            What is NOT included in the treatment:
        </h3>
        <ul>
            <li>Food that the patient requires different that the one we provide.</li>
            <li>Toiletries such as shaving soap, razors, shampoo etc.</li>
            <li>Buying items or foods sold in the clinic’s store (chocolates, biscuits, sweets etc.).
            </li>
            <li>Drugs for other diseases (eg diabetes, hypertension) than those used in the patient at detoxification
                stage.
            </li>
            <li>Damage caused by vandalism by the patient or family.</li>
        </ul>
        <h3 style="font-weight: bold;">
            Risks:
        </h3>
        <ul>
            <li>Allergic reaction to medications or food it receives that have not been reported at there admission.
            </li>
            <li>
                Hyperotension produce by hemodynamic changes due to substance and general deterioration of
                the patient.
            </li>
            <li>
                Self-harm due to exacerbation of emotional states.
            </li>
            <li>
                Accidents caused by drug-induced sedation.
            </li>
            <li>
                Viral infectious processes because of their already compromised immune system.
            </li>
            <li>
                Manifestation of symptoms previously masked by substance use.
            </li>
            <li>
                Clashes with colleagues or members of the treatment team.
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
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page 5
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?php
                                    $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
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
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page 6
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?php
                                    $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page_footer>
    <ul>
        <li>Escape.</li>
        <li>Attitude of resistance to treatment.</li>
        <li>In case of any medical emergency, the patient will be taken to the hospital the doctor on duty
            deems appropriate, in which case the expenses will be covered by responsible family member.
        </li>
    </ul>
    <br>
    <br>
    <br>
    <br>
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
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page 7
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?php
                                    $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
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
        <div style="width: 100%; background: #eeeeee; padding: 5px">
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="font-size: 11px">Clinica Nuevo Ser A.C.</td>
                            </tr>
                            <tr>
                                <?php if ($data->nombre_entidad == 'CAP1') : ?>
                                    <td style="font-size: 11px">
                                        Calle Londres #3551, Sección Costa Azul, Playas de Tijuana, C.P. 22506, Tijuana,
                                        B.C. México
                                    </td>
                                <?php elseif ($data->nombre_entidad == 'CAP2') : ?>
                                    <td style="font-size: 11px">
                                        Calle Parral 3041, Fracc. Rosamar, Col.Santa Lucia, Rosarito B.C., México.
                                        C.P.22705
                                    </td>
                                <?php else : ?>
                                    <td style="font-size: 11px">
                                        Paseo Ensenada 1385, Playas, Las Flores 1ra Secc, 22500 Tijuana, B.C
                                    </td>
                                <?php endif; ?>
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
                                    Page 8
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right">
                                    <?php
                                    $todayDate
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 11px; text-align: right"> <?= $data->nombre_us ?> </td>
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

