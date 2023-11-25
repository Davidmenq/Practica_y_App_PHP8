<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <?php 
                require_once("core/constantes.php");
                foreach(usuarioColumns as $value): ?>
                <td><?php echo $value; ?></td>
            <?php endforeach; ?>
        </tr>
        <?php foreach($this->consultarTodo() as $usuario): ?>
        <tr>
            <td><?php echo$usuario->nombre ?></td>
            <td><?php echo$usuario->apellido ?></td>
            <td><?php echo$usuario->telefono ?></td>
            <td><?php echo$usuario->edad ?></td>
            <td><a href="">Editar</a></td>
            <td><a onclick="javascript:return confirm('¿Seguro de eliminar este registro?')" href="">Eliminar</a></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>