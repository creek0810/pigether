const API = {
  "query": ""
};
function showResult(data) {
  const result = data.reduce((acc, cur) => {
    return `${acc}
      <div class="person">
        <img src="${cur.propic}" class="propic">
        <div class="custom-text-info">
          <div class="name">${cur.name}</div>
          <div class="skill">${cur.skill}</div>
          <div class="grade">${cur.grade}</div>
          <div class="score">${cur.score}</div>
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