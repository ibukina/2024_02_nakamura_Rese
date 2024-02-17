document.querySelector("select[name='image_id']").addEventListener("change", (event) => {
    let imageText = event.target.selectedOptions[0].text;
    console.log(imageText);
    document.querySelector(".table-data_image").textContent = imageText;
});

document.querySelector("select[name='area_id']").addEventListener("change", (event) => {
    let areaText = event.target.selectedOptions[0].text;
    console.log(areaText);
    document.querySelector(".table-data_area").textContent = areaText;
});

document.querySelector("select[name='genre_id']").addEventListener("change", (event) => {
    let genreText = event.target.selectedOptions[0].text;
    console.log(genreText);
    document.querySelector(".table-data_genre").textContent = genreText;
});

document.querySelector("input[name='name']").addEventListener("change", (event) => {
    let nameValue = event.target.value;
    console.log(nameValue);
    document.querySelector(".table-data_name").textContent = nameValue;
});

document.querySelector("textarea[name='summary']").addEventListener("change", (event) => {
    let summaryValue = event.target.value;
    console.log(summaryValue);
    document.querySelector(".table-data_summary").textContent = summaryValue;
});