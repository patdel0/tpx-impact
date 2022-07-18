// 00:00:00:00
// 1 centisecond - 10ms
// 1 second - 1000ms
// 1 minute - 60000ms
// 1 hour - 3.6e+6ms
let timeInCentiseconds = 0;

setInterval(() => {
  timeInCentiseconds += 10;
  printTime(timeInCentiseconds);
}, 10);

function printTime(timeInCentiseconds) {
  let centiseconds = timeInCentiseconds / 100;
  let seconds = (centiseconds / 100) % 60;
  let minutes = parseInt(seconds / 60) % 60;
  let hours = parseInt(seconds / 3600);

  
}
function addPadding(val) {
  return val < 10 ? "0" + val : val;
}
