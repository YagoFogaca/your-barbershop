export function reset() {
    $(".process-block").eq(2).removeClass("active-process-block");
    $(".process-block").eq(0).addClass("active-process-block");
    // $("#continue").attr("type", "button");
}
