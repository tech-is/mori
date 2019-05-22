// CSS
{/* <style>
    #append_splash_msg_inner.default {
    </style> */}
//テスト用ボタン
{/* <body>
<button onclick="splash('aaa')">保弾だよ</button> */}
//
function splash(msg, custom_set){
//Default
var set = {
    message_class: 'splashmsg default',
    fadein_sec: 0.1,
    wait_sec: 0.5,
    fadeout_sec: 1.5,
    opacity: 0.9,
    trans_in: 'ease-in',
    trans_out: 'ease-out',
    outer_style: 'top: 0px;left: 0px;position: fixed;z-index: 1000;width: 100%;height: 100%;',
    message_style: 'padding:0.5em;font-size:4em;color:white;background-color:gray; position: absolute;top: 50%; left: 50%;transform: translateY(-50%) translateX(-50%);-webkit-transform: translateY(-50%) translateX(-50%);',
    style_id: 'append_splash_msg_style',
    outer_id: 'append_splash_msg',
    message_id: 'append_splash_msg_inner',
    on_splash_vanished: null //callback function
};

//Override custom_set
for (var key in custom_set) {
    if (custom_set.hasOwnProperty(key)) {
        set[key] = custom_set[key];
    }
}

//Style
if(!document.getElementById(set.style_id)){
    var style = document.createElement('style');
    style.id = set.style_id;
    style.innerHTML = 
        "#"+set.outer_id+" { "+set.outer_style+" } " +
        "#"+set.outer_id+" > #"+set.message_id+" {opacity: 0;transition: opacity "+set.fadeout_sec+"s "+set.trans_out+";-webkit-transition: opacity "+set.fadeout_sec+"s "+set.trans_out+";} " +
        "#"+set.outer_id+".show > #"+set.message_id+" {opacity: "+set.opacity+";transition: opacity "+set.fadein_sec+"s "+set.trans_in+";-webkit-transition: opacity "+set.fadein_sec+"s "+set.trans_in+";}" +
        "#"+set.message_id+" { "+set.message_style+" } ";
    document.body.appendChild(style);
}

//Element (Outer, Inner)
if((e = document.getElementById(set.outer_id))) {e.parentNode.removeChild(e);if(set.on_splash_vanished) set.on_splash_vanished();}
var splash = document.createElement('div');
splash.id = set.outer_id;
splash.onclick = function(){
    if((e = document.getElementById(set.outer_id))) e.parentNode.removeChild(e);
    if(set.on_splash_vanished) set.on_splash_vanished();
};
splash.innerHTML = '<div id="'+set.message_id+'" class="'+set.message_class+'">'+msg+'</div>';
document.body.appendChild(splash);

//Timer
setTimeout(function(){if(splash) splash.classList.add('show');},0);
setTimeout(function(){if(splash) splash.classList.remove('show');},set.wait_sec*1000);
setTimeout(function(){if(splash && splash.parentNode) splash.parentNode.removeChild(splash);if(set.on_splash_vanished) set.on_splash_vanished();},(set.fadeout_sec+set.wait_sec)*1000);
}