let countdown;
let remainingTime;
let isPaused = false;
let currentFoodItem;
let currentFoodIcon;
let totalTime;
const timers = [
 {name:"Roti", time:20, icon:"🍞"},
 {name:"Tea", time:240, icon:"🍵"},
 {name:"Pasta", time:600, icon:"🍝"},
  {name:"Rice", time:900, icon:"🍚"}
];

Notification.requestPermission();

function renderTimerButtons(){

    const container = document.getElementById("timer-buttons");

    timers.forEach(timer => {

      const card = document.createElement("div");

      card.className = "food-card";

      card.innerHTML = `
      <div class="food-icon">${timer.icon}</div>
      <div class="food-name">${timer.name}</div>
      `;

      card.onclick = function(){
        startTimer(timer.time, timer.name, timer.icon);
      };

      container.appendChild(card);
    });

}

function startTimer(seconds, foodItem, foodIcon) {

  document.getElementById("foodItem").classList.add("cooking");
  document.getElementById("foodItem").innerText = foodIcon;
  clearInterval(countdown);
  currentFoodItem = foodItem;
  currentFoodIcon = foodIcon;

  document.getElementById("pauseBtn").disabled = false;
  document.getElementById("resumeBtn").disabled = true;
  document.getElementById("status").innerText = foodIcon + " Cooking " + foodItem + "...";
  document.querySelectorAll(".food-card").forEach(card=>{ card.style.pointerEvents="none"; });

  if(!isPaused){
    totalTime = seconds;   // save original duration
  }

  let timeLeft = seconds;

  countdown = setInterval(function() {

    let minutes = Math.floor(timeLeft / 60);
    let secondsRemaining = timeLeft % 60;

    if (secondsRemaining < 10) {
      secondsRemaining = "0" + secondsRemaining;
    }

    document.getElementById("timer").innerText = minutes + ":" + secondsRemaining;

    // PROGRESS BAR UPDATE
    let progressPercent = ((totalTime - timeLeft) / totalTime) * 100;

    document.getElementById("progress").style.width = progressPercent + "%";

    remainingTime = timeLeft;
    timeLeft--;

    if (timeLeft < 0) {
      clearInterval(countdown);
      document.getElementById("foodItem").classList.remove("cooking");
      document.getElementById("status").innerText = foodIcon + foodItem + " is ready!";
      document.getElementById("alarm").play();
      document.getElementById("pauseBtn").disabled = true;
      document.getElementById("resumeBtn").disabled = true;
      navigator.vibrate([300,100,300]);
      if (Notification.permission === "granted") {
        new Notification("Kitchen Timer", { body:  foodIcon + foodItem + " is ready!" });
      }
    }

  }, 1000);
}

function resetTimer(){
  clearInterval(countdown);
  document.getElementById("foodItem").classList.remove("cooking");
  document.getElementById("foodItem").innerText = "👩🏼‍🍳";
  document.getElementById("timer").innerText = "00:00";
  document.getElementById("status").innerText = "The kitchen is idle";
  document.getElementById("progress").style.width = "0%";
  document.getElementById("pauseBtn").disabled = true;
  document.getElementById("resumeBtn").disabled = true;
  document.querySelectorAll(".food-card").forEach(card=>{ card.style.pointerEvents="auto"; });
}

function pauseTimer(){
  clearInterval(countdown);
  isPaused = true;
  document.getElementById("foodItem").classList.remove("cooking");
  document.getElementById("pauseBtn").disabled = true;
  document.getElementById("resumeBtn").disabled = false;
}

function resumeTimer(){
  if(isPaused){
      startTimer(remainingTime, currentFoodItem, currentFoodIcon);
      isPaused = false;
  }
}

if ("serviceWorker" in navigator) {
  navigator.serviceWorker.register("service-worker.js");
}

renderTimerButtons();