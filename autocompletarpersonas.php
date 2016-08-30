<?php
include 'coneccion/conecionMYSQL.php';

 
 $term=$_POST["keyword"];
 
 $query=mysql_query("SELECT * FROM `personas` where apellido like '%".$term."%' order by apellido,nombre ");
 $json=array(); ?>
 <ul id="country-list">
     <?php
    while($country=mysql_fetch_array($query)){
        ?>
    
       <li onClick="aa('<?php echo $country["idpersonas"]; ?>','<?php echo $country["apellido"].",".$country["nombre"]; ?>');"><?php echo $country["apellido"].",".$country["nombre"]; ?></li>
    <?php
       }
 
 
?>
 </ul>