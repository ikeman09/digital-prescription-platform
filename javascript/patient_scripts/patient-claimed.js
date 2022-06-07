
// Creates the item to be put on the HTML
let createItem = (container, meds, diagnosis, date, notes, pieces) => {
    const div = document.createElement('div');
    const img = document.createElement('img');
    const div2 = document.createElement('div');
    const p = document.createElement('p');
    const p2 = document.createElement('p');
    const p3 = document.createElement('p');
    const p4 = document.createElement('p');
    const p5 = document.createElement('p');

    div.setAttribute('class', 'item');
    img.setAttribute('src', '../../assets/images/meds.png');
    div2.setAttribute('class', 'item-info');

    p.innerText = meds;
    p2.innerText = diagnosis;
    p3.innerText = date;
    p4.innerText = `${pieces} pieces`;
    p5.innerText = notes;

    container.append(div);
    div.append(img);
    div.append(div2);
    div2.append(p);
    div2.append(p2);
    div2.append(p3);
    div2.append(p4);
    div2.append(p5);
};

// Function to capitalize first letter
let capitalize = string => {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

// Gets the container of the items
let grid = document.getElementById("items");

if(phpArray.length === 0) {
    grid.document.innerText("No claimed"); // will edit later lmao
}
else {
    // loops through the entire array and outputs it on the HTML
    for(let i = 0; i < phpArray.length; i++) {
        let medicineName = phpArray[i].genericName_dosage;
        let diagnosis = phpArray[i].diagnosis;
        let date = phpArray[i].datePrescribed;
        let doctorNotes = phpArray[i].doctorNotes;
        let pieces = phpArray[i].pieces;
        let prescriptionID = phpArray[i].prescriptionID;

        medicineName = capitalize(medicineName);

        createItem(grid, medicineName, diagnosis, date, doctorNotes, pieces);
    }
}
