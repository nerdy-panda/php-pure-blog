<?php
    $id = $id ?? null ;
    $name = $name ?? null ;
    $icon = $icon ?? null ;
    $title = $title ?? null ;
    $selectAttributesString = getAttributesIfNotNull([
        "id" => $id ,
        "name" => $name ,
    ]);
?>
<div class="field-row material-multiple-select-row">
    <select multiple <?php echo $selectAttributesString?>>
        <?php foreach ($items as $item) : ?>
            <?php
                $value = $item["value"] ?? null ;
                $label = $item["label"] ?? null ;
                $isSelected = $item["selected"] ?? null ;
                $isDisabled = $item["disabled"] ?? null ;
                $text = $item["text"] ?? null ;

                $disabled = ( ($isDisabled) ? "disabled" : "" );
                $selected = ( ($isSelected) ? "selected" : "" );
                $optionAttributes = [ "value" => $value , "label" => $label ];
                $optionAttributesString = getAttributesIfNotNull($optionAttributes);

            ?>
            <option <?php echo $optionAttributesString; ?> <?php echo $disabled." ".$selected?>>
                <?php echo $text ?>
            </option>
        <?php endforeach; ?>
    </select>
    <label for="tags">
        <?php if (isset($icon)) : ?>
            <i class="<?php echo $icon; ?>"></i>
        <?php endif; ?>
        <?php echo $title ;?>
    </label>
    <div class="underline"></div>
</div>