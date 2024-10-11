<?php
    $id = $id ?? null ;
    $title = $title ?? null ;
    $name = $name ?? null ;
    $labelAttributes = getAttributesIfNotNull([ "for"=> $id ]);
    $selectAttributes = getAttributesIfNotNull([ "id"=>$id , "name"=> $name ]);
?>
<div class="field-row material-select-row">
    <label <?php echo $labelAttributes; ?>>
        <?php if (isset($icon)) : ?>
            <i class="<?php echo $icon; ?>"></i>
        <?php endif; ?>
        <?php echo $title; ?>
    </label>
    <div class="material-select-container">
        <select <?php echo $selectAttributes?>>
            <?php foreach ($items as $item):?>
                <?php
                    $label = $item["label"] ?? null ;
                    $value = $item["value"] ?? null;
                    $text = $item["text"] ?? null;
                    $isSelected = $item["selected"] ?? null;
                    $isDisabled = $item["disabled"] ?? null;
                    $selected = (($isSelected) ? "selected" : "");
                    $disabled = (($isDisabled) ? "disabled" : "");
                    $optionAttributes = ["label"=>$label , "value"=> $value ];
                    $optionAttributesString = getAttributesIfNotNull($optionAttributes);
                ?>
                <option <?php echo $optionAttributesString?> <?php echo $selected?> <?php echo $disabled?>>
                    <?php echo $text?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="underline"></div>
    </div>
</div>