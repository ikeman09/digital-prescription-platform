// Generates the QR code
let generateQRCode = val => {
    let qrcode; // Stores the qr code.
    
    if(qrcode === undefined) {
        qrcode = new QRCode('qrcode', val);
    } else {
        qrcode.clear();
        qrcode.makeCode(val);
    }
};

let random = randomNumber(10000, 99999); // Stores rand num from 10k to 99k (5 digits)

document.getElementById("num").innerHTML = random; // Outputs the code if QR doesn't work

generateQRCode(random); // Generates the QR code

