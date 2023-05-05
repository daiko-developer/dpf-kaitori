const form = document.getElementById('kaitori-form');
const submitbtn = document.getElementById('kaitori-form-btn');
let submitted = false;

submitbtn.addEventListener('click', function(e){

  /*
  ここにバリデーション処理を書いて、
  全部クリアだったら「submitted = true;」にする
  */
  const name = document.getElementById('kaitori-form-name');
  // console.log(name.);
  // submitted = true;

  // if(submitted === true){
  //   form.submit();
  //   window.location='kaitori_end.html';
  // }
});