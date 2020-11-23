
<?php
$texto = '';
if(isset($_GET['campo'])){
    $texto = $_GET['campo'];
}
?>
<form method="get">
    <input type="text" name="campo" placeholder="Buscar" value="<?php echo $texto; ?>">
    <input type="submit" name="buscar" value="Buscar">
</form>
<?php 
if(count($contatos) > 0){
    echo "<table border=1>
            <tr><td>Nome</td><td>Whatsapp</td></tr>";
    foreach($contatos as $contato){
        echo "<tr><td>{$contato->nome}</td><td>{$contato->whatsapp}</td></tr>";
    }
    echo "</table>";
    echo "<br>";
}