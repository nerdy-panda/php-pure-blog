<?php
$id = $id ?? null ;
$fieldAttributes = getAttributesIfNotNull([
    "name" => $name ?? null ,
    "id" => $id ?? null ,
]);
$labelAttributes = getAttributeIfNotNull("for",$id);
?>
<div class="field-row">
    <textarea <?php echo $fieldAttributes?>><?php echo $value ?? null ?></textarea>
    <label <?php echo $labelAttributes; ?>>
        <?php if (isset($icon)) : ?>
            <i class="<?php echo $icon?>"></i>
        <?php endif; ?>
        <?php echo $title ?? null ?>
    </label>
    <div class="underline"></div>
</div>