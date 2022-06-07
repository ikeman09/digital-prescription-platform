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

    container.append(div);
    div.append(div2);
    div2.append(img);
    div2.append(div3);
    div3.append(p1);
    div3.append(p2);

    div.append(div4);
    div4.append(img2);

};

// Outputs text if there are no prescriptions to be claimed
let createEmpty = container => {
    const div = document.createElement('div');
    const h1 = document.createElement('h1');
    const p = document.createElement('p');
    
    div.setAttribute('class', 'empty');

    container.append(div);
    div.append(h1);
    div.append(p);

    h1.innerText = "You have no prescriptions!";
    p.innerText = "You may get one from any of our registered doctors.";
};

// Function to capitalize first letter
let capitalize = string => {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

// Gets the container of the items
let main = document.getElementById("main");

if(phpArray.length === 0) {
    createEmpty(main);
}
else {
    const divGrid = document.createElement('div');
    divGrid.setAttribute('class', 'grid-container');
    main.append(divGrid);

    // loops through the entire array and outputs it on the HTML
    for(let i = 0; i < phpArray.length; i++) {
        let medicineName = phpArray[i].genericName_dosage;
        let doctorNotes = phpArray[i].doctorNotes;

        medicineName = capitalize(medicineName);

        createItem(divGrid, medicineName, doctorNotes);
    }
}
