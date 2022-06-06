let createItem = grid => {
    const div = document.createElement('div');
    const img = document.createElement('img');
    const div2 = document.createElement('div');
    const p = document.createElement('p');
    const p2 = document.createElement('p');

    div.setAttribute('class', 'item');
    img.setAttribute('src', '../../assets/images/meds.png');
    div2.setAttribute('class', 'item-info');

    p.innerText = "Colace 100gm";
    p2.innerText = "Sig: Twice a day";

    grid.append(div);
    div.append(img);
    div.append(div2);
    div2.append(p);
    div2.append(p2);
}

let grid = document.getElementById("items");

createItem(grid);
createItem(grid);
createItem(grid);
createItem(grid);
