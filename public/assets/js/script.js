
function isGood(password) {
  var password_strength = document.getElementById("password-text");

  //TextBox left blank.
  if (password.length == 0) {
    password_strength.innerHTML = "";
    return;
  }
  if (password.length < 8) {
    password_strength.innerHTML = '<div class="text-theme-6 mt-2">This field should be at least 8 long</div>';
    return;
  }



  //Regular Expressions.
  var regex = new Array();
  regex.push("[A-Z]"); //Uppercase Alphabet.
  regex.push("[a-z]"); //Lowercase Alphabet.
  regex.push("[0-9]"); //Digit.
  regex.push("[$@$!%*#?&]"); //Special Character.

  var passed = 0;

  //Validate for each Regular Expression.
  for (var i = 0; i < regex.length; i++) {
    if (new RegExp(regex[i]).test(password)) {
      passed++;
    }
  }

  //Display status.
  var strength = "";
  switch (passed) {
    case 0:
    case 1:
      strength = '<div class="w-full grid grid-cols-12 gap-4 h-1 mt-3"><div class="col-span-3 h-full rounded bg-theme-6"></div></div>';
      break;
    case 2:
      strength = '<div class="w-full grid grid-cols-12 gap-4 h-1 mt-3"><div class="col-span-3 h-full rounded bg-theme-6"></div><div class="col-span-3 h-full rounded alert-warning"></div></div>';
      break;
    case 3:
      strength = '<div class="w-full grid grid-cols-12 gap-4 h-1 mt-3"><div class="col-span-3 h-full rounded bg-theme-6"></div><div class="col-span-3 h-full rounded alert-warning"></div><div class="col-span-3 h-full rounded alert-success"></div></div>';
      break;
    case 4:
      strength = '<div class="w-full grid grid-cols-12 gap-4 h-1 mt-3"><div class="col-span-3 h-full rounded bg-theme-6"></div><div class="col-span-3 h-full rounded alert-warning"></div><div class="col-span-3 h-full rounded alert-success"></div><div class="col-span-3 h-full rounded bg-theme-10"></div></div>';
      break;

  }

  password_strength.innerHTML = strength;

}

jQuery(document).ready(function (a) {
  "use strict";
  // iziToast section
  a("[data-toast]").on("click", function () {
    var b = a(this),
        c = b.data("toast-type"),
        d = b.data("toast-icon"),
        e = b.data("toast-position"),
        f = b.data("toast-title"),
        g = b.data("toast-message"),
        h = "";
    switch (e) {
        case "topRight":
            h = {
                class: "iziToast-" + c || "",
                title: f || "Title",
                message: g || "toast message",
                animateInside: !1,
                position: "topRight",
                progressBar: !1,
                icon: d,
                timeout: 3200,
                transitionIn: "fadeInLeft",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeIn",
                transitionOutMobile: "fadeOut",
            };
            break;
        case "bottomRight":
            h = {
                class: "iziToast-" + c || "",
                title: f || "Title",
                message: g || "toast message",
                animateInside: !1,
                position: "bottomRight",
                progressBar: !1,
                icon: d,
                timeout: 3200,
                transitionIn: "fadeInLeft",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeIn",
                transitionOutMobile: "fadeOut",
            };
            break;
        case "topLeft":
            h = {
                class: "iziToast-" + c || "",
                title: f || "Title",
                message: g || "toast message",
                animateInside: !1,
                position: "topLeft",
                progressBar: !1,
                icon: d,
                timeout: 3200,
                transitionIn: "fadeInRight",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeIn",
                transitionOutMobile: "fadeOut",
            };
            break;
        case "bottomLeft":
            h = {
                class: "iziToast-" + c || "",
                title: f || "Title",
                message: g || "toast message",
                animateInside: !1,
                position: "bottomLeft",
                progressBar: !1,
                icon: d,
                timeout: 3200,
                transitionIn: "fadeInRight",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeIn",
                transitionOutMobile: "fadeOut",
            };
            break;
        case "topCenter":
            h = {
                class: "iziToast-" + c || "",
                title: f || "Title",
                message: g || "toast message",
                animateInside: !1,
                position: "topCenter",
                progressBar: !1,
                icon: d,
                timeout: 3200,
                transitionIn: "fadeInDown",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeIn",
                transitionOutMobile: "fadeOut",
            };
            break;
        case "bottomCenter":
            h = {
                class: "iziToast-" + c || "",
                title: f || "Title",
                message: g || "toast message",
                animateInside: !1,
                position: "bottomCenter",
                progressBar: !1,
                icon: d,
                timeout: 3200,
                transitionIn: "fadeInUp",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeIn",
                transitionOutMobile: "fadeOut",
            };
            break;
        default:
            h = {
                class: "iziToast-" + c || "",
                title: f || "Title",
                message: g || "toast message",
                animateInside: !1,
                position: "topRight",
                progressBar: !1,
                icon: d,
                timeout: 3200,
                transitionIn: "fadeInLeft",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeIn",
                transitionOutMobile: "fadeOut",
            };
    }
    iziToast.show(h);
  }),
  // tabs section
  a("body").on("click", 'a[data-toggle="tab"]', function (t, n) {
      a(this).closest(".nav-tabs").find('a[data-toggle="tab"]').removeClass("active").attr("aria-selected", !1), a(this).addClass("active").attr("aria-selected", !0);
      let r = a(this).attr("data-target");
      a(r).closest(".tab-content").children(".tab-pane").removeClass("active"),
          a(r)
              .addClass("active");
  });

  // tooltip section
  tippy('[data-tippy-content]');
  
    /*---------------------
        Preloader
    -----------------------*/
    var preLoder = $("#preloader");
    preLoder.addClass('hide');

    a("body").on("click", ".btn-close", function () {
      h()(a(this).closest(".alert"), "fadeOut", {
          duration: 300,
          complete: function (t) {
              a(t).removeClass("show");
          },
      });
  });

});

window.addEventListener('swal', event => {
  var c = event.detail.ButtonText,
      d = event.detail.icon,
      f = event.detail.title,
      g = event.detail.message,
      h = "";
  h = {
      title: f || '',
      text: g || 'test message',
      icon: d,
      confirmButtonText: c || 'Ok',
      confirmButtonColor:'#3085d6',
  };
  
    Swal.fire(h);
  
});

window.addEventListener('alert', event => {
  var c = event.detail.type,
      d = event.detail.icon,
      f = event.detail.title,
      g = event.detail.message,
      h = "";
  h = {
      class: "iziToast-" + c || "",
      title: f || "",
      message: g || "toast message",
      animateInside: !1,
      position: "topRight",
      progressBar: !1,
      icon: d,
      timeout: 3200,
      transitionIn: "fadeInLeft",
      transitionOut: "fadeOut",
      transitionInMobile: "fadeIn",
      transitionOutMobile: "fadeOut",
  };

  iziToast.show(h);

});