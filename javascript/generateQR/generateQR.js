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

let id = patientID[0].patientID // stores patientID

document.getElementById("num").innerHTML = id; // Outputs the code if QR doesn't work

generateQRCode(id); // Generates the QR code


