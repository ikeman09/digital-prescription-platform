// Generates a 5 digit random number and returns it as string
let randomNumber = (min, max) => {
    let subtrMinMax = max - min + 1;
    let multByRand = Math.random() * subtrMinMax;
    let floor = Math.floor(multByRand);
    let result = floor + min;

    return String(result); // returns string because QR only accepts strings
};

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

