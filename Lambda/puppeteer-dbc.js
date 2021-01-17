const chromium = require('chrome-aws-lambda');
const mysql = require('mysql');

const DATABASE_HOST = process.env['DATABASE_HOST'];
const MYSQL_USER = process.env['MYSQL_USER'];
const MYSQL_PASSWORD = process.env['MYSQL_PASSWORD'];
const MYSQL_DATABASE = process.env['MYSQL_DATABASE'];

var connection = mysql.createConnection({
  host: DATABASE_HOST,
  user: MYSQL_USER,
  password: MYSQL_PASSWORD,
  database: MYSQL_DATABASE
});

exports.handler = async(event, context) => {
  // 日本時間
  var time = new Date(Date.now() + ((new Date().getTimezoneOffset() + (9 * 60)) * 60 * 1000));
  
  
  
  // puppeteer
  const browser = await chromium.puppeteer.launch({
      args: chromium.args,
      defaultViewport: chromium.defaultViewport,
      executablePath: await chromium.executablePath,
      headless: chromium.headless,
  });

  let page = await browser.newPage();

  await page.setDefaultNavigationTimeout(0);
  await page.goto('https://dokkyobc.blog.fc2.com/');
  
  const title_selector = '#main_contents > div > h2 > a';
  const content_selector = '#main_contents > div > div';
  
  const title_element = await page.$(title_selector);
  const content_element = await page.$(content_selector);
  
  const title = await (await title_element.getProperty('textContent')).jsonValue();
  const url = await (await title_element.getProperty('href')).jsonValue();
  const content_escape = await (await content_element.getProperty('textContent')).jsonValue();
  
  const content = content_escape.replace(/\n/g,'').replace(/\t/g,'').replace('...続きを読む','');

  await browser.close();
  
  
  
  // mysql
  return new Promise((resolve, reject) => {
    
    const dbIn = { title: title, content: content, time: time, url: url};
    
    connection.query('SELECT * FROM post where title = ?', [title], function(error, rows){
      if(rows.length === 0){
        connection.query('INSERT INTO post SET ?', dbIn , function(error, rows){
          context.succeed(rows);
        });
      }else{
        context.succeed('No upadate');
      }
    });
  });
};