var qrcode = new QRCode("qrcode");

function makeCode () {
    var elText =$('#dane').text();
    //
    // if (!elText.value) {
    //     alert("Input a text");
    //     elText.focus();
    //     return;
    // }

    qrcode.makeCode(elText);
}

makeCode();

$("#text").
on("blur", function () {
        makeCode();
    }).
    on("keydown", function (e) {
        if (e.keyCode == 13) {
            makeCode();
        }
    });
