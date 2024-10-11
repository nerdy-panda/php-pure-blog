<?php
function randomDirectory(string $destination , int $nameLength):string{
    $name = randomString($nameLength);
    $finalDestination = $destination."/".$name;
    $result = mkdir($finalDestination);
    if (!$result)
        throw new Exception("fail to create directory");
    return $name;
}
function fileUpload(string $from, string $destination , int $randomDirectoryNameLength , string $filename ):string {
    $directory = randomDirectory($destination,$randomDirectoryNameLength);
    $finalDestination = $destination."/".$directory;
    $fileDestination = $finalDestination."/".$filename;
    $uploaded = move_uploaded_file($from,$fileDestination);
    if (!$uploaded)
        throw new Exception("fail to upload file $filename to $fileDestination");
    return $directory.'/'.$filename;
}
function thumbnailUpload(string $from , int $randomDirectoryNameLength , $fileName):string
{
    $destination = THUMBNAIL_DESTINATION ;
    return fileUpload($from,$destination,$randomDirectoryNameLength,$fileName);
}
function lsDir(string $directory):array {
    $ls = scandir($directory);
    unset($ls[0],$ls[1]);
    return array_values($ls);
}
function deleteDir(string $directory):void {
    $ls = lsDir($directory);
    $listCount = count($ls);

    for($counter = 0 ; $counter < $listCount ; $counter++){
        $item = $ls[$counter];
        $itemPath = $directory."/".$item;
        $itemIsFile = is_file($itemPath);

        if ($itemIsFile)
            unlink($itemPath);
        else
            deleteDir($itemPath);
    }

    rmdir($directory);
}
function deleteThumbnail(string $thumbnail):void {
    $purePath = str_replace(THUMBNAIL_URL_PREFIX."/","",$thumbnail);
    $thumbnailFullPath = THUMBNAIL_DESTINATION."/".$purePath;
    $thumbnailDirectory = dirname($thumbnailFullPath);
    deleteDir($thumbnailDirectory);
}