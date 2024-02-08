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