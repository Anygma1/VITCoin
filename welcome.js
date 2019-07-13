var fs = require('fs');

fs.writeFile('welcome.txt', "\t Made for the youth, by the youth!"), function (err) {
  if (err) throw err;
  console.log('Saved!');

}