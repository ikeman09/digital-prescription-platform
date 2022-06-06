// Creates the item to be put on the HTML
let createItem = (container, meds, notes) => {
    const div = document.createElement('div');
    const div2 = document.createElement('div');
    const div3 = document.createElement('div');
    const img = document.createElement('img');
    const p1 = document.createElement('p');
    const p2 = document.createElement('p');

    const div4 = document.createElement('div');
    const img2 = document.createElement('img');

    div.setAttribute('class', 'item');
    div2.setAttribute('class', 'item-info');
    img.setAttribute('src', '../../assets/images/meds.png');
    div3.setAttribute('class', 'item-paragraph');
    div4.setAttribute('class', 'qrcode');
    img2.setAttribute('src', '../../assets/images/qrcode-small.png')
    
    p1.innerText = meds;
    p2.innerText = notes;

    grid.append(div);
    div.append(div2);
    div2.append(img);
    div2.append(div3);
    div3.append(p1);
    div3.append(p2);

    div.append(div4);
    div4.append(img2);

};

// Function to capitalize first letter
let capitalize = string => {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

// Gets the container of the items
let grid = document.getElementById("items");

if(phpArray.length === 0) {
    grid.document.innerText("No claim"); // will edit later lmao
}
else {
    // loops through the entire array and outputs it on the HTML
    for(let i = 0; i < phpArray.length; i++) {
        let medicineName = phpArray[i].genericName_dosage;
        let doctorNotes = phpArray[i].doctorNotes;

        medicineName = capitalize(medicineName);

        createItem(grid, medicineName, doctorNotes);
    }
}




// Go to QR page once clicked
// Display QR
//  -Get prescriptionID from the prescription
//      >If user taps on prescription-N, return prescriptionID of prescription-N
//  -Convert it into QR
//  -Display QR