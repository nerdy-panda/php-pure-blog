import MaterialFileField from "../../../../Resource/View/Widget/MaterialFileField.js";

class Program {
    main(){
        const thumbnailField = window.document.body.querySelector("#thumbnail");
        const thumbnailResult = window.document.body.querySelector("#thumbnail-field-row .file-selector p strong");
        const thumbnailClear = window.document.body.querySelector(".material-file-field-clear");
        const materialFileField = new MaterialFileField(thumbnailField,thumbnailResult,thumbnailClear);
    }
}

export default Program;