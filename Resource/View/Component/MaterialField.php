<?php
    $fieldStringAttributes = getAttributesIfNotNull([
        "name" => $name ?? null ,
        "id" => $id ?? null ,
        "value" => $value ?? null ,
        "type" => $type ?? null
    ]);
?>
<div class="field-row">
    <input <?php echo $fieldStringAttributes?>>
    <label for="<?php echo $id ?? null ?>">
        <?php if (isset($icon)) : ?>
            <i class="<?php echo $icon?>"></i>
        <?php endif; ?>
        <?php echo $title ?? null?>
    </label>
    <div class="underline"></div>
</div>