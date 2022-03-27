<fieldset>
    <legend>Información general del platillo</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="tacos[titulo]" placeholder="Titulo del platillo" value="<?php echo s($tacos->titulo); ?>">
    
    <label for="precio">Precio</label>
    <input type="number" id="precio" name="tacos[precio]" placeholder="Precio del platillo" value="<?php echo s($tacos->precio); ?>">
    
    <label for="imagen">Imagen</label>
    <input type="file" id="imagen"  accept="image/jpeg, image/png" name="tacos[imagen]">
    
    <?php if($tacos->imagen): ?>
        <img src="/imagenes/<?php echo $tacos->imagen; ?>" class="imagen-small" alt="">
    <?php endif; ?>
    
        <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="tacos[descripcion]"><?php echo s($tacos->descripcion); ?></textarea>
    
</fieldset>

<fieldset>
    <legend> Elige la clasificacion </legend>

    <label for="clasificacion"> Clasificacion </label>
    <select name="tacos[clasificacionId]" id="clasificacion">
        <option selected value="">-- Seleccion --</option>
        <?php foreach($clasificaciones as $clasificacion): ?>
            <option
                <?php echo $tacos->clasificacionId == $clasificacion->id ? 'selected' : ''; ?>
                value="<?php echo s($clasificacion->id); ?> " 
                ><?php echo s($clasificacion->tipo); ?> 
            </option>
        <?php endforeach; ?> 
    </select>

</fieldset>