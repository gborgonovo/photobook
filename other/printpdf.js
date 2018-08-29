const puppeteer = require('puppeteer');

(async () => {
	const browser = await puppeteer.launch();
	const page = await browser.newPage();
	await page.setDefaultNavigationTimeout(0);

	await page.goto('http://www.mydomain.com/photobook/index.php?pb=myphotobook&p=0-4', {waitUntil: 'networkidle2'});
	await page.pdf({
		path: 'myphotobook_1.pdf', 
		format: 'A4',
		landscape: true,
		printBackground: true,
		margin: { 
			top: "0px", 
			bottom: "0px",
			right: "0px",
			left: "0px",
		}
	});


	await page.goto('http://www.mydomain.com/photobook/index.php?pb=myphotobook&p=5-9', {waitUntil: 'networkidle0'});
	await page.pdf({
		path: 'myphotobook_2.pdf', 
		format: 'A4',
		landscape: true,
		printBackground: true,
		margin: { 
			top: "0px", 
			bottom: "0px",
			right: "0px",
			left: "0px",
		}
	});

	await browser.close();
})();

