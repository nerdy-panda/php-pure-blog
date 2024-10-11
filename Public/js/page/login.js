import {urlParameters} from "../Helper/Url.js";
import {failAuthenticationNotification} from "../Helper/View.js";
const parameters = urlParameters();
if (parameters.get('authentication')!==null){
    failAuthenticationNotification();
    console.log(parameters);
}



