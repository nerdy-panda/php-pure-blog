import Accordion from "../Services/Accordion.js";
import {ACCORDION_OPEN_CLASS} from "../Const/Accordion.js";

function bootstrapAccordion(){
    const accordions = window.document.body.querySelectorAll(".sub-menu>a");
    for (const accordionElement of accordions) {
        const accordion = new Accordion(accordionElement,ACCORDION_OPEN_CLASS);
    }
}
function dashboardBootstrap(){
    bootstrapAccordion();
}

export {bootstrapAccordion,dashboardBootstrap};