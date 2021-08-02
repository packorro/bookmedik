<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'bookmedik');

$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);

$html = '';
$key = $_POST['key'];

$result = $connexion->query(
    'SELECT * FROM pacient p 
    WHERE is_active = 1 
    AND p.name LIKE "%'.strip_tags($key).'%"
    ORDER BY p.name DESC LIMIT 0,5'
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['name']).'" id="'.$row['id'].'">'.utf8_encode($row['name']).'</a></div>';
    }
}
echo $html;
?>