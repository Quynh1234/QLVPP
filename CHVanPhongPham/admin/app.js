function validate() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    if (email == "quang@gmail.com" && password == "formget#123") {
        alert("Đăng nhập thành công");
        window.location = "qltk.php"; // Chuyển hướng đến trang khác.
        return false;
    } else {
        attempt--; // Giảm số lần thử lại.
        alert("Bạn còn " + attempt + " lần thử lại;");
        // Vô hiệu hóa các trường sau 3 lần thử.
        if (attempt == 0) {
            document.getElementById("email").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("btn-submit").disabled = true;
            return false;
        }
    }
}