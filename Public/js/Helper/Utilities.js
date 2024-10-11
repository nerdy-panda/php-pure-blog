function fileListToString(fileList){
    /** @var {FileList} fileList */
    const files = [] ;
    for (const file of fileList)
        files.push(file.name);
    return files.join(",");
}

export {fileListToString}