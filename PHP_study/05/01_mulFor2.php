<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>01_mulFor2</title>
</head>
<body>
   <h1>01_mulFor2</h1>
   <table border="">
<?
    for($i=2; $i<10 ; $i++){
?>

    <tr>
        <td align="center"><?=$i?>단</td>
    </tr>

<? 
    for($k = 1; $k<10; $k++){
?>
    <tr>
        <td><?=$i?> x <?=$k?> = <?=$i*$k?></td>
    </tr>

<?        
    }}
    
?>   
   </table>
   
   
   <table border="">
       <tr>
           
          <? for ($i=2; $i<10; $i++) { ?> 
           
           
           <td>
               <table border=1>
                  <tr>
                       <td align="center"><?=$i?> 단</td>
                   </tr>
                   <? for($k=1; $k<10 ; $k++) { ?>
                   <tr>
                       <td><?=$i?> x <?=$k?> = <?=$i*$k?></td>
                   </tr>
                   <? } ?>
                   
               </table>
               
               
           </td>
           

           <? } ?>
                                 
       </tr>
   </table>
   
    
</body>
</html>






















