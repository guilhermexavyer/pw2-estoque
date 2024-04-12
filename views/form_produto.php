<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Produto</title>
</head>
<body>
    <div class="form-group">
        <label for="categoria">Categoria:</label>
        <select class="form-control" id="categoria" name="categoria">
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?php echo $categoria->getId(); ?>"><?php echo $categoria->getNome(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</body>
</html>