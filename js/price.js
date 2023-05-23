// JavaScript Document

//GASのAPIのURL
const endpoint = "https://script.google.com/macros/s/AKfycbz0po5eEnsxrb8mXMMkxti0KA5KDxGre_1iTeUjobGKTogMuq2d-1gT5KtSHO1MUT6u/exec";

var priceData = new Array();

//APIを使って非同期データを取得する
// ラクラク査定用の買取データを取得
fetch(endpoint)
.then(response => response.json())
/*成功した処理*/
.then(data => {
  //JSONから配列に変換
  priceData = data;

  priceTableBody = document.getElementById("price-table-body");

  // データを並べ替え
  priceData.sort((a, b) => {
    if (a.車名 > b.車名) return　1;
    if (a.車名 < b.車名) return -1;
    if (a.エンジン型式 > b.エンジン型式) return 1;
    if (a.エンジン型式 < b.エンジン型式) return -1;
  });

  // WEB掲載するデータのみ抽出
  const priceDataForTable = priceData.filter(value => {
    return value.WEB掲載 == true;
  });

  // WEB掲載するデータの中から小型区分のデータを抽出
  const priceDataOfSmall = priceDataForTable.filter(value => {
    return value.区分 == "小型";
  });
  // WEB掲載するデータの中から中型区分のデータを抽出
  const priceDataOfMiddle = priceDataForTable.filter(value => {
    return value.区分 == "中型";
  });
  // WEB掲載するデータの中から大型区分のデータを抽出
  const priceDataOfLarge = priceDataForTable.filter(value => {
    return value.区分 == "大型";
  });
  // WEB掲載するデータの中から乗用区分のデータを抽出
  const priceDataOfCommon = priceDataForTable.filter(value => {
    return value.区分 == "乗用";
  });

  // 各データを買取価格表に挿入
  appendChildToPriceTable(priceDataOfSmall);
  appendChildToPriceTable(priceDataOfMiddle);
  appendChildToPriceTable(priceDataOfLarge);
  appendChildToPriceTable(priceDataOfCommon);

  // ０秒見積もりの車名選択肢を追加
  car = document.getElementById("car");
  for (let i = 0; i < priceData.length; i++) {
    if (i != 0 && priceData[i].車名 == priceData[i-1].車名) continue;
    var op = document.createElement("option");
    value = priceData[i];
    op.value = value.車名;
    op.text = value.車名;
    car.appendChild(op);
  }
});

// 買取価格表にデータを挿入
function appendChildToPriceTable(data) {
  priceTableBody = document.getElementById("price-table-body");

  // 重複データを削除
  var filteredDataList = [];
  for (let i = 0; i < data.length; i++) {
    value = data[i];

    var newRow = document.createElement("tr");
    if (i != 0  && value.車名 == data[i-1].車名 && value.エンジン型式 == data[i-1].エンジン型式) {
      continue;
    } else {
      filteredDataList.push(value);
    }
    priceTableBody.appendChild(newRow);
  }

  for (let i = 0; i < filteredDataList.length; i++) {
    value = filteredDataList[i];

    var price = value.ラクラク買取の買取金額;
    if (!isNaN(value.ラクラク買取の買取金額)) {
      price = changeYen(value.ラクラク買取の買取金額);
    }

    var newRow = document.createElement("tr");
    if (i == 0) {
      newRow.innerHTML = `
        <td class="data" rowspan=${filteredDataList.length}>${value.区分}</td>
        <td class="data">${value.車名}</td>
        <td class="data">${value.エンジン型式}</td>
        <td class="data -price">${price}</td>
      `;
    } else {
      newRow.innerHTML = `
        <td class="data">${value.車名}</td>
        <td class="data">${value.エンジン型式}</td>
        <td class="data -price">${price}</td>
      `;
    }
    priceTableBody.appendChild(newRow);
  }
}

// 査定の車名選択が変更された時の動作
document.getElementById('car').onchange = function(){
  var targetCar = this.value;
  engine = document.getElementById("engine");
  engine.options.length = 0

  for (let i = 0; i < priceData.length; i++) {
    value = priceData[i];
    if (value.車名 != targetCar) continue;
    if (i != 0 && priceData[i].エンジン型式 == priceData[i-1].エンジン型式) continue;

    var op = document.createElement("option");
    op.value = value.エンジン型式;
    op.text = value.エンジン型式;
    engine.appendChild(op);
  }
}

// 査定ボタンが押された時の動作
document.getElementById("button-satei").onclick = function() {
  targetCar = document.getElementById("car").value;
  targetEngine = document.getElementById("engine").value;
  for (let i = 0; i < priceData.length; i++) {
    value = priceData[i];

    var price = value.ラクラク買取の買取金額;
    if (!isNaN(value.ラクラク買取の買取金額)) {
      price = changeYen(value.ラクラク買取の買取金額);
    }

    if (value.車名 == targetCar && value.エンジン型式 == targetEngine) {
      priceHtml = document.getElementById("satei-price");
      priceHtml.innerHTML = `
      <div class="txt01 -price">標準買取価格：<span class="txtin03">${price}</span></div>
      <span class="txt02">車名：<span class="txtin02">${value.車名}</span></span>
      <span class="txt02">エンジン型式：<span class="txtin02">${value.エンジン型式}</span></span>
      <div class="txt01">パーツ：<span class="txtin02">${value.パーツ}</span></div>
      `;
    }
  }
};

// 数値を円表示に切り替え
function changeYen(num){
  return '¥' + String(num).split("").reverse().join("").match(/\d{1,3}/g).join(",").split("").reverse().join("");
}