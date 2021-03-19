// tách định dạng tiền tệ sang VND như number_forrnat
function number_format_vnd(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}