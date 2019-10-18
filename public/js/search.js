const API = {
  "query": ""
};
function showResult(data) {
  const result = data.reduce((acc, cur, idx) => {
    return `${acc}
      <div class="person-${idx % 2}">
        <img src="${cur.propic}" class="propic">
        <div class="custom-text-info">
          <div class="text-info-row">
            <div class="name">姓名: ${cur.name}</div>
            <div class="score">評分: ${cur.score}</div>
          </div>
          <div class="text-info-row">
            <div class="major">科系: ${cur.major}</div>
            <div class="skill">技能: ${cur.skill}</div>
          </div>
          <div class="text-info-row">
            <div class="grade">年級: ${cur.grade}</div>
            <div class="gender">性別: ${cur.gender}</div>
          </div>
        </div>
      </div>
    `
  }, "");
  document.getElementById("result-container").innerHTML= result;
}

function query() {
  console.log("query");
}

function init() {
  document.getElementById("submit").addEventListener("click", query);
  let testData = [];
  for(i=0; i< 10; i++) {
    testData.push({
      propic: "https://img.etimg.com/thumb/msid-68333505,width-643,imgsize-204154,resizemode-4/googlechrome.jpg",
      name: "王心妤",
      another: "This is river!"
    });
  }
  showResult(testData);
}

window.addEventListener("load", init);