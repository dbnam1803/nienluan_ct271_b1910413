function checkStuff() {
    var email = document.form1.email;
    var password = document.form1.password;
    var msg = document.getElementById('msg');

    if (email.value == "") {
        msg.style.display = 'block';
        msg.innerHTML = "Nhập Email";
        email.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email.value)) {
        msg.innerHTML = "Nhập Email hợp lệ";
        email.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    if (password.value == "") {
        msg.innerHTML = "Nhập Password";
        password.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }

}

function checkreg() {
    var user = document.form2.user
    var email = document.form2.email;
    var sdt = document.form2.phone;
    var password = document.form2.password;
    var repassword = document.form2.repassword;
    var rul = document.getElementById("action");
    var msg = document.getElementById('msg1');
    if (user.value == "") {
        msg.style.display = 'block';
        msg.innerHTML = "Chưa Nhập Name";
        user.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    if (email.value == "") {
        msg.style.display = 'block';
        msg.innerHTML = "Chưa Nhập Email";
        email.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email.value)) {
        msg.innerHTML = "Nhập Email hợp lệ";
        email.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    if (sdt.value == "" && sdt.value < 10) {
        msg.style.display = 'block';
        msg.innerHTML = "Nhập SĐT Có 10 Số";
        sdt.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    if (password.value == "") {
        msg.style.display = 'block';
        msg.innerHTML = "Chưa Nhập Password";
        password.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    if (repassword.value == "") {
        msg.style.display = 'block';
        msg.innerHTML = "Chưa Nhập Lại Password";
        repassword.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    if (repassword.value != password.value) {
        msg.style.display = 'block';
        msg.innerHTML = "Password Chưa Đúng !!";
        repassword.focus();
        return false;
    } else {
        msg.innerHTML = "";
    }
    // if (rul.checked == false) {
    //     msg.style.display = 'block';
    //     msg.innerHTML = "Chưa Đồng ý Điều khoản";
    //     rul.focus();
    //     return false;
    // } else {
    //     msg.innerHTML = "";
    // }
    rul.onclick = function(e) {
        if (this.checked) {
            msg.innerHTML = "";
        } else {
            msg.style.display = 'block';
            msg.innerHTML = "Chưa Đồng ý Điều khoản";
            rul.focus();
            return false;
        }
    }
}
$(document).ready(function() {
    $("#tb").hide();
});
$("#cart").click(function() {
    $("#tb").toggle();
})

function check() {
    $.validator.setDefaults({
        submitHandler: function() { alert("Submitted!"); }
    });
    $("#form2").validate({
        rules: {
            user: "required",
            email: { required: true, email: true },
            phone: { required: true, length: 10 },
            password: { required: true, minlength: 6 },
            repassword: { required: true, minlength: 6, equalTo: "#password" },
            checkcode: "required"
        },
        messages: {
            user: "Nhap ten",
            email: "Khong hop le",
            phone: {
                required: "Chua nhap sdt",
                length: "sdt co 10 so"
            },
            password: {
                required: "Chua nhap password",
                length: "sdt co 6 so"
            },
            repassword: {
                required: "Chua nhap password",
                length: "sdt co 6 so",
                equalTo: "kho khop"
            },
            checkcode: "phai dong y"
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
}