
const messages = {
  zh: window.lang.zh,
  en: window.lang.en,
  cn: window.lang.cn,
  // zh: {
  //   footer: {
  //     section_company: {
  //       title: "公司資訊",
  //       locations: [
  //         { 
  //           location: "台灣",
  //           county: "台北",
  //           address: "新北市新店區北新路三段207-2號 15樓",
  //           phone: "+886.2.5579-0123"
  //         },
  //       ] ,
  //       phone: "+886.2.5579-0123",
  //       social: {
  //         facebook: "",
  //         weibo: "",
  //         google_plus: ""
  //       },
  //     },
  //     section_question: {
  //       title: "常見問題",
  //       more: "更多問題..."
  //     },
  //     section_partner: {
  //       title: "合作夥伴",
  //       partners: [
  //         {
  //           name: "ThermoFisher" , 
  //           icon: "/img/cor_logo/cor_logo-02.png",
  //           link: "#"
  //         },
  //         {
  //           name: "國立中山大學" , 
  //           icon: "/img/cor_logo/cor_logo-01.png",
  //           link: "#"
  //         }
  //       ]
  //     },
  //     bottom: {
  //       copyright: "Copyright 2017 © 睿軒檢驗科技 Rapidsure Tech, All right reserved.",
  //     }

  //   },
  //   page_index: {
  //     section_1: {
  //       title: "孩子成長的生活環境",
  //       content: "我們的生活環境有許多食安風險與汙染問題直接影響健康，這些有毒的化學物質被不肖業者濫用，使得我們的飲食與環境到處充斥具有危害與累積性毒素。<br><br>全世界每天有約5,500位兒童死於污染的水、空氣與食物所導致的疾病。",
  //       target: 5500,
  //       unit: "人",
  //       cover: "../img/homepage/Home3.jpg"
  //     },
  //     section_2: {
  //       title: "從居家到工作環境",
  //       content: "近年來食安問題層出不窮，引發全民對食品安全的恐慌與疑慮。有鑒於食安事件中不乏多家知名大廠，凸顯了業者自主管理的漏洞。食品安全須從源頭管理做起，以保障民眾得到安全的食物來源。<br><br>根據估計，每年全球食安事件導致的死亡人數高達200萬人。<br><br>[了解更多->/tech]",
  //       target: 200,
  //       unit: "萬人",
  //       cover: "../img/homepage/Home4b.jpg"
  //     },
  //     section_3: {
  //       title: "睿軒專注精準檢驗",
  //       content: "在關懷台灣食品與環境安全問題的基礎上，我們與國立中山大學共同開發「快速檢驗平台」專利技術，只須5秒即可分析出有害化學物質，是你我守護居家生活安全的最佳快速幫手。<br><br>[了解更多->/tech]",
  //       cover: "../img/homepage/Home5.jpg",
  //       squares: [
  //         {
  //           title: "採集樣品"
  //         },
  //         {
  //           title: " "
  //         },
  //         {
  //           title: "進樣分析"
  //         },
  //         {
  //           title: "資料庫比對"
  //         }
  //       ]
  //     },
  //   },
  //   page_about: {
  //     section_1: {
  //       title: "理念與願景",
  //       content: "在關懷台灣食品與環境安全的問題，我們看見自己的愛與責任。於是在一群熱愛這片土地的我們努力下，從學界研究走向產業應用，與國立中山大學共同開發「質譜快速檢驗平台」專利技術，於2015年成立了睿軒檢驗科技。<br><br>無論是在農畜產品、食品加工、環境分析等領域，都能創造獨特的檢驗效率，與無可取代的時間效益。守護民眾的健康期許，營造安心的生活環境。以嚴謹科研態度與前瞻先進技術，建構食的安心、用的放心，便利顧客並享有快速與安全的保障。<br><br>誠信 : 以正直嚴謹與崇法務實的科學方法，為客戶驗證食品與環境安全。<br><br>專業 : 應用先端研發的快篩技術與富有熱忱的服務態度，面對市場滿足客戶需求。<br><br>創新 : 挑戰新思維，持續研發潛在檢測項目及客戶解決方案，創造嶄新的商業價值。"
  //     },
  //     section_2:{
  //       title: "大事記"
  //     }
  //   },
  //   page_contact: {
  //     section_1: {
  //       title: "聯絡我們",
  //       content: "我們專注於提供優質的檢驗服務，以前瞻先進科技守護企業與民眾的健康。若您有任何產品疑問、客製化服務需求等，歡迎與我們聯絡，我們將竭誠為您服務。"
  //     },
  //     section_2: {
  //       label_name: "姓名",
  //       label_mail: "信箱",
  //       label_ask: "諮詢",
  //       label_message: "訊息",
  //       option_else: "其他問題或服務",
  //       btn_send: "送出表單",
  //       btn_sending: "傳送中...",
  //     },
  //     section_3: {
  //       title: "常見問題"
  //     }
  //   },
  //   page_job: {
  //     section_1: {
  //       title: "人才招募",
  //       content: "為我們的下一代共同打造安全環境、無毒食材的安心成長環境，歡迎擁有相同理念的您，一起加入我們!"
  //     }
  //   },
  //   page_tern: {
  //     section_1: {
  //       title: "隱私權保護",
  //       content: "<h4>親愛的貴賓，您好：</h4><p>為了尊重個人資料之隱私及保護，我們謹以下列聲明，向所有貴賓說明睿軒檢驗科技以及關係企業在線上搜集使用者個人資料的方式、範圍、利用方法、以及查詢或更正的方式等事項。下列聲明適用於下列關係網站，但不適用於與這些網站連結之其他網站或網頁，本公司不負任何連帶責任，請您參閱各該網站或網頁之隱私權政策。</p><h4>睿軒檢驗科技</h4><p>http://rapidsuretech.com</p><p>1.對於個人資料的收集，謹遵守中華民國「個人資料保護法」之規範。<br>2.若您單純瀏覽網站資訊，本公司不會蒐集您的個人資料。本網站不會在未告知的情況下，收集您的任何個人資料。 若您要瞭解本公司之產品或需要聯繫我們，為了後續連繫與服務需要，本公司將要求您填寫個人資料，如姓名、性別、年齡、電子信箱、聯絡電話、聯絡地址等必要資訊，填寫送出後即表示您同意由本公司及本公司之關係企業儲存或管理該資料。其目的是為了與您聯繫以及協助、提供給您更完整的服務；相關資料如為非必填項目，不提供亦不影響您的權益，惟若特定資料欄位係屬必填欄位者，不提供該等資料則無法使用相關的產品及服務。</p><ul><li>將不定時修訂公布本政策，請您隨時上網閱覽，以保障權益。</li><li>這份隱私權的保障自您填寫資料後即生效，如果您對睿軒檢驗科技網站的隱私權政策或與個人資料有任何疑問，歡迎您與我們連絡。</li><li>如您就個人資料，如有查詢及閱覽、製給複製本、補充或更正、停止電腦處理及利用、刪除等需求時，您可以與我們連絡，我們將迅速進行處理。如您提出前述請求，即視為您同時申請終止使用睿軒檢驗科技網站及其之一切服務。</li><li>請妥善保管您的任何個人資料，不要將任何個人資料提供給任何人。在您完成網上預約資料填寫等相關資訊變動等程序後，務必記得登出，若您是與他人共享電腦或使用公共電腦，切記要關閉瀏覽器視窗，以防止他人蒐集並使用您的個人資料。所有網路民眾的行為應遵循國內、外法律規範，並且對於個人所屬帳號、密碼所發生之情事負全部責任。</li></ul><ol><li>本網站所取得的個人資料，都僅供提供於內部、依照原來所說明的使用目的和範圍運用。除非事先說明、或依照相關法律規定，否則本網站不會將使用者個人資料提供給第三人、或移作其他目的使用，並且嚴禁內部人員私自使用這些資料。</li><li>當您送出資料後，本公司及本公司之關係企業將會透過您所填寫的電子信箱位址、行動電話號碼、電話等提供與服務有關之資訊，或進行調查分析使用。</li></ol><h4>智慧財產權聲明</h4><p>本網站之各項設計、頁面、內容(包含文字、圖形、影音、程式、畫面安排)、資料等，其各項權利及智慧財產權（包括但不限於著作權、專利權、商標權等）均屬睿軒檢驗科技（以下簡稱睿軒）所有。除非獲得睿軒公開及書面同意外，均不得擅自以任何形式複製、轉錄、更改、公開傳播、販售或其他非法使用，否則本公司將依法追訴並請求賠償。</p><h4>知識產權保護 </h4><p>此網站一切文字、公司名稱、影音、圖片、相片及資料的智慧財產權是由睿軒檢驗科技、其代理人或其他有權利人所擁有。您不得更改本網站的任何資訊和資料並須保存資訊和資料中所載的一切智慧財產權說明和其他專有權說明。未經睿軒事先書面許可，您不得以任何方式對此網站及其資料進行複製、經銷、翻印、顯示、播放、以超級鏈路連接或傳送，或存儲於資訊檢索系統。 </p><p>此網站使用和顯示的商標、服務商標和標誌「商標」是睿軒和其他權利人的註冊和未註冊商標，未經睿軒或其他權利人書面許可，您不得以任何方式使用上述商標或睿軒的企業名稱。 </p><p>資訊和資料的提供並不意味著睿軒授予您任何著作權、專利或任何其他智慧財產權的許可。</p><h4>使用者須知 </h4><p>您發送或郵寄至本網站的所有資訊或資料都將視為非保密和非專有的。將任何資訊或資料發送至本網站，您即授予睿軒無限制的、不可撤銷的許可，允許睿軒使用、複製、顯示、執行、修改、傳送和分發這些資料或資訊。但是，睿軒將不會公佈您的姓名或以其他方式公佈您向睿軒提交資料或資訊這一事實，除非：</p><ol><li>您許可睿軒使用您的姓名；</li><li>或者睿軒事先通知您提交至本站點某特定部分的資料或其他資訊將被發佈，或站點的該部分上將使用您的姓名；</li><li>或者法律要求睿軒執行此活動。</li></ol><p>您對本網站的使用不得違背法律法規及善良風俗。您不得利用本網站實施任何違法行爲，不得向本網站郵寄或發送任何非法的資訊或資料。</p><h4>限制性保證 </h4><p>此網站和連接此站點的其他網站所載的任何資訊和資料，包括文本、圖形或其他項目可被修改或更新而不另行通知，且均以「現有狀況」提供。睿軒不保證這些資訊和資料的準確性、可靠性或完整性；且不提供任何默示、明示或法定的陳述和保證，包括但不限於有關不侵權、所有權、適銷性、品質、適合某種特定的用途和沒有電腦病毒的保證。</p><h4>免責聲明 </h4><p>在任何情況下，睿軒均無須對由於使用此網站或連接此站點的其他網站所引起的任何直接的、間接的、特別的或後果性的損失承擔責任，包括但不限於任何個人資料外漏、健檢相關資料丟失等，即使睿軒被明確告知此類損害的可能性。使用該等站點的風險，由使用者自行承擔。</p><h4>內容修改 </h4><p>睿軒可在任何時候以更新此公告的方式修改此類條款，通過使用此 Web 站點，您同意受此類修訂版的約束。您應定期訪問此頁面來確定當前約束您的條款。 </p><p>如您對我們的安全聲明及隱私保護政策有任何意見，歡迎與我們聯絡。</p>"
  //     }
  //   }
  // }
}

function decode_shortcode(value){
  if (typeof value=="string"){
    let result = value
    // console.log(key + " : "+value);
    var res = (/\[([\s\S]*?)\-\&gt\;([\s\S]*?)\]/g).test(value) ;
    if (res){
      result=value.replace(/\[([\s\S]*?)\-\&gt\;([\s\S]*?)\]/g,"<div style='text-align: center'><a href='javascript:;' class='btn btn-primary' onclick='event.preventDefault();router.replace(\"$2\");return false;'>$1</a></div>")
      console.log(value)
    }
    var res = (/\[([\s\S]*?)\-\>\;([\s\S]*?)\]/g).test(value) ;
    if (res){
      result=value.replace(/\[([\s\S]*?)\-\>\;([\s\S]*?)\]/g,"<div style='text-align: center'><a href='javascript:;' class='btn btn-primary' onclick='event.preventDefault();router.replace(\"$2\");return false;'>$1</a></div>")
      console.log(value)
    }
    return result
  }
  return value
}
window.decode_shortcode=decode_shortcode;
//called with every property and its value
function process(key,value,parent) {
  if (typeof value=="string"){
    console.log(key + " : "+value);
    parent[key] = decode_shortcode(value);
  }
}
function traverse(o,func) {
    for (var i in o) {
        func.apply(this,[i,o[i],o]);  
        if (o[i] !== null && typeof(o[i])=="object") {
            //going one step down in the object tree!!
            traverse(o[i],func);
        }
    }
}

window.decode_shortcode_all=function(obj){traverse(obj,decode_shortcode)};
traverse(messages.zh,process);

import Vue from 'vue'
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)
// Create VueI18n instance with options
const i18n = new VueI18n({
  locale: window.locale, // set locale
  messages, // set locale messages
})
window.i18n=i18n;
export default {messages,i18n}
