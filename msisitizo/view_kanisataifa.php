<?php
$db= mysqli_connect('sql309.infinityfree.com','if0_39152860', 'MZhrYPxEEwgmdPB', 'if0_39152860_kanisahalisi');
if(!$db){
    echo "Database Connection Failed";
}
$data = $db->query("SELECT * FROM kanisataifa");
$list = array();
while($rowdata=$data->fetch_assoc()){
    $list[]=$rowdata;

}
echo json_encode($list);
?>