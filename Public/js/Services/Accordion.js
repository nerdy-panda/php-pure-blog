class Accordion {
    /** @var {HTMLElement} element */
    element = null ;
    openClass = null;
    constructor(element , openClass ) {
        this.element = element ;
        this.openClass = openClass ;

        this.element.addEventListener('click',this.elementClickListener);
    }
    elementClickListener = (event)=> {
        event.preventDefault();
        const isClose = this.isClose();
        if(isClose)
            this.open();
        else
            this.close();
    }
    isOpen(){
        return this.element.classList.contains(this.openClass);
    }
    isClose(){
        return !this.isOpen();
    }
    open(){
        this.closeOpenAccordions();
        this.element.classList.add(this.openClass);
    }
    close(){
        this.element.classList.remove(this.openClass);
    }
    openAccordions(){
        return this.element.parentElement.parentElement.querySelectorAll(`.${this.openClass}`);
    }
    closeOpenAccordions(){
        const openAccordions = this.openAccordions();
        for (const openAccordion of openAccordions)
            openAccordion.classList.remove(this.openClass);
    }
}
export default Accordion;