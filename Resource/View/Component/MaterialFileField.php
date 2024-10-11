<?php
    $rowIdAttribute = getAttributeIfNotNull("id" , $rowId ?? null );
    $fileFieldAttributes = getAttributesIfNotNull([
        "name"=> $name ?? null ,
        "id" => $id ?? null
    ]);
?>
<div class="field-row material-file-field-row" <?php echo $rowIdAttribute; ?>>
    <div class="file-selector">
        <p>
            <?php if (isset($icon)) : ?>
                <i class="<?php echo $icon?>"></i>
            <?php endif;?>
            <strong>
                <?php echo $title ?? "";?>
            </strong>
            <i class="fa-solid fa-trash-alt material-file-field-clear"></i>
        </p>
    </div>
    <input type="file" <?php echo $fileFieldAttributes ?>>
</div>