
<select name="<?php echo $name; ?>" id="<?php echo $id; ?>" <?php echo $disabled; ?>  class="text ui-widget-content ui-corner-all" style="width: 160px;" >
    <option value="">::Seleccione::</option>
    <?php foreach ($rows as $key => $value) { ?>
        <?php if ($code != $value[0] ) { ?>
    <option value="<?php echo $value[0]; ?>"> <?php echo strtoupper($value[1]) ?> </option>
        <?php } else { ?>
            <option selected="selected" value="<?php echo $value[0]; ?>"> <?php echo $value[1]; ?> </option>
        <?php }  ?>
    <?php } ?>
</select>
