import {fileListToString} from "../../../Helper/Utilities.js";

class MaterialFileField {
    /** @var {HTMLInputElement} element */
    element = null ;
    /** @var {HTMLElement} result */
    result = null ;
    /** @var {string|null} resultDefaultText */
    resultDefaultText = null ;
    /** @var {HTMLElement} clearElement */
    clearElement = null ;

    constructor(element , result , clearElement ) {
        this.element = element ;
        this.result = result ;
        this.resultDefaultText = result.innerText;
        this.clearElement = clearElement;
        this.element.addEventListener("change",this.elementChangeListener);
        this.clearElement.addEventListener("click",this.clearElementClickListener);
    }
    elementChangeListener = (event) => {
        const fileList = this.element.files ;
        const fileListLength = fileList.length >= 1 ;
        if (fileListLength)
            this.showClearElement();
        else
            this.hideClearElement();
        const fileListString = fileListToString(fileList);
        this.result.innerText = fileListString ;
    }
    clearElementClickListener = ()=>{
        this.clearFiles();
        this.resultResetText();
        this.hideClearElement();
    }
    showClearElement(){
        this.clearElement.style.display = "inline-block";
    }
    hideClearElement(){
        this.clearElement.style.display = "none";
    }
    resultResetText(){
        this.result.innerText = this.resultDefaultText ;
    }

    clearFiles() {
        this.element.value = "";
    }
}
export default MaterialFileField;