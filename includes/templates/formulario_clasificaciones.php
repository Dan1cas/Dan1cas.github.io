<fieldset>
    <legend>Información General</legend>

    <label for="tipo">Tipo</label>
    <input type="text" id="tipo" name="clasificacion[tipo]" placeholder="Tipo de clasificacion" value="<?php echo s($clasificacion->tipo); ?>">
    
    <label for="precio">Rango de Precios</label>
    <input type="text" id="precio" name="clasificacion[rangoPrecio]" placeholder="Rango de precios" value="<?php echo s($clasificacion->rangoPrecio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen"  accept="image/jpeg, image/png" name="clasificacion[imagen]">
    
    <?php if($clasificacion->imagen): ?>
        <img src="/imagenes/<?php echo $clasificacion->imagen; ?>" class="imagen-small" alt="">
    <?php endif; ?>
    
        <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="clasificacion[descripcion]"><?php echo s($clasificacion->descripcion); ?></textarea>
    
</fieldset>