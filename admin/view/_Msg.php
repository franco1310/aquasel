<?php if (count($rows)>0) { ?>
<p> El expediente presenta  un total de:
    <?php
        $total = 0;
        foreach ($rows as $key => $value) {
            $total = $total + $value[0];
        }
    ?>
   <b> <?php echo $total; ?> </b> por cobrar.
</p>
<?php } ?>
