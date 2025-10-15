//equal headings (blog, single articles, publications)
function resizeToMaxHeight(class_name) {
    let ph_heights = [];
    let ph_heights_pixels = [];
    let ph_max;
    let pc_heights = [];
    let pc_heights_pixels = [];
    let pc_max;

    $("." + class_name).each(function () {
        ph_heights.push($(this).css("height"));
    });
    for (let i = 0; i < ph_heights.length; i++) {
        ph_heights_pixels.push(parseInt(ph_heights[i]));
    }
    ph_max = ph_heights_pixels.reduce(function (a, b) {
        return Math.max(a, b);
    });
    $("." + class_name).each(function () {
        $(this).css("height", ph_max);
    });
}

$(document).ready(function () {
    // Reasons accordion
    $(".accordion-header").on("click", function () {
        
        let body = $(this)
            .closest(".accordion-element")
            .find(".accordion-body");
        if (body.css("display") == "none") {
            body.slideDown();
            $(this).find(".arrow").css("rotate", "180deg");
        } else {
            body.slideUp();
            $(this).find(".arrow").css("rotate", "0deg");
        }
    });
    //cookie variables
    let accept_cookies = $("#hf").attr("data-accept-cookies");
    let lang_conversion = $("#hf").attr("data-lang");
    let youtube = $("#hf").attr("data-youtube");
    let landbot = $("#hf").attr("data-landbot");
    let google_maps = $("#hf").attr("data-maps");
    let google_ads = $("#hf").attr("data-ads");
    let facebook = $("#hf").attr("data-facebook");
    let google_analytics = $("#hf").attr("data-analytics");

    //COOKIE MODALS
    if (
        accept_cookies == "" &&
        (lang_conversion == "" ||
            youtube == "" ||
            landbot == "" ||
            google_maps == "" ||
            google_ads == "" ||
            facebook == "" ||
            google_analytics == "")
    ) {
        $("#cookie_modal").modal("show");
    }

    $("#accept_cookies_btn, #accept_all_btn").on("click", function () {
        $.ajax({
            method: "POST",
            url: "/accept-cookies",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        }).done(function (result) {
            if (result == "Cookies accepted") {
                $("#cookie_modal").modal("hide");
                $("#settings_modal").modal("hide");
            }
        });
    });

    $("#save_settings_btn").on("click", function () {
        let input_states = {};
        $("#settings_modal input").each(function (index, val) {
            input_states[val.name] = $(this).prop("checked");
        });
        $.ajax({
            data: { input_states },
            method: "POST",
            url: "/custom-cookies",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        }).done(function (result) {
            if (result == "Custom cookies accepted") {
                $("#cookie_modal").modal("hide");
                $("#settings_modal").modal("hide");
            }
        });
    });

    $("#cookie_settings_btn").on("click", function () {
        $("#cookie_modal").modal("hide");
        $("#settings_modal").modal("show");
    });

    $("#back_btn").on("click", function () {
        $("#settings_modal").modal("hide");
        $("#cookie_modal").modal("show");
    });

    //SHARE MODAL
    $("#share_ok_button").on("click", function () {
        let link = window.location;
        let value = $(this).attr("data-value");
        value = parseInt(value);

        switch (value) {
            case 1:
                $("#share_ok_button").attr("target", "_blank");
                $("#share_ok_button").attr(
                    "href",
                    "https://www.facebook.com/sharer/sharer.php?u=" + link
                );
                break;
            case 2:
                $("#share_ok_button").attr("target", "_blank");
                $("#share_ok_button").attr(
                    "href",
                    "https://twitter.com/intent/tweet?&url=" + link
                );
                break;
            case 3:
                $("#share_ok_button").attr("target", "_blank");
                $("#share_ok_button").attr(
                    "href",
                    "https://www.linkedin.com/sharing/share-offsite/?url=" +
                        link
                );
                break;
            case 4:
                $("#share_ok_button").attr("target", "_blank");
                $("#share_ok_button").attr("href", "https://www.instagram.com");
                break;
            default:
                $("#share_error").html("Please select a social network");
        }
    });

    //MOBILE MENU
    $("#responsive_menu_icon").on("click", function () {
        if ($("#hidden_menu").css("display") == "none") {
            $("#hidden_menu").css("display", "block");
        } else {
            $("#hidden_menu").css("display", "none");
        }
    });

    $("#close_hidden_menu").on("click", function () {
        $("#hidden_menu").css("display", "none");
    });

    $(".share_social_icons").on("click", function () {
        let value = $(this).attr("data-value");
        $("#share_ok_button").attr("data-value", value);
        $("#share_error").html("");
        $(".share_social_icons").css("background", "none");
        $(this).css("background", "#FFB492");
    });

    //CLOSE ADMIN FLASH MESSAGES
    $(".close-error").on("click", function () {
        $(".error-container").slideUp();
    });

    //RESIZE TO HIGHEST
    if ($(".news_heading").length > 0) {
        if ($(window).width() > 991) {
            //resizeToMaxHeight("news_heading");
            //resizeToMaxHeight("news_body");
        }
    }

    if ($(".publication-heading").length > 0) {
        if ($(window).width() > 991) {
            resizeToMaxHeight("publication-heading");
        }
    }

    $("#phone-icon").on("click", function () {
        $("#phone-box").toggleClass("d-none");
    });

    $("#close-phone-box").on("click", function () {
        $("#phone-box").addClass("d-none");
    });
});

$(".dropdown-menu a.dropdown-toggle").on("mouseenter", function (e) {
    if (!$(this).next().hasClass("show")) {
        $(this)
            .parents(".dropdown-menu")
            .first()
            .find(".show")
            .removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass("show");

    $(this)
        .parents("li.nav-item.dropdown.show")
        .on("hidden.bs.dropdown", function (e) {
            $(".dropdown-submenu .show").removeClass("show");
        });
    return false;
});

$("#main-program-select").on("change", function () {
    let new_url = $(this).find("option:selected").attr("data-href");
    window.location = new_url;
});

function funcOne() {
    document.getElementsByClassName("footerListItem").style.backgroundColor =
        "tomato";
}

function mousein(event) {
    event.target.style.color = "red";
}

function mouseout(event) {
    event.target.style.color = "black";
}

// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// Copy current single conference url and store it
$(".copyLink").on("click", function () {
    copyLink = $(this).data("link");
    receiver.value = copyLink;
    // alert(copyLink);
});

// Copy linked data and added it to clipboard
function copyLinkData() {
    // Get the text field
    var copyText = document.getElementById("receiver");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    // alert("Copied the text: " + copyText.value);
}

