<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//FILTERING
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


//STAP 1
$naam_leerling = htmlentities($_POST['naam-leerling']);
$geboortedatum_leerling = htmlentities($_POST['geboortedatum-leerling']);


//STAP 2
$opleiding_leerling = $_POST['opleiding-leerling'];
if ($opleiding_leerling == "VMBO") {
  $vmbo_niveau = $_POST['vmbo-niveau'];
  if(in_array('vmbo-bb', $vmbo_niveau)) {
    $vmbo_niveau = "VMBO BB";
  } else if(in_array('vmbo-kb', $vmbo_niveau)) {
    $vmbo_niveau = "VMBO KB";
  } else if(in_array('vmbo-gl', $vmbo_niveau)) {
    $vmbo_niveau = "VMBO GL";
  } else if(in_array('vmbo-tl', $vmbo_niveau)) {
    $vmbo_niveau = "VMBO TL";
  } else if(in_array('vmbo-lwt', $vmbo_niveau)) {
    $vmbo_niveau = "VMBO LWT";
  } else if(in_array('vmbo-lwoo', $vmbo_niveau)) {
    $vmbo_niveau = "VMBO LWOO";
  }

  $vmbo_sector = $_POST['vmbo-sector'];
  if(in_array('vmbo-economie', $vmbo_sector)) {
    $vmbo_sector = "Economie";
  } else if(in_array('vmbo-landbouw', $vmbo_sector)) {
    $vmbo_sector = "Landbouw";
  } else if(in_array('vmbo-techniek', $vmbo_sector)) {
    $vmbo_sector = "Techniek";
  } else if(in_array('vmbo-zorg_welzijn', $vmbo_sector)) {
    $vmbo_sector = "Zorg &amp; welzijn";
  }

  $vmbo_mvi = $_POST['vmbo-mvi'];
  if(in_array('vmbo-mvi_ja', $vmbo_mvi)) {
    $vmbo_mvi = "Ja";
  } else if(in_array('vmbo-mvi_nee', $vmbo_mvi)) {
    $vmbo_mvi = "Nee";
  }

  $vmbo_diploma = htmlentities($_POST['vmbo-diploma']);

  $volledige_opleiding_leerling = '
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Opleiding leerling</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $opleiding_leerling . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>VMBO niveau</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $vmbo_niveau . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>VMBO sector</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $vmbo_sector . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-credit-card"></i></span>MVI gedaan?</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $vmbo_mvi . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-calendar-alt"></i></span>Diploma behaald/ te behalen op</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $vmbo_diploma . '</div>
      </div>
    </div>
  ';
  $volledige_opleiding_leerling_pdf = '
    <p><span><strong>Opleiding leerling</strong>: ' . $opleiding_leerling . '</span></p>
    <p><span><strong>VMBO niveau</strong>: ' . $vmbo_niveau . '</span></p>
    <p><span><strong>VMBO sector</strong>: ' . $vmbo_sector . '</span></p>
    <p><span><strong>MVI gedaan?</strong>: ' . $vmbo_mvi . '</span></p>
    <p><span><strong>Diploma behaald/ te behalen op</strong>: ' . $vmbo_diploma . '</span></p>
  ';

} else if ($opleiding_leerling == "HAVO") {
  $havo_diploma = htmlentities($_POST['havo-diploma']);
  $havo_overgang_van = htmlentities($_POST['havo-overgang_van']);
  $havo_overgang_naar = htmlentities($_POST['havo-overgang_naar']);

  $volledige_opleiding_leerling = '
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Opleiding leerling</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $opleiding_leerling . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Diploma behaald/ te behalen op</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $havo_diploma . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-calendar-alt"></i></span>Overgangsbewijs</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">Van leerjaar ' . $havo_overgang_van . ' naar leerjaar ' . $havo_overgang_naar . '</div>
      </div>
    </div>
  ';
  $volledige_opleiding_leerling_pdf = '
    <p><span><strong>Opleiding leerling</strong>: ' . $opleiding_leerling . '</span></p>
    <p><span><strong>Diploma behaald/ te behalen op</strong>: ' . $havo_diploma . '</span></p>
    <p><span><strong>Overgangsbewijs</strong>: Van leerjaar ' . $havo_overgang_van . ' naar leerjaar ' . $havo_overgang_naar . '</span></p>
  ';

} else if ($opleiding_leerling == "VWO") {
  $vwo_diploma = htmlentities($_POST['vwo-diploma']);
  $vwo_overgang_van = htmlentities($_POST['vwo-overgang_van']);
  $vwo_overgang_naar = htmlentities($_POST['vwo-overgang_naar']);

  $volledige_opleiding_leerling = '
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Opleiding leerling</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $opleiding_leerling . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Diploma behaald/ te behalen op</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $vwo_diploma . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-calendar-alt"></i></span>Overgangsbewijs</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">Van leerjaar ' . $vwo_overgang_van . ' naar leerjaar ' . $vwo_overgang_naar . '</div>
      </div>
    </div>
  ';
  $volledige_opleiding_leerling_pdf = '
    <p><span><strong>Opleiding leerling</strong>: ' . $opleiding_leerling . '</span></p>
    <p><span><strong>Diploma behaald/ te behalen op</strong>: ' . $vwo_diploma . '</span></p>
    <p><span><strong>Overgangsbewijs</strong>: Van leerjaar ' . $vwo_overgang_van . ' naar leerjaar ' . $vwo_overgang_naar . '</span></p>
  ';

} else if ($opleiding_leerling == "MBO") {
  $mbo_niveau = $_POST['mbo-niveau'];
  if(in_array('mbo-1', $mbo_niveau)) {
    $mbo_niveau = "Niveau 1";
  } else if(in_array('mbo-2', $mbo_niveau)) {
    $mbo_niveau = "Niveau 2";
  } else if(in_array('mbo-3', $mbo_niveau)) {
    $mbo_niveau = "Niveau 3";
  } else if(in_array('mbo-4', $mbo_niveau)) {
    $mbo_niveau = "Niveau 4";
  }

  $mbo_leerweg = $_POST['mbo-leerweg'];
  if(in_array('mbo-bol', $mbo_leerweg)) {
    $mbo_leerweg = "BOL";
  } else if(in_array('mbo-bbl', $mbo_leerweg)) {
    $mbo_leerweg = "BBL";
  }

  $volledige_opleiding_leerling = '
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Opleiding leerling</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $opleiding_leerling . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Opleidingsniveau</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $mbo_niveau . '</div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-calendar-alt"></i></span>Leerweg</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $mbo_leerweg . '</div>
      </div>
    </div>
  ';
  $volledige_opleiding_leerling_pdf = '
    <p><span><strong>Opleiding leerling</strong>: ' . $opleiding_leerling . '</span></p>
    <p><span><strong>Opleidingsniveau</strong>: ' . $mbo_niveau . '</span></p>
    <p><span><strong>Leerweg</strong>: ' . $mbo_leerweg . '</span></p>
  ';

} else if ($opleiding_leerling == "Anders") {
  $andere_opleiding = htmlentities($_POST['andere-opleiding']);
  $volledige_opleiding_leerling = '
    <div class="row">
      <div class="col-5">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Opleiding leerling</div>
      </div>
      <div class="col-7">
        <div class="pdf-blok pdf-blok-wit">' . $andere_opleiding . '</div>
      </div>
    </div>
  ';
  $volledige_opleiding_leerling_pdf = '
    <p><span><strong>Opleiding leerling</strong>: ' . $andere_opleiding . '</span></p>
  ';
}


//STAP 3
$leerling_concentratie = $_POST['leerling-concentratie'];
if(in_array('leerling-concentratie-g', $leerling_concentratie)) {
  $leerling_concentratie = "Goed";
} else if(in_array('leerling-concentratie-v', $leerling_concentratie)) {
  $leerling_concentratie = "Voldoende";
} else if(in_array('leerling-concentratie-m', $leerling_concentratie)) {
  $leerling_concentratie = "Matig";
} else if(in_array('leerling-concentratie-o', $leerling_concentratie)) {
  $leerling_concentratie = "Onvoldoende";
}

$leerling_werktempo = $_POST['leerling-werktempo'];
if(in_array('leerling-werktempo-g', $leerling_concentratie)) {
  $leerling_werktempo = "Goed";
} else if(in_array('leerling-werktempo-v', $leerling_werktempo)) {
  $leerling_werktempo = "Voldoende";
} else if(in_array('leerling-werktempo-m', $leerling_werktempo)) {
  $leerling_werktempo = "Matig";
} else if(in_array('leerling-werktempo-o', $leerling_werktempo)) {
  $leerling_werktempo = "Onvoldoende";
}

$leerling_zelfstandig_werken = $_POST['leerling-zelfstandig_werken'];
if(in_array('leerling-zelfstandig_werken-g', $leerling_zelfstandig_werken)) {
  $leerling_zelfstandig_werken = "Goed";
} else if(in_array('leerling-zelfstandig_werken-v', $leerling_zelfstandig_werken)) {
  $leerling_zelfstandig_werken = "Voldoende";
} else if(in_array('leerling-zelfstandig_werken-m', $leerling_zelfstandig_werken)) {
  $leerling_zelfstandig_werken = "Matig";
} else if(in_array('leerling-zelfstandig_werken-o', $leerling_zelfstandig_werken)) {
  $leerling_zelfstandig_werken = "Onvoldoende";
}

$leerling_motivatie = $_POST['leerling-motivatie'];
if(in_array('leerling-motivatie-g', $leerling_motivatie)) {
  $leerling_motivatie = "Goed";
} else if(in_array('leerling-motivatie-v', $leerling_motivatie)) {
  $leerling_motivatie = "Voldoende";
} else if(in_array('leerling-motivatie-m', $leerling_motivatie)) {
  $leerling_motivatie = "Matig";
} else if(in_array('leerling-motivatie-o', $leerling_motivatie)) {
  $leerling_motivatie = "Onvoldoende";
}

$leerling_doorzettingsvermogen = $_POST['leerling-doorzettingsvermogen'];
if(in_array('leerling-doorzettingsvermogen-g', $leerling_doorzettingsvermogen)) {
  $leerling_doorzettingsvermogen = "Goed";
} else if(in_array('leerling-doorzettingsvermogen-v', $leerling_doorzettingsvermogen)) {
  $leerling_doorzettingsvermogen = "Voldoende";
} else if(in_array('leerling-doorzettingsvermogen-m', $leerling_doorzettingsvermogen)) {
  $leerling_doorzettingsvermogen = "Matig";
} else if(in_array('leerling-doorzettingsvermogen-o', $leerling_doorzettingsvermogen)) {
  $leerling_doorzettingsvermogen = "Onvoldoende";
}

$leerling_communicatief = $_POST['leerling-communicatief'];
if(in_array('leerling-communicatief-g', $leerling_communicatief)) {
  $leerling_communicatief = "Goed";
} else if(in_array('leerling-communicatief-v', $leerling_communicatief)) {
  $leerling_communicatief = "Voldoende";
} else if(in_array('leerling-communicatief-m', $leerling_communicatief)) {
  $leerling_communicatief = "Matig";
} else if(in_array('leerling-communicatief-o', $leerling_communicatief)) {
  $leerling_communicatief = "Onvoldoende";
}

$leerling_sociaal = $_POST['leerling-sociaal'];
if(in_array('leerling-sociaal-g', $leerling_sociaal)) {
  $leerling_sociaal = "Goed";
} else if(in_array('leerling-sociaal-v', $leerling_sociaal)) {
  $leerling_sociaal = "Voldoende";
} else if(in_array('leerling-sociaal-m', $leerling_sociaal)) {
  $leerling_sociaal = "Matig";
} else if(in_array('leerling-sociaal-o', $leerling_sociaal)) {
  $leerling_sociaal = "Onvoldoende";
}

$leerling_toelichting = htmlentities($_POST['leerling-toelichting']);
if (!empty($leerling_toelichting)) {
  $gegeven_leerling_toelichting = '
    <div class="row">
      <div class="col-4">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-comment"></i></span>Toelichting</div>
      </div>
      <div class="col-8">
        <div class="pdf-blok pdf-blok-wit">' . $leerling_toelichting . '</div>
      </div>
    </div>
  ';
  $gegeven_leerling_toelichting_pdf = '
    <p><span><strong>Toelichting</strong>: ' . $leerling_toelichting . '</span></p>
  ';

}


//STAP 4
$leerling_speciaal_onderwijs = $_POST['leerling-so'];
if(in_array('leerling-so-ja', $leerling_speciaal_onderwijs)) {
  $leerling_speciaal_onderwijs = "Ja";
} else if(in_array('leerling-so-nee', $leerling_speciaal_onderwijs)) {
  $leerling_speciaal_onderwijs = "Nee";
}

$leerling_dyslexie = $_POST['leerling-dyslexie'];
if(in_array('leerling-dyslexie-ja', $leerling_dyslexie)) {
  $leerling_dyslexie = "Ja";
} else if(in_array('leerling-dyslexie-nee', $leerling_dyslexie)) {
  $leerling_dyslexie = "Nee";
}

$leerling_dyscalculie = $_POST['leerling-dyscalculie'];
if(in_array('leerling-dyscalculie-ja', $leerling_dyscalculie)) {
  $leerling_dyscalculie = "Ja";
} else if(in_array('leerling-dyscalculie-nee', $leerling_dyscalculie)) {
  $leerling_dyscalculie = "Nee";
}

$leerling_adhd = $_POST['leerling-adhd'];
if(in_array('leerling-adhd-ja', $leerling_adhd)) {
  $leerling_adhd = "Ja";
} else if(in_array('leerling-adhd-nee', $leerling_adhd)) {
  $leerling_adhd = "Nee";
}

$leerling_slechthorendheid = $_POST['leerling-slechthorendheid'];
if(in_array('leerling-slechthorendheid-ja', $leerling_slechthorendheid)) {
  $leerling_slechthorendheid = "Ja";
} else if(in_array('leerling-slechthorendheid-nee', $leerling_slechthorendheid)) {
  $leerling_slechthorendheid = "Nee";
}

$leerling_suikerziekte = $_POST['leerling-suikerziekte'];
if(in_array('leerling-suikerziekte-ja', $leerling_suikerziekte)) {
  $leerling_suikerziekte = "Ja";
} else if(in_array('leerling-suikerziekte-nee', $leerling_suikerziekte)) {
  $leerling_suikerziekte = "Nee";
}

$leerling_zat = $_POST['leerling-zat'];
if(in_array('leerling-zat-ja', $leerling_zat)) {
  $leerling_zat = "Ja";
} else if(in_array('leerling-zat-nee', $leerling_zat)) {
  $leerling_zat = "Nee";
}

$leerling_extra_zorg = $_POST['leerling-extra_zorg'];
if(in_array('leerling-extra_zorg-ja', $leerling_extra_zorg)) {
  $leerling_extra_zorg_overig = htmlentities($_POST['leerling-extra_zorg-overig']);
  $gegeven_leerling_extra_zorg = '
    <div class="row">
      <div class="col-4">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-briefcase-medical"></i></span>Overig</div>
      </div>
      <div class="col-8">
        <div class="pdf-blok pdf-blok-wit">' . $leerling_extra_zorg_overig . '</div>
      </div>
    </div>
  ';
  $gegeven_leerling_extra_zorg_pdf = '
    <p><span><strong>Overig</strong>: ' . $leerling_extra_zorg_overig . '</span></p>
  ';

} else if(in_array('leerling-extra_zorg-nee', $leerling_extra_zorg)) {
  $gegeven_leerling_extra_zorg = '
    <div class="row">
      <div class="col-4">
        <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-briefcase-medical"></i></span>Overig</div>
      </div>
      <div class="col-8">
        <div class="pdf-blok pdf-blok-wit">Nee</div>
      </div>
    </div>
  ';
  $gegeven_leerling_extra_zorg_pdf = '
    <p><span><strong>Overig</strong>: Nee</span></p>
  ';

}


//STAP 5
$naam_decaan_mentor = htmlentities($_POST['naam-decaan_mentor']);
$geslacht_decaan_mentor = $_POST['geslacht-decaan_mentor'];
if(in_array('geslacht-decaan_mentor-man', $geslacht_decaan_mentor)) {
  $geslacht_decaan_mentor = "Man";
} else if(in_array('geslacht-decaan_mentor-vrouw', $geslacht_decaan_mentor)) {
  $geslacht_decaan_mentor = "Vrouw";
}
$functie_decaan_mentor = htmlentities($_POST['functie-decaan_mentor']);
$email_decaan_mentor = htmlentities($_POST['email-decaan_mentor']);
$school_decaan_mentor = htmlentities($_POST['school-decaan_mentor']);
$plaats_decaan_mentor = htmlentities($_POST['plaats-school-map']);
$telefoon_decaan_mentor = htmlentities($_POST['telefoon-decaan_mentor']);


//PDF CONTENT
$PDF_CONTENT = '
  <div class="row">
    <div class="col-10">
      <span class="tekst-inline"><h2>Inlichtingformulier</h2> schooljaar 2018 - 2019</span><br />
      <span class="tekst-roze">Dit formulier is ingevuld door ' . $naam_decaan_mentor . '</span>
    </div>
    <div class="col-2">
      <img src="assets/images/logo-ma.svg" class="img-responsive" alt="MA-logo-pdf" />
    </div>
  </div>

  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Naam leerling</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $naam_leerling . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-calendar-alt"></i></span>Geboortedatum</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $geboortedatum_leerling . '</div>
    </div>
  </div>

  <div class="pdf-divider"><h2>Opleiding leerling</h2></div>
  ' . $volledige_opleiding_leerling . '

  <div class="pdf-divider"><h2>Prestaties leerling</h2></div>

  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Concentratie</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_concentratie . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Werktempo</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_werktempo . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Zelfstandig werken</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_zelfstandig_werken . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Motivatie</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_motivatie . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Doorzettingsvermogen</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_doorzettingsvermogen . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Communicatief</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_communicatief . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Sociaal</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_sociaal . '</div>
    </div>
  </div>
  ' . $gegeven_leerling_toelichting . '

  <div class="pdf-divider"><h2>Bijzonderheden leerling</h2></div>

  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>Speciaal onderwijs</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_speciaal_onderwijs . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-pencil-alt"></i></span>Dyslexie</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_dyslexie . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-calculator"></i></span>Dyscalculie</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_dyscalculie . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>ADHD</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_adhd . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-volume-down"></i></span>Slechthorendheid</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_slechthorendheid . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-briefcase-medical"></i></span>Suikerziekte</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_suikerziekte . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-briefcase-medical"></i></span>Besproken in ZAT</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $leerling_zat . '</div>
    </div>
  </div>
  ' . $gegeven_leerling_extra_zorg . '

  <div class="pdf-divider"><h2>Decaan/ mentor</h2></div>

  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Naam</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $naam_decaan_mentor . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="far fa-user"></i></span>Geslacht</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $geslacht_decaan_mentor . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-briefcase"></i></span>Functie</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $functie_decaan_mentor . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-envelope"></i></span>Mailadres</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $email_decaan_mentor . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-graduation-cap"></i></span>School</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $school_decaan_mentor . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-map-marker-alt"></i></span>Plaats</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $plaats_decaan_mentor . '</div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="pdf-blok pdf-blok-grijs"><span class="pdf-icon"><i class="fas fa-mobile-alt"></i></span>Telefoon</div>
    </div>
    <div class="col-8">
      <div class="pdf-blok pdf-blok-wit">' . $telefoon_decaan_mentor . '</div>
    </div>
  </div>';

echo $PDF_CONTENT;


//PDF-DOCUMENT
echo '
  <div class="hidden-pdf">
    <div id="PDF-document">
      <span class="tekst-inline"><h2>Inlichtingformulier</h2> schooljaar 2018 - 2019</span><br />
      <p><span class="tekst-roze">Dit formulier is ingevuld door ' . $naam_decaan_mentor . '</span></p><br>

      <p><span><strong>Naam leerling</strong>: ' . $naam_leerling . '</span></p>
      <p><span><strong>Geboortedatum</strong>: ' . $geboortedatum_leerling . '</span></p>

      <br><div class="tekst-roze-h2"><h2>Opleiding leerling</h2></div><br>
      ' . $volledige_opleiding_leerling_pdf . '

      <br><div class="tekst-roze-h2"><h2>Prestaties leerling</h2></div><br>
      <p><span><strong>Concentratie</strong>: ' . $leerling_concentratie . '</span></p>
      <p><span><strong>Werktempo</strong>: ' . $leerling_werktempo . '</span></p>
      <p><span><strong>Zelfstandig werken</strong>: ' . $leerling_zelfstandig_werken . '</span></p>
      <p><span><strong>Motivatie</strong>: ' . $leerling_motivatie . '</span></p>
      <p><span><strong>Doorzettingsvermogen</strong>: ' . $leerling_doorzettingsvermogen . '</span></p>
      <p><span><strong>Communicatief</strong>: ' . $leerling_communicatief . '</span></p>
      <p><span><strong>Sociaal</strong>: ' . $leerling_sociaal . '</span></p>
      ' . $gegeven_leerling_toelichting_pdf . '

      <br><div class="tekst-roze-h2"><h2>Bijzonderheden leerling</h2></div><br>
      <p><span><strong>Speciaal onderwijs</strong>: ' . $leerling_speciaal_onderwijs . '</span></p>
      <p><span><strong>Dyslexie</strong>: ' . $leerling_dyslexie . '</span></p>
      <p><span><strong>Dyscalculie</strong>: ' . $leerling_dyscalculie . '</span></p>
      <p><span><strong>ADHD</strong>: ' . $leerling_adhd . '</span></p>
      <p><span><strong>Slechthorendheid</strong>: ' . $leerling_slechthorendheid . '</span></p>
      <p><span><strong>Suikerziekte</strong>: ' . $leerling_suikerziekte . '</span></p>
      <p><span><strong>Besproken in ZAT</strong>: ' . $leerling_zat . '</span></p>
      ' . $gegeven_leerling_extra_zorg_pdf . '

      <br><div class="tekst-roze-h2"><h2>Decaan/ mentor</h2></div><br>
      <p><span><strong>Naam</strong>: ' . $naam_decaan_mentor . '</span></p>
      <p><span><strong>Geslacht</strong>: ' . $geslacht_decaan_mentor . '</span></p>
      <p><span><strong>Functie</strong>: ' . $functie_decaan_mentor . '</span></p>
      <p><span><strong>Mailadres</strong>: ' . $email_decaan_mentor . '</span></p>
      <p><span><strong>School</strong>: ' . $school_decaan_mentor . '</span></p>
      <p><span><strong>Plaats</strong>: ' . $plaats_decaan_mentor . '</span></p>
      <p><span><strong>Telefoon</strong>: ' . $telefoon_decaan_mentor . '</span></p>
    </div>
  </div>

';


?>
