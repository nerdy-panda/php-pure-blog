import Swal from "../../node_modules/sweetalert2/src/sweetalert2.js";

function failAuthenticationNotification(){
    Swal.fire({
        icon: "error",
        title: "ورود ناموفق",
        text: "نام کاربری و یا گذرواژه اشتباه میباشد لطفا مجددا تلاش فرمایید !!!",
        confirmButtonText : "بریم یک بار دیگه تلاش کنیم"
    });
}
export {failAuthenticationNotification};