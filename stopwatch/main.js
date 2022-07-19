// Time variables
const msInOneCentisecond = 10;
const csInOneSecond = 100;
const csInOneMinute = 6000;
const csInOneHour = 360000;
const secondsInOneMinute = 60;
const minutesInOneHour = 60;

// Stopwatch state
let isRunning = false;
let timeInCentiseconds = 0;
let stopwatchInterval;

const timeEl = document.querySelector(".time");
const startBtn = document.querySelector("#start-stop");

startBtn.addEventListener("click", startOrStop);

function startOrStop() {
  startBtn.classList.toggle("start");

  if (isRunning) return stop();
  start();
}

function start() {
  stopwatchInterval = setInterval(() => {
    timeInCentiseconds += 1;
    printTime(timeInCentiseconds);
  }, msInOneCentisecond);
  isRunning = true;
  startBtn.textContent = "Pause";
}

function stop() {
  clearInterval(stopwatchInterval);
  stopwatchInterval = null;
  isRunning = false;
  startBtn.textContent = "Start";
}

function printTime(timeInCentiseconds) {
  const centiseconds = timeInCentiseconds % csInOneSecond;
  const seconds =
    parseInt(timeInCentiseconds / csInOneSecond) % secondsInOneMinute;
  const minutes =
    parseInt(timeInCentiseconds / csInOneMinute) % minutesInOneHour;
  const hours = parseInt(timeInCentiseconds / csInOneHour);
  const timeArr = [hours, minutes, seconds, centiseconds];

  timeEl.textContent = timeArr.map((item) => addPadding(item)).join(":");
}

function addPadding(val) {
  return val < 10 ? "0" + val : val;
}
