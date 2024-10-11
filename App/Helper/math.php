<?php
function divisionRoundUp(int $divided , int $divisor):int {
    if ($divisor==0)
        return 0;
    return ceil($divided / $divisor);
}