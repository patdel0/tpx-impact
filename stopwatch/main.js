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

// DOM variables
const timeEl = document.querySelector(".time");
const startBtn = document.querySelector("#start-stop");
const resetBtn = document.querySelector("#reset");
const lapList = document.querySelector(".laps");

startBtn.addEventListener("click", startOrStop);
resetBtn.addEventListener("click", reset);

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

function reset() {
  stop();
  timeInCentiseconds = 0;
  timeEl.textContent = `00:00:00:00`;
}

// Helper functions
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
