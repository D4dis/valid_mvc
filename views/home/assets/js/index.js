let avaibleKeywordsJob = [
  'Design',
  'Developpement',
];

let avaibleKeywordsLoc = [
  'Montpellier',
  'Paris',
  'Lyon',
  'Marseille',
];

const resultsBoxJob = document.querySelector(".result-box-job");
const inputBoxJob = document.getElementById("searchJob");

inputBoxJob.onkeyup = function(){
  let result = [];
  let input = inputBoxJob.value;
  if(input.length){
    result = avaibleKeywordsJob.filter((keyword) => {
      return keyword.toLowerCase().includes(input.toLowerCase());
    });
    console.log(result);
  }
  displayJob(result);

  if(!result.length){
    resultsBoxJob.innerHTML = '';
  }
}

function displayJob(result){
  const content = result.map((list) => {
    return "<li onclick=selectInput(this)>" + list + "</li>";
  })
  resultsBoxJob.innerHTML = "<ul>" + content.join('') + "</ul>";
}

function selectInput(list){
  inputBoxJob.value = list.innerHTML
}