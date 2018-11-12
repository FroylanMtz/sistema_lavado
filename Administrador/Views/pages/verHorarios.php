<?php       
$inf = array(); //declaramos un arreglo donde guardamos los registros encontrados
while($d = mysql_fetch_array($dat)) {
 $inf[] = $d; //Buscamos los datos almacenados y los asignados al arreglo para poderlos manipular a consideración nuestra
}
for ($i=1;$i<=5;$i++) {//con este for le damos el valor a las horas en una columna
    echo "<table width='20%' border='1' align='center'cellpadding='2' cellspacing='0'>";
    echo "<tr>";
         if($i=='1'){echo "<td colspan='4' bgcolor='#ECE9D8'><div align='center'>LUNES</div></td>";}
         if($i=='2'){echo "<td colspan='4' bgcolor='#ECE9D8'><div align='center'>MARTES</div></td>";}
         if($i=='3'){echo "<td colspan='4' bgcolor='#ECE9D8'><div align='center'>MIERCOLES</div></td>";}
         if($i=='4'){echo "<td colspan='4' bgcolor='#ECE9D8'><div align='center'>JUEVES</div></td>";}
         if($i=='5'){echo "<td colspan='4' bgcolor='#ECE9D8'><div align='center'>VIERNES</div></td>";}     
       
    for ($j=0;$j<=50;$j++) {//con este recuperamos la informacion del arreglo y la llamamos el registro que nos interesa
       
       if ($inf[$j]['dia'] == $i)   
         {//mostramos el valor
       echo "</tr>";
       echo "<tr>"; 
 echo "<td width='100' bgcolor='#E3E9F1'><div align='center'>";
 
if($inf[$j]['h_entrada']==''){ echo "LIBRE";}else {echo $inf[$j]['h_entrada']." - ";}
if($inf[$j]['h_salida']==''){ echo "LIBRE";}else {echo $inf[$j]['h_salida']."<br>";}
if($inf[$j]['materia']==''){ echo "LIBRE";}else {echo $inf[$j]['materia']."<br>";}
if($inf[$j]['grado']==''){ echo "LIBRE";}else {echo $inf[$j]['grado']." - ";}
if($inf[$j]['seccion']==''){ echo "LIBRE";}else {echo $inf[$j]['seccion']." - ";}
if($inf[$j]['aula']==''){ echo "LIBRE";}else { echo $inf[$j]['aula']."";}echo "</div></td>";
         }
    } echo "</tr>";
   echo "</table>";
}  
?>

 <!-- Script para redireccionar a la página de agregar usuario -->
    <script type="text/javascript">
        function registroPremios(){
            window.location.href = "index.php?action=verHorarios";
        }
    </script>
