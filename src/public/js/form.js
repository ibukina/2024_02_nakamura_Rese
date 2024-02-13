// dateというname属性を持つinputタグを取得
var dateInput = document.querySelector("input[name='date']");
// テーブルのDateというセルを取得
var dateCell = document.querySelector(".table-data_date");
// inputタグにchangeイベントを設定
dateInput.addEventListener("change", function () {
    // inputタグの値を取得
    var dateValue = dateInput.value;
    console.log(dateValue);
    // テーブルのセルに値を表示
    dateCell.textContent = dateValue;
});

// 省略したもの
document.querySelector("input[name='time']").addEventListener("change", (event) => {
    let timeValue = event.target.value;
    console.log(timeValue);
    document.querySelector(".table-data_time").textContent = timeValue;
});

document.querySelector("input[name='number']").addEventListener("change", (event) => {
    let numberValue = event.target.value;
    console.log(numberValue);
    document.querySelector(".table-data_number").textContent = numberValue;
});

document.querySelector("input[name='name']").addEventListener("change", (event) => {
    let nameValue = event.target.value;
    console.log(nameValue);
    document.querySelector(".table-data_name").textContent = nameValue;
});

document.querySelector("input[name='summary']").addEventListener("change", (event) => {
    let summaryValue = event.target.value;
    console.log(summaryValue);
    document.querySelector(".table-data_summary").textContent = summaryValue;
});

document.querySelector("input[name='area']").addEventListener("change", (event) => {
    let areaValue = event.target.value;
    console.log(areaValue);
    document.querySelector(".table-data_area").textContent = areaValue;
});

document.querySelector("input[name='genre']").addEventListener("change", (event) => {
    let genreValue = event.target.value;
    console.log(genreValue);
    document.querySelector(".table-data_genre").textContent = genreValue;
});