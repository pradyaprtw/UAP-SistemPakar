<?php 

session_start();

include '../include/db_connection.php';
$email = $_POST['email'];

// Gagal Jantung (Heart Failure) symptoms
$symptomDatabase = [
    'G007' => ['name' => 'Demam tinggi dan menggigil', 'weight' => 5, 'conditions' => ['Perikarditis']],
    'G001' => ['name' => 'Dada terasa penuh', 'weight' => 5, 'conditions' => ['Gagal Jantung']],
    'G009' => ['name' => 'Bunyi jantung abnormal', 'weight' => 3, 'conditions' => ['Heart Valve Disease', 'Aritmia']],
    'G013' => ['name' => 'Pusing', 'weight' => 1, 'conditions' => ['Additional']],
    'G017' => ['name' => 'Sulit tidur', 'weight' => 5, 'conditions' => ['Aritmia']],
    'G019' => ['name' => 'Mudah lelah', 'weight' => 1, 'conditions' => ['Gagal Jantung']],
    'G012' => ['name' => 'Mual dan muntah', 'weight' => 1, 'conditions' => ['Additional']],
    'G018' => ['name' => 'Denyut nadi yang lemah dan cepat', 'weight' => 5, 'conditions' => ['Aritmia']],
    'G004' => ['name' => 'Nyeri pada dada sebelah kiri', 'weight' => 5, 'conditions' => ['Perikarditis', 'Jantung Koroner']],
    'G002' => ['name' => 'Detak jantung cepat (tachycardia)', 'weight' => 5, 'conditions' => ['Aritmia']],
    'G006' => ['name' => 'Sesak napas', 'weight' => 5, 'conditions' => ['Gagal Jantung', 'Jantung Koroner']],
    'G014' => ['name' => 'Pingsan (syncope)', 'weight' => 3, 'conditions' => ['Aritmia']],
    'G016' => ['name' => 'Berat badan menurun', 'weight' => 3, 'conditions' => ['Gagal Jantung']],
    'G003' => ['name' => 'Detak jantung lambat (bradycardia)', 'weight' => 3, 'conditions' => ['Aritmia']]
];

// Validate email
$email = isset($_POST['email']) ? mysqli_real_escape_string($dbcon, $_POST['email']) : '';
if (empty($email)) {
    echo "Email is required";
    exit();
}

// Process symptoms from form submission
$selectedSymptoms = [];
foreach ($_POST as $key => $value) {
    if (strpos($key, 'symptom') === 0 && !empty($value)) {
        $selectedSymptoms[] = $value;
    }
}

// Initialize scores for different conditions
$scores = [
    'Gagal Jantung' => 0,
    'Heart Valve Disease' => 0,
    'Aritmia' => 0,
    'Perikarditis' => 0,
    'Jantung Koroner' => 0,
    'Additional' => 0
];

// Calculate scores based on selected symptoms
foreach ($selectedSymptoms as $symptomCode) {
    if (isset($symptomDatabase[$symptomCode])) {
        $symptom = $symptomDatabase[$symptomCode];
        foreach ($symptom['conditions'] as $condition) {
            $scores[$condition] += $symptom['weight'];
        }
    }
}

// Diagnostic logic
$diagnosis = [
    'disease_code' => 'N/A',
    'comment' => 'Low risk, but recommend a comprehensive medical check-up',
    'treatment' => 'General health assessment, preventive screening, lifestyle review.'
];

// Comprehensive diagnostic rules
if ($scores['Gagal Jantung'] >= 10 && $scores['Heart Valve Disease'] >= 5 && $scores['Aritmia'] >= 10) {
    $diagnosis = [
        'disease_code' => 'P001/P002/P003',
        'comment' => 'High risk of multiple heart conditions (Gagal Jantung, Heart Valve Disease, Aritmia)',
        'treatment' => 'Comprehensive cardiac evaluation, multiple specialist consultations required.'
    ];
} elseif ($scores['Gagal Jantung'] >= 10) {
    $diagnosis = [
        'disease_code' => 'P001',
        'comment' => 'High risk of Gagal Jantung (Heart Failure)',
        'treatment' => 'Medication, lifestyle modifications, potential cardiac rehabilitation.'
    ];
} elseif ($scores['Heart Valve Disease'] >= 5) {
    $diagnosis = [
        'disease_code' => 'P002',
        'comment' => 'High risk of Heart Valve Disease',
        'treatment' => 'Echocardiogram, potential valve repair or replacement, medication.'
    ];
} elseif ($scores['Aritmia'] >= 10) {
    $diagnosis = [
        'disease_code' => 'P003',
        'comment' => 'High risk of Aritmia (Cardiac Dysrhythmia)',
        'treatment' => 'ECG, heart rhythm monitoring, medication, possible pacemaker.'
    ];
} elseif ($scores['Perikarditis'] >= 5) {
    $diagnosis = [
        'disease_code' => 'P004',
        'comment' => 'High risk of Perikarditis',
        'treatment' => 'Anti-inflammatory medication, rest, potential antibiotics.'
    ];
} elseif ($scores['Jantung Koroner'] >= 5) {
    $diagnosis = [
        'disease_code' => 'P005',
        'comment' => 'High risk of Jantung Koroner (Coronary Heart Disease)',
        'treatment' => 'Lifestyle changes, medication, potential angioplasty or stent placement.'
    ];
}

// Prepare database insertion
$sql = "INSERT INTO diagnosis (
    email, 
    gagal_jantung_score, 
    valve_disease_score, 
    aritmia_score, 
    perikarditis_score, 
    jantung_koroner_score, 
    additional_symptoms_score, 
    disease_code, 
    recommendation, 
    treatment
) VALUES (
    '$email', 
    '" . $scores['Gagal Jantung'] . "', 
    '" . $scores['Heart Valve Disease'] . "', 
    '" . $scores['Aritmia'] . "', 
    '" . $scores['Perikarditis'] . "', 
    '" . $scores['Jantung Koroner'] . "', 
    '" . $scores['Additional'] . "', 
    '" . $diagnosis['disease_code'] . "', 
    '" . mysqli_real_escape_string($dbcon, $diagnosis['comment']) . "', 
    '" . mysqli_real_escape_string($dbcon, $diagnosis['treatment']) . "'
)";

// Execute query and return result
if (mysqli_query($dbcon, $sql)) {
    echo "success";
} else {
    echo "Error recording diagnosis: " . mysqli_error($dbcon);
}

mysqli_close($dbcon);
?>