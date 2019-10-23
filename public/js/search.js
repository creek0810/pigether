const API = {
  "query": "http://127.0.0.1:8000/pigether/api/users"
};
function showResult(data) {
  const result = data.reduce((acc, cur, idx) => {
    // establish skill string
    let skills = "";
    for(let i=0; i<cur.skills.length && i<3; i++) {
      if(i != 0) {
        skills += '、';
      }
      skills += `${cur.skills[i].skill}`
    }
    if(cur.skills.length > 3) {
      skills += '...';
    }
    // start establish personInfo div
    return `${acc}
      <a href="/pigether/user/${cur.account}">
        <div class="person-${idx % 2}">
          <img src="data:image/jpeg;base64,${cur.propic}" class="propic">
          <div class="custom-text-info">
            <div class="text-info-row">
              <div class="name">姓名: ${cur.name}</div>
              <div class="score">評分: ${cur.score}</div>
            </div>
            <div class="text-info-row">
              <div class="major">科系: ${cur.department.name_ch}</div>
              <div class="skill">技能: ${skills}</div>
            </div>
            <div class="text-info-row">
              <div class="grade">年級: ${cur.grade}</div>
              <div class="gender">性別: ${cur.gender}</div>
            </div>
          </div>
        </div>
      </a>
    `
  }, "");
  document.getElementById("result-container").innerHTML= result;
}

function query() {
  // get parameter
  const parameter = {
      name: document.getElementById("name").value,
      gender: document.getElementById("gender").value,
      department: document.getElementById("major").value,
      grade: document.getElementById("grade").value,
      score: document.getElementById("score").value
  };
  let queryArg = "";
  Object.keys(parameter).map(cur => {
    if(parameter[cur] !== "") {
      if(queryArg === "") {
        queryArg += `${cur}=${parameter[cur]}`;
      } else {
        queryArg += `&${cur}=${parameter[cur]}`;
      }
    }
  });

  // establish query url
  const url = `${API.query}?${queryArg}`;
  return FetchData.getData(url);
}

function init() {
  document.getElementById("submit").addEventListener("click", async function() {
    const result = await query();
    showResult(result);
  });
}

window.addEventListener("load", init);