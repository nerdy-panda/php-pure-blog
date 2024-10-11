<?php
function comment_counts(PDO $databaseConnection , string $column):int
{
    return entityCount($databaseConnection,"comments",$column);
}