// JavaScript Document

//GASのAPIのURL
const endpoint = "https://script.google.com/macros/s/AKfycbyAkcSRG4baeqjjCQ_6099gx3n0rjxngqvidBGh3Gu9HEHq8bsBBlWT5sw-AWQBztzZ/exec";

var priceData = new Array();

//APIを使って非同期データを取得する
// ラクラク査定用の買取データを取得
fetch(endpoint)
.then(response => response.json())
/*成功した処理*/
.then(data => {
    //JSONから配列に変換
    priceData = data;

    car = document.getElementById("car");
    for (let i = 0; i < priceData.length; i++) {
      if (i != 0 && priceData[i].car == priceData[i-1].car) continue;
      var op = document.createElement("option");
      value = priceData[i];
      op.value = value.car;
      op.text = value.car;
      car.appendChild(op);
    }
});

// 査定の車名選択が変更された時の動作
document.getElementById('car').onchange = function(){
  var targetCar = this.value;
  engine = document.getElementById("engine");
  engine.options.length = 0
  for (let i = 0; i < priceData.length; i++) {
    value = priceData[i];
    if (value.car != targetCar) continue;
    var op = document.createElement("option");
    op.value = value.engine;
    op.text = value.engine;
    engine.appendChild(op);
  }
}

// 査定ボタンが押された時の動作
document.getElementById("button-satei").onclick = function() {
  targetCar = document.getElementById("car").value;
  targetEngine = document.getElementById("engine").value;
  for (let i = 0; i < priceData.length; i++) {
    value = priceData[i];
    if (value.car == targetCar && value.engine == targetEngine) {
      price = document.getElementById("satei-price");
      price.innerHTML = `
      <div class="txtin01">参考買取価格：<span class="txtin03">${value.price}</span>円</div>
      <span class="txtin01">車名：<span class="txtin02">${value.car}</span></span>
      <span class="txtin01">エンジン型式：<span class="txtin02">${value.engine}</span></span>
      `;
    }
  }
};