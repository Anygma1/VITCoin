var fs = require('fs');

fs.writeFile('readme.txt', "\t Disclaimer: You're free to use the application as much as you want, however we're not responsible for warranty and assurance of the products listed since the page is not hosted on the internet yet. \n Thank you for your co-operation and keep helping us improve!."), function (err) {
  if (err) throw err;
  console.log('Saved!');

}