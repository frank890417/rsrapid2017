var data = [
  {
    year: 2015,
    date: "03/01",
    title: "成立睿軒檢驗",
    news_id: -1,
    cover: "/img/homepage/Post2.jpg",
    content: "鴻海樂活養生健康事業群與中山大學技術合作，合資設立了睿軒檢驗科技股份有限公司。"
  },
  {
    year: 2015,
    date: "05/01",
    title: "貴陽大數據博覽會參展",
    news_id: -1,
    cover: "/img/homepage/Post3.jpg",
    content: "參與5/26-29於貴陽舉辦之2015貴陽國際大數據產業博覽會暨全球大數據時代貴陽鋒會。"
  },
  {
    year: 2015,
    date: "12/01",
    title: "全台幼兒環境大義診",
    news_id: -1,
    cover: "/img/homepage/Home-news-2.jpg",
    content: "受邀於永齡健康基金會，睿軒檢驗深入全台偏鄉幼兒園，展開玩具義診活動。"
  },
  {
    year: 2016,
    date: "03/01",
    title: "鴻海和中山合資技轉記者會",
    news_id: -1,
    cover: "/img/homepage/Post1.jpg",
    content: "鴻海樂活養生健康事業群宣佈與中山大學技術合作。"
  },
  {
    year: 2016,
    date: "05/01",
    title: "貴陽大數據博覽會參展",
    news_id: -1,
    cover: "/img/homepage/Post4.jpg",
    content: "參與5/26-29於貴陽舉辦之2016貴陽國際大數據產業博覽會，多位國內外企業家與國家領導人受邀出席。"
  }
]

//載入MySQL模組
var mysql = require('mysql');
//建立連線
var connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: '@##434frt))',
    database: 'rsrapid2017'
});
//開始連接
connection.connect();
data.forEach(d=>{
    connection.query('INSERT INTO `yearlogs` SET ?', d, function(error){
        if(error){
            console.log('寫入資料失敗！');
            throw error;
        }
    });
})
connection.end();