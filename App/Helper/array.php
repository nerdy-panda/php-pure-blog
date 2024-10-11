<?php 
function articleTagIdsToArray(array $tagIds):array {
    $ids = [];
    for($counter = 0 ; $counter < count($tagIds) ; $counter++ )
        $ids[] = $tagIds[$counter]["tag_id"];
    return $ids;
}

?>