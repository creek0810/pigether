function init() {
    document.getElementById("delete-btn").addEventListener("click", function() {
        document.getElementById("select-work").value = "1";
    });
    document.getElementById("update-img").addEventListener("click", function() {
        document.getElementById("select-work").value = "2";
    });
}
  
window.addEventListener("load", init);