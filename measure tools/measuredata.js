// ==UserScript==
// @name         Examensarbete
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       a15perbl
// @match        http://127.0.0.1/phpapp/index.php
// @require      http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js
// @require      https://code.jquery.com/jquery-2.2.4.min.js
// @grant        GM_log
// @grant        GM_getValue
// @grant        GM_setValue
// @grant        GM_xmlhttpRequest
// ==/UserScript==

(function() {
    'use strict';

    var localURL='http://127.0.0.1/datareceiver/scraped_receiver.php';
    var scrapedData=[];

    var stop = GM_getValue('stop');
    if(!stop){
        stop = 100;
    }

    GM_setValue('stop', 100);

    var temp = GM_getValue('counter');
    if(!temp){
        temp = 0;
    }

    GM_setValue('counter', 0);
    stop = parseInt(stop);
    temp = parseInt(temp);
    temp++;

    if(temp >= stop){

        if(temp){
            temp = 'undefined';
            GM_setValue('counter', temp);
        }
        return false;
    }

    GM_setValue('counter', temp);

    var clickEvent = document.createEvent ('MouseEvents');
    clickEvent.initEvent ('click', true, true);
    document.querySelector('.searchbutton').dispatchEvent (clickEvent);

    var start_time = new Date(GM_getValue('start'));
    var end_time = new Date();
    start_time = new Date(start_time);
    var diff = (start_time - end_time) * -1;

    // Antal sekunder läggs i arrayen scrapedData med push
    scrapedData.push(diff);

    // Skickar in arrayen i ajax som 'data' för att sparas på servern
    ajaxCall(scrapedData);

    GM_setValue('start', new Date());
    temp++;

    // Help function that makes an AJAX call transmitting data to local web server for processing
    function ajaxCall(data) {
        try {
            GM_xmlhttpRequest({
                method: 'POST',
                url: localURL,
                data: 'str=' + encodeURIComponent(data),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                onload: function (response) {
                    alert("Sent " + scrapedData.length + " data post(s).");
                }
            });
        } catch (ex1) {
            console.log(ex1);
        }
    }

})();