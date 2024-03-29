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

    // データを並べ替え
    priceData.sort((a, b) => {
      if (a.車名 > b.車名) return　1;
      if (a.車名 < b.車名) return -1;
      if (a.エンジン型式 > b.エンジン型式) return 1;
      if (a.エンジン型式 < b.エンジン型式) return -1;
    });

    console.log(priceData);

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

    const price1 = value.ラクラク買取の確定買取金額1 == "" ? "" : changeYen(value.ラクラク買取の確定買取金額1);
    const engineInfo1 = value.ラクラク買取の買取金額1のエンジン詳細 == "" ? "" : `(${value.ラクラク買取の買取金額1のエンジン詳細})`

    if (value.車名 == targetCar && value.エンジン型式 == targetEngine) {
      priceHtml = document.getElementById("satei-price");
      if (value.ラクラク買取の確定買取金額2 != "") {
        const price2 = changeYen(value.ラクラク買取の確定買取金額2);
        const engineInfo2 = value.ラクラク買取の買取金額2のエンジン詳細 == "" ? "" : `(${value.ラクラク買取の買取金額2のエンジン詳細})`
        priceHtml.innerHTML = `
        <dl class="datalist">
          <div class="dataitem -price">
            <dt class="datattl">標準買取価格：</dt>
            <dd class="data"><span class="price">${price1}</span><span class="price-info">${engineInfo1}</span></dd>
            <div class="">又は</div>
            <dd class="data"><span class="price">${price2}</span><span class="price-info">${engineInfo2}</span></dd>
          </div>
          <div class="dataitem">
            <dt class="datattl">車名：</dt>
            <dd class="data"><span class="common-data">${value.車名}</span></dd>
          </div>
          <div class="dataitem">
            <dt class="datattl">エンジン型式：</dt>
            <dd class="data"><span class="common-data">${value.エンジン型式}</span></dd>
          </div>
          <div class="dataitem">
            <dt class="datattl">パーツ：</dt>
            <dd class="data"><span class="common-data">${value.パーツ}</span></dd>
          </div>
        </dl>
        `;
      } else {
        priceHtml.innerHTML = `
        <dl class="datalist">
          <div class="dataitem -price">
            <dt class="datattl">標準買取価格：</dt>
            <dd class="data"><span class="price">${price1}</span><span class="price-info">${engineInfo1}</span></dd>
          </div>
          <div class="dataitem">
            <dt class="datattl">車名：</dt>
            <dd class="data"><span class="common-data">${value.車名}</span></dd>
          </div>
          <div class="dataitem">
            <dt class="datattl">エンジン型式：</dt>
            <dd class="data"><span class="common-data">${value.エンジン型式}</span></dd>
          </div>
          <div class="dataitem">
            <dt class="datattl">パーツ：</dt>
            <dd class="data"><span class="common-data">${value.パーツ}</span></dd>
          </div>
        </dl>
        `;
      }
    }
  }
};

// 数値を円表示に切り替え
function changeYen(num){
  return '¥' + String(num).split("").reverse().join("").match(/\d{1,3}/g).join(",").split("").reverse().join("");
}