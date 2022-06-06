
// Creates the item to be put on the HTML
let createItem = (container, meds, notes) => {
    const div = document.createElement('div');
    const img = document.createElement('img');
    const div2 = document.createElement('div');
    const p = document.createElement('p');
    const p2 = document.createElement('p');

    div.setAttribute('class', 'item');
    img.setAttribute('src', '../../assets/images/meds.png');
    div2.setAttribute('class', 'item-info');

    p.innerText = meds;
    p2.innerText = notes;

    grid.append(div);
    div.append(img);
    div.append(div2);
    div2.append(p);
    div2.append(p2);
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
        let doctorNotes = phpArray[i].doctorNotes;

        medicineName = capitalize(medicineName);

        createItem(grid, medicineName, doctorNotes);
    }
}
