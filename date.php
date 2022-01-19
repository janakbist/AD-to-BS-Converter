<!DOCTYPE html>  // Date converter English to Nepali and Nepali to English.
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AD to BS Converter</title>
</head>
<body>
    <div>
        <?php
         //Include Calendar Library
        require_once('NepaliCalender.php');

function getNepaliDate($date){
    $ndate = NepaliCalender::getInstance()->eng_to_nep($date);
    $ndate = $ndate['nmonth_in_nepali'].' '.$ndate['date_in_nepali'].', '.getNepaliNumber($ndate['year']);
    return $ndate;
  }

  function getNepaliNumber($str){
    $find = array('0','1','2','3','4','5','6','7','8','9');
    $replace = array('०','१','२','३','४','५','६','७','८','९');
    return str_replace($find,$replace,$str);
  }

  function getEnglishDate($date){
    $year = date('Y',strtotime($date));
    $month = date('m',strtotime($date));
    $day = date('d',strtotime($date));
    $edate = NepaliCalender::getInstance()->nep_to_eng($year,$month,$day);
    $date = $edate['year'].'-'.$edate['month'].'-'.$edate['date'];
    return $date;
  }


//AD to BS Conversion
$english_date = date('Y-m-d');
$nepali_date = getNepaliDate($english_date);
echo '<h2>'.$english_date.'AD into '.$nepali_date.' BS</h2>';

//BS to AD Conversion
// $nepali_date = '2078-05-26';
// $english_date = getEnglishDate($nepali_date);
// echo '<h2>'.$nepali_date.' BS into '.$english_date.' AD</h2>';

        ?>
    </div>
    
</body>
</html>
