var rl = require('readline');
var interface = rl.createInterface(process.stdin, process.stdout, null);

interface.question('Whats your name?', function(answer) {
	console.log("Hello, " + answer + "!");
	interface.close()
	process.stdin.destroy();
});

//console.log("Hello,World!");
