var YouTube = require('youtube-node');

var mysql = require('mysql');

const YOUTUBE_API = process.env['YOUTUBE_API'];
const PLAYLIST_KEY = process.env['PLAYLIST_KEY'];
const DATABASE_HOST = process.env['DATABASE_HOST'];
const DATABASE_USER = process.env['DATABASE_USER'];
const DATABASE_PASSWORD = process.env['DATABASE_PASSWORD'];
const DATABASE_NAME = process.env['DATABASE_NAME'];

var connection = mysql.createConnection({
  host: DATABASE_HOST,
  user: DATABASE_USER,
  password: DATABASE_PASSWORD,
  database: DATABASE_NAME
});

var youTube = new YouTube();

youTube.setKey(YOUTUBE_API);



exports.handler = async(event, context) => {
  // 日本時間
  var time = new Date(Date.now() + ((new Date().getTimezoneOffset() + (9 * 60)) * 60 * 1000));
  
  
  
  return new Promise((resolve, reject) => {
    // YouTube
    youTube.getPlayListsItemsById(PLAYLIST_KEY, (error, result) => {
       
      const title = result.items[0].snippet.title;
      const description = String(result.items[0].snippet.description);
      const videoId = result.items[0].snippet.resourceId.videoId;
      
      const content = description.replace(/\n/g,'').replace(/\\\"/g,'');
      const url = 'https://www.youtube.com/watch?v=' + videoId;

  

      // mysql
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
  });
}