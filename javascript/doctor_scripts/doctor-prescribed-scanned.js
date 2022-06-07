
// Creates the item to be put on the HTML
let createItem = (container, meds, diagnosis, date, notes, pieces) => {
    const item = document.createElement('div');
    const medImage = document.createElement('img');
    const itemInfo = document.createElement('div');
    const p = document.createElement('p');
    const p2 = document.createElement('p');
    const p3 = document.createElement('p');
    const p4 = document.createElement('p');
    const p5 = document.createElement('p');
    

    item.setAttribute('class', 'item');
    medImage.setAttribute('src', '../../assets/images/meds.png');
    itemInfo.setAttribute('class', 'item-info');

    p.innerText = meds;
    p2.innerText = diagnosis;
    p3.innerText = date;
    p4.innerText = `${pieces} pieces`;
    p5.innerText = notes;

    container.append(item);
    item.append(medImage);
    item.append(itemInfo);
    itemInfo.append(p);
    itemInfo.append(p2);
    itemInfo.append(p3);
    itemInfo.append(p4);
    itemInfo.append(p5);
};

// Function to capitalize first letter
let capitalize = string => {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

// Gets the container of the items
let toClaimContainer = document.getElementById("toClaimI");
let claimedContainer = document.getElementById("claimedI");

for(let i = 0; i < toClaim.length; i++) {
    let medicineName = toClaim[i].genericName_dosage;
    let diagnosis = toClaim[i].diagnosis;
    let date = toClaim[i].datePrescribed;
    let doctorNotes = toClaim[i].doctorNotes;
    let pieces = toClaim[i].pieces;

    medicineName = capitalize(medicineName);

    createItem(toClaimContainer, medicineName, diagnosis, date, doctorNotes, pieces);
}

for(let i = 0; i < claimed.length; i++) {
    let medicineName = claimed[i].genericName_dosage;
    let diagnosis = claimed[i].diagnosis;
    let date = claimed[i].datePrescribed;
    let doctorNotes = claimed[i].doctorNotes;
    let pieces = claimed[i].pieces;

    medicineName = capitalize(medicineName);

    createItem(claimedContainer, medicineName, diagnosis, date, doctorNotes, pieces);
}
